<?php
// components/filterJenisAnggota.php

// Data Filter
$filter_id = 'jenis_anggota';
$label = 'Jenis Anggota';
$options = [
    'Mahasiswa' => 'Mahasiswa',
    'Dosen' => 'Dosen',
    'Tendik' => 'Tendik',
];
$current_values = $_GET[$filter_id] ?? ''; 

// Asumsi: Pastikan path ini benar!
include 'template/FilterDropdown.php'; 
?>