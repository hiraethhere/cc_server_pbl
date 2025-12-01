<?php

function translateStatus($status): string
{
    $lookup = [
        'active'   => 'Aktif',
        'ongoing'  => 'Berlangsung',
        'done'     => 'Selesai',
        'rejected' => 'Ditolak',
        'cancelled' => 'Dibatalkan',
        'expired'  => 'Kadaluarsa',
        'pending'  => 'Menunggu'
    ];

    return $lookup[$status] ?? 'Status tidak dikenal';
}

function translateStatusUser($status): string
{
    $lookup = [
        'active'   => 'Aktif',
        'rejected' => 'Ditolak',
        'cancelled' => 'Dibatalkan',
        'expired'  => 'Kadaluarsa',
        'suspended' => 'Suspended',
        'pending'  => 'Belum Aktif'
    ];

    return $lookup[$status] ?? 'Status tidak dikenal';
}

function getStyleStatus($status): string {

   $map = [
        'pending'  => 'bg-blue-500',
        'active'   => 'bg-[#38C55C]',
        'ongoing'  => 'bg-yellow-500',
        'done'     => 'bg-[#38C55C]',
        'cancelled' => 'bg-[#C90B0B]',
        'rejected' => 'bg-[#C90B0B]'
    ];

    return $map[$status] ?? 'bg-gray-400';
}

function getStyleRole($role): string {

   $map = [
        'Mahasiswa'  => 'bg-[#1E68FB]/30 text-[#1E68FB]',
        'Dosen'   => 'bg-[#FB1E6B]/30  text-[#FB1E6B]',
        'Tendik'  => 'bg-[#CF570D]/30  text-[#CF570D]',
    ];

    return $map[$role] ?? 'bg-gray-400';
}