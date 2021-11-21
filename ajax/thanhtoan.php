 <?php
 session_start();
 @define ( '_template' , '../templates/');
 @define ( '_lib' , '../libraries/');
 @define ( '_source' , '../sources/');
 if(!isset($_SESSION['lang']))
 {
 	$_SESSION['lang']='vi';
 }
 $lang=$_SESSION['lang'];
 include_once _lib."config.php";
 include_once _lib."constant.php";
 include_once _lib."functions.php";
 include_once _lib."class.database.php";
 include_once _source."lang_$lang.php";
 include_once _lib."functions_giohang.php";
 include_once _lib."file_requick.php";
 $d = new database($config['database']);
 $ten_input=$_POST['ten'];
 $diachi_input=$_POST['diachi'];
 $dienthoai_input=$_POST['dienthoai'];
 $email_input=$_POST['email'];
 $noidung_input=$_POST['noidung'];
 $phuongthuc_input=$_POST['phuongthuc'];
 $tinhthanh=$_POST['tinhthanh'];
 $phivanchuyen=$_POST['phivanchuyen'];
 $quanhuyen=$_POST['quanhuyen'];
 $diachigiaohang=$_POST['diachigiaohang'];
 $thoigiangiao=$_POST['thoigiangiao'];
 $ngaydangky=time();
 $mahoadon=madonhang('DH','order');
 $tonggia=get_order_total();
 $mathanhvien=$_SESSION['login']['mathanhvien'];
 if($_POST['phivanchuyen']==0) $phi_vc = 'Miển phí'; else $phi_vc = number_format ($_POST['phivanchuyen'],0,",",",").' VND';
 include_once "../phpMailer/class.phpmailer.php";
 $mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = $config_ip; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = $config_email; // SMTP account username
		$mail->Password   = $config_pass;  
		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom($config_email,$row_setting['ten_'.$lang]);
		$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
		$mail->AddAddress($email_input, $ten_input);
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
		*=====================================*/
		//Thiết lập tiêu đề
		$mail->Subject    = '['.$_POST['ten'].']';
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
		$body = '<p>Xin chào <b>'.$ten_input.' !</b><br />Cảm ơn quý khách đã mua hàng tại '.$row_setting['ten_vi'].'!<br />
		Đơn hàng mới của quý khách vừa được tạo vào lúc <span style="line-height: 20.7999992370605px;"><strong>'.date('d/m/Y g:i a',$ngaydangky).'</strong> với thông tin như sau:</span><br />
		&nbsp;</p>';
		$body .= '
		<div class="block clearfix">
		<table class="rows2" style="margin-bottom:2px;width:100%;border:1px solid rgb(245, 245, 245);padding:5px;border-collapse: collapse;">
		<tbody>
		<tr>
		<td>
		<table>
		<tbody>
		<tr>
		<td width="200px"><span style="line-height: 20.7999992370605px; text-align: -webkit-center;">Mã đơn hàng</span></td>
		<td width="800px">:&nbsp;<strong><span style="line-height: 20.7999992370605px;">'.$mahoadon.'</span></strong></td>
		</tr>
		<tr>
		<td>Tên khách hàng</td>
		<td>: <strong>'.$ten_input.'</strong></td>
		</tr>
		<tr>
		<td>Điện thoại</td>
		<td>: '.$dienthoai_input.'</td>
		</tr>
		<tr>
		<td>Email</td>
		<td>: '.$email_input.'</td>
		</tr>
		<tr>
		<td>Địa chỉ</td>
		<td>: '.$diachi_input.', '.getaddress_name($quanhuyen,'dist').', '.getaddress_name($tinhthanh,'city').'</td>
		</tr>
		<tr>
		<td>Hình thức thanh toán</td>
		<td>: '.$phuongthuc_input.'</td>
		</tr>
		<tr>
		<td>Dự kiến nhận hàng</td>
		<td>: '.$thoigiangiao.'</td>
		</tr>
		<tr>
		<td>Ghi chú đơn hàng</td>
		<td>: '.$noidung_input.'</td>
		</tr>
		<tr>
		<td><span style="color:#ff0000;"><span style="font-size:16px;"><strong>Tổng thanh toán</strong></span></span></td>
		<td><span style="color:#ff0000;"><span style="font-size:16px;"><strong>: </strong></span><span style="font-size:18px;"><strong>'. number_format(get_order_total()+$phivanchuyen,0, ',', '.') .' VNĐ</strong></span></span></td>
		</tr>
		</tbody>
		</table>
		</td>
		</tr>
		</tbody>
		</table>
		<hr />
		';
