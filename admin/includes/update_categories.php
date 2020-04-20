
	<form action="" method="post">
							<div class="form-group">
								<?php
                                    if(isset($_GET['edit'])) {
                                        $edit_cat_id = $_GET['edit'];

                                        $query = "SELECT * FROM categories WHERE id = $edit_cat_id";
                                        $edit_query = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($edit_query)) {
                                        $cat_id = $row['id'];
                                        $cat_title = $row['cat_title'];
                                        ?>
								<label for="cat_title">Edit Category</label>
										<input type="text" name="cat_title" class="form-control"
											   style="margin-bottom: 1em;"
											   value="<?php if
										(isset($cat_title)) { echo $cat_title; } ?>">
							<div class="form-group">
								<input type="submit" name="update_cat" class="btn btn-default"
									   style="border-color:#2e6da4;
									   				border-width: medium;
													font-weight: bold;"
									   value="Update
								Category">
							</div>
                                    <?php } } ?>
								<?php
									if(isset($_POST['update_cat'])) {
										$update_cat_title = $_POST['cat_title'];

										$query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE id = {$cat_id} ";
										$update_query = mysqli_query($connection, $query);
                                        header("Location: categories.php");
                                        if(!$update_query) {
											die("QUERY FAILED" . mysqli_error($connection));
										}
									}
								?>
							</div>
						</form>