<?php
header('Content-Type: text/html; charset=UTF-8');
require_once("/home/co-565.it.3919.com/public_html/mission3/dbfunction.php");

 function deleteuser($uid){
 $dbcon = dbconnect();
 $sql = "DELETE FROM Usertable WHERE uid = $uid";
 $result = mysql_query($sql);
  if (!$result) {
    echo 'Could not run Delete query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
  }
 }

 $dbcon = dbconnect();
 $sql = "SELECT uid,date FROM Usertable WHERE state = 0";
 $result = mysql_query($sql);
 if (!$result) {
    echo 'Could not run Select query: ' . mysql_error().'<br>';
    echo '$sql = '.$sql;
    exit;
 }
 while ($row = mysql_fetch_assoc($result)) {
echo $row['date'].'<br>';
echo date('Y-m-d G:i').'<br>';
if(strtotime($row['date']) < strtotime("24 hours ago"))deleteuser($row['uid']);
 }

?>