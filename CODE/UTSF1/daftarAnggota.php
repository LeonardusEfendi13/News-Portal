<?php
error_reporting(0);
session_start();
include "koneksi.php";

$sesiadmin = $_SESSION['member']; //login session
if (isset($sesiadmin)) {
    header('location:home.php'); //redirect ke index.php
}

$user = mysqli_real_escape_string($connect, $_POST['user']); //email
$pass = mysqli_real_escape_string($connect, $_POST['pass']); //password
$nama = mysqli_real_escape_string($connect, $_POST['nama']);
$tanggal = mysqli_real_escape_string($connect, $_POST['tanggal']); // tanggal lahir
$gender = mysqli_real_escape_string($connect, $_POST['gender']); //jenis kelamin

$passmd5 = md5($pass);

if (isset($_GET['error'])) :
    echo $_GET['error'];
endif;

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
    if ($nama == "") {
        $nama_error = "<span style = 'color:red;'>Nama Lengkap Wajib diisi!</span>";
    } elseif ($user == "") {
        $user_error = "<span style = 'color:red;'>Email Wajib diisi!</span>";
    } elseif ($pass == "") {
        $pass_error = "<span style = 'color:red;'>Password Wajib diisi!</span>";
    } elseif ($tanggal == "") {
        $tanggal_error = "<span style = 'color:red;'>Tanggal Lahir Wajib diisi!</span>";
    } else {
        $cekemail = mysqli_query($connect, "SELECT * FROM anggota WHERE email='$user'");
        $ada = mysqli_num_rows($cekemail);
        if ($ada > 0) {
            $user_error = "<span style = 'color:red;'>Email Sudah Terdaftar!</span>";
        } else {
            $img_name = $_FILES['my_image']['name'];
            $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $error = $_FILES['my_image']['error'];
            if ($error === 0) {
                if ($img_size > 10000000) {
                    $em = "<span style = 'color:red;'>Sorry, Your file is too large.</span>";
                    // header("Location: index.php?error=$em");
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        //insert into folder

                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_upload_path = 'assets/images/uploaded/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        //insert into database

                        $sql = mysqli_query($connect, "INSERT INTO anggota(nama, email, password, tgl_lahir, status, image_url, gender)
                            VALUES ('$nama', '$user', '$passmd5', '$tanggal', 'Aktif', '$new_img_name', '$gender')");
                        if ($sql) {
                            echo "<script>alert('Congratulations! You Become Our Member, Please Login.');document.location='index.php'</script>";
                        } else {
                            echo "<script>alert('Failed, Something's Wrong!');document.location='index.php'</script>";
                        }
                    } else {
                        $em = "<span style = 'color:red;'> You can't upload the file of this type</span>";
                    }
                }
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

    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

</head>

<body>
    <div id="container">
        <?php include "header.php"; ?>

        <div class="konten">
            <div class="konten-kiri">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="login">
                        <tr>
                            <th>
                                <h2>DAFTAR ANGGOTA</h2>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" class="input" value="<?= $nama; ?>" maxlength="60">
                                <?= $nama_error; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="user" placeholder="Masukkan Email" class="input" maxlength="60">
                                <?= $user_error; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="pass" placeholder="Masukkan Password Anggota" class="input" maxlength="15">
                                <?= $pass_error; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="date" name="tanggal" class="input" value="<?= $tanggal; ?>">
                                <?= $tanggal_error; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="gender" id="gender">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                                <?= $gender_error; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="profile_pictre" class="input" value="Profile Picture (.jpg , jpeg, .png) MAX. 10MB " maxlength="60" disabled>
                                <input type="file" name="my_image" class="input">
                                <?= $em; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="submit">Daftar</a></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="anggota/indexuser.php" title="Login">Klik untuk Login Anggota</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="konten-kanan">

            </div>
        </div>

        <?php include "footer.php"; ?>

        <!-- email: faye.bosconovitch@gmail.com   pass: qwerty -->
        <!-- email: mikutella@gmail.com   pass: abcde -->