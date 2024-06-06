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
                    <li><a href="admin/index.php" title="Home">Admin</a></li>
                </ul>
            </div>
            
            <div class="konten">
                <div class="konten-kiri">
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

                <div class="konten-kanan">

                </div>
            </div>
        

            <div class="footer">
                <p>Copyright Kelompok Pemweb - All right Reserved</p>
            </div>
            
        </div>
    </body>
</html>