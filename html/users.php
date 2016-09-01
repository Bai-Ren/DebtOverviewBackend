<?php
	require_once 'includes/global.inc.php';

	reqLoggedIn();

	$user = unserialize($_SESSION['user']);

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
		<?php while($row = mysql_fetch_array($result)) :?>

		<tr<?php if ($row['id'] == $user->id) echo ' style="color:red"'; ?>>
			<th><?php echo $row["id"] ?></th>
			<th><?php echo $row["username"] ?></th>
			<th><?php echo $row["email"] ?></th>
		</tr>
		<?php endwhile; ?>

 	</table>
</body>
</html>