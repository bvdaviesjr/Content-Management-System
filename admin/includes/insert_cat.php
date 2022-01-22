<?php include("database.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Insert Category</title>
	</head>
	<body>
		<form action="index.php?insert_cat" method="post" style="padding: 30px 50px;">
			<b>Insert New Category : </b><input type="text" name="new_cat" />
			<input type="submit" name="insert_cat" value="Insert Category Now" />
		</form>
	</body>
</html>
<?php

	//Inserts a category in the DB

	if(isset($_POST["insert_cat"])){
		
		$cat_title = filter_var($_POST["new_cat"], FILTER_SANITIZE_STRING) ;
		
		if($cat_title == ''){
			
			echo "<script>alert('Field is empty');</script>";
			exit();
		}else{
			
			$insert_cat = "insert into categories(cat_title) values('$cat_title')";
		
			$run_cat = mysqli_query($connection, $insert_cat);
			
			if($run_cat){
				
				echo "<script>alert('A new category is inserted');</script>";
				echo "<script>window.open('index.php?insert_cat','_self');</script>";
			}
			
		}
		
	}

?>