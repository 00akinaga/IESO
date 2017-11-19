<?php
$filename = 'kadai2.txt';

$fp= fopen($filename,'r');

$line = fgets($fp);

echo $line;
// ファイルをクローズする

fclose($fp);
?>