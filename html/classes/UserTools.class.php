<?php

require_once 'User.class.php';
require_once 'DB.class.php';
require_once 'includes/general.inc.php';

class UserTools {
	public function login($username, $password) {
		$hashedPassword = hasher($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hashedPassword'";
		$result = mysql_query($sql);

		if (mysql_num_rows($result) == 1) {
			session_start();
			$user = new User(mysql_fetch_assoc($result));
			$_SESSION["user"] = serialize($user);
			$_SESSION["login_time"] = time();
			$_SESSION["logged_in"] = 1;
			return true;
		} else {
			return false;
		}
	}

	public function logout() {
		unset($_SESSION['user']);
		unset($_SESSION['login_time']);
		unset($_SESSION['logged_in']);
		session_destroy();
	}	
}

?>