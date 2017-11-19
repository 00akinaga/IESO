<?php

header('Content-Type: text/html; charset=UTF-8');
function dbconnect(){

$dbserver = "サーバ";
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

function db_usereg($name,$email,$pass){
$dbcon = dbconnect();
$date = date('Y-m-d G:i');
$sql = "INSERT INTO Usertable (name,email,pass,state,date) VALUES ('$name','$email','$pass',0,'$date')";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run insert query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}

$sql = "SELECT uid FROM Usertable WHERE pass = '$pass'";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run select query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
$uid = mysql_fetch_array($result);
if(!$uid['uid'])return -1;
return $uid['uid'];

}

function Getuid_by_pass_email($email,$pass){
$dbcon = dbconnect();
$sql = "SELECT uid FROM Usertable WHERE pass = '$pass' AND email = '$email'";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run select query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
$uid = mysql_fetch_array($result);
if(!$uid['uid'])return -1;
return $uid['uid'];
}

function Getnamebyuid($uid){
$dbcon = dbconnect();
$sql = "SELECT name FROM Usertable WHERE uid = '$uid'";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run select query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
$name = mysql_fetch_array($result);
return $name['name'];
}

function insertmessege($uid,$messege){
$dbcon = dbconnect();
$date = date('Y-m-d G:i');
$sql = "INSERT INTO Messeges3 (uid,messege,date) VALUES ($uid,'$messege','$date')";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run insert query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
}

function insertimage($uid,$imagedat,$mime){
$dbcon = dbconnect();
$date = date('Y年m月d日G:i');
$sql = "INSERT INTO Messeges3 (uid,image,mime,date) VALUES ($uid,'$imagedat','$mime','$date')";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run insert query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
}

function deletemessege($mid){
$dbcon = dbconnect();

$sql = "DELETE FROM Messeges3 WHERE mid=$mid";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run insert query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
}

function getuidbymid($mid){
$dbcon = dbconnect();
$sql = "SELECT uid FROM Messeges3 WHERE mid=$mid";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run insert query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}
$row = mysql_fetch_array($result);
return $row['uid'];
}
?>
