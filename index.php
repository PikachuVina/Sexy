<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
require("./_cnF/_star_cn_F.php");
require("./_cnF/_star_funC.php");
require("./_cnF/_star_online.php");
require('./incfiles/header.php');
if($_SESSION['idfb']) header("Location: trangchu.html");
if($_GET['ref']){
	$ref = isset($_GET['ref']) ? (string)(int)$_GET['ref'] : false;
	$name = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ten FROM taikhoan WHERE idfb = '" . $ref . "' "), 0);
	if($name == '') $name = '?';
	$_SESSION['ref'] = $ref;
	$_SESSION['refn'] = $name;	
}
?>

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter">107,200</p>
                                        <span class="info-box-title">Thành viên sử dụng</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-users"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter">340,230</p>
                                        <span class="info-box-title">Lượt truy cập</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p>$<span class="counter">653,000</span></p>
                                        <span class="info-box-title">Doanh thu hàng tháng</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-basket"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter">47,500</p>
                                        <span class="info-box-title">Email mới</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
	                     <div class="row">
                        <div class="col-lg-5 col-md-8">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Đăng Nhập</h4>
                                </div>
                                <div class="panel-body">
                                    <div id="rootwizard">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Tài Khoản</a></li>
                                            <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-shield m-r-xs"></i>Token</a></li>
                                        </ul>
                                            <div class="tab-content">
									<!--Tab-->
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <div class="input-group">
                                                            <? if($_GET['ref']) echo'<b>Người Giới Thiệu : '.$name.'</b>'; ?>
                                                            </div>
                                                            <div class="panel-body">
                                                            <div class="form-group">
                                                            <label for="email">* Email hoặc số điện thoại :</label>
                                                            <input id="email" placeholder="Nhập Email" class="form-control"/>
                                                            <label for="password">* Mật khẩu :</label>
                                                            <input id="password" type="password" placeholder="Nhập Mật Khẩu" class="form-control"/>
                                                            <label for="email">* Chọn Ứng Dụng :</label>
                                                            <select id="app" class="form-control">
                                                            <option value="6628568379">Facebook For Iphone</option>
                                                            <option value="350685531728">Facebook For Android</option>
                                                            </select>
                                                            </div>
                                                            <div class="form-group text-center" >
                                                            <button onclick="loginemail();" class="btn btn-primary" id="botvn_login" class="btn btn-sm btn-primary">Get Link Token</button>
                                                            </div>
                                                            <div class="form-group text-center" id="star" style="display:none">
                                                            <div id="message"></div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
									<!--Tab-->
                                                <div class="tab-pane fade" id="tab2">
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                        <div class="form-group">
                                            <label></label>
                                            <input id="matoken" type="text" onpaste="setTimeout( function() { login(document.getElementById('matoken').value);}, 100);" class="form-control" placeholder="Nhập token vào đây">
                                        </div>
                                        <center><button type="button" id="go" onclick="login(document.getElementById('matoken').value);" class="btn btn-primary">Đăng Nhập</button> <a class="btn btn-primary" target="_blank" href="https://goo.gl/4rU6PV">Cài Token</a> <a class="btn btn-primary" target="_blank" href="https://developers.facebook.com/tools/debug/accesstoken/?app_id=41158896424">Lấy Token</a></center>
										<hr>
                            <span>+ Năm sinh của nick sử dụng cần thiết lập đủ hoặc trên 18 tuổi.</br>
                            + <a href="http://fb.com/settings?tab=followers" target="_blank">Thiết lập</a>. "Ai có thể theo dõi tôi" chọn <b>Tất cả mọi người</b> hoặc <b>Everyone</b></br>
                            + <a href="href=https://www.facebook.com/settings?tab=privacy&amp;section=composer&amp;view" target="_blank">Thiết lập</a>. Các bài viết của bạn phải được đặt ở chế độ <b>Mọi người</b></br>
                            + <a href="http://fb.com/settings?tab=followers&amp;section=comment&amp;view" target="_blank">Thiết lập</a>. "Bình luận của người theo dõi" chọn <b>Tất cả mọi người</b> hoặc <b>Everyone</b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
									<!--Tab-->
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-4">
                            <div class="panel twitter-box">
                                <div class="panel-body">
                                    <div class="live-tile" data-mode="flip" data-speed="750" data-delay="3000">
                                        <span class="tile-title pull-right">New Tweets</span>
                                        <i class="fa fa-twitter"></i>
                                        <div><h2 class="no-m">Chỉ nên cài bot like hoặc bot cảm xúc, nếu cài cả 2 sẽ lỗi và không like status...</h2><span class="tile-date">6 April, 2017</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel facebook-box">
                                <div class="panel-body">
                                    <div class="live-tile" data-mode="carousel" data-direction="horizontal" data-speed="750" data-delay="4500">
                                        <span class="tile-title pull-right">Facebook Feed</span>
                                        <i class="fa fa-facebook"></i>
                                        <div><h2 class="no-m">Đăng nhập bằng tài khoản để lấy token full quyền cài bot cảm xúc nhé</h2><span class="tile-date">15 March, 2017</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>					
					

						<div class="col-md-6">
							<div class="box box-primary">
								<div class="box-title box-header with-border">
									<h4><i class="fa fa-star"></i> Người Dùng Vip</h4>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
										<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
									</div>
								</div>
								<div class="box-body" style="overflow: auto;height: 200px;">
								<?php
								echo'
									<table class=table>
									<thead><tr>
									<th><span class="label label-primary"><i class="fa fa-group"></i> Tên</span></th>
									<th><span class="label label-primary"><i class="fa fa-info"></i> Profile ID</span></th>
									<th><span class="label label-primary"><i class="fa fa-calendar-check-o"></i> Hạn</span></th>
									<th><span class="label label-primary"><i class="fa fa-star-half-o"></i> Level</span></th>
									</tr></thead>
									<tbody>
								';
								$req = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `vip` LIMIT 10");  
                                while($res = mysqli_fetch_assoc($req)) {
								echo'<tr>
								<td>
								<a onclick="toarst(&quot;error&quot;,&quot;Vui Lòng Đăng Nhập Để Thực Hiện Tính Năng Này.&quot;,&quot;Tin Nhắn Hệ Thống&quot;)" style="color: red;"><img src="/img/vip.gif"><b>'.$res['ten'].'</b></a>
								</td>
								<td>
								<a onclick="toarst(&quot;error&quot;,&quot;Vui Lòng Đăng Nhập Để Thực Hiện Tính Năng Này.&quot;,&quot;Tin Nhắn Hệ Thống&quot;)"><span class="badge bg-red">***************</span></a>
								</td>
								<td>
								<span class="badge bg-green">'.thoigiantinhvip($res['time']).'</span>
								</td>
								<td>
								<span class="badge bg-yellow">';
								if($res['level'] == '1'){ echo 'VIP Member'; }elseif($res['level'] == '2'){  echo 'Medium Member'; 
								}elseif($res['level'] == '3'){ echo 'Super Member';}else{ echo 'Boss Member';}
								echo '</span>
								</td>
								</tr> ';
								}
								echo'</tbody></table>';
								?>
								</div>
								<div class="box-footer">
									<center>Hiện Tại Có <span class="label label-default"><?php echo mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `vip` ORDER BY RAND()")); ?></span> Người Dùng VIP Trên Hệ Thống.</center>
								</div>
							</div>				
						</div>
						<div class="col-md-6">
							<div class="box box-info">
								<div class="box-title box-header with-border">
									<h4><i class="fa fa-users"></i> Người Dùng Mới</h4>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
										<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
									</div>
								</div>
								<div class="box-body" style="overflow: auto;height: 200px;">
								<?php
								echo'
									<table class=table>
									<thead>
									<tr>
									<th><span class="label label-primary"><i class="fa fa-image"></i> Avatar</span></th>
									<th><span class="label label-primary"><i class="fa fa-group"></i> Tên</span></th>
									<th><span class="label label-primary"><i class="fa fa-info"></i> Profile ID</span></th>
									<th><span class="label label-primary"><i class="fa fa-star-half-o"></i> Tham Gia</span></th>
									</tr>
									</thead>
									<tbody>
								';
								$res = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `taikhoan` ORDER BY `id` DESC LIMIT 10"); 
                                while ($post = mysqli_fetch_array($res)){
								echo'<tr><div class="col-xs-2 col-md-2">
								<td><a onclick="toarst(&quot;error&quot;,&quot;Vui Lòng Đăng Nhập Để Thực Hiện Tính Năng Này.&quot;,&quot;Tin Nhắn Hệ Thống&quot;)"><img src="/img/new.gif"><img src="https://graph.facebook.com/'.$post[idfb].'/picture?width=10&amp;height=10" alt="'.$post[ten].'" class="img-circle img-thumbnail" width="30" height="30"></a></td>
								<td><a onclick="toarst(&quot;error&quot;,&quot;Vui Lòng Đăng Nhập Để Thực Hiện Tính Năng Này.&quot;,&quot;Tin Nhắn Hệ Thống&quot;)"><b><font style="color: red;">'.$post[ten].'</font></b></a></td>
								<td><a onclick="toarst(&quot;error&quot;,&quot;Vui Lòng Đăng Nhập Để Thực Hiện Tính Năng Này.&quot;,&quot;Tin Nhắn Hệ Thống&quot;)"><span class="badge bg-red">***************</span></a></td>
								<td><span class="badge bg-yellow">'.thoigiantinhlogin($post[time]).'</span></td>
								</div></tr>';
								}
								echo'</tbody></table>';
								?>
								</div>
								<div class="box-footer">
									<center>Hiện Tại Có <span class="label label-default"><?php echo mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `taikhoan` ORDER BY RAND()")); ?></span> Thành Viên Trên Hệ Thống.</center>
								</div>
							</div>				
						</div>
                        <div class="col-lg-12 col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">KEY SEARCH</h4>
                                    <div class="panel-control">
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
								<div class="box-body">
									<p>tang like, hack like facebook, buff like, auto cam xuc , bot cam xuc , bot like , bot ex like , hack like viet nam, http://hotlike.net, trang web hack like facebook, auto like viet nam, buff like viet nam,cách tăng like stt facebook, hack like ảnh facebook, auto cam xuc , bot cam xuc , bot like , bot ex like  hack like comment facebook, tăng like ảnh facebook, cách hack tăng like,share code auto like, xin code auto like, web auto like, auto sub , auto share , hack share , hack comments , hack bình luận, auto like sub , đọc trộm tin nhắn facebook , xem tin nhắn facebook không cần mật khẩu</p>
								</div>
                                </div>
                            </div>
                        </div>

<?php
require('./incfiles/footer.php');
?>