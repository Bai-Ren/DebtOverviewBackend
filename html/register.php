<?php
	require_once 'includes/global.inc.php';

	reqNotLoggedIn();

	$username = "";
	$password = "";
	$password_confirm = "";
	$email = "";
	$message = "";
	$error = "";

	if(isset($_POST['submit-form'])) { 
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_confirm = $_POST['password-confirm'];
		$email = $_POST['email'];

		$success = true;

		$result = mysql_query("select id from users where username='$username'");
		if(mysql_num_rows($result) != 0) {
			$error = "Username taken";
			$success = false;
		}

		if ($success && $password != $password_confirm) {
			$error = "Passwords do not match";
			$success = false;
		}

		if ($success) {
			$data['username'] = $username;
			$data['password'] = hasher($password);
			$data['email'] = $email;

			$message = "Successfully created new user!";

			$newuser = new User ($data);
			$newuser->save(true);
		}

	}
?>

<html>
<head>
	<title>Register</title>
</head>
<body>
	
	<?php insertHeader(); ?>
	<?php echo "<p>".$message."</p>"; ?>
	<?php echo "<p>".$error."</p>"; ?>

	<form action="register.php" method="post">

	Username: <input type="text" value="<?php echo $username; ?>" name="username" /><br/>
	Password: <input type="password" value="<?php echo $password; ?>" name="password" /><br/>
	Password (confirm): <input type="password" value="<?php echo $password_confirm; ?>" name="password-confirm" /><br/>
	E-Mail: <input type="text" value="<?php echo $email; ?>" name="email" /><br/>
	<input type="submit" value="Register" name="submit-form" />
</body>
</html>