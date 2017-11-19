<?php
function dbconnect(){

$dbserver = "サーバ名";
$dbuser = "ユーザ名";
$dbpass = "パスワード";
$dbname = "データベース名";

$dbcon = mysql_connect($dbserver,$dbuser,$dbpass);
if (!$dbcon) {
    die(mysql_error());
}

$db_selected = mysql_select_db($dbname,$dbcon);

return $dbcon;
}

function showall_messeges(){
$dbcon = dbconnect();
$result = mysql_query("SELECT * FROM Messeges",$dbcon);
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
while ($data = mysql_fetch_array($result)) {
  echo '<p>' . $data['MID'] . ':' . $data['name'] . ':' . $data['messege'] . ':' . $data['date'] ."</p>\n";
}

}

function insertmessege($name,$messege,$pass){
$dbcon = dbconnect();
$date = date('Y年m月d日G:i');
$sql = "INSERT INTO Messeges (name,messege,date,pass) VALUES ('$name','$messege','$date','$pass')";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run insert query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}

}

function midcheak($mid){
$dbcon = dbconnect();
$sql = "SELECT * FROM Messeges WHERE MID=$mid";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run insert query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}

$count = mysql_num_rows($result);
if (!$count) {
    return FALSE;
}
return TRUE;
}

function passcheak($mid,$pass){
$dbcon = dbconnect();
$sql = "SELECT * FROM Messeges WHERE MID=$mid";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run insert query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
$data = mysql_fetch_array($result);
if($data['pass']==$pass)return TRUE;
//echo $data['pass'].'='.$pass;
return FALSE;
}

function deletemessege($mid){
$dbcon = dbconnect();
$sql = "DELETE FROM Messeges WHERE MID = $mid";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run delete query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
}

function updatemessege($mid,$messege){
$dbcon = dbconnect();
$sql = "UPDATE Messeges SET messege = '$messege' where MID = $mid";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run update query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
}

function getmessege($mid){
$dbcon = dbconnect();
if($mid==0)return "";
$sql = "SELECT * FROM Messeges WHERE MID=$mid";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run get query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
$data = mysql_fetch_array($result);
return $data['messege'];
}
?>