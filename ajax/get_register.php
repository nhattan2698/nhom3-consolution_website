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
// READ data POST
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$birth = $_POST['birth'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$sql = "select * from #_member where username='".$username."'";
$d->query($sql);
$row_result= $d->fetch_array();
if(!empty($row_result)){
	//User name đã tồn tại
	echo 1;
}else{		
	$sql = "select * from #_member where email='".$email	."'";
	$d->query($sql);
	$row_result= $d->fetch_array();
	if(!empty($row_result)){
		//Email đã tồn tại
		echo 2;
	}else{
		// Register new
		$data['mathanhvien'] = 'MEM'.time();
		$data['username'] = $username;
		$data['email'] = $email;
		$data['ten'] = $name;
		$data['ngaysinh'] = $birth;
		$data['diachi'] = $address;
		$data['dienthoai'] = $phone;
		$data['sex'] = $sex;
		$data['password'] = md5($password);
		$data['ngaydangky'] = time();
		$data['codereset'] = md5(ChuoiNgauNhien(10));
		$data['active'] = 1;
		$d->setTable('member');
		if($d->insert($data)){
			// thêm thành viên thành công
			echo 3;
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
		$mail->AddAddress($email, $name);
		//Thiết lập email nhận email hồi đáp
		//nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($row_setting['email'],$row_setting['ten_'.$lang]);
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
		*=====================================*/
		//Thiết lập tiêu đề
		$mail->Subject    = 'ĐĂNG KÝ THÀNH VIÊN '.$row_setting['ten_'.$lang];
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
		$body = '<table style="text-align:left;">';
		$body .= '
		<tr>
		<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
		<td colspan="2">Bạn '.$name.' Thân  Mến ! </td>
		</tr>
		<tr>
		<td colspan="2">Cảm ơn bạn đã đăng ký thành viên trên http://'._SITEURL_.'/. Thông tin đăng nhập của bạn đã đăng ký: </td>
		</tr>
		<tr>
		<th width="100px">Tên truy cập :</th><td> <b>'.$username.'</b></td>
		</tr>
		<tr>
		<th width="100px">Mật khẩu : </th><td> <b>'.$password.'</b></td>
		</tr>
		<tr>
		<th width="100px">Email : </th><td> <b>'.$email.'</b></td>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>
		<td colspan="2"><i><b>Lưu Ý </b> : Đây là thư hổ trợ tự động , mọi phản hồi về mail này điều không được duyệt .</i></td>
		</tr>
		';
		$body .= '</table>';
		$mail->Body = $body;
		$mail->Send();
	}
}
}
?>