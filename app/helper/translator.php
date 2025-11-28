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
        'pending'  => 'Belum Aktif'
    ];

    return $lookup[$status] ?? 'Status tidak dikenal';
}

function getStyleStatus($status): string {

   $map = [
        'pending'  => 'bg-blue-500',
        'active'   => 'bg-blue-500',
        'ongoing'  => 'bg-yellow-500',
        'done'     => 'bg-[#38C55C]',
        'cancelled' => 'bg-[#C90B0B]',
        'rejected' => 'bg-[#C90B0B]'
    ];

    return $map[$status] ?? 'bg-gray-400';
}