<?php
createUser();
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
			<select name="user_role" class="form-control">
				<option value="subcriber">Subscriber</option>
				<option value="admin">Admin</option>
			</select>
		</div>
		<div class="form-group">
			<label for="user_image">Image</label>
			<input type="file" name="user_image" class="form-control">
		</div>
		<div class="form-group">
			<label for="post_content">Password</label>
			<input type="password" name="user_password" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
		</div>
	</div>
</form>
