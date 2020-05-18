<div class="col-md-8">
    <?php
        $query = "SELECT * fROM posts";
        $select_all_categories_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                $post_id = $row['id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = substr($row['post_content'],0, 150);
                $post_image = $row['post_image'];
                $post_status = $row['post_status'];
        ?>
        <h2>
            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo "$post_title" ?></a>
        </h2>
        <p class="lead">
            by <?php echo "$post_author" ?>
        </p>
        <p>
            <span class="glyphicon glyphicon-time"></span>
            Posted on <?php echo "$post_date" ?>
        </p>
        <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>"> <img class="img-responsive" src="images/<?php echo $post_image ?>" alt=""></a>
                <button type="button" class="btn btn-primary" style="margin-top: 5px; float: right;">
                    <?php
                        $query = "SELECT * FROM comments WHERE comment_post_id = '$post_id' AND comment_status = 'approved' ORDER BY id DESC";
                        $select_all_comments = mysqli_query($connection,$query);
                        $comment_count = mysqli_num_rows($select_all_comments);
                        echo  "<div class='badge badge-light'>{$comment_count}</div> comments"
                    ?>
                </button>
                <hr>
        <p>
            <?php echo "$post_content" ?>
        </p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
    <?php } ?>
</div>