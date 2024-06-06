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
                   <h1>IKLAN</h1>
                   <button style="background-color:darkturquoise;"><a href="inputIklan.php" title="Tambah Iklan">Tambah Iklan</a></button>
                   <!-- view berita -->
                   <table border="1" width="100%" >
                       <thead>
                           <tr>
                               <th>Nama Perusahaan</th>
                               <th>Tanggal Iklan</th>
                               <th>Deskripsi</th>
                               <th>Link</th>
                               <th>Status</th>
                               <th>Gambar</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php
                           $sql = mysqli_query($connect, "SELECT * FROM iklan, admin WHERE iklan.id_admin=admin.id_admin");
                           while($row=mysqli_fetch_array($sql)){
                               ?>
                           <tr>
                               <td><?= $row['nm_perusahaan'];?></td>
                               <td><?= format_tgl1($row['tgl_mulai']);?> - <?= format_tgl1($row['tgl_selesai']);?></td>
                               <td><?= $row['isi_iklan'];?></td>
                               <td><?= $row['link'];?></td>
                               <td><?= $row['status'];?></td>
                               <td><img src="../assets/images/iklan/<?=$row['gambar'];?>" style="width:150px;height:100px;"></td>
                               <td>
                                    <button style="background-color:yellow;"><a href="editIklan.php?id=<?= $row['id_iklan'];?>" title="Edit">Edit</a></button>
                                    <button style="background-color:lightpink;"><a href="hapusIklan.php?id=<?= $row['id_iklan'];?>" title="Hapus">Hapus</a></button>
                                </td>
                           </tr>
                           <?php } ?>
                       </tbody>
                   </table>
                </div>
            </div>
            <?php include "../footer.php"; ?>