<?php
if(isset($_POST['imagefile'])){
 $upfile = $_FILES['upfile']['tmp_name'];
 $img= file_get_contents($upfile);
header('Content-type: image/png');
echo $img;
}
?>