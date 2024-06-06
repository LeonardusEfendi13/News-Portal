<?php 
error_reporting(0);
session_start();
include "../koneksi.php";
include "../fungsi/function.php";

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
                <div class="konten-admin">
                   <h1>DAFTAR ANGGOTA</h1> 
                   <!-- view berita -->
                   <table border="1" width="100%" >
                       <thead>
                           <tr>
                               <th>Nama</th>
                               <th>Email</th>
                               <th>Tanggal Lahir</th>
                               <th>Jenis Kelamin</th>
                               <th>Status</th>
                               <th>Foto Profil</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php
                           $sql = mysqli_query($connect, "SELECT * FROM anggota");
                           while($row=mysqli_fetch_array($sql)){
                               ?>
                           <tr>
                               <td><?= $row['nama'];?></td>
                               <td><?= $row['email'];?></td>
                               <td><?= format_tgl1($row['tgl_lahir']);?></td>
                               <td><?= $row['gender'];?></td>
                               <td><?= $row['status'];?></td>
                               <td style="width:20%;"><img style="width:90px;height:40px;border-radius:50%;float:center;"src="../assets/images/uploaded/<?=$row['image_url']?>"></td>
                               <?php
                               if($row['status'] == 'Aktif'){
                                   ?>
                                    <td style="text-align:center">
                                        <button style="background-color:yellow;"><a href="blokirAnggota.php?id=<?= $row['id_anggota'];?>" title="Block">Block</a></button> 
                                        <button style="background-color:lightpink;" name="delete_image"><a href="hapusAnggota.php?id=<?= $row['image_url'];?>" title="Hapus">Hapus</a></button>
                                    </td>
                                    <?php
                               }else{
                                   ?>
                                    <td style="text-align:center">
                                        <button style="background-color:yellow;"><a href="bukaBlokirAnggota.php?id=<?= $row['id_anggota'];?>" title="Unblock">Unblock</a></button> 
                                        <button style="background-color:lightpink;" name="delete_image"><a href="hapusAnggota.php?id=<?= $row['image_url'];?>" title="Hapus">Hapus</a></button>
                                    </td>
                                   <?php
                               }
                               ?>
                           </tr>
                           <?php } ?>
                       </tbody>
                   </table>
                </div>
            </div>
            <?php include "../footer.php"; ?>