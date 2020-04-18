<?php include "includes/admin_header.php" ?>

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
						<form action="">
							<div class="form-group">
								<label for="cat_title">Add a Category</label>
								<input type="text" name="cat_title" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-info" value="Add Category">
							</div>
						</form>
					</div>
					<div class="col-xs-6">
						<table class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>ID</th>
								<th>Category Title</th>
							</tr>
							</thead>
							<tbody>
                            <?php
                                $query = "SELECT * fROM categories";
                                $display_categories_query = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($display_categories_query)) {
                                    $cat_id = $row['id'];
                                    $cat_title = $row['cat_title'];
                                    echo '<tr>';
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo '</tr>';
                                }
                            ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
