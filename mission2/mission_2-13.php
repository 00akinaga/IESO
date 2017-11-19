<?php
require_once("dbfunction.php");
$dbcon = dbconnect();
$result = mysql_query('UPDATE Messeges SET name = "haga" where MID = 1');
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

showall_messeges($dbcon)

?>