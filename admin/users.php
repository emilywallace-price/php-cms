<?php include "includes/admin_header.php" ?>
<?php include "functions.php"; ?>

<div id="wrapper">

    <?php include "includes/nav.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
						<small><?php echo $_SESSION['username'] ?></small>
					</h1>
                    <?php
                    if (isset($_GET['source'])){
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case 'create_user';
                        include "includes/create_users.php";
                        break;

                        case 'edit_user';
                        include "includes/edit_users.php";
                        break;

                        default:
                        include "includes/all_users.php";
                    }

						?>
                    </div>
                </div>
            </div>
        </div>
    </div>


