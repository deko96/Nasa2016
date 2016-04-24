<?php
if(!defined("BASEPATH")) {
	die("Direct Access is not allowed.");
}
if(!isset($_SESSION['login'])) {
	header("Location: index.php");
	die();
}
unset($_SESSION['email']);
unset($_SESSION['id']);
session_destroy();
header("Location: index.php");
die();
?>