<?php
require_once 'classes/User.class.php';
require_once 'classes/DB.class.php';

$db = new DB();
$db->connect();

function insertHeader () {
	$pages = array (
		"Index" => "index.php",
		"Register" => "register.php",
		"Delete All" => "delete.php",
		"Users" => "users.php",
		"Info" => "info.php"
	);

	echo '|';
	foreach ($pages as $pname => $location) {
		echo '<a href="'.$location .'"> '.$pname .' </a> |';
	}

	return true;
}


?>