<!DOCTYPE html>
<html lang = "ja">
<head>
<html>
<body>

<form action="./mission_1-5.php" method="POST">
<input type="text" name="string"/>
<input type="submit" value="送信"/>
</form>

<?php
if( isset( $_POST[ 'string' ] ) ){//POSTにフォームデータが送信されているか？
    //echo '入力したデータ：'.$_POST['string'];
    $filename = 'kadai5.txt';
    $fp= fopen($filename,'a');
    fwrite($fp,$_POST['string']."\n");
    fclose($fp);
}
?>

</body>
</html>