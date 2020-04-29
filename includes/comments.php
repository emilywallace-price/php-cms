<?php
    if (isset($_POST['create_comment'])) {
        $the_post_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];

        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
        $query .= "VALUES ( $the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

        $create_comment_query = mysqli_query($connection, $query);
        if (!$create_comment_query) {
			die('QUERY FAILED' . mysqli_error($connection));
        }
    }
?>

<div class="well">
    <h4>Leave a Comment:</h4>
    <form action="#" method="post" role="form">
        <div class="form-group">
            <label for="Author">Author</label>
            <input type="text" name="comment_author" class="form-control">
        </div>
        <div class="form-group">
            <label for="Author">Email</label>
            <input type="email" name="comment_email" class="form-control">
        </div>
        <div class="form-group">
            <label for="comment">Your Comment</label>
            <textarea name="comment_content" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus
        odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
        Donec lacinia congue felis in faucibus.
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras
                purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
    </div>
</div>