/*
					<tr>
						<td><span style="font-size:14px;"><span style="color:#cc0066;"><strong>Phí vận chuyển</strong></span></span></td>
						<td><span style="font-size:14px;">:<span style="color:#cc0099;"><strong> '. number_format($phivanchuyen,0, ',', '.') .' VNĐ</strong></span></span></td>
					</tr>
*/
					$body .='<div style="text-align: center;"><span style="color:null;"><span style="font-size:18px;"><strong>THÔNG TIN CHI TIẾT ĐƠN HÀNG</strong></span></span></div>';
					$body .='
					<table align="center" border="0" cellpadding="10" cellspacing="1" style="width: 100%;">
					<caption>&nbsp;</caption>
					<thead style="background: #ccc">
					<tr>
					<th scope="col" width="5%">STT</th>
					<th scope="col" witdh="15%">HÌNH ẢNH</th>
					<th scope="col" witdh="40%">TÊN SẢN PHẨM</th>
					<th scope="col" witdh="15%">ĐƠN GIÁ</th>
					<th scope="col" witdh="10%">SỐ LƯỢNG</th>
					<th scope="col" witdh="15%">THÀNH TIỀN</th>
					</tr>
					</thead>
					<tbody>';
					$max=count($_SESSION['cart']);
					foreach ($_SESSION['cart'] as $key => $value) {
						$stt = $key + 1;
						$pid=$value['productid'];
						$q=$value['qty'];
						$pname=get_product_name($pid);
				if ($q==0) {continue; } // Bỏ sản phẩm số lượng bằng 0
				$body .= '<tr style="border-bottom: 1px solid #ccc">
				<td style="text-align: center;">'.$stt.'</td>';
				$body .= '<td style="text-align: center;"><a href="http://'._SITEURL_.'/san-pham/'.changeTitle($pname).'.html" target="_blank"><img src="http://'._SITEURL_.'/upload/product/'.get_thumb($pid).'" width="70" /></a></td>';
				$body .= '<td><strong><a href="http://'._SITEURL_.'/san-pham/'.changeTitle($pname).'.html" target="_blank">'.$pname.'</a></strong></td>';
				$body .= '<td style="text-align: right;"><strong>'.number_format(get_price($pid),0, ',', '.').'</strong></td>';
				$body .= '<td style="text-align: center;">'.$q.'</td>';
				$body .= '<td style="text-align: right;"><span style="font-size:14px;"><span style="color:#cc0000;"><strong>'.number_format(get_price($pid)*$q,0, ',', '.') .' VNĐ</strong></span></span></td>';
			}
			$body .= '
			<tr>
			<td colspan="5" style="text-align: center;"><span style="font-size:16px;"><strong><span style="color:#cc0000;">Tổng tiền hàng</span></strong></span></td>
			<td style="text-align: right;"><span style="font-size:16px;"><span style="color:#cc0000;"><strong>'. number_format(get_order_total(),0, ',', '.') .' VNĐ</strong></span></span></td>
			</tr>
			<tr>
			<td colspan="5" style="text-align: center;"><span style="font-size:18px;"><span style="color:#ff0000;"><b>TỔNG THANH TOÁN</b></span></span></td>
			<td style="text-align: right;"><span style="font-size:18px;"><span style="color:#ff0000;"><strong>'. number_format(get_order_total()+$phivanchuyen,0, ',', '.') .' VNĐ</strong></span></span></td>
			</tr>
			</tbody>
			</table>
			';
