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
