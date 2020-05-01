<a href="posts.php?source=create_post"
     class="btn btn-success"
     style="margin-bottom: 1rem;">
        Create post
</a>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
        <th>Content</th>
        <th>Tags</th>
        <th>Comment Count</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php  allPosts(); ?>
    <?php  deletePost(); ?>
    </tbody>
</table>