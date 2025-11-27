<?php
// components/filterJurusan.php

// Data Filter
$filter_id = 'jurusan';
$label = 'Jurusan/Unit Kerja';
$options = [
    'Teknik Informatika & Komputer' => 'Teknik Informatika & Komputer',
    'Teknik Elektro' => 'Teknik Elektro',
];
$current_values = $_GET[$filter_id] ?? ''; 

// Asumsi: Pastikan path ini benar!
include 'template/FilterDropdown.php';
?>