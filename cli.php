<?php
// shidqi migration gaming
require_once 'app/core/Database.php';
require_once 'app/core/Migration.php';
require_once 'app/core/Seeder.php';

// Cek argumen terminal (contoh: php cli.php migrate)
$command = $argv[1] ?? null;

if ($command === 'migrate') {
    runMigrations();
} elseif ($command === 'migrate:fresh') {
    // INI PERINTAH BARUNYA
    echo "!!! PERINGATAN: Database akan dikosongkan !!!\n";
    dropAllTables(); // Hapus semua tabel
    echo "--------------------------------------\n";
    echo "Memulai migrasi ulang...\n";
    runMigrations(); // Jalankan migrasi dari nol
} elseif ($command === 'seed') {
    runSeeders();
} else {
    echo "Perintah tidak dikenal. Gunakan: \n";
    echo "php cli.php migrate \n";
    echo "php cli.php migrate:fresh  (Reset total database) \n"; 
    echo "php cli.php seed \n";
}

function runMigrations() {
    $db = new Database();
    
    //tabel pelacak migrasi
    $query = "CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $db->query($query);
    $db->execute();

    //Ambil daftar migrasi yang sudah pernah jalan
    $db->query("SELECT migration FROM migrations");
    $existing = $db->resultSet();
    $executedMigrations = array_column($existing, 'migration');

    //Scan folder migrasi
    $files = scandir(__DIR__ . '/app/database/migrations');
    $files = array_filter($files, function($file) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'php';
    });

    $count = 0;
    foreach ($files as $file) {
        if (in_array($file, $executedMigrations)) {
            continue; // Skip jika sudah pernah jalan
        }

        require_once __DIR__ . '/app/database/migrations/' . $file;
        
        // Ambil nama class dari nama file (Asumsi: NamaFile.php -> class NamaFile)
        // Atau kita bisa sepakat nama class di dalam file harus 'Migration_{Timestamp}'
        // TAPI, cara termudah: kita baca isi file atau samakan nama class dengan nama file tanpa .php
        $className = pathinfo($file, PATHINFO_FILENAME);
        $className = convertToClassName($file);

        if (class_exists($className)) {
            echo "Migrating: $file ... ";
            $migration = new $className();
            $migration->up();
            
            // Catat ke database
            $db->query("INSERT INTO migrations (migration) VALUES (:mig)");
            $db->bind(':mig', $file);
            $db->execute();
            
            echo "DONE.\n";
            $count++;
        } else {
            echo "Error: Class '$className' tidak ditemukan di $file \n";
        }
    }

    if ($count == 0) {
        echo "Tidak ada migrasi baru.\n";
    }
}

function runSeeders() {
    // Scan folder seeder
    $files = scandir(__DIR__ . '/app/database/seeds');
    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') continue;

        require_once __DIR__ . '/app/database/seeds/' . $file;
        $className = pathinfo($file, PATHINFO_FILENAME);

        if (class_exists($className)) {
            echo "Seeding: $className ... ";
            $seeder = new $className();
            $seeder->run();
            echo "DONE.\n";
        }
    }
}

// Helper untuk mengambil nama file 
function convertToClassName($filename) {
    // Hanya mengambil nama file tanpa ekstensi .php
    return pathinfo($filename, PATHINFO_FILENAME);
}

function dropAllTables() {
    $db = new Database();
    
    echo "Sedang menghapus semua tabel...\n";

    // 1. Matikan Foreign Key Check biar tidak error constraint
    $db->query("SET FOREIGN_KEY_CHECKS = 0");
    $db->execute();

    // 2. Ambil semua nama tabel di database
    $db->query("SHOW TABLES");
    $tables = $db->resultSet(); 

    foreach ($tables as $t) {
        // Trik mengambil value pertama dari array/object tanpa tahu nama key-nya
        // Biasanya key-nya 'Tables_in_nama_db'
        $tableName = array_values((array)$t)[0];

        $db->query("DROP TABLE IF EXISTS $tableName");
        $db->execute();
        echo "   -> DROPPED: $tableName\n";
    }

    // 3. Nyalakan lagi Foreign Key Check
    $db->query("SET FOREIGN_KEY_CHECKS = 1");
    $db->execute();
    
    echo "Database bersih.\n";
}