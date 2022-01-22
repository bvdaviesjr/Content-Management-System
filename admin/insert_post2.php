<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Custom Styles-->
<link rel="stylesheet" href="../css/styles.css">

<?php

	include("../includes/database.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Insert Post Form</title>
		
		<style>
			tr, td{
				
				padding: 0;
				margin: 0;
			}
		</style>
	</head>
	<body>
		<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="insert_post2.php" method="post" enctype="multipart/form-data" >
                        <table border="2" width="600" align="center">
                            <tr>
                                <td colspan="3" align="center" style="padding-top: 15px;"><h2>Insert Post Form</h2></td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Post Title</strong></td>
                                <td><input type="text" name="post_title" /></td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Post Category</strong></td>
                                <td>
                                
                                    <select name="cat">
                                        <option value="null">Select a Category</option>
                                        <?php
                                        
                                            $select_cat = "Select * from categories";
                                            $run_cat = mysqli_query($connection, $select_cat);
                                            while($row_cat = mysqli_fetch_assoc($run_cat)){
                                                
                                                $cat_id = $row_cat["cat_id"];
                                                $cat_title = $row_cat["cat_title"];
                                                
                                                echo "
                                                
                                                <option value='$cat_id'>$cat_title</option>
                                                
                                                ";
                                            }
                                        
                                        ?>
                                    </select>
                                
                                </td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Post Author</strong></td>
                                <td><input type="text" name="post_author" /></td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Post Keywords</strong></td>
                                <td><input type="text" name="post_keywords" /></td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Post Image</strong></td>
                                <td><input type="file" name="post_image" /></td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Post Content</strong></td>
                                <td><textarea name="post_content" cols="30" rows="15"></textarea>
                            </tr>
                            <tr>
                                <td colspan="4" align="center"><input type="submit" name="submit"  value="Publish Post"/></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
	</body>
</html>

<?php

	if(isset($_POST["submit"])){
		
        // Insert posts in the database

		$post_title = filter_var($_POST["post_title"], FILTER_SANITIZE_STRING);
		$post_cat = $_POST["cat"];
		$post_author = filter_var($_POST["post_author"], FILTER_SANITIZE_STRING);
		$post_date = date("m-d-y");
		$post_keywords = filter_var($_POST["post_keywords"], FILTER_SANITIZE_STRING);
		$post_image = filter_var($_FILES["post_image"]["name"], FILTER_SANITIZE_STRING);
		$post_image_tmp = $_FILES["post_image"]["tmp_name"];
		$post_content = filter_var($_POST["post_content"], FILTER_SANITIZE_STRING);
		
		if($post_title == '' or $post_cat == 'null' or $post_author == '' or $post_keywords == '' or $post_image == '' or $post_content == '' ){
			
			echo "
			
				<script>alert('Kindly fill in all the empty fields')</script>
				<script>window.open('insert_post.php','_self')</script>
				exit();
			";
		}else{
			
			move_uploaded_file($post_image_tmp,"news_images/$post_image");
			
			$insert_post = "Insert into posts(category_id, post_title, post_date, post_author, post_keywords, post_image, post_content)
							values('$post_cat','$post_title','$post_date','$post_author','$post_keywords','$post_image','$post_content')";
							
			$run_post = mysqli_query($connection, $insert_post);
			
			if($run_post){
				
				echo "
			
				<script>alert('Post successfully inserted')</script>
				<script>window.open('insert_post2.php','_self')</script>
			";
			}
		}
		
	}

?>