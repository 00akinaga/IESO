<?php
require_once("dbfunction.php");
$dbcon = dbconnect();

$query ="DROP TABLE Messeges3";
$result = mysql_query($query);

$query = "create table Messeges3 (mid int NOT NULL AUTO_INCREMENT,uid int NOT NULL ,image BLOB,mime varchar(30),messege VARCHAR(64),date VARCHAR(20),PRIMARY KEY (mid))";

echo "Messeges3を生成します\n";

$result = mysql_query($query);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
}

$query ="DROP TABLE Usertable";
$result = mysql_query($query);
$query = "create table Usertable (uid int NOT NULL AUTO_INCREMENT,name VARCHAR(64),email VARCHAR(225) NOT NULL,pass VARCHAR(256),state int NOT NULL,date VARCHAR(20),PRIMARY KEY (uid))";

echo "Usertableを生成します\n";
$result = mysql_query($query);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}
echo $result;
?>