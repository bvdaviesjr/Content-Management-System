<?php
	
	include("database.php");

	// Deletes a comment with specific ID from the database
	
	if(isset($_GET['del_comment'])){
		
		$comment_id = $_GET['del_comment'];
		
		$delete_comment = "delete from comments where comment_id = '$comment_id' ";
		
		$run_delete = mysqli_query($connection, $delete_comment);
		
		if($run_delete){
				
				echo "<script>alert('A commment was deleted');</script>";
				echo "<script>window.open('index.php?view_comments','_self');</script>";
			}
		
	}

?>
