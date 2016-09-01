<?php
	require_once 'includes/global.inc.php';

	$error = "";
	$status = "Welcome";
	if (isset($_SESSION['logged_in'])) {
		$user = unserialize($_SESSION['user']);
		$status .= " $user->username";
	}
	$status .= "!";
	
?>

<html>
<head>
	<title>Welcome</title>
</head>
<body>
	
	<?php insertHeader(); ?>
	<?php echo "<p>".$status."</p>"; ?>
	<?php echo "<p>".$error."</p>"; ?>

	<p>Click a link above to get started!</p>


</body>
</html>


