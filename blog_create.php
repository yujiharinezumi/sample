<?php

require_once('blog.php');

ini_set('display_errors', "On");

$blogs = $_POST;

$blog = new Blog();
$blog->blogValidate($blogs);
$blog->blogCreate($blogs);


?>

<p><a href="/blog_app/index.php">戻る</a></p>