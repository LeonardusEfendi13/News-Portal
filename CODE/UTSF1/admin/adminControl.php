<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner']; //login session
if(!isset($sesiadmin)){
    header('location:index.php'); //redirect ke index.php
}
$admin = mysqli_fetch_array(mysqli_query($connect, "SELECT * from admin WHERE id_admin='$sesiadmin'"));

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
                   <h1>Admin Control</h1>
                   <button style="background-color:darkturquoise;"><a href="inputAdmin.php" title="Tambah Admin">Tambah Admin</a></button>
                   <!-- view berita -->
                   <table border="1" width="100%" >
                       <thead>
                           <tr>
                               <th>Nama</th>
                               <th>Username</th>
                           </tr>
                       </thead>
                       <tbody>
                       <?php
                           $sql = mysqli_query($connect, "SELECT * FROM admin");
                           while($row=mysqli_fetch_array($sql)){
                               ?>
                           <tr>
                               <td><?= $row['nama_lengkap'];?></td>
                               <td><?= $row['username'];?></td>
                           </tr>
                           <?php } ?>
                       </tbody>
                   </table>
                </div>

                <div class="konten-kanan feedberita" >
                    <?php
                    $sesiadmin = $_SESSION['owner']; //login session
                    if(isset($sesiadmin)){
                        $anggota = mysqli_fetch_array(mysqli_query($connect, "SELECT * from admin WHERE id_admin='$sesiadmin'"));
                        ?>
                        <h3>Menu Anggota</h3>
                        <ul>
                        <li><a href="ubahBiodataAdmin.php">Ubah Biodata & Password</a></li>
                        </ul>
                    <?php
                    }
                    ?>
                </div>

                <div style="clear:both;"></div>
            </div>
            <?php include "../footer.php"; ?>