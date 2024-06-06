<?php 
error_reporting(0);
session_start();

include "koneksi.php";?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portal Berita Mahasiswa</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css" type="text/css">

    </head>
    <body>
        <div id="container">
        <div class="header">
                <h1>Portal Berita Mahasiswa</h1>
                <p>Berita terkini dan terupdate sekarang</p>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="home.php" title="Home">Beranda</a></li>
                    <li><a href="index.php" title="Home">Berita</a></li>
                    <li><a href="contactUs.php" title="Home">Contact Us</a></li>
                    <?php
                    $sesiadmin = $_SESSION['member']; //login session
                        if(isset($sesiadmin)){
                            $anggota = mysqli_fetch_array(mysqli_query($connect, "SELECT * from anggota WHERE id_anggota='$sesiadmin'"));
                            ?>
                            <li><a href="#">Login: <?= $anggota['nama'];?></a></li>
                            <?php
                        }else{
                            ?>
                            <li><a href="anggota/indexuser.php" title="Login Anggota">Login Anggota</a></li>
                            <?php
                        }
                        ?>
                    
                </ul>
            </div>
            
            <div class="konten">
                <div class="konten-kiri">
                    <h2>BERITA TERKINI</h2>
                    <?php
                    $data = mysqli_query($connect, "SELECT * FROM berita, admin WHERE berita.id_admin=admin.id_admin ORDER BY id_berita DESC");
                    while($row = mysqli_fetch_array($data)){
                        ?>
                    <div class="feedberita">
                        <img src="assets/images/berita/<?= $row['gambar'];?>" alt="<?= $row['judul'];?>" style="width:150px;height:150px;float:left;margin:10px;">
                        <a href=""><h3><?= $row['judul'];?></h3></a>
                        <hr>
                        <p><?= $row['text_berita'];?></p>
                        <p>Diposting oleh: <?= $row['nama_lengkap'];?>, Tanggal: <?=$row['tgl_posting'];?></p>
                        <a href="anggota/indexuser.php">Mohon Login Untuk Memberi Komentar</a>
                    </div>
                    <br>
                    <?php } ?>

                </div>
                <div class="konten-kanan" >

                    <?php
                    $sesiadmin = $_SESSION['member']; //login session
                    if(isset($sesiadmin)){
                        $anggota = mysqli_fetch_array(mysqli_query($connect, "SELECT * from anggota WHERE id_anggota='$sesiadmin'"));
                        ?>
                        <h3>Menu Anggota</h3>
                        <ul>
                        <li><a href="anggota/ubahBiodata.php">Ubah Biodata & Password</a></li>
                        <li><a href="anggota/logout.php">Logout</a></li>
                        </ul>
                    <?php
                    }
                    ?>

                    <h3>Advertisement</h3>
                    <hr>
                    <?php
                    $data = mysqli_query($connect, "SELECT * FROM iklan, admin WHERE iklan.id_admin=admin.id_admin AND status='Aktif' ORDER BY id_iklan DESC");
                    while($row = mysqli_fetch_array($data)){
                        ?>
                    
                        <img src="assets/images/iklan/<?= $row['gambar'];?>" alt="<?= $row['nm_perusahaan'];?>" style="width:90%;height:200px;">
                        <a href="<?= $row['link'];?>"><h3><?= $row['nm_perusahaan'];?></h3></a>
                        <p><?= $row['isi_iklan'];?></p>
                        <hr>
                    
                    
                    <?php } ?>

                </div>
            </div>

            <?php include "footer.php"; ?>