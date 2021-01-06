<?php
require_once('blog.php');
$blog = new Blog();
$id = $_GET['id'];
$result = $blog->delete($_GET['id']);

?>

<p><a href="/blog_app/index.php">戻る</a></p>