<?php
require("db/db.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
mysqli_query($con,"DELETE FROM comments WHERE id='$id'");
header("location: komentar.php");
}
mysqli_close($con);
?>