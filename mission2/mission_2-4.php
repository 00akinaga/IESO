<?php
if( isset( $_POST[ 'name' ]) && isset( $_POST['comment'] ) ){//POSTにフォームデータが送信されているか？
    if($_POST[ 'name' ]==""||$_POST['comment'==""]){
        echo '名前かコメントの入力がされていません<br>';
        echo '<a href="mission_2-4.php">戻る</a>';
        exit;
    }
    $filename = 'kadai2-2.txt';
    $fp= fopen($filename,'a');
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);//配列の各要素に改行を追加しない：空行を読み飛ばす
    list($Fnumber, $Fname, $Fcomment, $Fdata) =  explode("<>", array_pop($lines));
    fwrite($fp,($Fnumber+1)."<>".$_POST[ 'name' ]."<>".$_POST[ 'comment' ]."<>".date('Y年m月d日G:i')."\n");
    fclose($fp);
}

if( isset( $_POST[ 'deleteNumber' ])){
    $filename = 'kadai2-2.txt';
    $file   = file($filename);
    $string = '/^'.$_POST[ 'deleteNumber' ].'<>/';
    for($i=0;i<count($file);$i++){
        if( preg_match($string, $file[$i]) ){
            $deleteLineNumber = $i;
            break;
        }
    }
    unset($file[$deleteLineNumber]);
    file_put_contents($filename, $file);
}

?>

<html>
<head><title>mission_2-4</title></head>
<body>

<form action="./mission_2-4.php" method="POST">
名前　　：<input type="text" name="name"/><br>
コメント：<input type="text" name="comment"/><br>
<input type="submit" value="送信"/>
</form>
<p>
<?php
touch('kadai2-2.txt');
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
    echo $number[$i].':'.htmlspecialchars($name[$i]).':'.htmlspecialchars($comment[$i]).':'.$data[$i].'<br>';
}
?>
</p>
<form action="./mission_2-4.php" method="POST">
削除したいコメント番号を入力<br>
<input type="number" name="deleteNumber" min="1">
<input type="submit" value="送信"/>
</form>
</body>
</html>