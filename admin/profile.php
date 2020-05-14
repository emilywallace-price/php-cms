<?php include "includes/admin_header.php" ?>

<div id="wrapper">
    <?php
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $query = "SELECT * FROM users WHERE username = '{$username}' ";
            $select_user_profile = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($select_user_profile)) {
                $user_id = $row['id'];
                $username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_password = $row['user_password'];
            }
        }
    ?>
	<?php include "includes/nav.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small><?php echo $_SESSION['username'] ?></small>
                    </h1>
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
                                <input name="user_email" class="form-control" value="<?php echo $user_email ?>">
                            </div>
							<div class="form-group">
								<label for="post_image">Image</label>
								<img  src='../images/<?php echo $user_image ?>' class='img-responsive img-rounded'
									  style='margin-bottom:
            1rem;
            max-height:
            100px;
            max-width:100px;' >
								<input type="file" name="post_image" class="form-control" value="<?php echo $user_image
								?>">
							</div>
               				<div class="form-group">
								<label for="user_password">Password</label>
								<input type="password" class="form-control" name="user_password" value="<?php echo
	$user_password ?>">
							</div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="update_profile" value="Update User">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
