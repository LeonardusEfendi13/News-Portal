<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner']; //login session
if(!isset($sesiadmin)){
    header('location:index.php'); //redirect ke index.php
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
    }elseif($pass == ""){
        $pass_error = "<span style = 'color:red;'>Password Wajib diisi!</span>";
    }else{
        $cekemail = mysqli_query($connect, "SELECT * FROM admin WHERE username='$user'");
        $ada = mysqli_num_rows($cekemail);
            if($ada > 0){
                $user_error = "<span style = 'color:red;'>Username Sudah Terdaftar!</span>";
            }else{
                $sql = mysqli_query($connect, "INSERT INTO admin(username, password, nama_lengkap)
                VALUES ('$user', '$passmd5', '$nama')");
                if($sql){
                echo "<script>alert('Congratulations! You Become New Admin, Please use this account very wisely!!');document.location='index.php'</script>";
                }else{
                echo "<script>alert('Failed, Something's Wrong!');document.location='inputAdmin.php'</script>";
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
                                <h2>NEW ADMIN</h2>
                        </th></tr>
                        <tr><td>
                            <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="input" value="<?= $nama;?>" maxlength="60">
                            <?= $nama_error;?>
                        </td></tr>
                        <tr><td>
                            <input type="text" name="username" placeholder="Masukkan Username" class="input" value="<?= $user;?>" maxlength="60">
                            <?= $user_error;?>
                        </td></tr>
                        <tr><td>
                            <input type="password" name="pass" placeholder="Masukkan Password Anggota" class="input" maxlength="15">
                            <?= $pass_error;?>
                        </td></tr>
                        <tr><td>
                            <button type="submit" name="submit">Add</a></button>
                        </td></tr>
                        </table>
                    </form>
                </div>
                <div class="konten-kanan">

                </div>
            </div>
            <?php include "../footer.php"; ?>