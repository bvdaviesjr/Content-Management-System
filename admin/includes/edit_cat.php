<?php include("database.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Category</title>
	</head>
	<body>
	<?php
	
		// Edits a category with specific ID within the database

		if(isset($_GET["edit_cat"])){
			
			$edit_id = $_GET["edit_cat"];
			
			$edit_query = "Select * from categories where cat_id = '$edit_id' ";
			
			$run_cat_new = mysqli_query($connection, $edit_query);
			
			while($row_cat = mysqli_fetch_assoc($run_cat_new)){
				
				$cat_id = $row_cat["cat_id"];
				$cat_title = $row_cat["cat_title"];
				
			}
			
		}
	
	?>
	
		<form action="" method="post" style="padding: 30px 50px;">
			<b>Edit Category : </b><input type="text" name="edit_cat" value="<?php echo $cat_title; ?>" />
			<input type="submit" name="update_cat" value="Update Category Now" />
		</form>
	</body>
</html>

<?php

	if(isset($_POST["update_cat"])){
		
		$edit_id = $cat_id;
		$edit_title = $_POST["edit_cat"];
		
		$query_cat = "Update categories set cat_title = '$edit_title' where cat_id = '$edit_id'";
		
		$run_cat = mysqli_query($connection, $query_cat);
		
		
				echo "<script>alert('A category has been updated');</script>";
				echo "<script>window.open('index.php?view_cats','_self');</script>";
			
		
		
	}

?>