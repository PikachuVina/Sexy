<?php
set_time_limit(0); 
include'../_cnF/_star_cn_F.php';
echo mysql_query("DELETE FROM logbottralike;").'<br />';
echo mysql_query("DELETE FROM logsimcmt;").'<br />';
echo mysql_query("DELETE FROM logsimfeed;").'<br />';
$di = new RecursiveDirectoryIterator('./');
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
	if(preg_match("/log/i",$filename)){
		$size = $file->getSize()+$size;
		echo $filename . ' - ' . $file->getSize()/1/1 . ' KB ( done ) <br/>';
		unlink($filename);
	}
}
echo $size/1/1;
?>