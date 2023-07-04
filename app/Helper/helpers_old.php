<?php
function hitungStatusGizi($umur, $berat, $tinggi)
{
    // Konversi input ke tipe data numerik jika diperlukan
    $berat = doubleval($berat);
    
    // Hitung z-score menggunakan rumus yang sesuai dengan data balita Anda
    
    // Contoh implementasi sederhana rumus untuk z-score berdasarkan berat badan balita
    $mean = 10.0; // rata-rata berat badan balita pada umur tersebut
    $stdDeviation = 2.0; // standar deviasi berat badan balita pada umur tersebut
    
    $zScore = ($berat - $mean) / $stdDeviation;
    
    // Tentukan status gizi berdasarkan z-score
    if ($zScore < -2.0) {
        return 'Kurang Gizi'; // Kurang Gizi
    } elseif ($zScore >= -2.0 && $zScore <= 2.0) {
        return 'Normal'; // Normal
    } else {
        return 'Obesitas'; // Kelebihan Gizi
    }
}