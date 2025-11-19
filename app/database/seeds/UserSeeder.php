<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
        $table = $this->table('users', ['id' => 'id_user']);
        $table->truncate();
        $usersData = [
            [
                'id_role'       => 1, // ID 'Admin' dari atas
                'username'      => 'superadmin',
                'password'      => password_hash('admin123', PASSWORD_DEFAULT),
                'email'         => 'superadmin@example.com',
                'nomor_induk'   => 'ADMIN001',
                'jurusan_unit'   => 'Pusat TI',
                'prodi'         => 'Administrator',
                'status'        => 'active',
                'suspend_count' => 0,
                'profile_photo' => 'DefaultProfilePicture.jpg',
                'email_verified'  => true,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'id_role'       => 3, // ID 'Mahasiswa' dari atas
                'username'      => 'anton',
                'password'      => password_hash('user123', PASSWORD_DEFAULT),
                'email'         => 'anton@example.com',
                'nomor_induk'   => '1234567890',
                'jurusan_unit'   => 'Teknik Informatika dan Komputer',
                'prodi'         => 'Teknik Informatika',
                'status'        => 'active',
                'suspend_count' => 0,
                'profile_photo' => 'DefaultProfilePicture.jpg',
                'email_verified'  => true,
                'expired_at'    => date('Y-m-d H:i:s', strtotime('+4 years')),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'id_role'       => 3, // ID 'Mahasiswa'
                'username'      => 'Tina',
                'password'      => password_hash('user123', PASSWORD_DEFAULT),
                'email'         => 'Tina@example.com',
                'nomor_induk'   => '12345678911',
                'jurusan_unit'   => 'Administrasi Niaga',
                'prodi'         => 'Administrasi Bisnis',
                'status'        => 'Active',
                'suspend_count' => 0,
                'email_verified'  => true,
                'profile_photo' => 'DefaultProfilePicture.jpg',
                'kubaca_photo'    => 'user.png',
                'expired_at'    => date('Y-m-d H:i:s', strtotime('+4 years')),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'id_role'       => 2, // ID Admin
                'username'      => 'admin',
                'password'      => password_hash('admin123', PASSWORD_DEFAULT),
                'email'         => 'admin@example.com',
                'nomor_induk'   => 'ADMIN002',
                'jurusan_unit'   => 'Administrasi',
                'prodi'         => null,
                'status'        => 'Active',
                'suspend_count' => 0,
                'email_verified'  => true,
                'profile_photo' => 'DefaultProfilePicture.jpg',
                'kubaca_photo'    => null,
                'expired_at'    => null,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'id_role'       => 4, // ID Dosen
                'username'      => 'Dosen',
                'password'      => password_hash('dosen123', PASSWORD_DEFAULT),
                'email'         => 'dosen@example.com',
                'nomor_induk'   => '1234567891',
                'jurusan_unit'   => 'Administrasi Niaga',
                'prodi'         => 'Administrasi Bisnis',
                'status'        => 'Active',
                'suspend_count' => 0,
                'email_verified'  => true,
                'profile_photo' => 'DefaultProfilePicture.jpg',
                'kubaca_photo'    => null,
                'expired_at'    => null,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'id_role'       => 5, // ID Tendik
                'username'      => 'Tendik',
                'password'      => password_hash('Tendik123', PASSWORD_DEFAULT),
                'email'         => 'tendik@example.com',
                'nomor_induk'   => '1234567892',
                'jurusan_unit'   => 'Administrasi Niaga',
                'prodi'         => 'Administrasi Bisnis',
                'status'        => 'Active',
                'suspend_count' => 0,
                'email_verified'  => true,
                'profile_photo' => 'DefaultProfilePicture.jpg',
                'kubaca_photo'    => null,
                'expired_at'    => null,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]
        ];
        $table->insert($usersData)->saveData();
    }
}
