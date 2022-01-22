<!DOCTYPE html>
<html>
	<head>
		<title>View All Comments</title>
	</head>
	<body>
		<table align="left" border="2" width="700" >
			<tr>
				<td colspan="8" align="center"><h2>View All Comments Here</h2></td>
			</tr>
			<tr>
				<th>ID</th>
				<th>Text</th>
				<th>Name</th>
				<th>Email</th>
				<th>Status</th>
				<th>Delete</th>
			</tr>
			
			<?php
			
				include("includes/database.php");
				
				$query_comments = "Select * from comments";
				
				$run_comments = mysqli_query($connection, $query_comments);
				
				$i = 1;
				
				while($row_comment = mysqli_fetch_assoc($run_comments)){
					
					$comment_id = $row_comment["comment_id"];
					$comment_text = $row_comment["comment_text"];
					$comment_name = $row_comment["comment_name"];
					$comment_email = $row_comment["comment_email"];
					$status = $row_comment["status"];
					
			?>
			
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $comment_text; ?></td>
				<td><?php echo $comment_name; ?></td>
				<td><?php echo $comment_email; ?></td>
				<td>
					<?php 
						
						if($status == 'approve'){
							
							echo "<a href='index.php?unapprove=$comment_id'>Unapprove</a>";
						}else{
							
							echo "<a href='index.php?approve=$comment_id'>Approve</a>";
						}
						
					?>
				</td>
				<td><a href="index.php?del_comment=<?php echo $comment_id; ?>" />Delete</td>
			</tr>
			
			<?php } ?>
			
		</table>
		
		
		
	</body>
</html>

