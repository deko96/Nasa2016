<?php
define("BASEPATH", TRUE);
require('system/config.php');

if($logged_in) {
	$default = "dashboard";
} else {
	$default = "login";
}
$page = (isset($_GET['page'])) ? $mysql->EscapeString($_GET['page']) : $default;

if($page !== "api") {
	include 'system/includes/header.php';
	if(file_exists('system/pages/'. $page .'.php')) {
		include 'system/pages/'. $page . '.php';
	} else {
		include 'system/pages/404.php';
	}
	if($logged_in)
		include 'system/includes/modals.php';
	include 'system/includes/footer.php';
} else {
	include 'system/pages/api.php';
}
?>