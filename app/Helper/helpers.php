<?php
if (!function_exists('cekgizibb'))
{
    function cekgizibb($nilai){
        $keterangan=NULL;
            if($nilai=='1'){
                $keterangan='Berat badan sangat kurang (severely underweight)';
            }elseif($nilai=='2'){
                $keterangan='Berat badan kurang (underweight)';
            }elseif($nilai=='3'){
                $keterangan='Berat badan normal';
            }elseif($nilai=='4'){
                $keterangan='Resiko Berat Badan Lebih';
            }else{
                $keterangan='-';
            }
        return $keterangan;

    }
}

if (!function_exists('cekgizitb'))
{
    function cekgizitb($nilai){
        $keterangan=NULL;
            if($nilai=='1'){
                $keterangan='Sangat pendek (severely stunted)';
            }elseif($nilai=='2'){
                $keterangan='Pendek (stunted)';
            }elseif($nilai=='3'){
                $keterangan='Normal';
            }elseif($nilai=='4'){
                $keterangan='Tinggi';
            }else{
                $keterangan='-';
            }
        return $keterangan;

    }
}

if (!function_exists('cekgizibbtb'))
{
    function cekgizibbtb($nilai){
        $keterangan=NULL;
            if($nilai=='1'){
                $keterangan='Gizi buruk (severely  wasted)';
            }elseif($nilai=='2'){
                $keterangan='Gizi kurang (wasted)';
            }elseif($nilai=='3'){
                $keterangan='Gizi baik (normal)';
            }elseif($nilai=='4'){
                $keterangan='Berisiko gizi lebih (possible risk of overweight)';
            }elseif($nilai=='5'){
                $keterangan='Gizi lebih (overweight)';
            }elseif($nilai=='6'){
                $keterangan='Obesitas (obese)';
            }else{
                $keterangan='-';
            }
        return $keterangan;

    }
}


