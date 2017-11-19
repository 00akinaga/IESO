<?php
require_once("dbfunction.php");
$dbcon = dbconnect();
$result = mysql_query("SELECT * FROM Messeges");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
while ($data = mysql_fetch_array($result)) {
  echo '<p>' . $data['MID'] . ':' . $data['name'] . ':' . $data['messege'] . ':' . $data['date'] .':' . $data['pass'] ."</p>\n";
}

?>