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
				<th>Category ID</th>
				<th>Category Title</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php
			
				include("includes/database.php");
				
				$query_cats = "Select * from categories";
				
				$run_cats = mysqli_query($connection, $query_cats);
				
				$i = 1;
				
				while($row_cats = mysqli_fetch_assoc($run_cats)){
					
					$cat_id = $row_cats["cat_id"];
					$cat_title = $row_cats["cat_title"];
			
			?>
			
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $cat_title; ?></td>
				<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>" />Edit</td>
				<td><a href="index.php?view_cats&delete_cat=<?php echo $cat_id; ?>" />Delete</td>
			</tr>
			
			<?php } ?>
			
		</table>
	</body>
</html>

<?php

	//Delete specific category from the DB

	if(isset($_GET['delete_cat'])){
		
		$delete_id = $_GET['delete_cat'];
		
		$delete_cat = "delete from categories where cat_id = '$delete_id' ";
		
		$run_delete = mysqli_query($connection, $delete_cat);
		
		if($run_delete){
				
				echo "<script>alert('A category was deleted');</script>";
				echo "<script>window.open('index.php?view_cats','_self');</script>";
			}
		
	}

?>
