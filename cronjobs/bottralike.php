<?php 
set_time_limit(0); 
require("../_cnF/_star_cn_F.php"); 
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM bottralike ORDER BY RAND() LIMIT 0,5"); 
while ($info = mysqli_fetch_array($result)){  
$token = $info['token']; 
$userData = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token.'&fields=name,id'),true); 
if(!$userData[id]){ 
mysqli_query($GLOBALS["___mysqli_ston"], " 
DELETE FROM 
bottralike 
WHERE 
token='" . mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $token) . "' 
"); 
} 
$feed=json_decode(file_get_contents('https://graph.fb.me/me/feed?access_token='.$token.'&limit=1'),true);  
for($u=0;$u<count($feed[data]);$u++){ 
$idstt = $feed[data][$u][id];  
$sllike = $feed[data][$u][likes][count];   
}  
if($sllike > 50 || !$sllike){ 
mysqli_query($GLOBALS["___mysqli_ston"], " 
DELETE FROM 
bottralike 
WHERE 
token='" . mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $token) . "' 
"); 
} 
$getinfo = auto('https://graph.facebook.com/'.$idstt.'/likes?access_token='.$token.'&limit=200'); 
$getid = json_decode($getinfo, true); 
for($i=0;$i<=count($getid[data]);$i++) 
{ 

$idngta = auto('https://graph.facebook.com/'.$getid[data][$i-1][id].'/feed?fields=id,message,created_time,from,comments,type&access_token='.$token.'&offset=0&limit=1'); 
$infongta = json_decode($idngta, true); 
for($o=1;$o<=count($infongta[data]);$o++){ 
$idsttngta= $infongta[data][$o-1][id]; 
$kiemtra= mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) FROM `logbottralike` WHERE `idstt` ='".$idstt."' && `idngta` ='".$getid[data][$i-1][id]."' && `idsttngta` = '".$idsttngta."'"), 0); 
if($kiemtra == 0) 
{ 
auto('https://graph.facebook.com/'.$idsttngta.'/likes?access_token='.$token.'&method=post'); 
mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `logbottralike` (`idstt`, `idngta`,`idsttngta`,`ten`,`noidung`) VALUES ('".$idstt."', '".$getid[data][$i-1][id]."','".$idsttngta."','".$getid[data][$i-1][name]."','".$infongta[data][$o-1][message]."')"); 
} 
} 
} 
} 
function auto($url){ 
$data = curl_init(); 
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($data, CURLOPT_URL, $url); 
$hasil = curl_exec($data); 
curl_close($data); 
return $hasil; 
} 
?> 