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
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
    <?php }  ?>
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>
</div>
