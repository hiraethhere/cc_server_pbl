<?php

class FeedbackModel{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addFeedback($data)
    {
        $query = "INSERT INTO feedback 
                  (id_booking, id_user, rating, comment) 
                  VALUES (:id_booking, :id_user, :rating, :comment)";

        $this->db->query($query);
        // Binding data
        $this->db->bind('id_booking', $data['id_booking']);
        $this->db->bind('id_user',    $data['id_user']);
        $this->db->bind('rating',     $data['rating']);
        $this->db->bind('comment',     $data['comment']); // Map dari key array 'comment' ke kolom DB 'ulasan'
        $this->db->execute();
        // 1 jika sukses
        return $this->db->rowCount();
    }

    public function getFeedbackFiltered($limit, $start, $ruangan = '', $bulan = '', $tahun = ''){
        // 1. Base Query
        $sql = "SELECT 
                    f.id_feedback, f.rating, f.comment, f.created_at, 
                    b.booking_code, ub.username AS booker_name, u.username, 
                    b.start_time, b.end_time, r.room_name
                FROM feedback f
                JOIN bookings b ON f.id_booking = b.id_booking
                JOIN rooms r ON b.id_room = r.id_room
                JOIN users u ON f.id_user = u.id_user
                LEFT JOIN users ub ON b.id_user = ub.id_user
                WHERE 1=1 ";

        // 2. Susun Query (Filter Ruangan)
        if (!empty($ruangan)) {
            if (!is_array($ruangan)) {
                $ruangan = [$ruangan];
            }
            $in = [];
            foreach ($ruangan as $i => $r) {
                $in[] = ":room$i"; // Buat placeholder :room0, :room1, dst
            }
            $sql .= " AND r.room_name IN (" . implode(',', $in) . ")";
        }

        // 3. Susun Query (Filter Bulan - Ambil dari MONTH(created_at))
        if (!empty($bulan)) {
            if (!is_array($bulan)) {
                $bulan = [$bulan];
            }
            $in = [];
            foreach ($bulan as $i => $b) {
                $in[] = ":month$i"; // Placeholder :month0, dst
            }
            // Di sini kuncinya: SQL yang melakukan ekstraksi bulan
            $sql .= " AND MONTH(f.created_at) IN (" . implode(',', $in) . ")";
        }

        // 4. Susun Query (Filter Tahun - Ambil dari YEAR(created_at))
        if (!empty($tahun)) {
            if (!is_array($tahun)) {
                $tahun = [$tahun];
            }
            $in = [];
            foreach ($tahun as $i => $t) {
                $in[] = ":year$i";
            }
            $sql .= " AND YEAR(f.created_at) IN (" . implode(',', $in) . ")";
        }

        // Order & Limit
        $sql .= " ORDER BY f.created_at DESC LIMIT :limit OFFSET :start";

        // Siapkan Statement
        $this->db->query($sql);

        // 5. MANUAL BINDING (Seperti contohmu)
        
        // Bind Ruangan
        if (!empty($ruangan)) {
            foreach ($ruangan as $i => $r) {
                $this->db->bind(":room$i", $r);
            }
        }

        // Bind Bulan
        if (!empty($bulan)) {
            foreach ($bulan as $i => $b) {
                // Nilai $b di sini adalah angka (misal '1', '12'), cocok dengan hasil MONTH()
                $this->db->bind(":month$i", $b);
            }
        }

        // Bind Tahun
        if (!empty($tahun)) {
            foreach ($tahun as $i => $t) {
                $this->db->bind(":year$i", $t);
            }
        }

        // Bind Limit & Offset
        $this->db->bind(':limit', (int)$limit, PDO::PARAM_INT);
        $this->db->bind(':start', (int)$start, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

    public function countFeedbackFiltered($ruangan = '', $bulan = '', $tahun = '')
    {
        // Base Query Count
        $sql = "SELECT COUNT(*) AS total
                FROM feedback f
                JOIN bookings b ON f.id_booking = b.id_booking
                JOIN rooms r ON b.id_room = r.id_room
                WHERE 1=1 ";

        // Logic penyusunan query SAMA PERSIS dengan di atas
        if (!empty($ruangan)) {
            if (!is_array($ruangan)) $ruangan = [$ruangan];
            $in = [];
            foreach ($ruangan as $i => $r) $in[] = ":room$i";
            $sql .= " AND r.room_name IN (" . implode(',', $in) . ")";
        }

        if (!empty($bulan)) {
            if (!is_array($bulan)) $bulan = [$bulan];
            $in = [];
            foreach ($bulan as $i => $b) $in[] = ":month$i";
            $sql .= " AND MONTH(f.created_at) IN (" . implode(',', $in) . ")";
        }

        if (!empty($tahun)) {
            if (!is_array($tahun)) $tahun = [$tahun];
            $in = [];
            foreach ($tahun as $i => $t) $in[] = ":year$i";
            $sql .= " AND YEAR(f.created_at) IN (" . implode(',', $in) . ")";
        }

        $this->db->query($sql);

        // Manual Binding juga SAMA PERSIS (tanpa limit/offset)
        if (!empty($ruangan)) {
            foreach ($ruangan as $i => $r) $this->db->bind(":room$i", $r);
        }
        if (!empty($bulan)) {
            foreach ($bulan as $i => $b) $this->db->bind(":month$i", $b);
        }
        if (!empty($tahun)) {
            foreach ($tahun as $i => $t) $this->db->bind(":year$i", $t);
        }

        return $this->db->singleSet()['total'];
    }

}