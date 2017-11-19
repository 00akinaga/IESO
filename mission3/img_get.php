<?php

require_once("dbfunction.php");
$dbcon = dbconnect();
 $sql = "SELECT * FROM Messeges3";
 $result = mysql_query($sql);

$mid =  $_GET['id'];
// 画像データ取得
$sql = "SELECT image,mime FROM Messeges3 WHERE mid = ' $mid'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

// 画像ヘッダとしてjpegを指定（取得データがjpegの場合）
header("Content-Type: image/$row[1]");

// バイナリデータを直接表示

echo $row[0];

?>