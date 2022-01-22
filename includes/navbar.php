<?php include("database.php"); ?>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <li class='nav-item'><a class='nav-link' href=''></a></li>

        <?php
            
            $select_cat = "Select * from categories";
            $run_cat = mysqli_query($connection, $select_cat);
            while($row_cat = mysqli_fetch_assoc($run_cat)){
                $cat_id = $row_cat["cat_id"];
                $cat_title = $row_cat["cat_title"];
                
                echo "
				
                <li class='nav-item'><a class='nav-link' href='index.php?cat=$cat_id' />$cat_title</a></li>
            
            ";

                
            }
        ?>

        </ul>
        <form action="includes/results.php" method="get" enctype="multipart/form-data">
			<input type="text" name="search_query" placeholder="Search News Titles" />
			<input type="submit" name="search" value="Search Now" />
		</form>

    </div>
</nav>