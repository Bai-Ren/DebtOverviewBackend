<?php
	require_once 'includes/global.inc.php';

	$error = "";
	$status = "Welcome";

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