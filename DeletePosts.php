<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "h159z867", "Panah9ma", "h159z867");

	if ($mysqli->connect_errno) 		/* check connection */
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}	

	$query="SELECT post_id, content, author_id from Posts";
 	$selection = $mysqli -> query($query);

	if ($selection -> num_rows > 0)
	{
                while ($row = $selection -> fetch_assoc())
		{
			$del = $_POST[$row["post_id"]];
			if($del=="on")
			{
				$query="DELETE FROM Posts WHERE post_id='".$row["post_id"]."'";
				$deleted = $mysqli -> query($query);
				echo "<p style='text-align: center; font-size:25px'>Post Id: ".$row["post_id"]." from user: ".$row["author_id"]." has been deleted.</p>"; 	
			}
		}
	}

	$mysqli->close();
?>