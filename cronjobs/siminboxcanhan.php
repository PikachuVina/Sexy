<?php 
set_time_limit(0); 
echo '<meta charset="utf-8"/>';
echo '<meta http-equiv="refresh" content="2">';
require("../_cnF/_star_cn_F.php");
require("../_cnF/_star_funC.php");
$res = mysql_query("SELECT * FROM siminboxcanhan ORDER BY RAND() LIMIT 0,5");
while ($getinfo = mysql_fetch_array($res)) 
{
	$token = $getinfo['token'];
	$userData = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token.'&fields=name,id'),true);
	if(!$userData[name]){
	mysql_query(" DELETE FROM siminboxcanhan WHERE token = '" . mysql_real_escape_string($token) . "' ");
	continue;
	}
$getID = json_decode(auto('https://graph.facebook.com/me?access_token='.$token.'&fields=id'),true);
$getpage = json_decode(auto('https://graph.facebook.com/'.$getID[id].'/conversations?fields=participants,unread_count&access_token='.$token),true);
for($i=0;$i<count($getpage[data]);$i++){
      if ($getpage[data][$i][unread_count] > 0) {
        $getms = json_decode(auto('https://graph.facebook.com/'.$getpage[data][$i][id].'?fields=messages,message_count&access_token='.$token),true);
        $getnd = json_decode(auto('https://graph.facebook.com/'.$getms[messages][data][0][id].'?fields=message,from&access_token='.$token),true);
        $traloi = StarSim($getnd[message]);
        if($getnd[from][id] !== $getID[id])
        auto('https://graph.fb.me/'.$getnd[from][id].'/inbox?access_token='.$token.'&message='.urlencode($traloi).'&method=post&subject=+'); 
      }
}
}
?>