<?php
    if (isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];

        global $connection;
        $query = "SELECT * fROM posts WHERE id = $the_post_id";
        $edit_post_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($edit_post_query)) {
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
        }

        if (isset($_POST['update_post'])) {
        	$post_title = $_POST['post_title'];
            $post_author = $_POST['post_author'];
            $post_category_id = $_POST['post_category'];
            $post_content = $_POST['post_content'];
            $post_tags = $_POST['post_tags'];
            $post_status = $_POST['post_status'];

            $post_image =  $_FILES['post_image'] ['name'];
            $post_image_temp = $_FILES['post_image'] ['tmp_name'];
            $location = "../images/";
            move_uploaded_file($post_image_temp, $location.$post_image);

            if(empty($post_image)) {
                $query = "SELECT * FROM posts WHERE id = $the_post_id ";
                $select_image = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($select_image)) {
                    $post_image = $row['post_image'];
                }
            }

            $query = "UPDATE posts SET post_title = ' {$post_title} ', post_category_id = '{$post_category_id}',post_author = ' {$post_author}',post_content = ' {$post_content}', post_tags = ' {$post_tags} ', post_status = ' {$post_status} ',post_category_id = '{$post_category_id}', post_image = '{$post_image}'  WHERE id = {$the_post_id}  ";
            $update_post = mysqli_query($connection, $query);
            confirmSubmit($update_post);
            echo "<div class=\"alert alert-info\" role=\"alert\">Your post has been updated successful <a href='../post.php?p_id=$the_post_id'>view your post</a> </div>";

//            header("Location: posts.php"); exit;
        }
    }
    ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-8">
        <div class="form-group ">
            <label for="post_title">Post Title</label>
            <input type="text" name="post_title" class="form-control" value="<?php echo trim($post_title); ?>">
        </div>
        <div class="form-group">
            <label for="post_date">Category</label>
            <select name="post_category" id="" class="form-control">
                <?php
                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection,$query);

                    confirmSubmit($select_categories);

                    while($row = mysqli_fetch_assoc($select_categories )) {
                        $cat_id = $row['id'];
                        $cat_title = $row['cat_title'];
                        if($cat_id == $post_category_id) {
                            echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
                        } else {
                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="post_author">Author</label>
            <input type="text" name="post_author" class="form-control" value="<?php echo trim($post_author); ?>">
        </div>
        <div class="form-group">
            <label for="post_date">Date</label>
            <input type="date" name="post_date" class="form-control" value="<?php echo $post_date ?>">
        </div>
        <div class="form-group">
            <label for="post_content">Content</label>
            <textarea name="post_content" id="editor" class="form-control"><?php echo trim($post_content); ?></textarea>

        </div>
        <div class="form-group">
            <label for="post_date">Tags</label>
            <input type="text" name="post_tags" class="form-control" value="<?php echo trim($post_tags); ?>">
        </div>
        <div class="form-group">
            <label for="post_date">Post Status</label>
            <input type="text" name="post_status" class="form-control" value="<?php echo trim($post_status); ?>">
        </div>
        <div class="form-group">
            <label for="post_image">Image</label>
            <img  src='../images/<?php echo $post_image ?>' class='img-responsive img-rounded' style='margin-bottom:
            1rem;
            max-height:
            100px;
            max-width:100px;' >
            <input type="file" name="post_image" class="form-control" value="<?php echo $post_image ?>">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
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