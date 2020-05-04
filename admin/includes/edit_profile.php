<?php //include "includes/admin_header.php" ?>
<?php

    if(isset($_SESSION['username'])) {

        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}' ";

        $select_user_profile_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_user_profile_query)) {

            $user_id = $row['id'];
            $username = $row['username'];
            $user_password= $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role= $row['user_role'];
        }
        if (isset($_POST['update_profile'])) {
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
                $query = "SELECT * FROM users WHERE username = $username ";
                $select_image = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($select_image)) {
                    $user_image = $row['user_image'];
                }
            }
            $query = "UPDATE users SET username = '{$username} ', user_firstname = '{$user_firstname}',user_lastname = ' {$user_lastname}',user_email = ' {$user_email}', user_role = ' {$user_role} ', user_image = '{$user_image}' WHERE username = '{$username}'  ";
            $update_user = mysqli_query($connection, $query);
            confirmSubmit($update_user);
            header("Location: profile.php"); exit;
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
			<label for="user_password">Password</label>
			<input type="password" name="user_password" class="form-control" value="<?php echo $user_password ?>">
		</div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
        </div>
    </div>
</form>
