<div class="col-md-5">
	<div class="box box-success">
		<div class="box-title box-header with-border">
			<h4><i class="fa fa-thumbs-up"></i> Boom Like - Bão Like Trang Cá Nhân</h4>
			
		</div>
		<div class="box-body">
			<h4><strong><p class="text-danger"> Hệ Thống Bão Like Trang Cá Nhân Theo ID Bất Kỳ</p></strong></h4>
			<font style="color:#23c6c8;">Bước 1:</font> Sử Dụng Mục Bên " Danh Sách Bạn Bè" Để Copy ID Bạn Bè Của Bạn.  <br />
			<font style="color:#23c6c8;">Bước 2:</font> Nhập ID Vào Khung Bên Dưới Sau Đó Thực Hiện Boom Like. <br />
			<hr>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<div class="input-prepend input-group ">
				<span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
					<input name="id" type="text" id="id" class="form-control" placeholder="Nhập ID Trang Cá Nhân"><span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
				<? $_SESSION['_SERVER'] = cap(30); ?>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			</div><br />
			<div class="input-prepend input-group ">
				<span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
					<input name="id" type="text" id="likecmt" class="form-control" placeholder="Nhập 1 Để Like Cmt Hoặc 0 Nếu Không Muốn..."><span class="input-group-addon"><i class="fa fa-paste"></i>
					<input class="form-control" type="hidden" name="token" id="token" value="<?php echo $_SESSION[matoken];?>" />
				</span>
			</div><br />
			<div class="form-group">
				<label for="name">Chọn Số Lượng Like Sẻ Bão - Kéo Thanh Trượt Để Điều Chỉnh</label>
				<center>
					<div id="soluong" class="label label-info" align="center">30</div>
				</center>
				<input class="form-control" type="range" name="soluong" min="1" max="100" id="limit" value="30" onchange="document.getElementById('soluong').innerHTML=this.value;">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block" id="boomlike" onclick="post_BoomLike();">
					<i class="fa fa-exchange"></i> Bão Like
				</button>
			</div>
		</div>
		<div class="box-footer">
		</div>
	</div>
</div>
<div class="col-md-7">
	<div class="box box-info">
		<div class="box-title box-header with-border">
			<h4><i class="fa fa-credit-card"></i> Danh Sách Bạn Bè </h4>
		</div>
		<div class="box-content">
		
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên</th>
						<th>ID Profile</th>
						<th>Thao Tác</th>
					</tr>
				</thead>
				<tbody id="friend">
					<tr>
						<td colspan="4"><br /><center><a href="#" onclick="loadfr();">TẢI DANH SÁCH BẠN BÈ</a></center></td>
					</tr>
				</tbody>
</table>
		</div>
		<div class="box-footer">
		</div>
	</div>
</div>