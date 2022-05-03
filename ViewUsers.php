<?php

	$mysqli = new mysqli("mysql.eecs.ku.edu", "h159z867", "Panah9ma","h159z867");


	if ($mysqli->connect_errno)		/* check connection */
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$query = "SELECT user_id from Users";
	$selection = $mysqli->query($query);

	echo "<p style='font-size:25px; text-align:center'> Users Table</p>";

	echo "<table style='border: 2.5px solid black; font-size: 24px'>";
	echo "<tr>";
	echo "<td>" ."Users". "</td>";
	echo "</tr>";

	if ($selection -> num_rows > 0)
	{
		while ($row = $selection -> fetch_assoc())
		{
			echo "<tr>";
			echo "<td style='border: 1.5px solid black; color: black; font-size: 19px'>" . $row["user_id"] . "</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
 
	$mysqli->close();
?>