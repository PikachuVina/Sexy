<?php   
$res = @mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `simcmt` WHERE `idfb`= '".$_SESSION[idfb]."'"); 
if(@mysqli_num_rows($res) > 0){ 
$key = 1; 
}else{ 
$key = 0; 
} 
?>
<div class="col-md-12">
	<div class="box box-success">
		<div class="box-title box-header with-border">
			<h4><i class="fa fa-reddit" aria-hidden="true"></i> Bot Simsimi Status - Robot Trả Lời Simsimi</h4>
			
		</div>
		<div class="box-body">
			<div class="alert alert-info" style="font-size: 15px; background-color: rgba(157, 248, 89, 0.62); border-color: rgba(157, 248, 89, 0.62);">
                              		<?php echo ($key == 1) ? 'Chào Bạn<strong> '.$_SESSION[ten].'</strong>. Hiện Tại Bạn <strong style="color: red; font-size: 15px;"> Đã </strong> Cài Đặt Bot Trên Hệ Thống' : 'Chào Bạn <strong>'.$_SESSION[ten].'</strong>. Hiện Tại Bạn <strong style="color: red; font-size: 15px;"> Chưa </strong> Cài Đặt Bot Trên Hệ Thống'; ?>
                           	</div>
                           	<div class="alert alert-success" style="background-color: rgba(245, 215, 66, 0.32); border-color: rgba(245, 215, 66, 0.32);">
				<strong>Hướng Dẫn Sử Dụng</strong><br />
				<b>Bước 1: </b> Nhập Mã Token Của Nick Dùng Để Comment Vào Ô "Điền Access Token Nick Dùng Để Comment"<br/>
				<b>Bước 2: </b> Điền OK Ở Ô Tiếp Theo. Sau Đó Nhấn Vào Thực Thi<br/>
				<b style="font-color:red;">Lưu Ý:</b> Để Token Nick Comment Simsimi Lâu Die Bạn Nên GET "Token For iPhone" Ở  <code><a href="/GET-TOKEN.html" target="_blank"> ĐÂY </a></code><br /> Nếu Bạn Không Muốn Dùng Nick Khác Để Cmt Thì Bạn Có Thể Dùng Chính Nick Của Bạn Bằng Cách Sử Dụng Mã Token Của Bạn Ở Ô Bên Dưới.
			</div>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<hr> <center><h2><p class="text-danger"><strong>Thiết Lập BOT</strong></p></h2></center><hr>
			<div class="form-group">
				<label>Mã Token Hiện Tại Của Bạn Là:</label>
				<textarea class="form-control"><? echo $_SESSION[matoken];?></textarea>
			</div><hr>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-key"></i></span>
				 <input type="text" class="form-control" id="token" name="token" style="color: red; font-size: 15px;" placeholder="Điền Access Token Nick Dùng Để Comment">
				<span class="input-group-addon"><i class="fa fa-key"></i></span>
			</div><br />
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-key"></i></span>
					<select id="yeucau" name="yeucau" style="color: black; font-size: 15px;" class="form-control">
					<?php if($key != 1){ ?>
						<option value="OK">ON - Bật Bot</option>
					<?php }else{ ?>
						<option value="UP">UP - Cập Nhật Bot</option>
						<option value="HUY">OFF - Tắt Bot</option>
					<?php } ?>
					</select>
				<span class="input-group-addon"><i class="fa fa-key"></i></span>
			</div><br />
			<? $_SESSION['_SERVER'] = cap(30); ?>
			<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			<input type="hidden" class="form-control" id="id" name="idfb" value="<?php echo $_SESSION[idfb]; ?>">
			<input type="hidden" class="form-control" id="token" name="token" value="<?php echo $_SESSION[matoken]; ?>" />
			<div class="form-group">
				<button class="btn btn-success btn-block" id="simstatus" onclick="post_SimStatus();">
					<i class="fa fa-exchange"></i> Thực Thi
				</button>
			</div>
		</div>
		<div class="box-footer">
		</div>
	</div>
</div>