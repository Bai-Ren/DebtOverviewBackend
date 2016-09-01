<?php
	require_once 'includes/global.inc.php';

	$status = "Welcome";

	if(isset($_POST['submit-form'])) { 
		
		$status = "Successfully deleted all users";

		$db->deleteAll('users');
	}

?>

<html>
<head>
	<title>Delete Users</title>
</head>
<body>
	
	<?php insertHeader(); ?>
	<?php echo "<p>".$status."</p>"; ?>
	
	<form action="delete.php" method="post">
	<input type="submit" value="Delete All Users" name="submit-form" />
</body>
</html>