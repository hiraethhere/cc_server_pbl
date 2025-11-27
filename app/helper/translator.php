<?php

function translateStatus($status): string
{
    $lookup = [
        'active'   => 'Aktif',
        'ongoing'  => 'Sedang berlangsung',
        'done'     => 'Selesai',
        'rejected' => 'Ditolak',
        'canceled' => 'Dibatalkan',
        'expired'  => 'Kadaluarsa',
        'pending'  => 'Belum Aktif'
    ];

    return $lookup[$status] ?? 'Status tidak dikenal';
}

function getStyleStatus($status): string {

   $map = [
        'active'   => 'bg-blue-500',
        'ongoing'  => 'bg-yellow-500',
        'done'     => 'bg-[#38C55C]',
        'cancelled' => 'bg-red-500',
        'rejected' => 'bg-[#C90B0B]'
    ];

    return $map[$status] ?? 'bg-gray-400';
}