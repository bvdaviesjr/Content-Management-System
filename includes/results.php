<!-- Search Not Valid -->
<?php include("database.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <title>My Ecommerce Website</title>
</head>
<body>

	<div class="container">

		<div class="heading">
			
			<header class="row d-flex justify-content-between">
				<div class="col-md-7"><a href="../index.php"><i class="far fa-file-alt"></i>&nbsp; <span>News (Simple CRUD Admin)</span></a></div>
				<div class="col-md-5">
				</div>
			</header>

			<!-- Detail Navbar -->
			<div class="row" style="background: #F8F9FA; padding: 10px">
				<div class="col-md-12"><a href="../index.php">Back to Index</a></div>
			</div>

		</div>

		<!-- Display Details -->

		<div class="row" style="min-height: 450px;">
			<div class="col-md-12">
			<?php
					
						if(isset($_GET["search"])){
							$keyword = $_GET["search_query"];
							
							if($keyword == ''){
								
								echo "<script>alert('The search field was empty')</script>";
								echo "Please type something in the search field";
								exit();	
								
							}else{
								
								$query = "Select * from posts where post_keywords like '%$keyword%' ";
								$run_query = mysqli_query($connection, $query);
								while($row = mysqli_fetch_assoc($run_query)){
									$post_id = $row["post_id"];
									$post_title = $row["post_title"];
									$post_author = $row["post_author"];
									$post_date = $row["post_date"];
									$post_image = $row["post_image"];
									$post_content = substr($row["post_content"],0, 300);
									
									echo "
									
									<div class='row mt-4 header-pad'>
									<h2>$post_title</h2>
									</div>
						
									<div class='row mb-5'>
										<div class='col-md-2 col-12 limit'><img src='../admin/news_images/$post_image' /></div>
										<div class='col-md-10 col-12'> 
											<div class='row'>
												<div class='col-md-12'>$post_content<a href='../details.php?post=$post_id'>&nbsp; Read More</a></div>
											</div>
											<div class='row mt-3'>
											<div class='col-md-12'><span>Written By: <strong>$post_author</strong> &nbsp; $post_date</span></div>
												
											</div>
										</div>
									</div>
						
									";
								}
								
							}
							
						
					}
					
				?>
			</div>
		</div>

		<!-- Footer -->
		<?php include("../footer.php"); ?>

		</div>

	</body>