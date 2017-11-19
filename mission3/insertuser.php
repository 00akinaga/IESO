<?php
function dbconnect(){

$dbserver = "localhost";
$dbuser = "co-565.it.3919.c";
$dbpass = "uyy7cYRw";
$dbname = "co_565_it_3919_com";

$dbcon = mysql_connect($dbserver,$dbuser,$dbpass);
if (!$dbcon) {
    die(mysql_error());
}

$db_selected = mysql_select_db($dbname,$dbcon);

return $dbcon;
}

$dbcon = dbconnect();
$date = date('Y-m-d G:i');
$sql = "INSERT INTO Usertable (name,email,pass,state,date) VALUES ('test','test@jp','test',0,'2017-10-04 18:40')";
$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run insert query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
}

?>