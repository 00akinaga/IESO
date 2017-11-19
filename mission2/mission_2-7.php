<?php
require_once("dbfunction.php");
$dbcon = dbconnect();
$query = "create table Messeges (MID int NOT NULL AUTO_INCREMENT,name VARCHAR(64),messege VARCHAR(64),date VARCHAR(20),pass VARCHAR(256),PRIMARY KEY (MID))";
$result = mysql_query($query);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

echo $result;
?>