<?php
session_start(); 
$text = array( 
'linkvh' => 'hjhja.herokuapp.com', 
'vh' => 'HOTLIKE', 
'vtat' => 'HL', 
'link' => 'http://hjhja.herokuapp.com', 
); 

$db_host = 'mysql3.gear.host'; //mysql HOST 
$db_user = 'nghia2'; //mysql USER 
$db_pass = 'Ev8I-T1a~luE'; //mysql PASS 
$db_name = 'nghia2'; //mysql NAME 

$connection = @mysqli_connect($db_host, $db_user, $db_pass);
if (!$connection)
  {
  die('Không thể kết nối: ' . @mysqli_connect_error());
  }
@mysqli_select_db($connection,$dbname) or die(mysqli_error());
@mysqli_query($connection,"SET NAMES utf8");
?>