
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h3 class="panel-title">Fade effect</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div role="tabpanel">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Tab 1</a></li>
                                                <li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Tab 2</a></li>
                                                <li role="presentation"><a href="#tab7" role="tab" data-toggle="tab">Tab 3</a></li>
                                                <li role="presentation"><a href="#tab8" role="tab" data-toggle="tab">Tab 4</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                                                       
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab6">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab7">
                                                    <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab8">
                                                    <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>

                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Chat Box</h4>
                                </div>
                                <div class="panel-body">
			<div class="input-group">
                <input id="mess" type="text" placeholder="Nhập Nội Dung..." class="form-control">
				<span class="input-group-btn">
				<input type="Submit" class="btn btn-primary" id="chatbox" onclick="postChatbox();" value="Gửi Tin Nhắn!"></input>
				</span>
			</div><br>
                <div class="message_box">
		     <div id="message"><div id="lol">Đang Tải...</div> 
                     </div>
                </div>
                                </div>
                            </div>
                        </div>
						

                            <div class="col-lg-6 col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Người Dùng Vip</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive project-stats">  
                                       <?php
								echo'
									<table class=table>
									<thead><tr>
									<th>Tên</th>
									<th>Profile ID</th>
									<th>Hạn</th>
									<th>Level</th>
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
									<center>Hiện Tại Có <b><?php echo mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `vip` ORDER BY RAND()")); ?></b> Người Dùng VIP Trên Hệ Thống.</center>
								</div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Người Dùng Mới</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive project-stats"> 
								<?php
								echo'
									<table class=table>
									<thead>
									<tr>
									<th>Avatar</th>
									<th>Tên</th>
									<th>Profile ID</th>
									<th>Tham Gia</th>
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
									<center>Hiện Tại Có <b><?php echo mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `taikhoan` ORDER BY RAND()")); ?></b> Thành Viên Trên Hệ Thống.</center>
								</div>
                                </div>
                            </div>
                        </div>