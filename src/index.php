<?php
include 'views/layouts/header.php';

//require_once 'models/Post.php';

$pdo = new PDO("mysql:host=localhost;dbname=CMS_DB", "root", "password");
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Recent Posts</h1>


<?php
foreach ($posts as $post) {
    echo "<article>";
    echo "<h2><a href='/post.php?id={$post['id']}'>{$post['title']}</a></h2>";
    echo "<p>{$post['content']}</p>";
    echo "<p><small>Posted on {$post['created_at']}</small></p>";
    echo "</article>";
}
?>

<?php include 'views/layouts/footer.php'; ?>
