<?php

class DashboardModel {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // -----------------------------------------------------------
    // 1. STATISTIK BOOKING (Updated dengan tabel Reschedule)
    // -----------------------------------------------------------
    public function getBookingStats($bulan = null, $tahun = null)
    {
        // Bagian 1: Hitung status dari tabel BOOKINGS utama
        $query = "SELECT 
                    COUNT(*) AS total_booking,
                    SUM(CASE WHEN status = 'ongoing' THEN 1 ELSE 0 END) AS dipinjam,
                    SUM(CASE WHEN status = 'done' THEN 1 ELSE 0 END) AS selesai,
                    SUM(CASE WHEN status = 'cancelled' THEN 1 ELSE 0 END) AS dibatalkan
                  FROM bookings";

        // Bagian 2: Persiapkan Filter Waktu
        $conditions = [];
        $params = [];

        if (!empty($bulan)) {
            $conditions[] = "MONTH(start_time) = :bulan";
            $params['bulan'] = $bulan;
        }

        if (!empty($tahun)) {
            $conditions[] = "YEAR(start_time) = :tahun";
            $params['tahun'] = $tahun;
        }

        // Pasang WHERE untuk query Booking
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $this->db->query($query);
        foreach ($params as $key => $value) {
            $this->db->bind($key, $value);
        }
        $bookingData = $this->db->singleSet();

        // Bagian 3: Hitung data RESCHEDULE (Dari tabel reschedule)
        // Kita hitung berapa banyak request reschedule pada periode booking ini
        // Kita perlu JOIN ke bookings untuk tahu tanggal booking aslinya
        $queryReschedule = "SELECT COUNT(*) as total_reschedule 
                            FROM reschedule r
                            JOIN bookings b ON r.id_booking = b.id_booking";
        
        // Gunakan filter waktu yang sama (berdasarkan start_time booking)
        if (!empty($conditions)) {
            $queryReschedule .= " WHERE " . implode(" AND ", $conditions);
        }

        $this->db->query($queryReschedule);
        foreach ($params as $key => $value) {
            $this->db->bind($key, $value);
        }
        $rescheduleData = $this->db->singleSet();

        // Gabungkan hasil
        $bookingData['reschedule'] = $rescheduleData['total_reschedule'];
        
        return $bookingData;
    }

    // -----------------------------------------------------------
    // 2. STATISTIK ANGGOTA (Tetap sama seperti sebelumnya)
    // -----------------------------------------------------------
    public function getUserStats($jurusanFilter = [])
    {
        // Asumsi relasi user -> role
        $query = "SELECT 
                    COUNT(*) AS total_anggota,
                    SUM(CASE WHEN r.role_name = 'Dosen' THEN 1 ELSE 0 END) AS total_dosen,
                    SUM(CASE WHEN r.role_name = 'Mahasiswa' THEN 1 ELSE 0 END) AS total_mahasiswa,
                    SUM(CASE WHEN r.role_name = 'Tendik' THEN 1 ELSE 0 END) AS total_tendik,
                    SUM(CASE WHEN u.status = 'active' THEN 1 ELSE 0 END) AS aktif,
                    SUM(CASE WHEN u.status = 'rejected' THEN 1 ELSE 0 END) AS ditolak,
                    SUM(CASE WHEN u.status = 'pending' THEN 1 ELSE 0 END) AS menunggu
                  FROM users u
                  LEFT JOIN roles r ON u.id_role = r.id_role";

        if (!empty($jurusanFilter)) {
            $placeholders = [];
            foreach ($jurusanFilter as $key => $val) {
                $placeholders[] = ":jurusan_$key";
            }
            $query .= " WHERE u.jurusan_unit IN (" . implode(',', $placeholders) . ")";
        }

        $this->db->query($query);

        if (!empty($jurusanFilter)) {
            foreach ($jurusanFilter as $key => $val) {
                $this->db->bind(":jurusan_$key", $val);
            }
        }

        return $this->db->singleSet();
    }

    // -----------------------------------------------------------
    // 3. STATISTIK RUANGAN (Updated dengan tabel Feedback)
    // -----------------------------------------------------------
    public function getRoomStats($bulan = null, $tahun = null)
    {
        // A. Statistik Umum (Tersedia/Tidak)
        $queryUmum = "SELECT 
                        COUNT(*) AS total_ruangan,
                        SUM(CASE WHEN status = 'active' THEN 1 ELSE 0 END) AS tersedia,
                        SUM(CASE WHEN status != 'active' THEN 1 ELSE 0 END) AS tidak_tersedia
                      FROM rooms";
        $this->db->query($queryUmum);
        $resultUmum = $this->db->singleSet();

        // Persiapkan kondisi Filter untuk Sub-query
        $conditions = [];
        $params = [];
        if (!empty($bulan)) { $conditions[] = "MONTH(b.start_time) = :bulan"; $params['bulan'] = $bulan; }
        if (!empty($tahun)) { $conditions[] = "YEAR(b.start_time) = :tahun"; $params['tahun'] = $tahun; }
        $whereClause = !empty($conditions) ? " AND " . implode(" AND ", $conditions) : "";

        // B. Ruangan Terpopuler
        $queryPopuler = "SELECT r.room_name, COUNT(b.id_booking) as jumlah
                         FROM bookings b
                         JOIN rooms r ON b.id_room = r.id_room
                         WHERE 1=1 $whereClause
                         GROUP BY b.id_room ORDER BY jumlah DESC LIMIT 1";
        
        $this->db->query($queryPopuler);
        foreach ($params as $key => $value) $this->db->bind($key, $value);
        $resultPopuler = $this->db->singleSet();

        // C. Rating Terbaik (Dari tabel Feedback)
        $queryBest = "SELECT r.room_name, AVG(f.rating) as rata_rata
                      FROM feedback f
                      JOIN bookings b ON f.id_booking = b.id_booking
                      JOIN rooms r ON b.id_room = r.id_room
                      GROUP BY r.id_room ORDER BY rata_rata DESC LIMIT 1";

        $this->db->query($queryBest);
        $resultBest = $this->db->singleSet();

        // D. Rating Terendah
        $queryWorst = "SELECT r.room_name, AVG(f.rating) as rata_rata, r.img_room
                       FROM feedback f
                       JOIN bookings b ON f.id_booking = b.id_booking
                       JOIN rooms r ON b.id_room = r.id_room
                       GROUP BY r.id_room ORDER BY rata_rata ASC LIMIT 1";

        $this->db->query($queryWorst);
        $resultWorst = $this->db->singleSet();

        // Gabungkan semua data array
        return [
            'total_ruangan' => $resultUmum['total_ruangan'],
            'tersedia' => $resultUmum['tersedia'],
            'tidak_tersedia' => $resultUmum['tidak_tersedia'],
            
            'populer_nama' => $resultPopuler['room_name'] ?? '-',
            'populer_jumlah' => $resultPopuler['jumlah'] ?? 0,
            
            'rating_terbaik_nama' => $resultBest['room_name'] ?? '-',
            'rating_terbaik_nilai' => isset($resultBest['rata_rata']) ? number_format($resultBest['rata_rata'], 1) : '0.0',
            
            'rating_terendah_nama' => $resultWorst['room_name'] ?? '-',
            'rating_terendah_nilai' => isset($resultWorst['rata_rata']) ? number_format($resultWorst['rata_rata'], 1) : '0.0'
        ];
    }
}