/*
		<tr>
			<td colspan="5" style="text-align: center;"><span style="font-size:16px;"><span style="color:#000099;"><strong>Phí vận chuyển</strong></span></span></td>
			<td style="text-align: right;"><span style="font-size:16px;"><span style="color:#000099;"><strong>'. number_format($phivanchuyen,0, ',', '.') .' VNĐ</strong></span></span></td>
		</tr>
*/
		$body .='
		<hr />
		<p><span style="font-size:20px;"><strong><span style="color:#ff0000;">'.$row_setting['ten_'.$lang].'</span></strong></span><br />
		ADD: <strong>'.$row_setting['diachi_'.$lang].'</strong><br />
		PHONE:<strong> '.$row_setting['dienthoai'].'</strong><br />
		HOTLINE: <strong>'.$row_setting['hotline'].'</strong><br />
		EMAIL: <strong>'.$row_setting['email'].'</strong><br />
		&nbsp;</p>
		<p>Đây là email được gửi tự động từ website <span style="line-height: 20.7999992370605px;">'._SITEURL_.'</span>, vui lòng không trả lời email này vì chúng tôi sẽ không nhận được email của bạn. Nếu không hiểu về nội dung email này hãy đơn giản xóa nó khỏi hòm thư của bạn. Chân thành cảm ơn!</p>
		</div>
		';
		$sql = "INSERT INTO  table_order (madonhang,hoten,dienthoai,diachi,email,ptthanhtoan,tonggia,noidung,ngaytao,trangthai,tinhthanh,quanhuyen,phivanchuyen,mathanhvien,diachigiaohang,thoigian)  VALUES ('$mahoadon','$ten_input','$dienthoai_input','$diachi_input','$email_input','$phuongthuc_input','$tonggia','$noidung_input','$ngaydangky','1','$tinhthanh','$quanhuyen','$phivanchuyen','$mathanhvien','$diachigiaohang', '$thoigiangiao')";
		mysql_query($sql);
		$id_order = mysql_insert_id();
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid = $_SESSION['cart'][$i]['productid'];
			$q = $_SESSION['cart'][$i]['qty'];
			$pname = get_product_name($pid);
			$gia = get_price($pid);
			if($q==0) continue;
			$data1['id_product'] = $pid;
			$data1['id_order'] = $id_order;
			$data1['ten'] = $pname;
			$data1['gia'] = $gia;
			$data1['soluong'] = $q;
			$d->setTable('order_detail');
			$d->insert($data1);
		}
		$mail->Body = $body;
		if($mail->Send()){
			echo 1;
				// if($phuongthuc_input == 'Thanh toán Onepay'){
				// $tonggi = get_order_total()*100;
				// $stt = fns_Rand_digit(0,9,12);
				// echo  $form_tt = '<input type="hidden" name="virtualPaymentClientURL" id="virtualPaymentClientURL" value="https://mtf.onepay.vn/onecomm-pay/vpc.op">  
				// 	             <input type="hidden" name="vpc_Version" value="2" />
				// 	             <input type="hidden" name="vpc_Currency" id="vpc_Currency" value="VND" />
				// 	             <input type="hidden" name="vpc_Command" value="pay" />
				// 	             <input type="hidden" name="vpc_AccessCode" id="vpc_AccessCode" value="D67342C2" />
				// 	             <input type="hidden" name="vpc_Merchant" id="vpc_Merchant" value="ONEPAY" />
				//                  <input type="hidden" name="vpc_Locale" value="vn" />
				//                  <input type="hidden" name="vpc_ReturnURL" id="vpc_ReturnURL" value="http://'._SITEURL_.'/noidia_php/dr.php" />
				//                  <input type="hidden" name="vpc_MerchTxnRef" value="'.$mahoadon.'" />
				//                  <input type="hidden" name="vpc_OrderInfo" value="'.$stt.'" />
				//                  <input type="hidden" name="vpc_Amount" value="'.$tonggi.'" />
				//                  <input type="hidden" name="vpc_TicketNo" value="'.$_SERVER['REMOTE_ADDR'].'" />
				//                  <input type="hidden" name="AgainLink" value="'.getCurrentPageURL().'" />
				//                  <input type="hidden" name="Title" value="'._thanhtoan.'" />';
				// } else {
				// 	echo 1;
				// }
			unset($_SESSION['cart']);			
		}
		else echo 0;
		?>