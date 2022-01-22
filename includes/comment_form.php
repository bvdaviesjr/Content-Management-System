<?php

	include("database.php");

	if(isset($_GET["post"])){
		
		$post_id = $_GET["post"];
		
		$query = "Select * from posts where post_id = '$post_id' ";
		
		$run_query = mysqli_query($connection, $query);
		
		$row = mysqli_fetch_assoc($run_query);
		
		$post_new_id = $row["post_id"];
	}

	$get_comment = "Select * from comments where post_id = '$post_new_id' and status = 'approve' ";
	
	$run_comment = mysqli_query($connection, $get_comment);
	
	while($row_comment = mysqli_fetch_assoc($run_comment)){
		
		$coment_name = $row_comment["comment_name"];
		$coment_text = $row_comment["comment_text"];
		
		echo "
		
			<div>$coment_name</div>
			<div>$coment_text</div>
		
		";
	}
	
?>


<?php
	//counting comments
	
	$comment_count = "select * from comments where post_id = '$post_new_id' and status = 'unapprove'";
	$comment_run = mysqli_query($connection, $comment_count);
	$count = mysqli_num_rows($comment_run);
	
	echo "<i>There are</i><h3>$count</h3>unapproved<i>&nbsp;Comment(s)</i>";

?>

<form action="details.php?post=<?php echo $post_new_id; ?>" method="post" style="padding-bottom: 20px;">
			
	<table width="600" align="center" border="2">
		<tr>
			<td align="center"><strong>Post a Comment</strong></td>
		</tr>
		<tr>
			<td align="right"><strong>Comment Name</strong></td>
			<td><input type="text" name="comment_name" /></td>
		</tr>
		<tr>
			<td align="right"><strong>Comment Email</strong></td>
			<td><input type="text" name="comment_email" /></td>
		</tr>
		
		<tr>
			<td align="right"><strong>Comment Text</strong></td>
			<td><textarea cols="30" rows="15" name="comment_text"></textarea></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><input type="submit" name="submit" value="submit"/></td>
		</tr>
	</table>

</form>

<?php

	if(isset($_POST["submit"])){
		$post_com = $post_new_id;
		$comment_name = $_POST["comment_name"];
		$comment_email = $_POST["comment_email"];
		$comment_text = $_POST["comment_text"];
		$status = "unapprove";

		// Filter Form data
		
		$comment_name = filter_var($comment_name, FILTER_SANITIZE_STRING);
		$comment_email = filter_var($comment_email, FILTER_SANITIZE_STRING);
		$comment_text = filter_var($comment_text, FILTER_SANITIZE_STRING);

		
		if($comment_name == '' or $comment_email == '' or $comment_text == ''){
			
			echo "
			
				<script>alert('Kindly fill in all the fields')</script>
				<script>window.open('details.php?post=$post_id','_self')</script>
				exit();
			";
			
		}else{
			
			$comment_query = "insert into comments(post_id, comment_name, comment_email, comment_text, status) values('$post_com','$comment_name','$comment_email','$comment_text','$status') ";
			
			$run_comment = mysqli_query($connection, $comment_query);
			
			if($run_comment){
				
				echo "
			
				<script>alert('Comments Posted Successfully')</script>
				<script>window.open('details.php?post=$post_id','_self')</script>
			";
				
			}
		}
	}

?>