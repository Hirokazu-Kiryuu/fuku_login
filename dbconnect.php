<?php
#DB接続定数の読み込み
require_once './env.php';
#ローカル環境でエラーログ見なくて良くなる
ini_set('display_errors',true);

function connect()
{
#読み込んだ定数を変数に代入
  $host = DB_HOST;
  $db = DB_NAME;
  $user = DB_USER;
  $pass = DB_PASS;
#データベースへの接続情報を定義
  $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

  try {
    #PDOクラスインスタンス生成
    $pdo = new PDO($dsn,$user,$pass,[
      #PDOのオプション設定
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
      echo "接続成功です。";
    } catch(PDOExeption $e) {
      echo '接続失敗です!'.$e->getMessage();
      exit();
    }
  } 

  echo connect();

?>