<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$sesiadmin = $_SESSION['member']; //login session
if(!isset($sesiadmin)){
    header('location:index.php'); //redirect ke index.php
}
$anggota = mysqli_fetch_array(mysqli_query($connect, "SELECT * from anggota WHERE id_anggota='$sesiadmin'"));


$user = mysqli_real_escape_string($connect, $_POST['user']); //email
$pass = mysqli_real_escape_string($connect, $_POST['pass']); //password
$nama = mysqli_real_escape_string($connect, $_POST['nama']);
$gambarLama = mysqli_real_escape_string($connect, $_POST['gambarLama']);

$tmp_name = $_FILES['my_image']['tmp_name'];
$img_name = $_FILES['my_image']['name'];

$ext = strtolower(end(explode(".", $img_name)));
$namaBaru = $nama .'.'. $ext;

$passmd5 = md5($pass);

if(isset($_POST['submit'])){
    if($nama == ""){
        $nama_error = "<span style = 'color:red;'>Nama Wajib diisi!</span>";
    }elseif($user == ""){
        $user_error = "<span style = 'color:red;'>Email Wajib diisi!</span>";
    }else{
        if(empty($tmp_name)){ //kalau foto tidak diedit
            $sql = mysqli_query($connect, "UPDATE anggota SET nama='$nama', password='$passmd5' WHERE id_anggota='$sesiadmin'");
            if($sql){
                echo "<script>alert('Edit Submitted');document.location='ubahBiodata.php'</script>";
            }else{
                $gambar_error = "<span style = 'color:red;'>Error When Submit! Please Try Again.</span>";
            }
        }else{
            unlink('../assets/images/uploaded/' . $gambarLama);
            //save gambar di folder
            move_uploaded_file($foto, '../assets/images/uploaded/' . $namaBaru);
            //simpan data di database
            $sql = mysqli_query($connect, "UPDATE anggota SET nama='$nama', password='$passmd5', gambar='$namaBaru' WHERE id_anggota='$sesiadmin'");
            if($sql){
                echo "<script>alert('Edit Submitted');document.location='ubahBiodata.php'</script>";
            }else{
                $gambar_error = "<span style = 'color:red;'>Error When Submit! Please Try Again.</span>";
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

        <link rel="stylesheet" href="../style.css" type="text/css">

    </head>
    <body>
        <div id="container">
        <?php include "../header.php"; ?>

            <div class="konten">
                <div class="konten-kiri">
                    <form action="" method="post">
                        <table class="login">
                        <tr><th>
                                <h2>BIODATA ANGGOTA</h2>
                        </th></tr>
                        <tr><td>
                            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" class="input" value="<?= $anggota['nama'];?>" maxlength="60">
                            <?= $nama_error;?>
                        </td></tr>
                        <tr><td>
                            <input type="text" name="user" placeholder="Masukkan Email" class="input" value="<?= $anggota['email'];?>" maxlength="60" readonly="readonly">
                            <?= $user_error;?>
                        </td></tr>
                        <tr><td>
                            <input type="password" name="pass" placeholder="Masukkan Password Anggota" class="input" maxlength="15">
                            <?= $pass_error;?>
                        </td></tr>
                        <tr><td>
                            Profile Picture: <br>
                            <input type="file" name="my_image" accept=".jpg, .png, .JPEG, .PNG">
                            <?= $gambar_error;?>
                        </td></tr>
                        <tr><td>
                            <button type="submit" name="submit">UPDATE</a></button>
                        </td></tr>
                        
                        </table>
                    </form>
                </div>
                <div class="konten-kanan" >

                    <?php
                    $sesiadmin = $_SESSION['member']; //login session
                    if(isset($sesiadmin)){
                        $anggota = mysqli_fetch_array(mysqli_query($connect, "SELECT * from anggota WHERE id_anggota='$sesiadmin'"));
                        ?>
                        <h3>Menu Anggota</h3>
                        <ul>
                        <li><a href="logout.php">Logout</a></li>
                        </ul>
                    <?php
                    }
                    ?>

                </div>
                <div style="clear:both;"></div>
            
            </div>
            <?php include "footer.php"; ?>