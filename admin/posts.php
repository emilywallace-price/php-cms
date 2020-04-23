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
                        <small>Author</small>
                    </h1>
                    <?php
                    if (isset($_GET['source'])){
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case 'create_post';
                        include "includes/create_posts.php";
                        break;

                        case 'edit_post';
                        include "includes/edit_posts.php";
                        break;

                        default:
                        include "includes/all_posts.php";
                    }

						?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
