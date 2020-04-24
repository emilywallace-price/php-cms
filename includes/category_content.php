<div class="col-md-8">
    <?php
        if (isset($_GET['category'])) {
            $post_category_id = $_GET['category'];
        }
        $query = "SELECT * fROM posts WHERE post_category_id = $post_category_id";
        $select_post_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_post_query)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = substr($row['post_content'],0, 150);
                $post_image = $row['post_image'];

        ?>
        <h2>
            <?php echo "$post_title" ?>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php echo "$post_author" ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date" ?></p>
        <hr>
        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
        <hr>
        <p>
            <?php echo "$post_content" ?>
        </p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
    <?php }  ?>
    <?php include "comments.php" ?>;
</div>
