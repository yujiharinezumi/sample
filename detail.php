<?php   

//require onceを使う
require_once('blog.php');
//name spaceを使う
//useを使う

$blog = new Blog();


$id = $_GET['id'];

$result = $blog->getById($_GET['id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ詳細</title>
</head>
<body>
    <h2>ブログ詳細</h2>
    <h3>タイトル:<?php echo $result['title'] ?></h3>
    <p>投稿日時:<?php echo $result['post_at'] ?></p>
    <p>カテゴリ:<?php echo $blog->setCategoryByName($result['category']) ?></p>
    <hr>
    <p>本文:<?php echo $result['content'] ?></p>
    
</body>
</html>