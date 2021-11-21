<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~8192);
@define ( '_lib' , '../libraries/');
include_once _lib."config.php";
include_once _lib."constant.php";;
include_once _lib."functions_giohang.php";
include_once _lib."class.database.php";
$d = new database($config['database']);		
$username = $_POST['username'];
$password = $_POST['password'];	


$sql = "select * from #_member where username='".$username."'";
$d->query($sql);
$row_result= $d->fetch_array();

if (empty($row_result)) {
	$sql = "select * from #_member where email='".$username."'";
	$d->query($sql);
	$row_result= $d->fetch_array();
}

if (empty($row_result)) {
	$sql = "select * from #_member where dienthoai='".$username."'";
	$d->query($sql);
	$row_result= $d->fetch_array();
}


if (!empty($row_result)) {
	if($row_result['active']==1)
	{
		if($row_result['block_user']==1){
	// Tài khoản bị khóa
			echo 1;
		}else{
			if ($row_result['password'] ==  md5($password)) {
				$sql_lanxem = "UPDATE #_member SET lastlogin='".time()."' WHERE username ='".$username."'";
				$d->query($sql_lanxem);
				$_SESSION['login']['status'] = true;
				$_SESSION['login']['user'] = $username;
				$_SESSION['login']['name'] = $row_result['ten'];
				$_SESSION['login']['sex'] = $row_result['sex'];				
				$_SESSION['login']['email'] = $row_result['email'];				
				$_SESSION['login']['diachi'] = $row_result['diachi'];				
				$_SESSION['login']['dienthoai'] = $row_result['dienthoai'];				
				$_SESSION['login']['mathanhvien'] = $row_result['mathanhvien'];				
			// Đăng nhập thành công
				echo 4;
			} else {
		// Sai mật khẩu
				echo 3;
			}
		}
	}else{
	// Tài khoản chưa được kích hoạt
		echo 0;
	}
} else {
		// Tên đăng nhập không tồn tại
	echo 2;
}
?>