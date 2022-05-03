<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "h159z867", "Panah9ma","h159z867");

/* check connection */
if ($mysqli->connect_errno)
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$user= $_POST["user"];
if($user== "")
{
	echo "The text field is empty. User not stored.";
	exit();
}

$query = "INSERT INTO Users (user_id) VALUES ('".$user."')";
if($mysqli->query($query))
	{
		echo "New user ".$user." successfully stored. <br>";
	}
	else
	{
		echo "The user ".$user." already exists.<br>";
	}

$mysqli->close();
?>