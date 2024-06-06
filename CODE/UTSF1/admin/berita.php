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
                   <h1>BERITA</h1>
                   <button style="background-color:darkturquoise;"><a href="inputBerita.php" title="Tambah Berita">Tambah Berita</a></button>
                   <!-- view berita -->
                   <table border="1" width="100%" >
                       <thead>
                           <tr>
                               <th>Judul</th>
                               <th>Kategori</th>
                               <th>Deskripsi</th>
                               <th>Penulis</th>
                               <th>Tgl Posting</th>
                               <th>Gambar</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php
                           $sql = mysqli_query($connect, "SELECT * FROM berita, kategori, admin WHERE berita.id_kategori = kategori.id_kategori AND berita.id_admin = admin.id_admin");
                           while($row=mysqli_fetch_array($sql)){
                               ?>
                           <tr>
                               <td><?= $row['judul'];?></td>
                               <td><?= $row['kategori'];?></td>
                               <td><?= $row['text_berita'];?></td>
                               <td><?= $row['username'];?></td>
                               <td><?= $row['tgl_posting'];?></td>
                               <td><img src="../assets/images/berita/<?=$row['gambar'];?>" style="width:150px;height:100px;"></td>
                               <td>
                                    <button style="background-color:yellow;"><a href="editBerita.php?id=<?= $row['id_berita'];?>" title="Edit">Edit</a></button>
                                    <button style="background-color:lightpink;"><a href="hapusBerita.php?id=<?= $row['id_berita'];?>" title="Hapus">Hapus</a></button>
                                </td>
                           </tr>
                           <?php } ?>
                       </tbody>
                   </table>
                </div>
            </div>
            <?php include "../footer.php"; ?>