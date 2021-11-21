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
	function delete_photo1($id){
	global $d;
	if(isset($id)){
		 
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()!=0){
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh_l.$row['photo_vi']);
		if($d->delete()){
			echo 'Xóa thành công';
			}else{
				echo 'Xóa không thành công';
				}
		}
		
	}
}
	
if(!empty($_POST)){
	 
	delete_photo1($_POST['id_photo']);
	

}
	
?> 