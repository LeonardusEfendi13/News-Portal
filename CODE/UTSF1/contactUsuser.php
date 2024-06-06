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
                    <li><a href="homeuser.php" title="Home">Beranda</a></li>
                    <li><a href="indexuser.php" title="Home">Berita</a></li>
                    <li><a href="contactUsuser.php" title="Home">Contact Us</a></li>
                    <?php
                    $sesiadmin = $_SESSION['member']; //login session
                        if(isset($sesiadmin)){
                            $anggota = mysqli_fetch_array(mysqli_query($connect, "SELECT * from anggota WHERE id_anggota='$sesiadmin'"));
                            ?>
                            <li><a href="#">Login: <?= $anggota['nama'];?></a></li>
                            <img style="margin-top:0.4%;width:90px;height:40px;float:left;border-radius:50%"src="assets/images/uploaded/<?=$anggota['image_url'] ;?>">
                            <?php
                        }else{
                            ?>
                            <li><a href="anggota/index.php" title="Login Anggota">Login Anggota</a></li>
                            <?php
                        }
                        ?>
                </ul>
            </div>
            
            <div class="konten">
                <div class="konten-admin">
                    <h2>INFORMASI</h2>
                    
                        <img src="gambar/default.png" alt="Informasi" style="width:250px;height:170px;float:left;margin:10px;">
                        <h3><p>Ujian Tengah Semester Pemrograman Web</p></h3>
                        <p>
                            Anggota Kelompok:<hr>
                            - Timothy Gracie Hasudungan Wijaya (00000045042)<br>
                            - Leonardus Efendi (00000043939) <br>
                            - Louis Peter Shonata (00000042953) <br>
                            - Stiven (00000052223) <br>
                        </p>
                        
                    
                    <br>

                    
                </div>
            </div>
        

            <div class="footer">
                <p>Copyright Kelompok Pemweb - All right Reserved</p>
            </div>
            
        </div>
    </body>
</html>