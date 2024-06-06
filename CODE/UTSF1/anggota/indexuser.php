<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['member']; //login session
if(isset($sesiadmin)){
    header('location:../indexuser.php'); //redirect ke index.php
}

$user = $_POST['user']; //email
$pass = $_POST['pass']; //password
$inputcaptcha = $_POST['inputcaptcha']; //captcha yang diinput

$passmd5 = md5($pass);

if(isset($_POST['submit'])){
    if($user == ""){
        $user_error = "<span style = 'color:red;'>Email Wajib diisi!</span>";
    }elseif($pass == ""){
        $pass_error = "<span style = 'color:red;'>Password Wajib diisi!</span>";
    }elseif($inputcaptcha == ""){
        $inputcaptcha_error = "<span style = 'color:red;'>Captcha Wajib diisi!</span>";
    }elseif($_SESSION['code'] != $inputcaptcha){
        $inputcaptcha_wrong = "<span style = 'color:red;'>Captcha Salah!</span>";
    }else{
        $cekadmin = mysqli_query($connect, "SELECT * FROM anggota WHERE email='$user' and password='$passmd5' and status='Aktif'");
        $row = mysqli_fetch_array($cekadmin);
        $idanggota = $row['id_anggota']; //id admin dari table admin
        $ada = mysqli_num_rows($cekadmin);
            $ada = mysqli_num_rows($cekadmin);
            if($ada > 0){
                $_SESSION['webMember'] = $user;
                $_SESSION['member'] = $idanggota; //session
                echo "<script>alert('Welcome to Our Website!');document.location='../indexuser.php'</script>";
            }else{
                $pass_error = "<span style = 'color:red;'>User atau Password Salah! / Akun Anda diblokir</span>";
            }
    }
}
$length = 6;
$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$captcha = substr(str_shuffle($str_result), 0, $length);
$_SESSION["code"] = $captcha;

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
                </ul>
            </div>

            <div class="konten">
                <div class="konten-kiri">
                    <form action="" method="post" id="captch_code">
                        <table class="login">
                        <tr><th>
                                <h2>LOGIN ANGGOTA</h2>
                        </th></tr>
                        <tr><td>
                            <input type="text" name="user" placeholder="Masukkan Email Anggota" class="input" value="<?= $user;?>">
                            <?= $user_error;?>
                        </td></tr>
                        <tr><td>
                            <input type="password" name="pass" placeholder="Masukkan Password Anggota" class="input">
                            <?= $pass_error;?>
                        </td></tr>
                        <tr><td>
                            <div class="captcha">
                                <?php echo $captcha ?>
                            </div>
                            <input type="text" name="inputcaptcha" id="inputcaptcha" placeholder="Masukkan captcha" class="input">
                            <?= $inputcaptcha_error ;?>
                            <?= $inputcaptcha_wrong ; ?>
                        </td></tr>
                        <tr><td>
                            <button type="submit" name="submit">LOGIN</a></button>
                        </td></tr>
                        <tr><td>
                            <a href="../daftarAnggota.php" title="Pendaftaran Anggota">Klik untuk Daftar Anggota</a>
                        </td></tr>
                        </table>
                    </form>
                </div>
                <div class="konten-kanan">

                </div>
            </div>

             <?php include "../footer.php"; ?>