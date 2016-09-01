<?php
	require_once 'includes/global.inc.php';

	reqLoggedIn();

	$status = "Welcome";

?>

<html>
<head>
	<title>Users</title>
</head>
<body>
	<?php insertHeader(); ?>
	<?php echo "<p>".$status."</p>"; ?>
	<?php $result = $db->selectUsers(); ?>
	
	<table>
		<tr>
			<th>id</th>
			<th>username</th> 
			<th>email</th>
		</tr>
		<?php while($row = mysql_fetch_array($result)) {
			echo 
		"<tr>
			<th>".$row["id"]."</th>
			<th>".$row["username"]."</th>
			<th>".$row["email"]."</th>
		</tr>";
 	   	} ?>
 	
 	</table>
</body>
</html>