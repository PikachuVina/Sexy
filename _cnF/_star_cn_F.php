<?php 
session_start(); 
$text = array( 
'linkvh' => 'Auto Facebook', 
'vh' => 'BOTVN', 
'vtat' => 'BotVN', 
'link' => 'http://hjhja.herokuapp.com', 
); 

$db_host = 'mysql3.gear.host'; //mysql HOST 
$db_user = 'nghia2'; //mysql USER 
$db_pass = 'Ev8I-T1a~luE'; //mysql PASS 
$db_name = 'nghia2'; //mysql NAME 

$connection = ($GLOBALS["___mysqli_ston"] = mysqli_connect($db_host, $db_user, $db_pass)); 
if (!$connection){ 
die('Không Thể Kết Nối: ' . mysqli_error($GLOBALS["___mysqli_ston"]));} 
mysqli_select_db($GLOBALS["___mysqli_ston"], $db_name) or die(mysqli_error($GLOBALS["___mysqli_ston"])); 
mysqli_query($GLOBALS["___mysqli_ston"], "SET NAMES utf8"); 
?> 