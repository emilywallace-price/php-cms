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

<?php
    $the_post_id = $_GET['p_id'];

    $query = "SELECT * FROM comments WHERE comment_post_id = '$the_post_id' AND comment_status = 'approved' ORDER BY id DESC ";
	$select_comment_query = mysqli_query($connection, $query);
	if (!$select_comment_query) {
		die('QUERY FAILED' . mysqli_error($connection));
	}
	while ($row = mysqli_fetch_array($select_comment_query)) {
		$comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_date = $row['comment_date'];
?>
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $comment_author ?>
            <small><?php echo $comment_date ?></small>
        </h4>
        <?php echo $comment_content ?>
    </div>
</div>
 <?php   } ?>
