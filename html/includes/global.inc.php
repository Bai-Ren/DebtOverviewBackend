<?php
require_once 'classes/User.class.php';
require_once 'classes/DB.class.php';
require_once 'classes/UserTools.class.php';
require_once 'general.inc.php';

$db = new DB();
$db->connect();

$userTools = new UserTools();

session_start();

function insertHeader () {
	$pages = array (
		"Index" => "index.php",
		"Register" => "register.php",
		"Delete All" => "delete.php",
		"Users" => "users.php",
		"Info" => "info.php"
	);

	echo '<a href="index.php"> Index </a> | ';
	if (isset($_SESSION['logged_in'])) {
		echo '<a href="users.php"> Users </a> | ';
		echo '<a href="delete.php"> Delete All </a> | ';		
		echo '<a href="logout.php"> Logout </a> | ';
	} else {
		echo '<a href="register.php"> Register </a> | ';
		echo '<a href="login.php"> Login </a> | ';
	}
	echo '<a href="info.php"> Info </a>';

	return true;
}

function redirect($url) {
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}

function reqNotLoggedIn () {
	if (isset($_SESSION['logged_in'])) {
		redirect("index.php");
		echo '<a href="index.php"> You are already logged in</a>';
		exit();
	}
}

function reqLoggedIn () {
	if (!isset($_SESSION['logged_in'])) {
		redirect("index.php");
		echo '<a href="index.php"> You are not logged in</a>';
		exit();
	}
}

?>