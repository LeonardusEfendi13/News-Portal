<?php
error_reporting(0);
session_start();

unset($_SESSION['member']);
unset($_SESSION['webMember']);

session_destroy();

header('location:../index.php'); //redirect ke halaman login
?>