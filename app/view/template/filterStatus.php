<?php

// Data Filter
$filter_id = 'status';
$label = 'Status';
$options = [
    'Selesai' => 'Selesai',
    'Ditolak' => 'Ditolak',
];
$current_values = $_GET[$filter_id] ?? ''; 

// Asumsi: Pastikan path ini benar!
include 'template/FilterDropdown.php'; 
?>