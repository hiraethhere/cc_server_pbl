<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class RuanganSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {

        $table = $this->table('rooms', ['id' => 'id_room']);
        $dataRuangan = [
            [
                'id_announcement'   => 1,  // atau NULL jika tidak memiliki pengumuman
                'room_name'    => 'Ruang Prancis',
                'room_img'     => 'DefaultRuangan.jpg',
                'description'       => "Ruang Prancis untuk pertemuan penting.\n. Misalnya untuk belajar Grafika Komputer yang menyenangkan",
                'short_description' => "Ruang Prancis untuk orang prancis",
                'floor'          => 1,
                'status'          => 'active',
                'max_capacity' => 8,
                'min_capacity'  => 5,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'id_announcement'   => null,
                'room_name'    => 'Ruangan Duta',
                'room_img'     => 'DefaultRuangan.jpg',
                'description'       => "Ruangan besar khusus untuk para duta pnj yang terhormat. Kapasitas hingga 10 orang. Hidup Duta!",
                'short_description' => "Hidup Duta PNJ Hidup Duta PNJ Hidup Duta PNJ",
                'floor'          => 2,
                'status'          => 'active',
                'max_capacity' => 6,
                'min_capacity'  => 4,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'id_announcement'   => null,
                'room_name'    => 'Ruangan Lentera Edukasi',
                'room_img'     => 'DefaultRuangan.jpg',
                'description'       => "Ruang Lentera Edukasi adalah ruangan modern yang dirancang untuk mendukung kegiatan pembelajaran dan diskusi kelompok.",
                'short_description' => "Ruang bersih, tenang, dilengkapi wifi, cocok untuk belajar, rapat, dan aktivitas produktif.",
                'floor'          => 1,
                'status'          => 'active',
                'max_capacity' => 10,
                'min_capacity'  => 6,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ]
        ];

        $table->insert($dataRuangan)->saveData();
    }
}
