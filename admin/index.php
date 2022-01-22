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
    <link rel="stylesheet" href="styles.css">

    <title>Admin Section</title>
</head>
<body class="mb-4">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12"><div id="header">Admin Panel</div> </div>
            
        </div>

        <div class="row mt-4">
            <div class="col-md-3 sidebar">
                <h3>Manage Content</h3>
				<a href="index.php?insert_post">Insert New Post</a>
				<a href="index.php?view_posts">View All Posts</a>
				<a href="index.php?insert_cat">Insert New Category</a>
				<a href="index.php?view_cats">View All Categories</a>
				<a href="index.php?view_comments">View All Comments</a>
				<a href="index.php?logout">Admin Logout</a>
            </div>

            <div class="col-md-9">

                <strong>To Do Task : &nbsp; </strong><a href="index.php?view_comments">Pending Comments
                
                <?php
                
                    include("includes/database.php");
                    $pending_com = "Select * from comments where status = 'unapprove'";
                    $run_pending_com = mysqli_query($connection, $pending_com);
                    $count = mysqli_num_rows($run_pending_com);
                    
                    echo "(".$count.")"." unapprove comments";
                
                
                ?>
                
                </a>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" style="text-decoration: none; color: red; ">Go to Main Website</a>


                    <?php

                        // Display a result based on GET request selection

                        if(isset($_GET["insert_post"])){
                            
                            include("includes/insert_post.php");
                        }
                        
                        if(isset($_GET["view_posts"])){
                            
                            include("includes/view_posts.php");
                        }

                        if(isset($_GET["edit_post"])){
                            
                            include("includes/edit_post.php");
                        }
                        
                        
                        if(isset($_GET["insert_cat"])){
                            
                            include("includes/insert_cat.php");
                        }
                        
                        if(isset($_GET["view_cats"])){
                            
                            include("includes/view_cats.php");
                        }
                        
                        if(isset($_GET["edit_cat"])){
                            
                            include("includes/edit_cat.php");
                        }
                    
                        if(isset($_GET["view_comments"])){
                            
                            include("includes/view_comments.php");
                        }
                        
                        if(isset($_GET["unapprove"])){
                            
                            include("includes/comment_status.php");
                        }
                        
                        if(isset($_GET["approve"])){
                            
                            include("includes/comment_status.php");
                        }
                        
                        if(isset($_GET["del_comment"])){
                            
                            include("includes/del_comment.php");
                        }

                        if(isset($_GET["default"])){
                            echo '<h2 class="pt-3">Welcome to News Admin Area</h2>';
                        }
                    ?>

            </div>
        </div>

 
    </div>

</body>
</html>