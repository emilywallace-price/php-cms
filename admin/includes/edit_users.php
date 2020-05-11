<?php
    if (isset($_GET['u_id'])) {
        $the_user_id = $_GET['u_id'];

        $query = "SELECT * fROM users WHERE id = $the_user_id";
        $edit_user_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($edit_user_query)) {
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];
        }

        if (isset($_POST['update_user'])) {
        	$username = $_POST['username'];
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $user_email = $_POST['user_email'];
            $user_role = $_POST['user_role'];

            $user_image =  $_FILES['user_image'] ['name'];
            $user_image_temp = $_FILES['user_image'] ['tmp_name'];
            $location = "../images/";
            move_uploaded_file($user_image_temp, $location.$user_image);

            if(empty($user_image)) {
                $query = "SELECT * FROM users WHERE id = $the_user_id ";
                $select_image = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($select_image)) {
                    $user_image = $row['user_image'];
                }
            }
            $query = "UPDATE users SET username = ' {$username} ', user_firstname = '{$user_firstname}',user_lastname = ' {$user_lastname}',user_email = ' {$user_email}', user_role = ' {$user_role} ', user_image = '{$user_image}'  WHERE id = {$the_user_id}  ";
            $update_post = mysqli_query($connection, $query);
            confirmSubmit($update_post);
            echo "<div class=\"alert alert-info\" role=\"alert\"> $username's has been updated successful</div>";

        }
    }
    ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-8">
        <div class="form-group ">
            <label for="post_title">Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
        </div>
        <div class="form-group">
            <label for="user_firstname">Firstname</label>
            <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname ?>">
        </div>
        <div class="form-group">
            <label for="user_lastname">Lastname</label>
            <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname ?>">
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <textarea name="user_email" class="form-control"><?php echo $user_email ?></textarea>
        </div>
        <div class="form-group">
            <label for="user_role">Role</label>
			<select name="user_role" id="" class="form-control">
				<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                <?php
                    if($user_role == 'admin') {
                        echo "<option value='subscriber'>subscriber</option>";
                    } else {
                        echo "<option value='admin'>admin</option>";
                    }
                ?>
			</select>
        </div>
        <div class="form-group">
            <label for="user_image">Image</label>
            <img  src='../images/<?php echo $user_image ?>' class='img-responsive img-rounded' style='margin-bottom:
            1rem;
            max-height:
            100px;
            max-width:100px;' >
            <input type="file" name="user_image" class="form-control" value="<?php echo $user_image ?>">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
        </div>
    </div>
</form>
