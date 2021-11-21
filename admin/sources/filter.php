<?php	if(!defined('_source')) die("Error");
switch($act){
	case "man":
	get_items();
	$template = "filter/items";
	break;
	case "add":		
	$template = "filter/item_add";
	break;
	case "edit":		
	get_item();
	$template = "filter/item_add";
	break;
	case "save":
	save_item();
	break;
	case "delete":
	delete_item();
	break;	
	default:
	$template = "index";
}
#====================================
function get_items(){
	global $d, $items, $paging,$page;
	if($_REQUEST['noibat']!='')
	{
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "SELECT id,noibat FROM table_filter where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$time=time();
		$hienthi=$cats[0]['noibat'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_filter SET noibat =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_filter SET noibat =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_filter where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_filter SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_filter SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$where = " #_filter ";
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten_vi LIKE '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	$where .=" order by stt desc";
	$sql = "select ten_vi,id,stt,hienthi from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
	$url = "index.php?com=filter&act=man&type=".$_GET['type']."".$link_add;
	$paging = pagination($where,$per_page,$page,$url);		
}
function get_item(){
	global $d, $item,$ds_tags,$item_value;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=filter&act=man&type=".$_GET['type']);	
	$sql = "select * from #_filter where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=filter&act=man&type=".$_GET['type']);
	$item = $d->fetch_array();	
	$sql = "select * from #_filter_value where id_filter='".$id."' order by stt,id desc";
	$d->query($sql);
	$item_value = $d->result_array();
}
function save_item(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=filter&act=man&type=".$_GET['type']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_filter,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 295, 195, _upload_filter,$file_name,1);		
			$d->setTable('filter');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_filter.$row['photo']);	
				delete_file(_upload_filter.$row['thumb']);				
			}
		}
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenhienthi_vi'] = $_POST['tenhienthi_vi'];
		$data['tenhienthi_en'] = $_POST['tenhienthi_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('filter');
		$d->setWhere('id', $id);
		if($d->update($data)){
			$sql = "delete from #_filter_value where id_filter='".$id."'";
			$d->query($sql);
			$d->setTable('filter_value');
			$property = $_POST['property'];
			foreach ($property as $key => $value) {
				$property[$key]['id_filter']= $id;
				if (!empty($property[$key]['ten_vi'])) {
					# code...
					$d->insert($property[$key]);
				}
			}
			redirect("index.php?com=filter&act=man&curPage=".$_REQUEST['curPage']."&type=".$_GET['type']);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=filter&act=man&type=".$_GET['type']);
	}else{
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenhienthi_vi'] = $_POST['tenhienthi_vi'];
		$data['tenhienthi_en'] = $_POST['tenhienthi_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['type'] = $_REQUEST['type'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('filter');
		if($d->insert($data))
		{
			$id = mysql_insert_id();
			$d->setTable('filter_value');
			$property = $_POST['property'];
			foreach ($property as $key => $value) {
				$property[$key]['id_filter']= $id;
				if (!empty($property[$key]['ten_vi'])) {
					$d->insert($property[$key]);
				}
			}
			redirect("index.php?com=filter&act=man&type=".$_GET['type']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=filter&act=man&type=".$_GET['type']);
	}
}
function delete_item(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id from #_filter where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_filter where id='".$id."'";
			$d->query($sql);
			$sql = "delete from #_filter_value where id_filter='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=filter&act=man&curPage=".$_REQUEST['curPage']."&type=".$_GET['type']);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=filter&act=man&curPage=".$_REQUEST['curPage']."&type=".$_GET['type']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id from #_filter where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				$sql = "delete from #_filter where id='".$id."'";
				$d->query($sql);
				$sql = "delete from #_filter_value where id_filter='".$id."'";
				$d->query($sql);
			}
		}
		redirect("index.php?com=filter&act=man&curPage=".$_REQUEST['curPage']."&type=".$_GET['type']);
	} else {
		transfer("Không nhận được dữ liệu", "index.php?com=filter&act=man&curPage=".$_REQUEST['curPage']."&type=".$_GET['type']);
	}
}
?>