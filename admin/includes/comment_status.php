<?php

include("database.php");

			// approve comments

			if(isset($_GET["unapprove"])){
				
				$unapprove_id = $_GET["unapprove"];
				
				$unapprove_comment = "update comments set status = 'unapprove' where comment_id = '$unapprove_id' ";
				
				$run_unapprove_comment = mysqli_query($connection, $unapprove_comment);
				
					if($run_unapprove_comment){
					
					echo "<script>alert('comment approve');</script>";
					echo "<script>window.open('index.php?view_comments','_self');</script>";
				}
		
				
			}
			
			// unapprove comments
			
			if(isset($_GET["approve"])){
				
				$approve_id = $_GET["approve"];
				
				$approve_comment = "update comments set status = 'approve' where comment_id = '$approve_id' ";
				
				$run_approve_comment = mysqli_query($connection, $approve_comment);
				
					if($run_approve_comment){
					
					echo "<script>alert('comment unapprove');</script>";
					echo "<script>window.open('index.php?view_comments','_self');</script>";
				}
		
				
			}
		
		?>