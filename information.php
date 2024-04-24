<?php
$link = mysqli_connect('127.0.0.1', 'root', 'password');
if(!$link){
	die('Error:'.mysqli_error());
}
echo "GooD";
mysqli_close($link);
?>
