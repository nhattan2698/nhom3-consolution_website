<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~8192);
@define ( '_lib' , '../libraries/');
include_once _lib."config.php";
include_once _lib."constant.php";;
include_once _lib."functions.php";
include_once _lib."functions_giohang.php";
include_once _lib."class.database.php";
$lang=$_SESSION['lang'];
$d = new database($config['database']);	
$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting= $d->fetch_array();
$email_reset = $_POST['email_reset'];
$sql = "select * from #_member where email='".$email_reset."'";
$d->query($sql);
$row_result= $d->fetch_array();

if(empty($row_result)){
	// Email không tồn tại
	echo 0;
}else{
	$str_code = ChuoiNgauNhien(10);
	$str_code = md5($str_code);
	$sql_update = "UPDATE #_member SET codereset='".$str_code."' WHERE email='".$email_reset."'";
	$d->query($sql_update);
	include_once "../phpMailer/class.phpmailer.php";	
	$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = $config_ip; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = $config_email; // SMTP account username
		$mail->Password   = $config_pass;  
		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom($config_email,$row_setting['ten_'.$lang]);
		//Thiết lập thông tin người nhận
		$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
		$mail->AddAddress($email_reset, $row_result['ten']);
		//Thiết lập email nhận email hồi đáp
		//nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($row_setting['email'],$row_setting['ten_'.$lang]);
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
		*=====================================*/
		//Thiết lập tiêu đề
		$mail->Subject    = 'CẤP LẠI MẬT KHẨU '.$row_setting['ten_'.$lang];
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";		
		$body = '<table style="text-align:left">';
		$body .= '
		<tr>
		<th colspan="2">&nbsp;</th>
		</tr>
		<tr>
		<th colspan="2">Thông báo Từ :  <a href="'._SITEURL_.'">'.$row_setting['ten_'.$lang].'</a></th>
		</tr>
		<tr>
		<th colspan="2">Ai đó đã dùng email này để lấy lại password thành viên của bạn trên trang  '._SITEURL_.' . Nếu đúng là bạn muốn lấy lại password xin vui lòng nhấn vào links bên dưới để lấy lại thông tin đăng nhập của bạn .</th>
		</tr>
		<tr>
		<th colspan="2">
		<a href="'._SITEURL_.'/reset-mat-khau.html&code='.$str_code.'&email='.$email_reset.'">Nhấn Vào Đây . </a>
		</td>
		</tr>
		<tr>
		<th colspan="2">http://'._SITEURL_.'/reset-mat-khau.html&code='.$str_code.'&email='.$email_reset.'</td>
		</tr>
		<tr>
		<th colspan="2">Nếu bạn không yêu cầu lấy lại pass vui lòng bỏ qua email này của chúng tôi .</th>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>
		<th colspan="2"><i>Lưu ý : Đây là mail tự động từ hệ thống, mọi thông tin phản hồi mail này chúng tôi không thể nhận được!</i> .</th>
		</tr>
		';
		$body .= '</table>';	
		$mail->Body = $body;
		if($mail->Send()){
				//Thành công
			echo 1;
		}else{
				//Lỗi thệ thôngs
			echo 2;
		}
	}
	?>