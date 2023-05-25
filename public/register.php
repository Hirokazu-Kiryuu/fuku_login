<?php
//エラーありきのバリデーション
//エラーメッセージを格納する
$err = [];

if(!$username = filter_input(INPUT_POST,'username')) {
//POSTされたusernameの値が空なら
  $err[] = "ユーザー名を記入してください";
}

if(!$email = filter_input(INPUT_POST,'email')) {
//POSTされたemailの値が空なら
  $err[] = "メールアドレスを記入してください";
}

$password = filter_input(INPUT_POST,'password');
if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)) {
  $err[] = "パスワードは英数字8文字以上100文字以下にして下さい";
}

$password_conf = filter_input(INPUT_POST,'password_conf');
//$passwordとpassword_confが等しいかチェック
if($password !== $password_conf) {
  $err[] = '確認用パスワードと異なっています。';
}

//エラー配列の中身が0ならば
if (count($err) === 0) {
  //ユーザーを登録する処理
  echo "hoge";
}
var_dump($err);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録完了画面</title>
</head>
<body>
<!-- $errの中身が1つ以上存在したら -->
  <?php if(count($err) > 0) : ?>
<!-- $errの中身をforeachで処理 -->
    <?php foreach($err as $e) : ?>
<!-- $eを吐き出す -->
      <p><?php echo $e ?></p>
    <?php endforeach;?>
<!-- $errの中身が0なら -->
  <?php else : ?>
    <p>ユーザー登録が完了しました。</p>
  <? endif;?>


  
  <a href="./signup_form.php">戻る</a>
  
</body>
</html>

