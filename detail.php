<?php   

$id = $_GET['id'];

if(empty($id)){
    exit('IDが不正です');
}



function dbConnect() {
    $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
    $user = 'blog_user2';
    $pass = 'yuji3385'; 
try{
    $dbh = new PDO($dsn,$user,$pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        //prepare を使う場合
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    
} catch(PDOException $e){
    echo '接続失敗' . $e->getMessage();
    exit();
};
return $dbh;
}

$dbh = dbConnect();
//SQL準備
$stmt = $dbh->prepare('SELECT * from blog Where id = :id');
$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
//SQL実行
$stmt->execute();
//結果を取得
$result = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($result);

if(!$result){
    exit('ブログがありません。');
}

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
    <p>カテゴリ:<?php echo $result['category'] ?></p>
    <hr>
    <p>本文:<?php echo $result['content'] ?></p>
    
</body>
</html>