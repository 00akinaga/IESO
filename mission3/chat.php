<?php
session_start();
if( !isset($_SESSION['uid'] )) {
header("Location: logout.php", TRUE, 303);
exit;
}
header('Content-Type: text/html; charset=UTF-8');

function hsc($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

require_once("dbfunction.php");
$name = Getnamebyuid($_SESSION['uid']);

if( isset( $_POST[ 'comment' ]) ){
    if($_POST['comment']==''){
        echo 'コメントが空のまま送られています<br>';
        echo '<a href="chat.php">戻る</a>';
        exit;
    }
insertmessege($_SESSION['uid'],hsc($_POST['comment']));
}
if(isset($_POST['imagefile']) ){
 $upfile = $_FILES['upfile']['tmp_name'];
 $filename = $_FILES['upfile']['name'];
 
 if ($upfile==""){
  print("ファイルのアップロードができませんでした。<BR>");
  echo '<a href="chat.php">戻る</a>';
  exit;
 }
 $mime = substr($filename, strrpos($filename, '.') + 1);
 if($mime=="jpeg"||$mime=="png"||$mime=="gif")
 $imgdat = file_get_contents($upfile);
 $imgdat = mysql_real_escape_string($imgdat);
 insertimage($_SESSION['uid'],$imgdat,$mime);
}
if( isset( $_POST[ 'delete' ])){
    if(getuidbymid($_POST[ 'delete' ])!=$_SESSION['uid']){
    echo '選択された番号はあなたのコメントではありません<br>';
    echo '<a href="chat.php">戻る</a>';
    exit;
    }
    deletemessege($_POST[ 'delete' ]);
}

?>

<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
  <title>掲示板</title>
 </head>
 <body>
 <h1>掲示板システム</h1>
  <form action="chat.php" method="POST">
コメント：<input type="text" name="comment"/><br>
  <input type="submit" value="送信"/>
  </form>
<form action="chat.php" method="POST" enctype="multipart/form-data"><br>
画像パス：<INPUT type="file" name="upfile" ><BR>
<input type="submit" name ="imagefile"  value="送信"/><BR>
</form>
 <p>
 <?php  
 $dbcon = dbconnect();
 $sql = "SELECT * FROM Messeges3";
 $result = mysql_query($sql);
 if (!$result) {
    echo 'Could not run select query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
 }
 while ($data = mysql_fetch_array($result)) {
  if(!$data['image']){
  echo '<p>' . $data['mid'] . ':' . Getnamebyuid($data['uid']). ':' . $data['messege'] . ':' . $data['date'] ."</p>\n";
  }else{

    echo '<p>' . $data['mid'] . ':' . Getnamebyuid($data['uid']). '<br>';
    print("<img src=\"img_get.php?id=" . $data['mid'] . "\">");
    echo '<br>' . $data['date'] ."</p>";
    }
 }
 ?>
 </p>
<form action="chat.php" method="POST">
自分の削除したいコメント番号を入力<br>
<input type="number" name="delete" min="1">
<input type="submit" value="送信"/><br>
</form>

 <a href="logout.php">トップページに戻る</a>
 </body>
</html>