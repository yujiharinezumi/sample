<?php

// namespace Blog\Dbc;

//関数一つに一つの機能のみ持たせる
//1,データベースに接続する　引数：なし　返り値：接続結果
//2.データを取得する 引数：なし　返り値：取得したデータ
//3.カテゴリー名を表示 引数：数字　戻り値：カテゴリーの文字列


Class Dbc {

    protected $table_name;

    protected function dbConnect() {
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

    public function  getAll(){
        // データベース接続する関するを使用する
            $dbh = $this->dbConnect();
            //SQLの準備
            $sql = "SELECT * from $this->table_name";
            //SQLの実行
            $stmt = $dbh->query($sql);
            //SQLの結果を受け取る
            $result = $stmt->fetchall(PDO::FETCH_ASSOC);
            // var_dump($result);
            return $result;
            $dbh = null;
    }

    
    //引数は$id　返り値は$result

    public function getById($id){
        if(empty($id)){
            exit('IDが不正です');
        }
        
        $dbh = $this->dbConnect();
        //SQL準備
        $stmt = $dbh->prepare("SELECT * from $this->table_name Where id = :id");
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        //SQL実行
        $stmt->execute();
        //結果を取得
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // var_dump($result);
        
        if(!$result){
            exit('ブログがありません。');
        }
        return  $result;
    }

}


?>

