<?php

    function allCategories()
    {
        global $connection;
        $query = "SELECT * fROM categories";
        $display_categories_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($display_categories_query)) {
            $cat_id = $row['id'];
            $cat_title = $row['cat_title'];
            echo '<tr>';
            echo "<td>{$cat_id}</td>";
            echo "<td style='font-weight: bold;'>{$cat_title}</td>";
            echo "<td>
                            <a href='categories.php?delete={$cat_id}' class='btn btn-danger'>
                                <i class=\"glyphicon glyphicon-remove\"></i>
                            </a>
                            <a href='categories.php?edit={$cat_id}' class='btn btn-warning'>
                                <i class=\"glyphicon glyphicon-edit\"></i>
                            </a>
                    </td>";
            echo '</tr>';
        }
    }

    function createCategory()
    {
        global $connection;
        if (isset($_POST['submit'])) {
            $cat_title = $_POST['cat_title'];
            if ($cat_title == "" || empty($cat_title)) {
                echo "<p style='color: red;'>This field should not be empty, please try again!</p>";
            } else {
                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUE(' {$cat_title} ') ";

                $create_category_query = mysqli_query($connection, $query);

                if (!$create_category_query) {
                    die('QUERY FAILED' . mysqli_error($connection));
                }
            }
        }
    }

    function deleteCategory()
    {
        global $connection;
        if (isset($_GET['delete'])) {
            $delete_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE id = {$delete_cat_id}";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");
        }
    }

    function allPosts()
    {
        global $connection;
        $query = "SELECT * fROM posts";
        $display_posts_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($display_posts_query)) {
            $post_id = $row['id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_image = $row['post_image'];

            echo '<tr>';
            echo "<td style='font-weight: bold;'>
                            <a href='posts.php?source=edit_post&p_id={$post_id}' class=''>{$post_title}</a>
                        </td>";
            $query = "SELECT * FROM categories WHERE id = {$post_category_id} ";
            $select_categories_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['id'];
                $cat_title = $row['cat_title'];
                echo "<td>$cat_title</td>";

            }
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td>{$post_content}</td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td><img  src='../images/$post_image' class='img-responsive img-rounded' style='max-height: 100px; max-width:100px;' ></td>";
            echo "<td>
                            <a href='posts.php?delete={$post_id}' class='btn btn-danger' style='margin-bottom: 2rem;'>
                                <i class=\"glyphicon glyphicon-remove\"></i>
                            </a>
                    </td>";
            echo '</tr>';

            deletePost();
        }
    }

    function confirmSubmit($result)
    {
        global $connection;
        if (!$result) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }

    function deletePost()
    {
        global $connection;
        if (isset($_GET['delete'])) {
            $delete_post_id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE id = {$delete_post_id}";
            $delete_query = mysqli_query($connection, $query);
            header("Location: posts.php");
        }
    }

    function escape($string)
    {
        global $connection;
        return mysqli_real_escape_string($connection, trim($string));
    }

    function allComments()
    {
        global $connection;
        $query = "SELECT * fROM comments";
        $display_comments_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($display_comments_query)) {
            $comment_id = $row['id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_date = $row['comment_date'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];

            echo '<tr>';
            $query = "SELECT * FROM posts WHERE id = $comment_post_id ";
            $comment_post_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($comment_post_id)) {
                $post_id = $row['id'];
                $post_title = $row['post_title'];
                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</td>";
                echo "<td>{$comment_author}</td>";
                echo "<td>{$comment_email}</td>";
                echo "<td>{$comment_date}</td>";
                echo "<td>{$comment_content}</td>";
                echo "<td>{$comment_status}</td>";
                echo "<td>
                            <a href='comments.php?approve={$comment_id}' class='btn btn-success' style='margin: 10px;'>
                                <i class=\"glyphicon glyphicon-ok\"></i>
                            </a>
                    </td>";
                echo "<td>
                            <a href='comments.php?unapprove={$comment_id}' class='btn btn-warning' style='margin: 10px; '>
                                <i class=\"glyphicon glyphicon-remove\"></i>
                            </a>
                    </td>";
                echo "<td> 
                            <a href='comments.php?delete={$comment_id}' class='btn btn-danger' style='margin: 10px;'>
                                <i class=\"glyphicon glyphicon-trash\"></i>
                            </a>
                    </td>";
                echo '</tr>';
            }
        }

        function deleteComment()
        {
            global $connection;
            if (isset($_GET['delete'])) {

                $delete_comment_id = $_GET['delete'];
                $query = "DELETE FROM comments WHERE id = {$delete_comment_id}";
                $delete_query = mysqli_query($connection, $query);
                header("Location: comments.php");
            }
        }

        function unapproveComment()
        {
            global $connection;
            if (isset($_GET['unapprove'])) {

                $unapprove_comment_id = $_GET['unapprove'];
                $query = "UPDATE comments SET comment_status = 'unapproved' WHERE id = $unapprove_comment_id";
                $unapprove_query = mysqli_query($connection, $query);
                header("Location: comments.php");
            }
        }

        function approveComment()
        {
            global $connection;
            if (isset($_GET['approve'])) {

                $approve_comment_id = $_GET['approve'];
                $query = "UPDATE comments SET comment_status = 'approved' WHERE id = $approve_comment_id";
                $approve_query = mysqli_query($connection, $query);
                header("Location: comments.php");
            }
        }
    }