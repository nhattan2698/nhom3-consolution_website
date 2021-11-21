<?php 
session_start();
@define ( '_lib' , '../../libraries/');
include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";
include_once _lib."class.database.php";
if(!isset($_SESSION['CIPMEDIA']) || $_SESSION['CIPMEDIA']==false){ header('HTTP/1.1 403 Forbidden'); die; }
$d = new database($config['database']);
$idl = $_REQUEST['val']	;
$d->reset();
$sql = "select isfilter, filter from #_product_list where id='".$idl."' limit 1";
$d->query($sql);
$productlist = $d->fetch_array();
if ($productlist['isfilter']==0) {
	die();
}
$d->reset();
$sql = "select isfilter, filter from #_product_list where id='".$idl."' limit 1";
$d->query($sql);
$productlist = $d->fetch_array();
// $filter = explode(',',$productlist['filter']);
$filter = $productlist['filter'];
$d->reset();
$sql = "select * from #_filter where hienthi=1 and id in ($filter) order by stt asc";
$d->query($sql);
$filters = $d->result_array();
?>
<?php foreach ($filters as $key => $value): 
	$d->reset();
	$sql = "select * from #_filter_value where hienthi=1 and id_filter='".$value['id']."' order by stt asc";
	$d->query($sql);
	$filter = $d->result_array();
	?>
	<div class="formRow">
		<label><?=  $value['ten_vi'] ?> </label>
		<div class="formRight">
			<?php foreach ($filter as $k => $v): ?>
				<div class="d-inline-block">
					<input type="checkbox" name="filter[]" id="filter_<?=$key.$k?>" value="<?=$v['id']?>" /> <label for="filter_<?=$key.$k?>"><?=  $v['ten_vi'] ?></label>
				</div>
			<?php endforeach ?>
		</div>
		<div class="clear"></div>
	</div>
	<?php endforeach ?>