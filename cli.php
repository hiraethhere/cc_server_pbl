<?php
// cli.php

// 1. Load dependency dasar
require_once 'app/core/Database.php';
require_once 'app/core/Migration.php';
require_once 'app/core/Seeder.php';

// Cek argumen terminal (contoh: php cli.php migrate)
$command = $argv[1] ?? null;

if ($command === 'migrate') {
    runMigrations();
} elseif ($command === 'seed') {
    runSeeders();
} else {
    echo "Perintah tidak dikenal. Gunakan: \n";
    echo "php cli.php migrate \n";
    echo "php cli.php seed \n";
}

function runMigrations() {
    $db = new Database();
    
    // 1. Buat tabel pelacak migrasi jika belum ada
    $query = "CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $db->query($query);
    $db->execute();

    // 2. Ambil daftar migrasi yang sudah pernah jalan
    $db->query("SELECT migration FROM migrations");
    $existing = $db->resultSet();
    $executedMigrations = array_column($existing, 'migration');

    // 3. Scan folder migrasi
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
        
        // Perbaiki nama class jika mengandung angka di depan (PHP tidak boleh nama class angka di depan)
        // Saran: Ubah nama file migrasi kamu menjadi format Huruf di depan, misal: m_2025...
        // Tapi jika nama class di dalam file sudah benar, kita bisa instansiasi manual.
        
        // Mari kita asumsikan nama class di dalam file SAMA dengan nama file.
        // JIKA nama file: 20251115012353_create_table_users.php
        // MAKA nama class harus: CreateTableUsers (sesuai konvensi Phinx lama kamu)
        // Kita butuh fungsi helper sedikit untuk convert nama file ke nama class Phinx style
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