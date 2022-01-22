<!DOCTYPE html>
<?php include("database.php");

	//Gets specific post from the DB to edit

	if(isset($_GET["edit_post"])){
		
		$edit_id = $_GET["edit_post"];
		
		$select_query = "Select * from posts where post_id = '$edit_id' ";
		
		$run_query = mysqli_query($connection, $select_query);
		
		while($row_edit = mysqli_fetch_assoc($run_query)){
			
			$post_id = $row_edit["post_id"];
			$post_cat = $row_edit["category_id"];
			$post_title = $row_edit["post_title"];
			$post_author = $row_edit["post_author"];
			$post_keywords = $row_edit["post_keywords"];
			$post_image = $row_edit["post_image"];
			$post_content = $row_edit["post_content"];
		}
		
	}



 ?>
<html>
	<head>
		<title>Insert Post</title>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			<table width="750" border="2" align="center">
				<tr>
					<td colspan="4" align="center"><h2>Edit Post</h2></td>
				</tr>
				<tr>
					<td align="right"><strong>Post Title</strong></td>
					<td><input type="text" name="post_title" value="<?php echo $post_title; ?>" /></td>
				</tr>
				<tr>
					<td align="right"><strong>Post Category</strong></td>
					<td>
						<select name="cat">
							<?php
							
								$select_cat = "select * from categories where cat_id = '$post_cat' ";
								$run_cat = mysqli_query($connection, $select_cat);
								While($row_cat = mysqli_fetch_assoc($run_cat)){
									$cat_id = $row_cat["cat_id"];
									$cat_title = $row_cat["cat_title"];
									
									echo "
									
										<option value='$cat_id'>$cat_title</option>
										
										";
										
										$select_more = "Select * from categories";
										$run_more = mysqli_query($connection, $select_more);
										while($row_more = mysqli_fetch_assoc($run_more)){
											$more_id = $row_more["cat_id"];
											$more_title = $row_more["cat_title"];
											
											echo "
									
										<option value='$more_id'>$more_title</option>
										
										";
										
										}
										
									
								}
							
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right"><strong>Post Author</strong></td>
					<td><input type="text" name="post_author" value="<?php echo $post_author; ?>" /></td>
				</tr>
				<tr>
					<td align="right"><strong>Post Keywords</strong></td>
					<td><input type="text" name="post_keywords" value="<?php echo $post_keywords; ?>" /></td>
				</tr>
				<tr>
					<td align="right"><strong>Post Image</strong></td>
					<td><input type="file" name="post_image" /></td><img src="news_images/<?php echo $post_image; ?>" width="50" height="50" />
				</tr>
				<tr>
					<td align="right"><strong>Post Content</strong></td>
					<td><textarea cols="40" rows="15" name="post_content" ><?php echo $post_content; ?></textarea></td>
				</tr>
				<tr>
					<td colspan="4" align="center"><input type="submit" name="update" value="Update Post" /></td>
				</tr>
			</table>
		 </form>
	</body>
</html>
<?php

	//Update specific post from the DB

	if(isset($_POST["update"])){
		$update_id = $edit_id;
		$post_title = $_POST["post_title"];
		$post_cat = $_POST["cat"];
		$post_date = date("m-d-y");
		$post_author = $_POST["post_author"];
		$post_keywords = $_POST["post_keywords"];
		$post_image = $_FILES["post_image"]["name"];
		$post_image_tmp = $_FILES["post_image"]["tmp_name"];
		$post_content = $_POST["post_content"];
		
		if($post_title == '' or $post_cat == 'null' or $post_author == '' or $post_keywords == '' or $post_image == '' or $post_content == ''){
			
			echo "
			
				<script>alert('Kindly fill in all the fields')</script>
				<script>window.open('insert.post.php','_self')</script>
				exit;
			";
		}else{
			
			move_uploaded_file($post_image_tmp,"news_images/$post_image");
			
			$update_post = "update posts set category_id = '$post_cat', post_title = '$post_title', post_date = '$post_date', 
			post_author = '$post_author', post_keywords = '$post_keywords', post_image = '$post_image', post_content = '$post_content' 
			where post_id = '$update_id' ";
			
			$run_post = mysqli_query($connection, $update_post);
			
			if($run_post){
				echo "
			
				<script>alert('Post updated successfully')</script>
				<script>window.open('index.php?view_posts','_self')</script>
		
			";
			}else{
				echo "
			
				<script>alert('Error Occured in the proccess, please try again!')</script>
				<script>window.open('insert.post.php','_self')</script>
				exit;
			";
			}
		}
	}

?>