<?php
if(!defined("BASEPATH")) {
	die("Direct Access is not allowed.");
}
define("CONFIG", TRUE);

// Database Configuration
$db['host'] = 'localhost';
$db['user'] = 'nasa';
$db['pass'] = 'vr4rWQ4V2upvx9tN';
$db['name'] = 'nasa';

// Site Configuration
$config['title'] = 'Amaris';

// Including the Adittional libraries
require('libs/MySQLi.php');
require('libs/functions.php');

// Configuring the Server
error_reporting(-1);
ini_set('display_errors', 1);
date_default_timezone_get('Europe/Skopje');
session_start();
ob_start();

$mysql = new MySQLConnection($db['host'], $db['user'], $db['pass'], $db['name']);
$mysql->Connect();

$user = array();

if(isset($_SESSION['login'])) {
	$id = $_SESSION['login'];
	$sql = "SELECT * FROM `staff` WHERE `id` = '{$id}' AND `status` = '1'";
	$data = $mysql->QueryFetchArray($sql);
	$valid = true;
	if($data['email'] != $_SESSION['email'])
		$valid = false;
	if($data['password'] != $_SESSION['password'])
		$valid = false;
	if($data['id'] != $_SESSION['login'])
		$valid = false;
	if(!$valid) {
		$_SESSION['message'] = "Please log in again!";
		header("Location: index.php?page=logout");
		die();
	}
	$logged_in = TRUE;
	array_push($user, $data);
} else {
	$logged_in = FALSE;
}

?>