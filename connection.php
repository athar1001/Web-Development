<?php
$connect = mysql_connect ('localhost','*****','******');
$dbconnect = mysql_select_db ("******",$connect);
if(!$dbconnect){
die('Could not connect: ' . mysql_error());
} 
 ?>