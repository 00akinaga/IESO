<?php
ini_set( 'display_errors', 1 );
header('Content-Type: text/html; charset=UTF-8');
require_once("dbfunction.php");

if( isset( $_POST[ 'email' ]) && isset( $_POST['name'] )&&isset( $_POST['pass'] )){
    if($_POST[ 'email' ]==""||$_POST['name']==""||$_POST['pass']==""){
        echo '入力されていない情報があります<br>';
        echo '<a href="usereg.php">戻る</a>';
        exit;
    }
$uid=db_usereg($_POST[ 'name' ],$_POST[ 'email' ],$_POST[ 'pass' ]);

mb_language("Japanese");
mb_internal_encoding("UTF-8");

$to      = $_POST[ 'email' ];
$subject = '仮登録';
$message = '以下のURLに行くと本登録を完了します'."\n".'http://co-565.it.99sv-coco.com/mission3/usereg_finish.php?uid='.Getuid_by_pass_email($_POST[ 'email' ],$_POST[ 'pass' ]);

mb_send_mail($to, $subject, $message);
//echo 'http://co-565.it.99sv-coco.com/mission3/usereg_finish.php?uid='.Getuid_by_pass_email($_POST[ 'email' ],$_POST[ 'pass' ]);
echo '仮登録を行いました<br>';
echo 'メールアドレス:'.$_POST[ 'email' ].'<br>';
echo 'ユーザネーム  :'.$_POST[ 'name' ].'<br>';
echo 'パスワード　　:*****<br>';
echo 'メールを送信しますので送られたメールから本登録をよろしくお願いします<br>';
echo '<a href="toppage.html">トップページに戻る</a>';
exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
  <title>トップページ</title>
 </head>
 <body>
  <h1>ユーザ登録</h1>
  <form action="usereg.php" method="post">
  メールアドレス<input type="text" name="email"><br>
  ユーザネーム<input type="text" name="name"><br>
  パスワード<input type="text" name="pass"><br>
  <input type="submit" value="送信"><br>
  </form>
  <p><a href="toppage.html">トップページに戻る</a></p>
 </body>
</html>