<?php
if(!defined("BASEPATH")) {
	die("Direct Access is not allowed.");
}
$request = (isset($_GET['request'])) ? $_GET['request'] : 'default';

if($request == 'getGallery') {
	$check = $mysql->QueryGetNumRows("SELECT * FROM `gallery` ORDER BY id DESC");
	if($check > 0) {
		$data = $mysql->QueryFetchArrayAll("SELECT * FROM `gallery` ORDER BY id DESC");
		echo generateJson($data);
		exit;
	} else {
		echo '0';
		exit;
	}
} else if($request == 'getStories') {
	$check = $mysql->QueryGetNumRows("SELECT * FROM `stories` ORDER BY id DESC");
	if($check > 0) {
		$data = $mysql->QueryFetchArrayAll("SELECT * FROM `stories` ORDER BY id DESC");
		echo generateJson($data);
		exit;
	} else {
		echo '0';
		exit;
	}
} else if($request == 'getMissions') {
	$check = $mysql->QueryGetNumRows("SELECT * FROM `missions` ORDER BY id DESC");
	if($check > 0) {
		$data = $mysql->QueryFetchArrayAll("SELECT * FROM `missions` ORDER BY id DESC");
		echo generateJson($data);
		exit;
	} else {
		echo '0';
		exit;
	}
} else {
	die("Invalid function selected.");
}
?>