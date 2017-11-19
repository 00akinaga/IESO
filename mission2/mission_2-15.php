<?php
require_once("dbfunction.php");


if( isset( $_POST[ 'name' ]) && isset( $_POST['comment'] )&&isset( $_POST['pass'] )&&!isset($_POST['changeNumber'])){
    if($_POST[ 'name' ]==""||$_POST['comment'==""]){
        echo '名前かコメントの入力がされていません<br>';
        echo '<a href="mission_2-15.php">戻る</a>';
        exit;
    }
insertmessege($_POST[ 'name' ],$_POST['comment'],$_POST['pass']);
}

if( isset( $_POST[ 'deleteNumber' ])){
    if (!midcheak($_POST[ 'deleteNumber' ])){
    echo 'その番号は存在していません<br>';
    echo '<a href="mission_2-15.php">戻る</a>';
    exit;
    }
    if( !isset( $_POST[ 'passcheak' ])){
    echo '<form action="./mission_2-15.php" method="POST">';
    echo 'パスワードを入力してください<br>';
    echo '<input type="text" name="passcheak"/><br>';
    echo '<input type="hidden" name="deleteNumber" value ='.$_POST[ 'deleteNumber' ].'  />';
    echo '<input type="submit" value="送信"/>';
    echo '</form>';
    echo '<a href="mission_2-15.php">戻る</a>';
    exit;
    }
    if(!passcheak($_POST[ 'deleteNumber' ], $_POST[ 'passcheak' ])){
    echo 'パスワードが違います<br>';
    echo '<a href="mission_2-15.php">戻る</a>';
    exit;
    }
    deletemessege($_POST[ 'deleteNumber' ]);
}

if(isset($_POST['changeNumber'])&&isset($_POST['comment'])){
    if( !isset( $_POST[ 'passcheak' ])){
    echo '<form action="./mission_2-15.php" method="POST">';
    echo 'パスワードを入力してください<br>';
    echo '<input type="text" name="passcheak"/><br>';
    echo '<input type="hidden" name="changeNumber" value ='.$_POST[ 'changeNumber' ].'  />';
    echo '<input type="hidden" name="comment" value ='.$_POST[ 'comment' ].'  />';
    echo '<input type="submit" value="送信"/>';
    echo '</form>';
    echo '<a href="mission_2-15.php">戻る</a>';
    exit;
    }
    if(!passcheak($_POST[ 'changeNumber' ], $_POST[ 'passcheak' ])){
    echo 'パスワードが違います<br>';
    echo '<a href="mission_2-15.php">戻る</a>';
    exit;
    }
    updatemessege($_POST[ 'changeNumber' ],$_POST['comment']);
}
?>

<html>
<head><title>mission_2-15</title></head>
<body>
<p><font size="5">掲示板システム</font></p>
<form action="./mission_2-15.php" method="POST">
名前　　　：<input type="text" name="name"/><br>
<?php
$value = "";
if(isset($_POST['changeNumber'])&&!isset($_POST['comment'])){
    if (!midcheak($_POST[ 'changeNumber' ])){
    echo 'その番号は存在していません<br>';
    echo '<a href="mission_2-15.php">戻る</a>';
    exit;
    }
$value = getmessege($_POST[changeNumber]);
echo '<input type="hidden" name="changeNumber" value ="'.$_POST[ 'changeNumber' ].'"  />';
}
echo 'コメント　：<input type="text" name="comment" value="'.$value.'" /><br>';
?>
パスワード：<input type="text" name="pass"/><br>
<input type="submit" value="送信"/>
</form>
<p>
<?php showall_messeges(); ?>
</p>
<form action="./mission_2-15.php" method="POST">
削除したいコメント番号を入力<br>
<input type="number" name="deleteNumber" min="1">
<input type="submit" value="送信"/><br>
</form>
<form action="./mission_2-15.php" method="POST">
編集したいコメント番号を入力<br>
<input type="number" name="changeNumber" min="1">
<input type="submit" value="送信"/><br>
</form>
</body>
</html>