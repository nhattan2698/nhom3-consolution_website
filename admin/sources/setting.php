<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
	get_gioithieu();
	$template = "setting/item_add";
	break;
	case "save":
	save_gioithieu();
	break;
	
	default:
	$template = "index";
}

function get_gioithieu(){
	global $d, $item, $tieude,$desktop;

	$sql = "select * from #_setting limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
	$tieude = json_decode($item['tieude'], TRUE);
	$desktop = json_decode($item['desktop'], TRUE);
}

function save_gioithieu(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
	
	if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
		$data['photo'] = $photo;	
	}
	
	$data['ten_vi'] = addslashes($_POST['ten_vi']);
	$data['ten_en'] = addslashes($_POST['ten_en']);
	$data['slogan_vi'] = addslashes($_POST['slogan_vi']);
	$data['slogan_en'] = addslashes($_POST['slogan_en']);
	$data['diachi_vi'] = addslashes($_POST['diachi_vi']); 	
	$data['diachi2_vi'] = addslashes($_POST['diachi2_vi']); 	
	$data['diachi_en'] = addslashes($_POST['diachi_en']);

	$data['linkgps'] = addslashes($_POST['linkgps']);
	$data['pagenumber'] = addslashes($_POST['pagenumber']);
	$data['maxfilter'] = addslashes($_POST['maxfilter']);
	// $data['thu2'] = $_POST['thu2'];
	// $data['chunhat'] = $_POST['chunhat'];
	// $data['tenph'] = $_POST['tenph'];
	// $data['dienthoaiph'] = $_POST['dienthoaiph'];
	// $data['emailph'] = $_POST['emailph'];
	// $data['ngoaigio'] = $_POST['ngoaigio'];
	// $data['datve'] = $_POST['datve'];
	upload_image("dongdau", 'png', '../upload/','watermark');

	$tieude = $_POST['tieude'];
	if (!empty($tieude)) {
		foreach ($tieude as $key => $value) {
			$tieude[$key] = addslashes($value);
		}
	}

	$data['tieude'] = json_encode($tieude, JSON_UNESCAPED_UNICODE);
	$desktop = $_POST['desktop'];
	$data['desktop'] = json_encode($desktop, JSON_UNESCAPED_UNICODE);

	$data['dienthoai'] = addslashes($_POST['dienthoai']);
	$data['email'] = addslashes($_POST['email']);
	$data['website'] = addslashes($_POST['website']);
	$data['gsitekey'] = addslashes($_POST['gsitekey']);
	$data['gsecretkey'] = addslashes($_POST['gsecretkey']);
	
	$data['facebook'] = addslashes($_POST['facebook']);
	$data['toado'] = addslashes($_POST['toado']);
	$data['hotline'] = addslashes($_POST['hotline']);
	
	$data['thoigian'] = addslashes($_POST['thoigian']);
	$data['analytics'] = addslashes($_POST['analytics']);
	$data['iframemap'] = addslashes($_POST['iframemap']);
	$data['vchat'] = addslashes($_POST['vchat']);

	$data['title'] = addslashes($_POST['title']);
	$data['keywords'] = addslashes($_POST['keywords']);
	$data['description'] = addslashes($_POST['description']);
	
	$d->reset();
	$d->setTable('setting');
	if($d->update($data))
		header("Location:index.php?com=setting&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>