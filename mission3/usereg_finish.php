<?php
header('Content-Type: text/html; charset=UTF-8');
require_once("dbfunction.php");
$dbcon = dbconnect();
$uid = $_GET['uid'];
$sql = "UPDATE Usertable SET state = 1 where uid = $uid";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run insert query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
  <title>登録完了</title>
 </head>
 <body>
  <h1>ユーザ登録を完了しました</h1>
　<p><a href="login.php">掲示板を利用する</a></p>
  <p><a href="toppage.html">トップページに戻る</a></p>
 </body>
</html>