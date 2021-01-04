<?php

//関数一つに一つの機能のみ持たせる
//1,データベースに接続する　引数：なし　返り値：接続結果
//2.データを取得する 引数：なし　返り値：取得したデータ
//3.カテゴリー名を表示 引数：数字　戻り値：カテゴリーの文字列




function dbConnect() {
    $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
    $user = 'blog_user2';
    $pass = 'yuji3385'; 
try{
    $dbh = new PDO($dsn,$user,$pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    ]);
    
} catch(PDOException $e){
    echo '接続失敗' . $e->getMessage();
    exit();
};
return $dbh;
}


function  getAllBlog(){
    // データベース接続する関するを使用する
        $dbh = dbConnect();
        //SQLの準備
        $sql = 'SELECT * from blog';
        //SQLの実行
        $stmt = $dbh->query($sql);
        //SQLの結果を受け取る
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        // var_dump($result);
        return $result;
        $dbh = null;
}

//取得したデータの表示
$blogData = getAllBlog();

function setCategoryByName($category){
    if($category === '1'){
        return 'ブログ';
    }elseif($category === '2'){
        return '日常';
    }else{
        return 'その他';
    }
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