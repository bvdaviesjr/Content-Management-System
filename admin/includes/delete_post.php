<?php

include("database.php");

// Deletes a post with specific ID from the database

if(isset($_GET["delete_post"])){
	
	$delete_id = $_GET["delete_post"];
	
	$delete_post = "delete from posts where post_id = '$delete_id' ";
	
	$run_delete = mysqli_query($connection, $delete_post);

	echo "<script>alert('A post was deleted');</script>";
	echo "<script>window.open('../index.php?view_posts','_self');</script>";
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Delete a Post</title>
	</head>
	
	<body>
		
	</body>
</html>
