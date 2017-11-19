<?php
header('Content-Type: text/html; charset=UTF-8');
require_once("dbfunction.php");
if(isset($_POST['email'])&&isset($_POST['pass'])){
 $uid=Getuid_by_pass_email($_POST['email'],$_POST['pass']);
 if($uid==-1){
 echo "パスワードかIDが違います";
 echo '<a href="toppage.html">トップページに戻る</a>';
 exit;
 }else{
 session_start();
 $_SESSION['uid']=$uid;
 header("Location:chat.php", TRUE, 303);
 }
}

?>

<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
  <title>ログイン</title>
 </head>
 <body>
  <h1>ログイン画面</h1>
  <form action="login.php" method="post">
   メールアドレス<input type="text" name="email"><br>
   パスワード<input type="text" name="pass"><br>
   <input type="submit" value="送信"><br>
  </form>
 <p><a href="toppage.html">トップページに戻る</a></p>
 </body>
</html>