<div class="col-md-4">

    <?php
    if (isset($_SESSION['username'])){ ?>
        <div class="well">
        <h4 class="text-center">
            <?php  echo $_SESSION['username']; ?> you are logged in
        </h4>
        </div>
    <?php }else{
    ?>
    <div class="well">
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" style="margin-bottom: 1rem;"
                       placeholder="Username">
            </div>
            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="input-group-btn">
                            <button name="login" class="btn btn-primary" type="submit">
                                <span >Log in</span>
                        </button>
            </span>
            </div>
           <div style="margin-top: 10px;">
               <small>
                   <a  href="../registration.php" >Create an account here</a>
               </small>
           </div>
        </form>
    </div>
<?php } ?>
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
            </span>
            </div>
        </form>
    </div>
    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                        $query = "SELECT * fROM categories";
                        $select_categories_query = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($select_categories_query)) {
                            $cat_id = $row['id'];
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- Side Widget Well -->
<!--    --><?php
//        include "includes/widget.php";
//    ?>

</div>