<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "h159z867", "Panah9ma", "h159z867");

	if ($mysqli->connect_errno)		/* check connection */ 
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	echo "<p style='text-align: center; font-size:30px'> View User Posts</p>";

	$username=$_POST["user_id"];
	echo"<p style='font-size:25px'>Posts of ".$username."<br></p>";

	$query = "SELECT content from Posts where author_id='$username'";
	$selection = $mysqli -> query($query);

	echo "<table style='border: 4px solid black; color: Red; font-size:24px'>";
	if ($selection -> num_rows > 0)
	{
        	while ($row = $selection -> fetch_assoc())
		{
            		echo "<tr>";
            		echo "<td style='border: 2px solid black; color:Blue'>" . $row["content"] . "</td>";
            		echo "</tr>";
        	}
    	}
    	echo "</table>";
 
$mysqli->close();
?>