
<table class="table table-bordered table-hover">
    <thead>
    <tr>
		<th>Post Comment ID</th>
		<th>Comment Author</th>
		<th>Email</th>
		<th>Comment Content</th>
		<th>Comment Status</th>
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php  allComments(); ?>
    <?php  deleteComment(); ?>
    </tbody>
</table>