<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner']; //login session
if(!isset($sesiadmin)){
    header('location:index.php'); //redirect ke index.php
}
$admin = mysqli_fetch_array(mysqli_query($connect, "SELECT * from admin WHERE id_admin='$sesiadmin'"));

$judul = mysqli_real_escape_string($connect, $_POST['judul']); //judul
$isi = mysqli_real_escape_string($connect, $_POST['isi']); //isi berita
$tglmulai = mysqli_real_escape_string($connect, $_POST['mulai']);
$tglselesai = mysqli_real_escape_string($connect, $_POST['selesai']);
$link = mysqli_real_escape_string($connect, $_POST['link']);


$foto = $_FILES['gambar']['tmp_name']; //temporary
$namaFoto = $_FILES['gambar']['name']; //nama gambar
$tgl = date('Y-m-d H:i:s');

$ext = strtolower(end(explode(".", $namaFoto)));
$namaBaru = $judul .'.'. $ext;

if(isset($_POST['submit'])){
    if($judul == ""){
        $judul_error = "<span style = 'color:red;'>Judul Tidak Boleh Kosong!</span>";
    }elseif($tglmulai == ""){
        $tglmulai_error = "<span style = 'color:red;'>Tanggal Tidak Boleh Kosong!</span>";
    }elseif($tglselesai == ""){
        $tglselesai_error = "<span style = 'color:red;'>Tanggal Tidak Boleh Kosong!</span>";
    }elseif($isi == ""){
        $isi_error = "<span style = 'color:red;'>Deskripsi Tidak Boleh Kosong!</span>";
    }elseif(empty($foto)){
        $gambar_error = "<span style = 'color:red;'>Silahkan Masukkan Gambar!</span>";
    }else{
        //save gambar di folder
        move_uploaded_file($foto, '../assets/images/iklan/' . $namaBaru);
        //simpan data di database
        $sql = mysqli_query($connect, "INSERT INTO iklan(nm_perusahaan, isi_iklan, id_admin, tgl_mulai, tgl_selesai, link, gambar, status)
        VALUES ('$judul','$isi','$sesiadmin','$tglmulai','$tglselesai','$link','$namaBaru', 'Aktif')");
        if($sql){
            echo "<script>alert('Data Submitted');document.location='iklan.php'</script>";
        }else{
            $gambar_error = "<span style = 'color:red;'>Error When Submit! Please Try Again.</span>";

        }
    }

}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portal Berita Mahasiswa</title>

        <link rel="stylesheet" href="../assets/css/style.css" type="text/css">

    </head>
    <body>
        <div id="container">
            <div class="header">
                <h1>Admin - Portal Berita Mahasiswa</h1>
                <p>Berita terkini dan terupdate sekarang</p>
            </div>
            <div class="menu">
                <?php include "menu.php"; ?>
            </div>
            <div class="konten">
                <div class="konten-kiri">
                   <h1>Tambah Iklan</h1>
                   <form action="" method="post" enctype="multipart/form-data">
                        <table>
                        <tr>
                            <td>Judul Iklan</td>
                        <td>
                            <input type="text" name="judul" placeholder="Masukkan Judul" class="input" value="<?= $judul;?>">
                            <?= $judul_error;?>
                        </td></tr>
                        <tr>
                            <td>Tanggal Mulai</td>
                        <td>
                            <input type="date" name="mulai" placeholder="Tanggal Mulai" class="input" value="<?= $tglmulai;?>">
                            <?= $tglmulai_error;?>
                        </td></tr>
                        <tr>
                            <td>Tanggal Selesai</td>
                        <td>
                            <input type="date" name="selesai" placeholder="Tanggal Selesai" class="input" value="<?= $tglselesai;?>">
                            <?= $tglselesai_error;?>
                        </td></tr>
                        <tr>
                            <td>Deskripsi Iklan</td>
                        <td>
                            <textarea name="isi" rows="4" cols="40" placeholder="isi iklan"><?= $isi;?></textarea>
                            <?= $isi_error;?>
                        </td></tr>
                        <tr>
                            <td>Link Iklan</td>
                        <td>
                            <input type="text" name="link" placeholder="Link Iklan" class="input" value="<?= $link;?>">
                            <?= $link_error;?>
                        </td></tr>
                        <tr>
                            <td>Gambar Iklan</td>    
                        <td>
                            <input type="file" name="gambar" accept=".jpg, .png, .JPEG, .PNG">
                            <?= $gambar_error;?>
                        </td></tr>
                        <tr><td>&nbsp;</td><td>
                            <button type="submit" name="submit">SUBMIT</a></button>
                        </td></tr>
                        </table>
                    </form>
                </div>
                <div class="konten-kanan">

                </div>
            </div>
            <?php include "../footer.php"; ?>