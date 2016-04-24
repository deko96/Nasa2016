<?php
if(!defined("CONFIG")) {
	die("Direct access is not allowed!");
}
function truncate($text, $chars) {
	if(strlen($text) > $chars)
		return substr($text, 0, $chars);
	return $text;
}
function generateJson($arr) {
	$json = array();	
	for($i = 0; $i < count($arr); $i++) {
		$json[$i] = $arr[$i];
	}
	return json_encode($json);
}
?>