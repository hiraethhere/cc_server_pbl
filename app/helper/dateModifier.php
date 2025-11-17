<?php 

function customExpiredDate($day, $month, $yearsToAdd = 4) {
    $year = date('Y') + $yearsToAdd;
    return sprintf('%04d-%02d-%02d 00:00:00', $year, $month, $day);
}
