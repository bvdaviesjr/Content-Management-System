<!DOCTYPE html>
<html>
	<head>
		<title>View All Posts</title>
	</head>
	<body>
		<table align="left" border="2" width="700" >
			<tr>
				<td colspan="8" align="center"><h2>View All Posts Here</h2></td>
			</tr>
			<tr>
				<th>Post ID</th>
				<th>Title</th>
				<th>Author</th>
				<th>Image</th>
				<th>Comments</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php
			
				// Displays Posts

				include("includes/database.php");
				
				$query_post = "Select * from posts";
				
				$run_post = mysqli_query($connection, $query_post);
				
				$i = 1;
				
				while($row_post = mysqli_fetch_assoc($run_post)){
					
					$post_id = $row_post["post_id"];
					$post_title = $row_post["post_title"];
					$post_author = $row_post["post_author"];
					$post_image = $row_post["post_image"];
			
			?>
			
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $post_title; ?></td>
				<td><?php echo $post_author; ?></td>
				<td><img src="news_images/<?php echo $post_image; ?>" width="60" height="60" /></td>
				<td align="center">
				
					<?php
					
						$get_comments = "Select * from comments where post_id = '$post_id' ";
						$run_comments = mysqli_query($connection, $get_comments);
						$count = mysqli_num_rows($run_comments);
						echo $count;
					
					?>
				
				</td>
				<td><a href="index.php?edit_post=<?php echo $post_id; ?>" />Edit</td>
				<td><a href="includes/delete_post.php?delete_post=<?php echo $post_id; ?>" />Delete</td>
			</tr>
			
			<?php } ?>
			
		</table>
	</body>
</html>