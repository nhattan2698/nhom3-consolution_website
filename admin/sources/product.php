<?php	if(!defined('_source')) die("Error");
switch($act){
	case "man_list":
	get_lists();
	$template = "product/list/items";
	break;
	case "add_list":		
	$template = "product/list/item_add";
	break;
	case "edit_list":		
	get_list();
	$template = "product/list/item_add";
	break;
	case "save_list":
	save_list();
	break;
	case "delete_list":
	delete_list();
	break;	
	#===================================================
	case "man_cat":
	get_cats();
	$template = "product/cat/items";
	break;
	case "add_cat":		
	$template = "product/cat/item_add";
	break;
	case "edit_cat":		
	get_cat();
	$template = "product/cat/item_add";
	break;
	case "save_cat":
	save_cat();
	break;
	case "delete_cat":
	delete_cat();
	break;	
	#===================================================
	case "man_item":
	get_items();
	$template = "product/item/items";
	break;
	case "add_item":		
	$template = "product/item/item_add";
	break;
	case "edit_item":		
	get_item();
	$template = "product/item/item_add";
	break;
	case "save_item":
	save_item();
	break;
	case "delete_item":
	delete_item();
	break;
	#===================================================
	case "man_sub":
	get_subs();
	$template = "product/sub/items";
	break;
	case "add_sub":		
	$template = "product/sub/item_add";
	break;
	case "edit_sub":		
	get_sub();
	$template = "product/sub/item_add";
	break;
	case "save_sub":
	save_sub();
	break;
	case "delete_sub":
	delete_sub();
	break;	
	#===================================================
	case "man":
	get_mans();
	$template = "product/man/items";
	break;
	case "add":		
	$template = "product/man/item_add";
	break;
	case "edit":		
	get_man();
	$template = "product/man/item_add";
	break;
	case "save":
	save_man();
	break;
	case "delete":
	delete_man();
	break;	
	#============================================================
	case "duyetbl":
	get_duyetbl();
	$template = "product/duyetbl";
	break;
	case "delete_binhluan":
	delete_binhluan();
	$template = "product/duyetbl";
	break;
	default:
	$template = "index";
}
#====================================
function get_mans(){
	global $d, $items, $paging,$page;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['banchay']!='')
	{
		$id_up = $_REQUEST['banchay'];
		$sql_sp = "SELECT id,banchay FROM table_product where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$time=time();
		$hienthi=$cats[0]['banchay'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET banchay =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET banchay =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "SELECT id,noibat FROM table_product where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$time=time();
		$hienthi=$cats[0]['noibat'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET noibat =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET noibat =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_product where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$where = " #_product ";
	$where .= " where type='".$_GET['type']."' ";
	if($_REQUEST['id_list']!='')
	{
		$where.=" and id_list = ".$_GET['id_list'];
		$link_add .= "&id_list=".$_GET['id_list'];
	}
	if($_REQUEST['id_cat']!='')
	{
		$where.=" and id_cat = ".$_GET['id_cat'];
		$link_add .= "&id_cat=".$_GET['id_cat'];
	}
	if($_REQUEST['id_item']!='')
	{
		$where.=" and id_item = ".$_GET['id_item'];
		$link_add .= "&id_item=".$_GET['id_item'];
	}
	if($_REQUEST['id_sub']!='')
	{
		$where.=" and id_sub = ".$_GET['id_sub'];
		$link_add .= "&id_sub=".$_GET['id_sub'];
	}
	if($_SESSION['login']['role']==1){
	}
	if($_REQUEST['soluong']!='')
	{	
		if($_GET['soluong']==1){
			$where.=" and soluong=0 ";
		} else{
			$where.=" and soluong > 0 and soluong < ".$_GET['soluong'];
		}
		$link_add .= "&soluong=".$_GET['soluong'];
	}
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten_vi LIKE '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	$where .=" order by id desc";
	$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat,noibat,id_item,id_sub,sp_banchay,soluong,sp_khuyenmai,hot,conhang from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);		
}
function get_man(){
	global $d, $item,$ds_tags,$ds_photo,$filters;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);	
	$sql = "select * from #_product where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();	
	$sql = "select * from #_product_photo where id_product='".$id."' and type='".$_GET['type']."' order by stt,id desc ";
	$d->query($sql);
	$ds_photo = $d->result_array();	
	$d->reset();
	$sql = "select isfilter, filter from #_product_list where id='".$item['id_list']."' limit 1";
	$d->query($sql);
	$productlist = $d->fetch_array();
	$filter = $productlist['filter'];
	if (!empty($filter)) {
		$d->reset();
		$sql = "select * from #_filter where hienthi=1 and id in ($filter) order by stt asc";
		$d->query($sql);
		$filters = $d->result_array();
	}
}
function save_man(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	$file_download=images_name($_FILES['file_download']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){
			$data['photo'] = $photo;
			//dongdauanh($photo,_upload_product);	
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
			$d->setTable('product');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);	
				delete_file(_upload_product.$row['thumb']);				
			}
		}
		if($file_d = upload_image("file_download", 'rar|zip|xls|xlsx|pdf|doc|docx|ppt|pptx', _upload_product,$file_download)){
			$data['file'] = $file_d;	
			$d->setTable('product');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['file']);			
			}
		}
		$data['id_list'] = (int)$_POST['id_list'];	
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_sub'] = (int)$_POST['id_sub'];
		$data['thuonghieu'] = (int)$_POST['thuonghieu'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['mota_cn'] = magic_quote($_POST['mota_cn']);
		$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		$data['rate'] = $_POST['rate'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['baohanh_vi'] = $_POST['baohanh_vi'];	
		$data['baohanh_en'] = $_POST['baohanh_en'];	
		$data['thongtin_vi'] = magic_quote($_POST['thongtin_vi']);	
		$data['thongtin_en'] = magic_quote($_POST['thongtin_en']);	
		$data['tinhtrang_vi'] = magic_quote($_POST['tinhtrang_vi']);
		$data['tinhtrang_en'] = magic_quote($_POST['tinhtrang_en']);
		$data['ten_en'] = $_POST['ten_en'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);	
		$data['giaban'] = str_replace(',','',$_POST['giaban']);
		$data['giacu'] = str_replace(',','',$_POST['giacu']);
		$data['soluong'] = str_replace(',','',$_POST['soluong']);
		$data['phi_hcm'] = str_replace(',','',$_POST['phi_hcm']);
		$data['phi_khac'] = str_replace(',','',$_POST['phi_khac']);
		$data['gial'] = str_replace(',','',$_POST['gial']);
		$data['giat'] = str_replace(',','',$_POST['giat']);
		$data['gian'] = str_replace(',','',$_POST['gian']);
		$data['giamgia'] = str_replace(',','',$_POST['giamgia']);
		$data['masp'] = $_POST['masp'];
		if($_POST['khuyenmai_vi']){
			$data['khuyenmai_vi'] = implode('|',$_POST['khuyenmai_vi']);
		}
		if($_POST['tags']){
			$data['tags'] = implode(',',$_POST['tags']);
		}
		if($_POST['size']){
			$data['size'] = implode(',',$_POST['size']);
		}
		if($_POST['mausac']){
			$data['mausac'] = implode(',',$_POST['mausac']);
		}
		if($_POST['filter']){
			$data['filter'] = implode(',',$_POST['filter']);
		}
		$data['uudiem_vi'] = magic_quote($_POST['uudiem_vi']);	
		$data['uudiem_en'] = magic_quote($_POST['uudiem_en']);	
		$data['uudiem_cn'] = magic_quote($_POST['uudiem_cn']);	
		$data['congdung_vi'] = magic_quote($_POST['congdung_vi']);	
		$data['congdung_en'] = magic_quote($_POST['congdung_en']);	
		$data['congdung_cn'] = magic_quote($_POST['congdung_cn']);	
		$data['thongso_vi'] = magic_quote($_POST['thongso_vi']);	
		$data['thongso_en'] = magic_quote($_POST['thongso_en']);	
		$data['thongso_cn'] = magic_quote($_POST['thongso_cn']);	
		$data['tieuchuan'] = magic_quote($_POST['tieuchuan']);	
		$data['quycach_vi'] = magic_quote($_POST['quycach_vi']);	
		$data['quycach_en'] = magic_quote($_POST['quycach_en']);	
		$data['quycach_cn'] = magic_quote($_POST['quycach_cn']);	
		$data['thanhphan_vi'] = magic_quote($_POST['thanhphan_vi']);	
		$data['thanhphan_en'] = magic_quote($_POST['thanhphan_en']);	
		$data['thanhphan_cn'] = magic_quote($_POST['thanhphan_cn']);	
		$data['baoquan_vi'] = magic_quote($_POST['baoquan_vi']);	
		$data['baoquan_en'] = magic_quote($_POST['baoquan_en']);	
		$data['baoquan_cn'] = magic_quote($_POST['baoquan_cn']);	


		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('product');
		$d->setWhere('id', $id);
		if($d->update($data)){
			if (isset($_FILES['files'])) {
				for($i=0;$i<count($_FILES['files']['name']);$i++){
					if($_FILES['files']['name'][$i]!=''){
						$file['name'] = $_FILES['files']['name'][$i];
						$file['type'] = $_FILES['files']['type'][$i];
						$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$file['error'] = $_FILES['files']['error'][$i];
						$file['size'] = $_FILES['files']['size'][$i];
						$file_name = images_name($_FILES['files']['name'][$i]);
						$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name);
						$data1['photo'] = $photo;
						//dongdauanh($data1['photo'],_upload_product);
						$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
						$data1['stt'] = (int)$_POST['stthinh'][$i];
						$data1['type'] = $_GET['type'];	
						$data1['id_product'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect($_SESSION['links_re']);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){
			$data['photo'] = $photo;
			//dongdauanh($data['photo'],_upload_product);		
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
		}		
		if($file_d = upload_image("file_download", 'rar|zip|xls|xlsx|pdf|doc|docx|ppt|pptx', _upload_product,$file_download)){
			$data['file'] = $file_d;
		}
		$data['id_list'] = (int)$_POST['id_list'];	
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_sub'] = (int)$_POST['id_sub'];
		$data['thuonghieu'] = (int)$_POST['thuonghieu'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['mota_cn'] = magic_quote($_POST['mota_cn']);
		$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);
		$data['xuatxu'] = $_POST['xuatxu'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);	
		$data['baohanh_vi'] = magic_quote($_POST['baohanh_vi']);
		$data['baohanh_en'] = magic_quote($_POST['baohanh_en']);
		$data['thongtin_vi'] = magic_quote($_POST['thongtin_vi']);	
		$data['thongtin_en'] = magic_quote($_POST['thongtin_en']);
		$data['thongso_vi'] = magic_quote($_POST['thongso_vi']);	
		$data['thongso_en'] = magic_quote($_POST['thongso_en']);
		$data['tinhtrang_vi'] = magic_quote($_POST['tinhtrang_vi']);	
		$data['tinhtrang_en'] = magic_quote($_POST['tinhtrang_en']);
		$data['gial'] = str_replace(',','',$_POST['gial']);
		$data['giat'] = str_replace(',','',$_POST['giat']);
		$data['gian'] = str_replace(',','',$_POST['gian']);
		$data['giamgia'] = str_replace(',','',$_POST['giamgia']);	
		$data['rate'] = $_POST['rate'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		$data['giacu'] = str_replace(',','',$_POST['giacu']);
		$data['soluong'] = str_replace(',','',$_POST['soluong']);
		$data['giaban'] = str_replace(',','',$_POST['giaban']);
		$data['phi_hcm'] = str_replace(',','',$_POST['phi_hcm']);
		$data['phi_khac'] = str_replace(',','',$_POST['phi_khac']);
		$data['masp'] = $_POST['masp'];

		$data['uudiem_vi'] = magic_quote($_POST['uudiem_vi']);	
		$data['uudiem_en'] = magic_quote($_POST['uudiem_en']);	
		$data['uudiem_cn'] = magic_quote($_POST['uudiem_cn']);	
		$data['congdung_vi'] = magic_quote($_POST['congdung_vi']);	
		$data['congdung_en'] = magic_quote($_POST['congdung_en']);	
		$data['congdung_cn'] = magic_quote($_POST['congdung_cn']);	
		$data['thongso_vi'] = magic_quote($_POST['thongso_vi']);	
		$data['thongso_en'] = magic_quote($_POST['thongso_en']);	
		$data['thongso_cn'] = magic_quote($_POST['thongso_cn']);	
		$data['tieuchuan'] = magic_quote($_POST['tieuchuan']);	
		$data['quycach_vi'] = magic_quote($_POST['quycach_vi']);	
		$data['quycach_en'] = magic_quote($_POST['quycach_en']);	
		$data['quycach_cn'] = magic_quote($_POST['quycach_cn']);	
		$data['thanhphan_vi'] = magic_quote($_POST['thanhphan_vi']);	
		$data['thanhphan_en'] = magic_quote($_POST['thanhphan_en']);	
		$data['thanhphan_cn'] = magic_quote($_POST['thanhphan_cn']);	
		$data['baoquan_vi'] = magic_quote($_POST['baoquan_vi']);	
		$data['baoquan_en'] = magic_quote($_POST['baoquan_en']);	
		$data['baoquan_cn'] = magic_quote($_POST['baoquan_cn']);	


		if($_POST['khuyenmai_vi']){
			$data['khuyenmai_vi'] = implode('|',$_POST['khuyenmai_vi']);
		}
		if($_POST['tags']){
			$data['tags'] = implode(',',$_POST['tags']);
		}
		if($_POST['size']){
			$data['size'] = implode(',',$_POST['size']);
		}
		if($_POST['mausac']){
			$data['mausac'] = implode(',',$_POST['mausac']);
		}
		if($_POST['filter']){
			$data['filter'] = implode(',',$_POST['filter']);
		}
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['type'] = $_GET['type'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('product');
		if($d->insert($data))
		{	
			$id = mysql_insert_id();
			if (isset($_FILES['files'])) {
				for($i=0;$i<count($_FILES['files']['name']);$i++){
					if($_FILES['files']['name'][$i]!=''){
						$file['name'] = $_FILES['files']['name'][$i];
						$file['type'] = $_FILES['files']['type'][$i];
						$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$file['error'] = $_FILES['files']['error'][$i];
						$file['size'] = $_FILES['files']['size'][$i];
						$file_name = images_name($_FILES['files']['name'][$i]);
						$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name);
						$data1['photo'] = $photo;
						//dongdauanh($data1['photo'],_upload_product);
						$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
						$data1['stt'] = (int)$_POST['stthinh'][$i];
						$data1['type'] = $_GET['type'];	
						$data1['id_product'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect($_SESSION['links_re']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}
function delete_man(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,photo,thumb from #_product_photo where id_product='".$id."'";
		$d->query($sql);
		$photo_lq = $d->result_array();
		if(count($photo_lq)>0){
			for($i=0;$i<count($photo_lq);$i++){
				delete_file(_upload_product.$photo_lq[$i]['photo']);
				delete_file(_upload_product.$photo_lq[$i]['thumb']);
			}
		}
		$sql = "delete from #_product_photo where id_product='".$id."'";
		$d->query($sql);
		$d->reset();
		$sql = "select id,photo,thumb from #_product where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
				delete_file(_upload_product.$row['thumb']);
			}
			$sql = "delete from #_product where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);	
			$d->reset();
			$sql = "select id,photo,thumb from #_product_photo where id_product='".$id."'";
			$d->query($sql);
			$photo_lq = $d->result_array();
			if(count($photo_lq)>0){
				for($j=0;$j<count($photo_lq);$j++){
					delete_file(_upload_product.$photo_lq[$j]['photo']);
					delete_file(_upload_product.$photo_lq[$j]['thumb']);
				}
			}
			$sql = "delete from #_product_photo where id_product='".$id."'";
			$d->query($sql);
			$d->reset();
			$sql = "select id,photo,thumb from #_product where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#=================List===================
function get_lists(){
	global $d, $items, $paging,$page;
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_product_list where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$where = " #_product_list ";
	$where .= " where type='".$_GET['type']."' ";
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten_vi LIKE '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	$where .=" order by stt,id desc";
	$sql = "select ten_vi,id,stt,hienthi,noibat,menu,isfilter from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);
}
function get_list(){
	global $d, $item,$ds_photo;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$sql = "select * from #_product_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
	$sql = "select * from #_product_photo where id_productlist='".$id."' and type='".$_GET['type']."' order by stt,id desc ";
	$d->query($sql);
	$ds_photo = $d->result_array();	
	// dump($ds_photo);
}
function save_list(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	$file_quangcao=images_name($_FILES['quangcao']['name']);
	$file_icon=images_name($_FILES['icon']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
			$d->setTable('product_list');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);
				delete_file(_upload_product.$row['photo_thumb']);
			}
		}
		if($quangcao = upload_image("quangcao", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_quangcao)){
			$data['quangcao'] = $quangcao;	
			$data['quangcao_thumb'] = create_thumb($data['quangcao'], 1366, 320, _upload_product,$file_quangcao,1);		
			$d->setTable('product_list');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['quangcao']);	
				delete_file(_upload_product.$row['quangcao_thumb']);				
			}
		}
		if($icon = upload_image("icon", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_icon)){
			$data['icon'] = $icon;	
			$data['icon_thumb'] = create_thumb($data['icon'], 40, 40, _upload_product,$file_icon,2);		
			$d->setTable('product_list');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['icon']);	
				delete_file(_upload_product.$row['icon_thumb']);				
			}
		}
		if($_POST['filter']){
			$data['filter'] = implode(',',$_POST['filter']);
		}
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['name_en'] = $_POST['name_en'];
		$data['name_vi'] = $_POST['name_vi'];
		$data['links'] = $_POST['links'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();		
		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['mota_cn'] = magic_quote($_POST['mota_cn']);
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);
		$d->setTable('product_list');
		$d->setWhere('id', $id);
		if($d->update($data)){
			if (isset($_FILES['files'])) {
				for($i=0;$i<count($_FILES['files']['name']);$i++){
					if($_FILES['files']['name'][$i]!=''){
						$file['name'] = $_FILES['files']['name'][$i];
						$file['type'] = $_FILES['files']['type'][$i];
						$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$file['error'] = $_FILES['files']['error'][$i];
						$file['size'] = $_FILES['files']['size'][$i];
						$file_name = images_name($_FILES['files']['name'][$i]);
						$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name);
						$data1['photo'] = $photo;
//dongdauanh($data1['photo'],_upload_product);
						$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
						$data1['stt'] = (int)$_POST['stthinh'][$i];
						$data1['type'] = $_GET['type'];	
						$data1['id_productlist'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect($_SESSION['links_re']);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		if($photo = upload_image("file", _img_type, _upload_product,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
		}
		if($quangcao = upload_image("quangcao", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_quangcao)){
			$data['quangcao'] = $quangcao;	
			$data['quangcao_thumb'] = create_thumb($data['quangcao'], 1366, 320, _upload_product,$file_quangcao,1);		
		}
		if($icon = upload_image("icon", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_icon)){
			$data['icon'] = $icon;	
			$data['icon_thumb'] = create_thumb($data['icon'], 40, 40, _upload_product,$file_icon,2);		
		}
		if($_POST['filter']){
			$data['filter'] = implode(',',$_POST['filter']);
		}
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		$data['name_en'] = $_POST['name_en'];
		$data['name_vi'] = $_POST['name_vi'];
		$data['links'] = $_POST['links'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['type'] = $_GET['type'];
		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['mota_en'] = magic_quote($_POST['mota_en']);	
		$d->setTable('product_list');
		if($d->insert($data)){
			if (isset($_FILES['files'])) {
				for($i=0;$i<count($_FILES['files']['name']);$i++){
					if($_FILES['files']['name'][$i]!=''){
						$file['name'] = $_FILES['files']['name'][$i];
						$file['type'] = $_FILES['files']['type'][$i];
						$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$file['error'] = $_FILES['files']['error'][$i];
						$file['size'] = $_FILES['files']['size'][$i];
						$file_name = images_name($_FILES['files']['name'][$i]);
						$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name);
						$data1['photo'] = $photo;
//dongdauanh($data1['photo'],_upload_product);
						$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
						$data1['stt'] = (int)$_POST['stthinh'][$i];
						$data1['type'] = $_GET['type'];	
						$data1['id_productlist'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect($_SESSION['links_re']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}
function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,photo,thumb from #_product_list where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
				delete_file(_upload_product.$row['thumb']);
				delete_file(_upload_product.$row['quangcao']);
				delete_file(_upload_product.$row['quangcao_thumb']);
				delete_file(_upload_product.$row['icon']);
				delete_file(_upload_product.$row['icon_thumb']);
			}
			$sql = "delete from #_product_list where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id,photo,thumb from #_product_list where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_list where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#=================cat===================
function get_cats(){
	global $d, $items, $paging,$page;
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_product_cat where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
$per_page = 10; // Set how many records do you want to display per page.
$startpoint = ($page * $per_page) - $per_page;
$limit = ' limit '.$startpoint.','.$per_page;
$where = " #_product_cat ";
$where .= " where type='".$_GET['type']."' ";
if($_REQUEST['keyword']!='')
{
	$keyword=addslashes($_REQUEST['keyword']);
	$where.=" and ten_vi LIKE '%$keyword%'";
	$link_add .= "&keyword=".$_GET['keyword'];
}
if($_REQUEST['id_list']!='')
{
	$where.=" and id_list=".$_REQUEST['id_list'];
	$link_add .= "&id_list=".$_GET['id_list'];
}
$where .=" order by id desc";
$sql = "select ten_vi,id,stt,hienthi,id_list,noibat from $where $limit";
$d->query($sql);
$items = $d->result_array();
$url = getCurrentPageURL();
$paging = pagination($where,$per_page,$page,$url);
}
function get_cat(){
	global $d, $item, $ds_photo;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$sql = "select * from #_product_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
	$sql = "select * from #_product_photo where id_productcat='".$id."' and type='".$_GET['type']."' order by stt,id desc ";
	$d->query($sql);
	$ds_photo = $d->result_array();	
}
function save_cat(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	$file_icon=images_name($_FILES['file']['icon']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
			$d->setTable('product_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);
				delete_file(_upload_product.$row['photo_thumb']);
			}
		}
		if($icon = upload_image("icon", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_icon)){
			$data['icon'] = $icon;	
			$data['icon_thumb'] = create_thumb($data['icon'], 40, 40, _upload_product,$file_icon,2);		
			$d->setTable('product_list');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['icon']);	
				delete_file(_upload_product.$row['icon_thumb']);				
			}
		}
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);
		$data['id_list'] = $_POST['id_list'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('product_cat');
		$d->setWhere('id', $id);
		if($d->update($data)){
			if (isset($_FILES['files'])) {
				for($i=0;$i<count($_FILES['files']['name']);$i++){
					if($_FILES['files']['name'][$i]!=''){
						$file['name'] = $_FILES['files']['name'][$i];
						$file['type'] = $_FILES['files']['type'][$i];
						$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$file['error'] = $_FILES['files']['error'][$i];
						$file['size'] = $_FILES['files']['size'][$i];
						$file_name = images_name($_FILES['files']['name'][$i]);
						$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name);
						$data1['photo'] = $photo;
//dongdauanh($data1['photo'],_upload_product);
						$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
						$data1['stt'] = (int)$_POST['stthinh'][$i];
						$data1['type'] = $_GET['type'];	
						$data1['id_productcat'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect($_SESSION['links_re']);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
		}
		if($icon = upload_image("icon", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_icon)){
			$data['icon'] = $icon;	
			$data['icon_thumb'] = create_thumb($data['icon'], 40, 40, _upload_product,$file_icon,2);		
		}		
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);
		$data['id_list'] = $_POST['id_list'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['type'] = $_GET['type'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		$d->setTable('product_cat');
		if($d->insert($data)){
			if (isset($_FILES['files'])) {
				for($i=0;$i<count($_FILES['files']['name']);$i++){
					if($_FILES['files']['name'][$i]!=''){
						$file['name'] = $_FILES['files']['name'][$i];
						$file['type'] = $_FILES['files']['type'][$i];
						$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$file['error'] = $_FILES['files']['error'][$i];
						$file['size'] = $_FILES['files']['size'][$i];
						$file_name = images_name($_FILES['files']['name'][$i]);
						$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name);
						$data1['photo'] = $photo;
//dongdauanh($data1['photo'],_upload_product);
						$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
						$data1['stt'] = (int)$_POST['stthinh'][$i];
						$data1['type'] = $_GET['type'];	
						$data1['id_productcat'] = $id;
						$data1['hienthi'] = 1;
						$d->setTable('product_photo');
						$d->insert($data1);
					}
				}
			}
			redirect($_SESSION['links_re']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}
function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,photo,thumb from #_product_cat where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
				delete_file(_upload_product.$row['thumb']);
			}
			$sql = "delete from #_product_cat where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id,photo,thumb from #_product_cat where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_cat where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#=================Item===================
function get_items(){
	global $d, $items, $paging,$page;
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_product_item where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
$per_page = 10; // Set how many records do you want to display per page.
$startpoint = ($page * $per_page) - $per_page;
$limit = ' limit '.$startpoint.','.$per_page;
$where = " #_product_item ";
$where .= " where type='".$_GET['type']."' ";
if($_REQUEST['keyword']!='')
{
	$keyword=addslashes($_REQUEST['keyword']);
	$where.=" and ten_vi LIKE '%$keyword%'";
	$link_add .= "&keyword=".$_GET['keyword'];
}
if($_REQUEST['id_list']!='')
{
	$where.=" and id_list=".$_REQUEST['id_list'];
	$link_add .= "&id_list=".$_GET['id_list'];
}
if($_REQUEST['id_cat']!='')
{
	$where.=" and id_cat=".$_REQUEST['id_cat'];
	$link_add .= "&id_cat=".$_GET['id_cat'];
}
$where .=" order by id desc";
$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat from $where $limit";
$d->query($sql);
$items = $d->result_array();
$url = getCurrentPageURL();
$paging = pagination($where,$per_page,$page,$url);
}
function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item&type=".$_GET['type']);
	$sql = "select * from #_product_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
}
function save_item(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
			$d->setTable('product_item');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);
			}
		}
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('product_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
		}
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['type'] = $_GET['type'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('product_item');
		if($d->insert($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}
function delete_item(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,photo,thumb from #_product_item where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
				delete_file(_upload_product.$row['thumb']);
			}
			$sql = "delete from #_product_item where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id,photo,thumb from #_product_item where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_item where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#=================Sub===================
function get_subs(){
	global $d, $items, $paging,$page;
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_product_sub where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_sub SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_product_sub SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
$per_page = 10; // Set how many records do you want to display per page.
$startpoint = ($page * $per_page) - $per_page;
$limit = ' limit '.$startpoint.','.$per_page;
$where = " #_product_sub ";
$where .= " where type='".$_GET['type']."' ";
if($_REQUEST['keyword']!='')
{
	$keyword=addslashes($_REQUEST['keyword']);
	$where.=" and ten_vi LIKE '%$keyword%'";
	$link_add .= "&keyword=".$_GET['keyword'];
}
if($_REQUEST['id_list']!='')
{
	$where.=" and id_list=".$_REQUEST['id_list'];
	$link_add .= "&id_list=".$_GET['id_list'];
}
if($_REQUEST['id_cat']!='')
{
	$where.=" and id_cat=".$_REQUEST['id_cat'];
	$link_add .= "&id_cat=".$_GET['id_cat'];
}
if($_REQUEST['id_item']!='')
{
	$where.=" and id_item=".$_REQUEST['id_item'];
	$link_add .= "&id_item=".$_GET['id_item'];
}
$where .=" order by id desc";
$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat,id_item from $where $limit";
$d->query($sql);
$items = $d->result_array();
$url = getCurrentPageURL();
$paging = pagination($where,$per_page,$page,$url);
}
function get_sub(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$sql = "select * from #_product_sub where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
}
function save_sub(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu",$_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
			$d->setTable('product_sub');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);	
				delete_file(_upload_product.$row['thumb']);				
			}
		}
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_item'] = $_POST['id_item'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('product_sub');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
		}
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_item'] = $_POST['id_item'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['type'] = $_GET['type'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('product_sub');
		if($d->insert($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Lưu dữ liệu bị lỗi",$_SESSION['links_re']);
	}
}
function delete_sub(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,photo,thumb from #_product_sub where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
				delete_file(_upload_product.$row['thumb']);
			}
			$sql = "delete from #_product_sub where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id,photo,thumb from #_product_sub where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_sub where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#====================================
?>