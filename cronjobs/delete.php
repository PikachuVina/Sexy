<?php 
set_time_limit(0); 
require("../_cnF/_star_cn_F.php"); 
require("../_cnF/_star_funC.php"); 
$tab = array('tokeniphone','tokenandroid','tokenios','tokenhtc','tokenvip',); 
$i = 0; 
$ao = 0; 
foreach($tab as $tabl => $table){ 
    $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ".$table); 
    if($result){ 
        while($row = mysqli_fetch_array($result)){ 
            $token = $row['token']; 
            $me = me($token); 
            if(!$me['id']){ 
                $i++; 
                mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM ".$table." WHERE token = '".mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $token)."'"); 
            } 
            else if(ereg('@tfbnw.net',$me['email'])||ereg('CAAC',$token)){ 
                $i++; 
                $ao++; 
                mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM ".$table." WHERE token = '".mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $token)."'"); 
            } 
        } 
    } 
} 
echo'Số Token Die Đã Xoá Của Tất Cả Các Table Là: '.$i.'<br>';
echo'Số Token Ảo Xuất Hiện Trên Hệ Thống Là: '.$ao.'<br>'; 
foreach($tab as $tabl => $table){ 
    $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ".$table); 
    if($result){ 
        echo 'Số Token Live Còn Lại Của Table '.$table.' Là: '.mysqli_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) FROM ".$table),  0).'<br>';
    } 
} 
?> 