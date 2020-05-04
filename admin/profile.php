<?php include "includes/admin_header.php" ?>
<?php include "functions.php"; ?>

<div id="wrapper">
    <?php include "includes/nav.php" ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo $_SESSION['username'] ?>'s Profile
                    </h1>
                    <?php include 'includes/edit_profile.php'?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
