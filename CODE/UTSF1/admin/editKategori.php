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
$b = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM kategori WHERE id_kategori='$id'"));

$kategori = mysqli_real_escape_string($connect, $_POST['kategori']);
$idkategori = mysqli_real_escape_string($connect, $_POST['id_kategori']);

if(isset($_POST['submit'])){
    if($kategori == ""){
        $kategori_error = "<span style = 'color:red;'>Kategori Tidak Boleh Kosong!</span>";
    }else{
        $sql = mysqli_query($connect, "UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id'");
        if($sql){
            echo "<script>alert('Edit Submitted');document.location='kategori.php'</script>";
        }else{
            "<span style = 'color:red;'>Error When Submit! Please Try Again.</span>";
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
                   <h1>Update Berita</h1>
                   <form action="" method="post" enctype="multipart/form-data">
                        <table>
                        <tr>
                            <td>Kategori Berita</td>
                        <td>
                            <input type="text" name="kategori" placeholder="Masukkan Kategori" class="input" value="<?= $kategori;?>">
                            <?= $kategori_error;?>
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