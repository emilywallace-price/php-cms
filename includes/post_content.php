<div class="col-md-8">
    <?php
        if (isset($_GET['p_id'])) {
            $post_id = $_GET['p_id'];
        }
        $query = "SELECT * fROM posts WHERE id = $post_id";
        $select_post_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_post_query)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
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
        <hr>
    <?php }  ?>

	<?php include "comments.php" ?>
</div>
