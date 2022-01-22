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
    <link rel="stylesheet" href="css/styles.css">
    <title>My Ecommerce Website</title>
</head>
<body>

    
    <div class="container">

        <div class="heading">
            
            <header class="row d-flex justify-content-between">
                <div class="col-md-3"><a href="index.php"><i class="far fa-file-alt"></i>&nbsp; <span>Daily News</span></a></div>
                <div class="col-md-9">
                </div>
            </header>

        </div>

        <!-- Navigation -->
        <?php include("includes/navbar.php"); ?>

        <!-- Post Content -->
        <?php
					
            if(isset($_GET["post"])){
                
                $post_id = $_GET["post"];
                
            }
            
            $select_post = "Select * from posts where post_id = '$post_id'";
            $run_post = mysqli_query($connection, $select_post);
            while($row_post = mysqli_fetch_assoc($run_post)){
                
                $post_id = $row_post["post_id"];
                $post_title = $row_post["post_title"];
                $post_author = $row_post["post_author"];
                $post_date = $row_post["post_date"];
                $post_image = $row_post["post_image"];
                $post_content = $row_post["post_content"];
                
                echo "
                
                <div class='row  mt-4 header-pad'>
                <h2>$post_title</h2>
                </div>

                <div class='row mb-5'>
                    <div class='col-md-2 limit'><img src='admin/news_images/$post_image' id='imageSizing' /></div>
                    <div class='col-md-10'> <div>$post_content</div></div>
                </div>
                ";
            }
        
        ?>
        
        
        <?php include("includes/comment_form.php"); ?>


        <!-- Footer -->
        <?php include("footer.php"); ?>

        


    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>