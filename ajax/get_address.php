<?php 
session_start();
@define ( '_lib' , '../libraries/');
include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";
include_once _lib."class.database.php";
$d = new database($config['database']);
$type_get = $_POST['type_get'];
$id_get = $_POST['id_get'];
if ($type_get == 'city') {
	$d->reset();
	$sql = "select id,ten from #_place_city where hienthi=1 order by ten asc";
	$d->query($sql);
	$result_value = $d->result_array();
	$str = '	
	<option value="">Chọn tỉnh/thành phố</option>';
	foreach ($result_value as $key => $value) {
		$str.='<option value="'.$value['id'].'">'.$value['ten'].'</option>';
	}
	echo $str;
}
if ($type_get == 'dist') {
	$d->reset();
	$sql = "select id,ten from #_place_dist where hienthi=1 and id_city='".$id_get."' order by ten asc";
	$d->query($sql);
	echo $sql;
	$result_value = $d->result_array();
	$str = '	
	<option value="">Chọn Quận/Huyện</option>';
	foreach ($result_value as $key => $value) {
		$str.='<option value="'.$value['id'].'">'.$value['ten'].'</option>';
	}
	echo $str;
}
if ($type_get == 'ward') {
	$d->reset();
	$sql = "select id,ten from #_place_ward where hienthi=1 and id_dist='".$id_get."' order by ten asc";
	$d->query($sql);
	$result_value = $d->result_array();
	$str = '	
	<option value="">Chọn Xã/Phường</option>';
	foreach ($result_value as $key => $value) {
		$str.='<option value="'.$value['id'].'">'.$value['ten'].'</option>';
	}
	echo $str;
}
if ($type_get == 'street') {
	$d->reset();
	$sql = "select id,ten from #_place_street where hienthi=1 and id_dist='".$id_get."' order by ten asc";
	echo $sql;
	$d->query($sql);
	$result_value = $d->result_array();
	$str = '	
	<option value="">Chọn Đường/Phố</option>';
	foreach ($result_value as $key => $value) {
		$str.='<option value="'.$value['id'].'">'.$value['ten'].'</option>';
	}
	echo $str;
}
?>