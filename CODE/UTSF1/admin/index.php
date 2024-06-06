<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['owner']; //login session
if(isset($sesiadmin)){
    header('location:home.php'); //redirect ke index.php
}

$user = $_POST['user'];
$pass = $_POST['pass'];

$passmd5 = md5($pass);

if(isset($_POST['submit'])){
    if($user == ""){
        $user_error = "<span style = 'color:red;'>User Wajib diisi!</span>";
    }elseif($pass == ""){
        $pass_error = "<span style = 'color:red;'>Password Wajib diisi!</span>";
    }else{
        $cekadmin = mysqli_query($connect, "SELECT * FROM admin WHERE username='$user' and
        password='$passmd5'");
        $row = mysqli_fetch_array($cekadmin);
        $idadmin = $row['id_admin']; //id admin dari table admin
        $ada = mysqli_num_rows($cekadmin);
            $ada = mysqli_num_rows($cekadmin);
            if($ada > 0){
                $_SESSION['webportal'] = $user;
                $_SESSION['owner'] = $idadmin; //session
                echo "<script>alert('Welcome to Admin!');document.location='home.php'</script>";
            }else{
                $pass_error = "<span style = 'color:red;'>User atau Password Salah!</span>";
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
                <h1>Portal Berita Mahasiswa</h1>
                <p>Berita terkini dan terupdate sekarang</p>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="../home.php" title="Home">Beranda</a></li>
                    <li><a href="../index.php" title="Home">Berita</a></li>
                    <li><a href="../contactUs.php" title="Home">Contact Us</a></li>
                    <?php
                    $sesiadmin = $_SESSION['member']; //login session
                        if(isset($sesiadmin)){
                            $anggota = mysqli_fetch_array(mysqli_query($connect, "SELECT * from anggota WHERE id_anggota='$sesiadmin'"));
                            ?>
                            <li><a href="#">Login: <?= $anggota['nama'];?></a></li>
                            <?php
                        }else{
                            ?>
                            <li><a href="../anggota/indexuser.php" title="Login Anggota">Login Anggota</a></li>
                            <?php
                        }
                        ?>
                    
                </ul>
            </div>

            <div class="konten">
                <div class="konten-kiri">
                    <form action="" method="post">
                        <table class="login">
                        <tr><th>
                                <h2>LOGIN ADMIN</h2>
                        </th></tr>
                        <tr><td>
                            <input type="text" name="user" placeholder="Masukkan User Admin" class="input" value="<?= $user;?>">
                            <?= $user_error;?>
                        </td></tr>
                        <tr><td>
                            <input type="password" name="pass" placeholder="Masukkan Password Admin" class="input">
                            <?= $pass_error;?>
                        </td></tr>
                        <tr><td>
                            <button type="submit" name="submit">LOGIN</a></button>
                        </td></tr>
                        </table>
                    </form>
                </div>
                <div class="konten-kanan">

                </div>
                <div style="clear:both;"></div>
            </div>

             <?php include "../footer.php"; ?>

<!-- username: Admin1   pass: 12345 -->
<!-- username: Admin2   pass: 54321 -->