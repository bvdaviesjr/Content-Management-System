<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Custom Styles-->
<link rel="stylesheet" href="../css/styles.css">

<div class="post_content">
			
    <?php
        if(isset($_GET["cat"])){
        $cat_id = $_GET["cat"];
        
        // Displays post based on a specific category id

        $select_post = "Select * from posts where category_id = '$cat_id'";
        $run_post = mysqli_query($connection, $select_post);
        while($row_post = mysqli_fetch_assoc($run_post)){
            
            $post_id = $row_post["post_id"];
            $post_title = $row_post["post_title"];
            $post_author = $row_post["post_author"];
            $post_date = $row_post["post_date"];
            $post_image = $row_post["post_image"];
            $post_content = substr($row_post["post_content"],0, 300);
            
            echo "

            <div class='row mt-4 header-pad'>
            <h2>$post_title</h2>
            </div>

            <div class='row mb-5'>
                <div class='col-md-2 col-12 limit'><img src='admin/news_images/$post_image' /></div>
                <div class='col-md-10 col-12'> 
                    <div class='row'>
                        <div class='col-md-12'>$post_content<a href='details.php?post=$post_id'>&nbsp; Read More</a></div>
                    </div>
                    <div class='row mt-3'>
                    <div class='col-md-12'><span>Written By: <strong>$post_author</strong> &nbsp; $post_date</span></div>
                        
                    </div>
                </div>
            </div>

            ";
        }
    
        }else{
            
            // Displays all posts

            $select_post = "Select * from posts order by rand() limit 0,5";
            $run_post = mysqli_query($connection, $select_post);
            while($row_post = mysqli_fetch_assoc($run_post)){
                
                $post_id = $row_post["post_id"];
                $post_title = $row_post["post_title"];
                $post_author = $row_post["post_author"];
                $post_date = $row_post["post_date"];
                $post_image = $row_post["post_image"];
                $post_content = substr($row_post["post_content"],0, 300);
                
                echo "

                <div class='row mt-4 header-pad'>
                    <h2>$post_title</h2>
                </div>

                <div class='row mb-5'>
                    <div class='col-md-2 col-12 limit'><img src='admin/news_images/$post_image' /></div>
                    <div class='col-md-10 col-12'> 
                        <div class='row'>
                            <div class='col-md-12'>$post_content<a href='details.php?post=$post_id'>&nbsp; Read More</a></div>
                        </div>
                        <div class='row mt-3'>
                        <div class='col-md-12'><span>Written By: <strong>$post_author</strong> &nbsp; $post_date</span></div>
                            
                        </div>
                    </div>
                </div>

            ";
            }
        
        }
    ?>

</div>