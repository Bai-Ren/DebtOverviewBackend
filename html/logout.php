<?php
	require_once 'includes/global.inc.php';

	reqLoggedIn();

	$error = "";
	$message = "";

	if(isset($_POST['submit-form'])) { 
		$userTools->logout();
		header("Location: index.php");
	}
?>

<html>
<head>
	<title>Logout</title>
</head>
<body>
	
	<?php insertHeader(); ?>
	<?php echo "<p>".$error."</p>"; ?>

	<form action="logout.php" method="post">

	<input type="submit" value="Logout" name="submit-form" />
</body>
</html>