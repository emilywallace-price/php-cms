<?php
    if (isset($_POST['create_post'])) {

        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_date = date('d-m-y');
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_status = $_POST['post_status'];
//        $post_comment_count = 4;

        $post_image =  $_FILES['post_image'] ['name'];
        $post_image_temp = $_FILES['post_image'] ['tmp_name'];
        $location = "../images/";
        move_uploaded_file($post_image_temp, $location.$post_image);

        $query = "INSERT INTO posts(post_category_id,post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";

        $query .= "VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') ";

        $create_post_query = mysqli_query($connection, $query);

        confirmSubmit($create_post_query);

        header("Location: posts.php"); exit;
    }
?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="col-md-8">
		<div class="form-group ">
			<label for="post_title">Post Title</label>
			<input type="text" name="post_title" class="form-control">
		</div>
		<div class="form-group">
			<label for="post_category_id">Category</label>
<!--			<input type="number" name="post_category_id" class="form-control">-->
			<select name="post_category_id" id="" class="form-control">
                <?php
                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_categories )) {
                        $cat_id = $row['id'];
                        $cat_title = $row['cat_title'];
                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
                    }
                ?>
			</select>
		</div>
		<div class="form-group">
			<label for="post_author">Author</label>
			<input type="text" name="post_author" class="form-control">
		</div>
		<div class="form-group">
			<label for="post_date">Date</label>
			<input type="date" name="post_date" class="form-control">
		</div>
		<div class="form-group">
			<label for="post_content">Content</label>
			<textarea name="post_content" class="form-control" id="editor"></textarea>
		</div>
		<div class="form-group">
			<label for="post_tags">Tags</label>
			<input type="text" name="post_tags" class="form-control">
		</div>
		<div class="form-group">
			<label for="post_status">Post Status</label>
			<input type="text" name="post_status" class="form-control">
		</div>
		<div class="form-group">
			<label for="post_image">Image</label>
			<input type="file" name="post_image" class="form-control">
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
		</div>
	</div>
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>