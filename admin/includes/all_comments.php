<table class="table table-bordered table-hover">
    <thead>
    <tr>
		<th>Post Comment ID</th>
		<th>Comment Author</th>
		<th>Email</th>
		<th>Date</th>
		<th>Comment</th>
		<th>Status</th>
		<th>In Response too</th>
		<th>Approve</th>
		<th>Un-approve</th>
		<th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php  allComments(); ?>
    <?php  deleteComment(); ?>
    </tbody>
</table>