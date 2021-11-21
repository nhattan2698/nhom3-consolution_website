<?php
$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

$d = new database($config['database']);

$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;
$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting= $d->fetch_array();
$config_Gsitekey = $row_setting['gsitekey'];
$config_Gsecretey = $row_setting['gsecretkey'];
$d->reset();
$sql = "select thumb_$lang from #_photo where type='favicon'";
$d->query($sql);
$favicon = $d->fetch_array();
function getComRecord(){
	global $d, $com;
	$array = array(
		array("table"=>"baiviet","com"=>"gioi-thieu","type"=>"gioithieu","id"=>0),


		array("table"=>"baiviet","com"=>"san-pham","type"=>"chukyso","id"=>0),
		array("table"=>"baiviet_list","com"=>"san-pham","type"=>"chukyso","idl"=>0),
		array("table"=>"baiviet_cat","com"=>"san-pham","type"=>"chukyso","idc"=>0),

		array("table"=>"baiviet","com"=>"ho-tro","type"=>"hotro","id"=>0),
 		array("table"=>"baiviet","com"=>"khach-hang","type"=>"khachhang","id"=>0),
		array("table"=>"baiviet","com"=>"tin-tuc","type"=>"tintuc","id"=>0),
	);
	$slug = $com;
	foreach($array as $k=>$v){
		$d->query("select * from #_".$v['table']." where tenkhongdau = '$slug' and type='".$v['type']."'");		
		if($d->num_Rows()){
			$myd = $d->fetch_array();
			$v['id'] = $myd['tenkhongdau'];
			$arr_rs = $v;
			break;
		}
	}
	if (!empty($arr_rs)) {
		return $arr_rs;
	}else{
		$arr_rs['com'] = $com;
		return $arr_rs;
	}
}
if(!empty($com)){ 
	$rs = getComRecord();
	$com = $rs['com'];
	if(isset($rs['id'])){
		$_GET['id'] = $rs['id'];
	}
	if(isset($rs['idl'])){
		unset($_GET['id']);
		$_GET['idl'] = $_REQUEST['com'];
	}  
	if(isset($rs['idc'])){
		$_GET['idc'] = $_REQUEST['com'];
		unset($rs['id']);
		unset($_GET['id']);
		unset($_GET['idl']);
	}	
	if(isset($rs['idi'])){
		$_GET['idi'] = $_REQUEST['com'];
		unset($rs['id']);
		unset($_GET['id']);
		unset($_GET['idl']);
		unset($_GET['idc']);
	}	
}
$blockleft     = 0;
switch($com){
	case 'setlang':
	if(isset($_GET['lang'])){
		switch($_GET['lang']){
			case 'vi':
			$_SESSION['lang']='vi';
			break;
			case 'en':
			$_SESSION['lang']='en';
			break;			
		}
	}else{
		$_SESSION['lang']='vi';
	}
	break;
	case 'gioi-thieu':
	$source       = "news";
	$template     = isset($_GET['id']) ? "news-horizontal_detail" : "news-horizontal";
	$type_bar     = 'gioithieu';
	$title_detail = _gioithieu;
	break;
  
	case 'tin-tuc':
	$source       = "news";
	$template     = isset($_GET['id']) ? "news-horizontal_detail" : "news-horizontal";
	$type_bar     = 'tintuc';
	$title_detail = _tintuc;
	break;

	case 'dich-vu-ho-tro':
	$source       = "support";
	$template     = "support";
	$type_bar     = 'support';
	$title_detail = 'Dịch vụ hỗ trợ';
	break;

	case 'khach-hang':
	$source       = "news";
	$template     = isset($_GET['id']) ? "news-horizontal_detail" : "news-horizontal";
	$type_bar     = 'khachhang';
	$title_detail = 'Khách hàng';
	break;

	case 'san-pham':
	$source       = "news";
	$template     = isset($_GET['id']) ? "news-horizontal_detail" : "product-horizontal";
	$type_bar     = 'chukyso';
	$title_detail = 'Sản phẩm';
	break;

	case 'tim-kiem':
	$source       = "search";
	$template     = "timkiem";
	$type_bar     = 'chukyso';
	$title_detail = 'Tìm kiếm';
	break;

	case 'video':
	$source       = "video";
	// $template     = isset($_GET['id']) ? "news-horizontal_detail" : "news-horizontal";
	$template     = "video";
	$type_bar     = 'videos';
	$title_detail = 'Video hướng dẫn';
	break;
 
	case 'download':
	$source       = "newsdownload";
	$template     = "newsdownload";
	$type_bar     = 'software';
	$title_detail = 'Download phần mềm';
	break;
	case 'lien-he':
	$source       = "contact";
	$template     = "contact";
	$title_detail = _lienhe;
	break;

	case 'dang-ky-su-dung-san-pham':
	$source       = "contact";
	$template     = "register-product";
	$title_detail = 'Đăng ký sử dụng sản phẩm';
	break;
 
	default: 
	$source = "index";
	$template = "index";
	$no_container = "true";
	break;
}
if($source!="") include _source.$source.".php";
if($_REQUEST['com']=='logout')
{
	session_unregister($login_name);
	header("Location:index.php");
}		
if($_REQUEST['com']=='thoat')
{
	unset($_SESSION['login']);
	header("location:./");
}		
?>