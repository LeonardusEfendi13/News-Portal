<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner']; //login session
if(!isset($sesiadmin)){
    header('location:../admin/adminControl.php'); //redirect ke index.php
}
$admin = mysqli_fetch_array(mysqli_query($connect, "SELECT * from admin WHERE id_admin='$sesiadmin'"));


$user = mysqli_real_escape_string($connect, $_POST['username']); 
$pass = mysqli_real_escape_string($connect, $_POST['pass']);
$nama = mysqli_real_escape_string($connect, $_POST['nama_lengkap']);

$passmd5 = md5($pass);

if(isset($_POST['submit'])){
    if($nama == ""){
        $nama_error = "<span style = 'color:red;'>Nama Wajib diisi!</span>";
    }elseif($user == ""){
        $user_error = "<span style = 'color:red;'>Username Wajib diisi!</span>";
    }else{
        if(empty($pass)){
            $sql = mysqli_query($connect, "UPDATE admin SET nama_lengkap='$nama', username='$user' WHERE id_admin='$sesiadmin'");
            if($sql){
                echo "<script>alert('Update Success');document.location='ubahBiodataAdmin.php'</script>";
                }else{
                echo "<script>alert('Failed, Something's Wrong!');document.location='ubahBiodataAdmin.php'</script>";
            }
        }else{
            $sql = mysqli_query($connect, "UPDATE admin SET nama_lengkap='$nama', password='$passmd5' WHERE id_admin='$sesiadmin'");
            if($sql){
                echo "<script>alert('Update Success');document.location='ubahBiodataAdmin.php'</script>";
                }else{
                echo "<script>alert('Failed, Something's Wrong!');document.location='ubahBiodataAdmin.php'</script>";
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
                    <form action="" method="post">
                        <table class="login">
                        <tr><th>
                                <h2>BIODATA ADMIN</h2>
                        </th></tr>
                        <tr><td>
                            <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="input" value="<?= $admin['nama_lengkap'];?>" maxlength="60">
                            <?= $nama_error;?>
                        </td></tr>
                        <tr><td>
                            <input type="text" name="username" placeholder="Masukkan Username" class="input" value="<?= $admin['username'];?>" maxlength="60">
                            <?= $user_error;?>
                        </td></tr>
                        <tr><td>
                            <input type="password" name="pass" placeholder="Masukkan Password" class="input" maxlength="15">
                            <?= $pass_error;?>
                        </td></tr>
                        <tr><td>
                            <button type="submit" name="submit">UPDATE</a></button>
                        </td></tr>
                        
                        </table>
                    </form>
                </div>
                <div class="konten-kanan" >
                    <h3><center>Dimohon untuk mengisinya dengan benar</center></h3><hr>
                    <h3><center><i>Note: Password tidak wajib diisi.</i></center></h3>
                </div>
                <div style="clear:both;"></div>
            
            </div>
            <?php include "footer.php"; ?>