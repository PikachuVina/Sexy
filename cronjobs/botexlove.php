<?php 
error_reporting(0);
set_time_limit(0); 
ob_start('ob_gzhandler'); 
require("../_cnF/_star_cn_F.php"); 
$gettoken = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `botexlove` ORDER BY RAND() LIMIT 0,4"); 
    while ($post = mysqli_fetch_array($gettoken)){ 
            $token= $post['token']; 
                 $check = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token),true); 
                       if(!$check[id]){   
                                @mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM botexlove WHERE token ='".$token."' ");   
                                continue;  
                       } 
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `botexlove` ORDER BY RAND() LIMIT 0,50"); 
   if($result){ 
       while($row = mysqli_fetch_array($result)){ 

$cmt =  $post['likecmt']; 
$token = $row['token']; 
    $stat = json_decode(auto('https://graph.facebook.com/'.$post['idfb'].'/feed?fields=id&access_token='.$token.'&offset=0&limit=1'),true);
        for($i=1;$i<=count($stat[data]);$i++){ 
             $com = json_decode(auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/comments?access_token='.$token.'&limit=5&fields=id'),true); 
              if(count($com['data']) > 0){ 
              for($c=1;$c<=count($com[data]);$c++){ 
            auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/reactions?type=LOVE&method=post&access_token='.$token); 
              if($cmt=="1"){ 
              echo auto('https://graph.facebook.com/'.$com[data][$c-1][id].'/reactions?type=LOVE&method=post&access_token='.$token); 
                          } 
              } 
              } 
             }  

        } 
    } 
} 

  

((mysqli_free_result($result) || (is_object($result) && (get_class($result) == "mysqli_result"))) ? true : false); 
unset ($result); 

function auto($url) { 
   $ch = curl_init(); 
   curl_setopt_array($ch, array( 
      CURLOPT_CONNECTTIMEOUT => 5, 
      CURLOPT_RETURNTRANSFER => true, 
      CURLOPT_URL            => $url, 
      ) 
   ); 
   $result = curl_exec($ch); 
   curl_close($ch); 
   return $result; 
} 
?> 