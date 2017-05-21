<?php 
session_start(); 
$text = array( 
'linkvh' => 'BOTVN', 
'vh' => 'HOTLIKE', 
'vtat' => 'HL', 
'link' => 'http://hjhja.herokuapp.com', 
); 

$db_host = 'mssql5.gear.host'; //mysql HOST 
$db_user = 'nghia2'; //mysql USER 
$db_pass = 'Bm1cB5u_AAK-'; //mysql PASS 
$db_name = 'nghia2'; //mysql NAME 

$connection = mysqli_connect($db_host, $db_user, $db_pass)); 
if (!$connection){ 
die('Không Thể Kết Nối: ' . @mysqli_connect_error());
@mysqli_select_db($connection,$db_name) or die(mysqli_error());
@mysqli_query($connection,"SET NAMES utf8");
?>