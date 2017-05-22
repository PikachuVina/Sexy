<?php 
error_reporting(0);
ob_start(); 
session_start(); 
$time = time(); 
$timelimit = 300; 
$timenew = $time - $timelimit; 
mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM online WHERE time < ".$timenew); 
if($_SESSION['ten']&&$_SESSION['idfb']){ 
    $name = $_SESSION['ten']; 
    $idfb = $_SESSION['idfb']; 
    $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM online WHERE `idfb` = '".$idfb."'"); 
    if(mysqli_num_rows($result) < 1){ 
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO online SET `time` = '".$time."', `ten` = '".$name."', `idfb` = '".$idfb."'"); 
    } 
    else if(mysqli_num_rows($result) >= 1){ 
        mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM online WHERE `idfb` = '".$idfb."'"); 
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO online SET `time` = '".$time."', `ten` = '".$name."', `idfb` = '".$idfb."'"); 
    } 
} 
?> 