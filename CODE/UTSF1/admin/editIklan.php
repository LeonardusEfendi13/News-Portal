<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner']; //login session
if(!isset($sesiadmin)){
    header('location:index.php'); //redirect ke index.php
}
$admin = mysqli_fetch_array(mysqli_query($connect, "SELECT * from admin WHERE id_admin='$sesiadmin'"));

$id = mysqli_real_escape_string($connect, $_GET['id']);
$b = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM iklan WHERE id_iklan='$id'"));

$judul = mysqli_real_escape_string($connect, $_POST['judul']); //judul
$isi = mysqli_real_escape_string($connect, $_POST['isi']); //isi berita
$tglmulai = mysqli_real_escape_string($connect, $_POST['mulai']);
$tglselesai = mysqli_real_escape_string($connect, $_POST['selesai']);
$link = mysqli_real_escape_string($connect, $_POST['link']);
$status = mysqli_real_escape_string($connect, $_POST['status']);
$gambarLama = mysqli_real_escape_string($connect, $_POST['gambarLama']); //Nama gambar lama


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
    }else{
        if(empty($foto)){ //kalau foto tidak diedit
            $sql = mysqli_query($connect, "UPDATE iklan SET nm_perusahaan='$judul', isi_iklan='$isi', tgl_mulai='$tglmulai', tgl_selesai='$tglselesai', link='$link', status='$status' WHERE id_iklan='$id'");
            if($sql){
                echo "<script>alert('Edit Submitted');document.location='iklan.php'</script>";
            }else{
                $gambar_error = "<span style = 'color:red;'>Error When Submit! Please Try Again.</span>";
            }
        }else{
        unlink('../assets/images/iklan/' . $gambarLama);
        //save gambar di folder
        move_uploaded_file($foto, '../assets/images/iklan/' . $namaBaru);
        //simpan data di database
        $sql = mysqli_query($connect, "UPDATE iklan SET gambar='$namaBaru', nm_perusahaan='$judul', isi_iklan='$isi', tgl_mulai='$tglmulai', tgl_selesai='$tglselesai', link='$link', status='$status' WHERE id_iklan='$id'");
            if($sql){
                echo "<script>alert('Edit Submitted');document.location='iklan.php'</script>";
            }else{
                $gambar_error = "<span style = 'color:red;'>Error When Submit! Please Try Again.</span>";
            }
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
                   <h1>Edit Iklan</h1>
                   <form action="" method="post" enctype="multipart/form-data">
                        <table>
                        <tr>
                            <td>Judul Iklan</td>
                        <td>
                            <input type="text" name="judul" placeholder="Masukkan Judul" class="input" value="<?= $b['nm_perusahaan'];?>">
                            <?= $judul_error;?>
                        </td></tr>
                        <tr>
                            <td>Tanggal Mulai</td>
                        <td>
                            <input type="date" name="mulai" placeholder="Tanggal Mulai" class="input" value="<?= $b['tgl_mulai'];?>">
                            <?= $tglmulai_error;?>
                        </td></tr>
                        <tr>
                            <td>Tanggal Selesai</td>
                        <td>
                            <input type="date" name="selesai" placeholder="Tanggal Selesai" class="input" value="<?= $b['tgl_selesai'];?>">
                            <?= $tglselesai_error;?>
                        </td></tr>
                        <tr>
                            <td>Deskripsi Iklan</td>
                        <td>
                            <textarea name="isi" rows="4" cols="40" placeholder="isi iklan"><?= $b['isi_iklan'];?></textarea>
                            <?= $isi_error;?>
                        </td></tr>
                        <tr>
                            <td>Link Iklan</td>
                        <td>
                            <input type="text" name="link" placeholder="Link Iklan" class="input" value="<?= $b['link'];?>">
                            <?= $link_error;?>
                        </td></tr>
                        <tr>
                            <td>Gambar Iklan</td>    
                        <td>
                            <input type="file" name="gambar" accept=".jpg, .png, .JPEG, .PNG">
                            <?= $gambar_error;?>
                        </td></tr>
                        <tr>
                            <td>Status Iklan</td>    
                        <td>
                            <select name="status">
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </td></tr>
                        <tr><td>&nbsp;</td><td>
                            <input type="hidden" name="gambarLama" value="<?= $b['gambar'];?>">
                            <button type="submit" name="submit">SUBMIT</a></button>
                        </td></tr>
                        </table>
                    </form>
                </div>
                <div class="konten-kanan">

                </div>
            </div>
            <?php include "../footer.php"; ?>