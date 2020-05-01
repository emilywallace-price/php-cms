<?php include "includes/admin_header.php" ?>

<body>

<div id="wrapper">

    <?php include "includes/nav.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small><?php echo $_SESSION['username'] ?></small>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>

</html>
