<?php
error_reporting(0);
session_start();
include "../koneksi.php";

$id = mysqli_real_escape_string($connect, $_GET['id']);
$cekNama = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM iklan WHERE id_iklan='$id'"));
$namaGambar = $cekNama['gambar'];

unlink('../assets/images/iklan/' . $namaGambar);
$sql = mysqli_query($connect, "DELETE FROM iklan WHERE id_iklan='$id'"); //delete from table
if($sql){
    echo "<script>alert('Deleted Success');document.location='iklan.php'</script>";
}else{
    echo "<script>alert('Deleted Failed');document.location='iklan.php'</script>";
}

?>