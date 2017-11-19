<?php
if( isset( $_POST[ 'name' ]) && isset( $_POST['comment'] ) ){//POSTにフォームデータが送信されているか？
    if($_POST[ 'name' ]==""||$_POST['comment'==""]){
        echo '名前かコメントの入力がされていません<br>';
        echo '<a href="mission_2-3.php">戻る</a>';
        exit;
    }
    $filename = 'kadai2-2.txt';
    $fp= fopen($filename,'a');
    $count = count( file( $filename ) );
    fwrite($fp,($count+1)."<>".htmlspecialchars($_POST[ 'name' ])."<>".htmlspecialchars($_POST[ 'comment' ])."<>".date('Y年m月d日G:i')."\n");
    fclose($fp);
    }
?>

<html>
<head><title>mission_2-3</title></head>
<body>

<form action="./mission_2-3.php" method="POST">
名前　　：<input type="text" name="name"/><br>
コメント：<input type="text" name="comment"/><br>
<input type="submit" value="送信"/>
<p>
<?php
$filename = 'kadai2-2.txt';
$fp= fopen($filename,'r');
$count=0;
while(!feof($fp)){
$txt[$count] = fgets($fp);
$count++;
}
fclose($fp);

for($i=0;$i<$count-1;$i++){
    list($number[$i], $name[$i], $comment[$i], $data[$i]) =  explode("<>", $txt[$i]);
    echo $number[$i].':'.$name[$i].':'.$comment[$i].':'.$data[$i].'<br>';
}

?>
<p>
</form>

</body>
</html>