<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "h159z867", "Panah9ma","h159z867");

	if ($mysqli->connect_errno)		/* check connection */
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$user = $_POST["user"];
	$post = $_POST["post"];
	
	if ($post == "")
	{
        	echo "The post cannot be empty.";
        	exit();
    	}
    
    	$query = "SELECT user_id from Users";
    	$selection = $mysqli->query($query);

	$found = FALSE;
	if ($selection -> num_rows > 0)
	{
        	while ($row = $selection -> fetch_assoc())
		{
            		if ($row["user_id"] == $user)
			{
                		$found = TRUE;
            		}
        	}
    	}

    	if (!$found)
	{
        	echo "Failed to find the user.";
        	exit();
    	}

    	$query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', '" . $user .  "')";
    	if ($result = $mysqli->query($query))
	{
        	echo "".$user."'s post has been created.";
    	}
    	else
	{
        	echo "Failed to create the post. Try again!";
    	}
	
$mysqli->close();
?>