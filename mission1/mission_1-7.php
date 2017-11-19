<?php
function br(){echo nl2br("\n");}
$filename = 'kadai6.txt';

$fp= fopen($filename,'r');

if($fp){
  $i = 0;
  while ($line = fgets($fp)) {
    $a[$i] = $line;
    $i++;
  }
}

for($i=0;$i<count($a);$i++){
  echo "a[".$i."]"."=".$a[$i];
  br();
}

fclose($fp);
?>