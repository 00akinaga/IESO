<?php
require_once("dbfunction.php");
$dbcon = dbconnect();
$result = mysql_query("SHOW COLUMNS FROM Usertable");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        print_r($row);echo '<br>';
    }
}
echo '<br>////////////////////////////<br>';
$result = mysql_query("SHOW COLUMNS FROM Messeges3");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        print_r($row);echo '<br>';
    }
}
?>