<?php
if( isset( $_POST[ 'name' ]) && isset( $_POST['comment'] ) ){//POSTにフォームデータが送信されているか？
    $filename = 'kadai2-2.txt';
    $fp= fopen($filename,'a');
    $count = count( file( $filename ) );
    fwrite($fp,($count+1)."<>".htmlspecialchars($_POST[ 'name' ])."<>".htmlspecialchars($_POST[ 'comment' ])."<>".date('Y年m月d日G:i')."\n");
    fclose($fp);
    }
?>

<html>
<head><title>mission_2-2</title></head>
<body>

<form action="./mission_2-2.php" method="POST">
名前　　：<input type="text" name="name"/><br>
コメント：<input type="text" name="comment"/><br>
<input type="submit" value="送信"/>
</form>

</body>
</html>