<?php
error_reporting(0);
session_start();
include "../koneksi.php";

$id = mysqli_real_escape_string($connect, $_GET['id']);
$cekid = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM kategori WHERE id_kategori='$id'"));

$sql = mysqli_query($connect, "DELETE FROM kategori WHERE id_kategori='$id'"); //delete from table
if($sql){
    echo "<script>alert('Deleted Success');document.location='kategori.php'</script>";
}else{
    echo "<script>alert('Deleted Failed');document.location='kategori.php'</script>";
}

?>