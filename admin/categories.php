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
					<div class="col-xs-6">
                        <?php create_category(); ?>
						<form action="" method="post">
							<div class="form-group">
								<label for="cat_title">Add a Category</label>
								<input type="text" name="cat_title" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-primary" value="Add Category">
							</div>
						</form>
						<?php
							if (isset($_GET['edit'])) {
								$cat_id = $_GET['edit'];
								include "includes/update_categories.php";
							}
						?>
					</div>
					<div class="col-xs-6">
						<table class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>ID</th>
								<th>Category Title</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
                            <?php all_categories(); ?>
							<?php delete_category(); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
