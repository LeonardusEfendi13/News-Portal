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
                <div class="konten-admin">
                   <h1>KATEGORI</h1>
                   <button style="background-color:darkturquoise;"><a href="inputKategori.php" title="Tambah Kategori">Tambah Kategori</a></button>
                   <!-- view berita -->
                   <table border="1" width="100%" >
                       <thead>
                           <tr>
                               <th>ID</th>
                               <th>Kategori</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php
                           $sql = mysqli_query($connect, "SELECT * FROM kategori");
                           while($row=mysqli_fetch_array($sql)){
                               ?>
                           <tr>
                               <td><?= $row['id_kategori'];?></td>
                               <td><?= $row['kategori'];?></td>
                               <td>
                               <button style="background-color:yellow;"><a href="editKategori.php?id=<?= $row['id_kategori'];?>" title="Edit">Edit</a></button>
                               <button style="background-color:lightpink;"><a href="hapusKategori.php?id=<?= $row['id_kategori'];?>" title="Hapus">Hapus</a></button>
                                </td>
                           </tr>
                           <?php } ?>
                       </tbody>
                   </table>
                </div>
            </div>
            <?php include "../footer.php"; ?>