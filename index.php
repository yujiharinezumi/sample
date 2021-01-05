<?php




//フォームから値を渡す
//フォームから値を受け取る
//バリデーションする
//トランザクションを追加する
//データにDBを登録する



require_once('dbc.php');

// use Blog\Dbc;
//取得したデータの表示
$blogData = getAllBlog();


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
            <th>No.</th>
            <th>タイトル</th>
            <th>カテゴリー</th>
        </tr>
        <?php foreach($blogData as $column): ?>
        <tr>
            <td><?php echo $column['id'] ?></td>
            <td><?php echo $column['title'] ?></td>
            <td><?php echo setCategoryByName($column['category']) ?></td>
            <td><a href="/blog_app/detail.php?id=<?php echo $column['id'] ?>">詳細</td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>