<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Photo</th>
        <th>Make Admin</th>
        <th>Make Author</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php  allUsers(); ?>
    <?php  deleteUser(); ?>
    <?php  isAdmin(); ?>
    <?php  isSubscriber(); ?>

    </tbody>
</table>