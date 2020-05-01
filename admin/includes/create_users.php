<?php
    if (isset($_POST['create_user'])) {

        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        $user_image =  $_FILES['user_image'] ['name'];
        $user_image_temp = $_FILES['user_image'] ['tmp_name'];
        $location = "../images/";
        move_uploaded_file($user_image_temp, $location.$user_image);

        $query = "INSERT INTO users(username, user_firstname, user_lastname,user_email,user_role,user_image) ";

        $query .= "VALUES('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}','{$user_image}') ";

        $create_user_query = mysqli_query($connection, $query);

        confirmSubmit($create_user_query);

        header("Location: users.php"); exit;
    }
?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="col-md-8">
		<div class="form-group ">
			<label for="username">Username</label>
			<input type="text" name="username" class="form-control">
		</div>
		<div class="form-group">
			<label for="user_firstname">Firstname</label>
			<input type="text" name="user_firstname" class="form-control">
		</div>
		<div class="form-group">
			<label for="user_lastname">Lastname</label>
			<input type="text" name="user_lastname" class="form-control">
		</div>
		<div class="form-group">
			<label for="post_content">Email</label>
			<input type="text" name="user_email" class="form-control">
		</div>
		<div class="form-group">
			<label for="user_role">Role</label>
			<input type="text" name="user_role" class="form-control">
		</div>
		<div class="form-group">
			<label for="user_image">Image</label>
			<input type="file" name="user_image" class="form-control">
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
		</div>
	</div>
</form>
