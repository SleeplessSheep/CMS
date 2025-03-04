<?php include 'layouts/header.php'; ?>
<h2>Create a New Post</h2>
<form action="/api/create_post" method="POST">
    <input type="text" name="title" placeholder="Post Title" required><br>
    <textarea name="content" placeholder="Write your post here..." required></textarea><br>
    <button type="submit">Publish</button>
</form>
<?php include 'layouts/footer.php'; ?>
