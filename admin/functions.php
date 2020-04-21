<?php

    function all_categories()
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

    function create_category()
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

    function delete_category()
    {
        global $connection;
        if (isset($_GET['delete'])) {
            $delete_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE id = {$delete_cat_id}";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");
        }
    }

    function all_posts() {
        global $connection;
        $query = "SELECT * fROM posts";
        $display_posts_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($display_posts_query)) {
            $post_id = $row['id'];
            $post_category = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];

            echo '<tr>';
            echo "<td style='font-weight: bold;'>
                            <a href='posts.php?edit={$post_id}' class=''>{$post_title}</a>
                        </td>";
            echo "<td>{$post_category}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td>{$post_content}</td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td><img  src='../images/$post_image' class='img-responsive img-rounded' style='max-height: 100px; max-width:100px;' ></td>";
            echo "<td>
                            <a href='' class='btn btn-danger' style='margin-bottom: 2rem;'>
                                <i class=\"glyphicon glyphicon-remove\"></i>
                            </a>
                    </td>";
            echo '</tr>';
        }
    }