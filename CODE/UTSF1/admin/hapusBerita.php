<?php
error_reporting(0);
session_start();
include "../koneksi.php";

$id = mysqli_real_escape_string($connect, $_GET['id']);
$cekNama = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM berita WHERE id_berita='$id'"));
$namaGambar = $cekNama['gambar'];

unlink('../assets/images/berita/' . $namaGambar);
$sql = mysqli_query($connect, "DELETE FROM berita WHERE id_berita='$id'"); //delete from table
if($sql){
    echo "<script>alert('Deleted Success');document.location='berita.php'</script>";
}else{
    echo "<script>alert('Deleted Failed');document.location='berita.php'</script>";
}

?>