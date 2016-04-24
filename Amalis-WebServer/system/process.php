<?php
define("BASEPATH", TRUE);
require('config.php');

if(isset($_POST['login'])) {
	$email = $mysql->EscapeString($_POST['email']);
	$password = $mysql->EscapeString($_POST['password']);
	$mdpass = MD5($password);
	$email = strtolower($email);

	$data = $mysql->QueryFetchArray("SELECT * FROM `staff` WHERE `email` = '{$email}' AND `password` = '{$mdpass}' LIMIT 1");
	
	if(!$data) {
		$_SESSION['error'] = "Invalid Email/Password combination!";
		header("Location: ../index.php");
		die();
	} else {
		$_SESSION['login'] = $data['id'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['password'] = $data['password'];
		header("Location: ../index.php?page=dashboard");
		die();
	}
} else if(isset($_POST['add_gallery'])) {
	$title = $mysql->EscapeString($_POST['title']);
	$url = $mysql->EscapeString($_POST['url']);

	if(empty($title)) {
		$_SESSION['error'] = 'Please insert the image title!';
		header("Location: ../index.php");
		die();
	}
	if(empty($url)) {
		$_SESSION['error'] = 'Please insert an URL for the image!';
		header("Location: ../index.php");
		die();
	}
	if(!filter_var($url, FILTER_VALIDATE_URL)) {
		$_SESSION['error'] = 'Please insert an valid URL!';
		header("Location: ../index.php");
		die();
	}
	$query = $mysql->Query("INSERT INTO `gallery` (`title`, `image`) VALUES ('{$title}', '{$url}')", false, true);
	if($query) {
		$_SESSION['success'] = 'Image successfully added to gallery!';
	} else {
		$_SESSION['error'] = 'Something went wrong.. Please try again!';
	}
	header("Location: ../index.php");
	die();
} else if(isset($_POST['edit_gallery'])) {
	$id = $mysql->EscapeString($_POST['imageID']);
	$title = $mysql->EscapeString($_POST['title']);
	$url = $mysql->EscapeString($_POST['url']);
	if(empty($id)) {
	    $_SESSION['error'] = 'Content no longer exists.';
	    header("Location: ../index.php?page=gallery");
	    die();
	  }
	  if(!is_numeric($id)) {
	    $_SESSION['error'] = 'Please provide a valid ID Number!';
	    header("Location: ../index.php?page=gallery");
	    die();
	  }
	  $check = $mysql->QueryGetNumRows("SELECT `id` FROM `gallery` WHERE `id` = '{$id}'");
	  if($check <= 0) {
	    $_SESSION['error'] = 'Content no longer exists.';
	    header("Location: ../index.php?page=gallery");
	    die();
	  }
	  $query = $mysql->Query("UPDATE `gallery` SET `title` = '{$title}', `image` = '{$url}' WHERE `id` = '{$id}'");
	  if($query) {
	  	$_SESSION['success'] = 'Image successfully updated!';
	  } else {
	  	$_SESSION['error'] = 'Failed to update image. Please try again!';
	  }
	  header("Location: ../index.php?page=gallery");
	  die();
} else if(isset($_POST['add_mission'])) {
	$title = $mysql->EscapeString($_POST['title']);
	$text = $mysql->EscapeString($_POST['description']);

	if(empty($title)) {
		$_SESSION['error'] = 'Please fill the Title field!';
		header("Location: ../index.php?page=missions&add");
		die();
	}
	if(empty($text) || strlen($text) < 100) {
		$_SESSION['error'] = 'Text must be greater than 100 characters!';
		header("Location: ../index.php?page=missions&add");
		die();
	}

	$query = $mysql->Query("INSERT INTO `missions` (`title`, `text`) VALUES ('{$title}', '{$text}')");
	if($query) {
		$_SESSION['success'] = 'Content successfully inserted into MySQL!';
	} else {
		$_SESSION['error'] = 'Failed to add content into MySQL!';
	}
	header("Location: ../index.php?page=missions");
	die();

} else {
	header("Location: ../index.php");
	die();
}
?>