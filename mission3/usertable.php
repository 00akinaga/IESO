<?php
header('Content-Type: text/html; charset=UTF-8');
require_once("dbfunction.php");
$dbcon = dbconnect();

$query = "SELECT * FROM Usertable";
$result = mysql_query($query);
if (!$result) {
    echo 'Could not run select query: '.mysql_error().'<br>';
    exit;
}
while ($row = mysql_fetch_array($result)){
echo $row['uid'].':'.$row['name'].':'.$row['email'].':'.$row['id'].':'.$row['pass'].':'.$row['state'].':'.$row['date'].'<br>';
}

echo '/////////////////////////////////////////<br>';
$query = "SELECT * FROM Messeges3";
$result = mysql_query($query);
if (!$result) {
    echo 'Could not run select query: '.mysql_error().'<br>';
    exit;
}
while ($row = mysql_fetch_array($result)){
echo $row['mid'].':'.$row['uid'].':'.$row['image'].':'.$row['mime'].':'.$row['messege'].':'.$row['date'].'<br>';
}

?>