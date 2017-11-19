<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset="UTF-8">
<html>
<body>
フォームにデータを送信<br>
<form action="./mission_1-4.php" method="POST">
<input type="text" name="string"/>
<input type="submit" value="送信"/>
</form>

<?php
if( isset( $_POST[ 'string' ] ) ){//POSTにフォームデータが送信されているか？
    echo '入力したデータ：'.$_POST['string'];
}
?>

</body>
</html>