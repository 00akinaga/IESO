<?php
require_once("dbfunction.php");
$dbcon = dbconnect();
$query = "SHOW TABLES";
$result = mysql_query($query);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() ."\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}
while ($row = mysql_fetch_row($result)) {
    echo "Table: {$row[0]}\n";
}

