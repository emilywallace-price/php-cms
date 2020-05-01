<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Photo</th>
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
                            <a href='posts.php?delete={$user_id}' class='btn btn-danger' style='margin-bottom: 2rem;'>
                                <i class=\"glyphicon glyphicon-remove\"></i>
                            </a>
                    </td>";
            echo '</tr>';

        }
    ?>
<!--    --><?php // deleteUser(); ?>
    </tbody>
</table>