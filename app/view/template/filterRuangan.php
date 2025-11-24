<?php

// Data Filter
$filter_id = 'Ruangan';
$label = 'Ruangan';
$options = [
    'Ruang Duta' => 'Ruang Duta',
    'Ruang Meeting Kecil' => 'Ruang Meeting Kecil',
];
$current_values = $_GET[$filter_id] ?? ''; 

// Asumsi: Pastikan path ini benar!
include 'template/FilterDropdown.php';
?>