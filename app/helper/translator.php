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
        'pending'  => 'Menunggu',
        'approved' => 'Sudah Disetujui',
        'declined' => 'Ditolak'
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
        'pending'  => 'bg-blue-600/30 text-[#1E68FB]',
        'active'   => 'bg-[#38C55C]',
        'ongoing'  => 'bg-yellow-500/30 text-yellow-600 ',
        'done'     => 'bg-[#38C55C]/30',
        'cancelled' => 'bg-[#C90B0B]/30',
        'rejected' => 'bg-[#C90B0B]/30', //opacity 30%
        'approved' => 'bg-[#38C55C]/30',
        'declined' => 'bg-[#C90B0B]/30'
    ];

    return $map[$status] ?? 'bg-gray-400';
}

function getStyleStatustext($status): string {

   $map = [
        'pending'  => 'text-[#1E68FB]',
        'active'   => 'text-[#38C55C]',
        'ongoing'  => 'text-yellow-600 ',
        'done'     => 'text-[#38C55C]',
        'cancelled' => 'text-[#C90B0B]',
        'rejected' => 'text-[#C90B0B]',
        'approved' => 'text-[#38C55C]',
        'declined' => 'text-[#C90B0B]'
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