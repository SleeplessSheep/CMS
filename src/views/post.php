<?php include 'layouts/header.php'; ?>
<?php
require_once '../models/Post.php';

$pdo = new PDO("mysql:host=localhost;dbname=CMS_DB", "root", "password");
$post_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$post_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    echo "<h2>Post not found</h2>";
} else {
    echo "<h1>{$post['title']}</h1>";
    echo "<p>{$post['content']}</p>";
    echo "<p><small>Posted on {$post['created_at']}</small></p>";
}
?>
<a href="/index.php">Back to Home</a>
<?php include 'layouts/footer.php'; ?>
