<?php




//フォームから値を渡す
//フォームから値を受け取る
//バリデーションする
//トランザクションを追加する
//データにDBを登録する



require_once('blog.php');

ini_set('display_errors', "On");

$blog = new Blog();
// var_dump($dbc);

// use Blog\Dbc;
//取得したデータの表示
$blogData = $blog->getAll();

function h($s){
    return htmlspecialchars($s,ENT_QUOTES,"UTF-8");    
}

?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ一覧</title>
</head>
<body>
<h2>ブログ一覧</h2>
<p><a href="/blog_app/form.php">新規作成</a></p>
    <table>
        <tr>
            <th>タイトル</th>
            <th>カテゴリー</th>
            <th>投稿日時</th>

        </tr>
        <?php foreach($blogData as $column): ?>
        <tr>
            <td><?php echo h($column['title']) ?></td>
            <td><?php echo h($blog->setCategoryByName($column['category'])) ?></td>
            <td><?php echo h($column['post_at']) ?></td>
            <td><a href="/blog_app/detail.php?id=<?php echo $column['id'] ?>">詳細</td>
            <td><a href="/blog_app/update_form.php?id=<?php echo $column['id'] ?>">編集</td>
            <td><a href="/blog_app/delete.php?id=<?php echo $column['id'] ?>">削除</td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>