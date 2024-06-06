<?php
error_reporting(0);
session_start();
include "../koneksi.php";

$id = mysqli_real_escape_string($connect, $_GET['id']);
$sql = mysqli_query($connect, "DELETE FROM anggota WHERE image_url='$id'"); //delete from table
if($sql){
    unlink("../assets/images/uploaded/" .$id);
    echo "<script>alert('Deleted Success');document.location='anggota.php'</script>";
}else{
    echo "<script>alert('Deleted Failed');document.location='anggota.php'</script>";
}
