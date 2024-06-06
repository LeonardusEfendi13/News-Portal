<?php

function nominal($parameter){
    $hasil = number_format($parameter,0,',','.');
    return $hasil;
}

date_default_timezone_set("Asia/Jakarta");

function format_tgl1($parameter){
    $tanggal = substr($parameter,8,2);
    $bln_angka = substr($parameter,5,2);
    switch($bln_angka){
        case 1:
            $bulan = "Januari";
            break;
        case 2:
            $bulan = "Februari";
            break;
        case 3:
            $bulan = "Maret";
            break;
        case 4:
            $bulan = "April";
            break;
        case 5:
            $bulan = "Mei";
            break;
        case 6:
            $bulan = "Juni";
            break;
        case 7:
            $bulan = "Juli";
            break;
        case 8:
            $bulan = "Agustus";
            break;
        case 9:
            $bulan = "September";
            break;
        case 10:
            $bulan = "Oktober";
            break;
        case 11:
            $bulan = "November";
            break;
        case 12:
            $bulan = "Desember";
            break;
    }
    $tahun = substr($parameter,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;
}

function format_tgl_2($parameter){
    $tanggal = substr($parameter,8,2);
    $bulan = substr($parameter,5,2);
    $tahun = substr($parameter,0,4);
    return $tanggal.'/'.$bulan.'/'.$tahun;
}

?>