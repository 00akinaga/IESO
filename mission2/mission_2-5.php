<?php

if( isset( $_POST[ 'name' ]) && isset( $_POST['comment'] )&&!isset($_POST['change']) ){//POSTにフォームデータが送信されているか？
    if($_POST[ 'name' ]==""||$_POST['comment'==""]){
        echo '名前かコメントの入力がされていません<br>';
        echo '<a href="mission_2-5.php">戻る</a>';
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
    for($i=0;$i<count($file);$i++){
        if( preg_match($string, $file[$i]) ){
            $deleteLineNumber = $i;
            break;
        }
    }
    unset($file[$deleteLineNumber]);
    file_put_contents($filename, $file);
}

if(isset($_POST['change'])&&isset($_POST['comment'])){
    echo 'test1';
    $filename = 'kadai2-2.txt';
    $file   = file($filename);
    for($i=0;$i<count($file);$i++){
    $lineArray =  explode("<>",$file[$i]);
    if($lineArray[0]==$_POST[ 'change' ]){  
        $file[$i] = $lineArray[0].'<>'.$lineArray[1].'<>'.$_POST['comment'].'<>'.$lineArray[3];
        break;
    }//END if($lineArray[0]==$_POST[ 'changeNumber' ])  
    }//END for($i=0;$i<count($file);$i++)
    file_put_contents($filename, $file);
}

?>

<html>
<head><title>mission_2-5</title></head>
<body>
<p><font size="5">掲示板システム</font></p>
<form action="./mission_2-5.php" method="POST">
名前　　：<input type="text" name="name"/><br>
<?php
if( isset( $_POST[ 'changeNumber' ])){
    $filename = 'kadai2-2.txt';
    $file   = file($filename);
    for($i=0;$i<count($file);$i++){
    $lineArray =  explode("<>",$file[$i]);
    if($lineArray[0]==$_POST[ 'changeNumber' ]){  
        echo '<input type="hidden" name="change" value ='.$_POST[ 'changeNumber' ].'  />';
        echo 'コメント：<input type="text" name="comment" value ="'.htmlspecialchars($lineArray[2]).'" /><br>';
        break;
    }//END if($lineArray[0]==$_POST[ 'changeNumber' ])  
    }//END for($i=0;$i<count($file);$i++)
    if($i==count($file))echo 'コメント：<input type="text" name="comment"/><br>※その番号のコメントは存在しません<br>';
    }else{
    echo 'コメント：<input type="text" name="comment"/><br>';
    }
?>
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
<form action="./mission_2-5.php" method="POST">
削除したいコメント番号を入力<br>
<input type="number" name="deleteNumber" min="1">
<input type="submit" value="送信"/><br>
</form>
<form action="./mission_2-5.php" method="POST">
編集したいコメント番号を入力<br>
<input type="number" name="changeNumber" min="1">
<input type="submit" value="送信"/><br>
</form>
</body>
</html>