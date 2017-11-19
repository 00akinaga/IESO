<?php
require_once("dbfunction.php");
$dbcon = dbconnect();
$result = mysql_query("INSERT INTO Messeges (name ,messege,date,pass) VALUES ('renkon','hello','1/23 23:00','himitu') ");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

?>