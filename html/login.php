<?php
	require_once 'includes/global.inc.php';

	reqNotLoggedIn();

	$error = "";
	$message = "";
	$username = "";
	$password = "";

	if(isset($_POST['submit-form'])) { 
		$username = $_POST['username'];
		$password = $_POST['password'];	

		if ($userTools->login($username,$password)) {
			header("Location: index.php");
		} else {
			$error = "Error logging in";
		}
	}

?>

<html>
<head>
	<title>Login</title>
</head>
<body>
	
	<?php insertHeader(); ?>
	
	<?php echo "<p>".$message."</p>"; ?>
	<?php echo "<p>".$error."</p>"; ?>

	<form action="login.php" method="post">

	Username: <input type="text" value="<?php echo $username; ?>" name="username" /><br/>
	Password: <input type="password" value="<?php echo $password; ?>" name="password" /><br/>
	<input type="submit" value="Login" name="submit-form" />
</body>
</html>