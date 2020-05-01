<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Photo</th>
        <th>Make Admin</th>
        <th>Make Author</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $query = "SELECT * fROM users";
        $display_users_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($display_users_query)) {
            $user_id = $row['id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];

            echo '<tr>';
            echo "<td style='font-weight: bold;'>
                            <a href='users.php?source=edit_user&u_id={$user_id}' class=''>{$username}</a>
                        </td>";
            echo "<td>{$user_firstname} {$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>{$user_role}</td>";
            echo "<td><img  src='../images/$user_image' class='img-responsive img-rounded' style='max-height: 100px; max-width:100px;' ></td>";
            echo "<td>
                            <a href='users.php?admin={$user_id}' class='btn btn-success' style='margin-bottom: 2rem;'>
                                <i class=\"glyphicon glyphicon-ok\"></i>
                            </a>
                    </td>";
            echo "<td>
                            <a href='users.php?author={$user_id}' class='btn btn-warning' style='margin-bottom: 2rem;'>
                                <i class=\"glyphicon glyphicon-ok\"></i>
                            </a>
                    </td>";
            echo "<td>
                            <a href='users.php?delete={$user_id}' class='btn btn-danger' style='margin-bottom: 2rem;'>
                                <i class=\"glyphicon glyphicon-remove\"></i>
                            </a>
                    </td>";
            echo '</tr>';

        }

        if (isset($_GET['delete'])) {

            $delete_user_id = $_GET['delete'];
            $query = "DELETE FROM users WHERE id = {$delete_user_id}";
            $delete_query = mysqli_query($connection, $query);
            header("Location: users.php");
        }

        if (isset($_GET['admin'])) {

            $make_admin_id = $_GET['admin'];
            $query = "UPDATE users SET user_role = 'admin' WHERE id = $make_admin_id";
            $admin_query = mysqli_query($connection, $query);
            header("Location: users.php");
        }

        if (isset($_GET['author'])) {

            $make_author_id = $_GET['author'];
            $query = "UPDATE users SET user_role = 'author' WHERE id = $make_author_id";
            $author_query = mysqli_query($connection, $query);
            header("Location: users.php");
        }
    ?>
    </tbody>
</table>