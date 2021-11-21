<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "man":
	get_items();
	$template = "element/items";
	break;
	case "add":
	$template = "element/item_add";
	break;
	case "edit":
	get_item();
	$template = "element/item_add";
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
function get_items(){
	global $d, $items, $paging;
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);
		if($multi=='show'){
			for($i=0;$i<$count;$i++){
				$sql = "UPDATE table_element SET display =1 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=element&act=man");			
		}
		if($multi=='hide'){
			for($i=0;$i<$count;$i++){
				$sql = "UPDATE table_element SET display =0 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=element&act=man");			
		}
		if($multi=='del'){
			for($i=0;$i<$count;$i++){							
				$sql = "delete from table_element where id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");			
			}
			redirect("index.php?com=element&act=man");			
		}				
	}
	if(@$_REQUEST['display']!='')
	{
		$id_up = @$_REQUEST['display'];
		$sql_sp = "SELECT id,display FROM table_element where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$display=$cats[0]['display'];
	//echo "id:". $spdc1;
		if($display==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_element SET display =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_element SET display =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	$sql="SELECT count(id) AS numrows FROM #_element";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	$pageSize=10;
	$offset=5;
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	$sql = "select * from #_element order by stt,id desc limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link='index.php?com=element&act=man';		
}
function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=element&act=man");
	$sql = "select * from #_element where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=element&act=man");
	$item = $d->fetch_array();
}
function save_item(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=element&act=man");
	// dump($_POST);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
				if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 150, 100, _upload_hinhanh,$file_name,2);		
			$d->setTable('element');
			// $d->setWhere('type', $type);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);	
				delete_file(_upload_hinhanh.$row['thumb']);				
			}
		}

		$id =  themdau($_POST['id']);
		$data['name2_vi'] = $_POST['name2_vi'];
		$data['name_vi'] = $_POST['name_vi'];
		$data['name_cn'] = $_POST['name_cn'];
		$data['name_en'] = $_POST['name_en'];
		$data['quantity_vi'] = $_POST['quantity_vi'];
		$data['quantity_en'] = $_POST['quantity_en'];
		$data['quantity_cn'] = $_POST['quantity_cn'];
		$data['desp_vi'] = magic_quote($_POST['desp_vi']);
		$data['detail_vi'] = magic_quote($_POST['detail_vi']);
		$data['desp_en'] = magic_quote($_POST['desp_en']);
		$data['detail_en'] = magic_quote($_POST['detail_en']);
		$data['desp_cn'] = magic_quote($_POST['desp_cn']);
		$data['detail_vi'] = magic_quote($_POST['detail_vi']);
		$data['detail_en'] = magic_quote($_POST['detail_en']);
		$data['detail_cn'] = magic_quote($_POST['detail_cn']);
		$data['address_vi'] = magic_quote($_POST['address_vi']);
		$data['address_en'] = magic_quote($_POST['address_en']);
		$data['address_cn'] = magic_quote($_POST['address_cn']);
		$data['email'] = magic_quote($_POST['email']);
		$data['website'] = magic_quote($_POST['website']);
		$data['hotline_vi'] = magic_quote($_POST['hotline_vi']);
		$data['phone_vi'] = magic_quote($_POST['phone_vi']);
		$data['hotline_en'] = magic_quote($_POST['hotline_en']);
		$data['phone_en'] = magic_quote($_POST['phone_en']);
		$data['hotline_cn'] = magic_quote($_POST['hotline_cn']);
		$data['phone_cn'] = magic_quote($_POST['phone_cn']);
		$data['geo'] = magic_quote($_POST['geo']);	
		$data['display'] = isset($_POST['active']) ? 1 : 0;
		$d->setTable('element');
		$d->setWhere('id', $id);
		if($d->update($data))
			// header("Location:index.php?com=element&act=man");
			// transfer("Thêm thành công", "index.php?com=element&act=man");
			redirect($_SESSION['links_re']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=element&act=man");
	}else{ // them element
				if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 150, 100, _upload_hinhanh,$file_name,2);
		}	
		$data['name2_vi'] = $_POST['name2_vi'];
		$data['name_vi'] = $_POST['name_vi'];
		$data['name_cn'] = $_POST['name_cn'];
		$data['name_en'] = $_POST['name_en'];
		$data['quantity_vi'] = $_POST['quantity_vi'];
		$data['quantity_en'] = $_POST['quantity_en'];
		$data['quantity_cn'] = $_POST['quantity_cn'];
		$data['desp_vi'] = magic_quote($_POST['desp_vi']);
		$data['detail_vi'] = magic_quote($_POST['detail_vi']);
		$data['desp_en'] = magic_quote($_POST['desp_en']);
		$data['detail_en'] = magic_quote($_POST['detail_en']);
		$data['desp_cn'] = magic_quote($_POST['desp_cn']);
		$data['detail_vi'] = magic_quote($_POST['detail_vi']);
		$data['detail_en'] = magic_quote($_POST['detail_en']);
		$data['detail_cn'] = magic_quote($_POST['detail_cn']);
		$data['address_vi'] = magic_quote($_POST['address_vi']);
		$data['address_en'] = magic_quote($_POST['address_en']);
		$data['address_cn'] = magic_quote($_POST['address_cn']);
		$data['email'] = magic_quote($_POST['email']);
		$data['website'] = magic_quote($_POST['website']);
		$data['hotline_vi'] = magic_quote($_POST['hotline_vi']);
		$data['phone_vi'] = magic_quote($_POST['phone_vi']);
		$data['hotline_en'] = magic_quote($_POST['hotline_en']);
		$data['phone_en'] = magic_quote($_POST['phone_en']);
		$data['hotline_cn'] = magic_quote($_POST['hotline_cn']);
		$data['phone_cn'] = magic_quote($_POST['phone_cn']);
		$data['geo'] = magic_quote($_POST['geo']);	
		$data['display'] = isset($_POST['active']) ? 1 : 0;
		$d->setTable('element');
		if($d->insert($data))
			// header("Location:index.php?com=element&act=man");
			redirect($_SESSION['links_re']);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=element&act=man");
	}
}
function delete_item(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		// xoa item
		$sql = "delete from #_element where id='".$id."'";
		if($d->query($sql))
			header("Location:index.php?com=element&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=element&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=element&act=man");
}
?>