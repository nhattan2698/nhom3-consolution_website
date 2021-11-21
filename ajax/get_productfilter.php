  <?php
  session_start();
  @define ( '_template' , '../templates/');
  @define ( '_tpl' , '../templates/layouts/');
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

// dump($_POST);
  $pricelow = str_replace('.','',$_POST['pr_low']);
  $pricehei = str_replace('.','',$_POST['pr_heigh']);
  $idlist = $_POST['idlist'];
  $arr_idproperty = $_POST['filter'];
  $page = $_POST['page'];
  // dump($arr_idproperty);
  $d->reset();
  $sql = "select ten_$lang,id,tenkhongdau,photo,thumb,giaban,masp,mota_$lang,giacu,filter from table_product where hienthi=1
  and type='product' 
  and id_list='".$idlist."' 
  and giaban >= ".$pricelow." 
  and giaban <= ".$pricehei;
  foreach ((array)$arr_idproperty as $key => $value) {
  	foreach ((array)$value as $k => $v) {
  		if($k==0){ $sql.=" and ("; }
  		if($k==0) 
  			$sql.=" find_in_set(".$v.",filter)>0 ";
  		else
  			$sql.=" or find_in_set(".$v.",filter)>0 ";
  		if(($k+1)==count($value)) { $sql.=" ) "; }
  	}
  }
  $sql .=" order by stt,id desc";
  // $d->query($sql);
  // $result_product = $d->result_array();

  $paging = new paging_ajax();
  $paging->class_pagination = "pagination";
  $paging->class_active = "active";
  $paging->class_inactive = "inactive";
  $paging->class_go_button = "go_button";
  $paging->class_text_total = "total";
  $paging->class_txt_goto = "txt_go_button";
  $paging->per_page = 12;
  $paging->page = $page;
  $paging->text_sql = $sql;
  $result_pag_data = $paging->GetResult();
  $message = "";
  $paging->data = "" . $message . "";
  ?>
  <div class="pad0 grp-product content-boder ">
  	<?php while ($v = mysql_fetch_array($result_pag_data)) {	?>  
  		<div class="h-product itemhover" itemscope itemtype="http://schema.org/Product">
  			<div class="item clearfix">
  				<div class="img">
  					<a class="u-url hv_light1" href="<?=  $v['tenkhongdau'] ?>">
  						<img class="u-photo zimges" itemprop="image" src="thumb/230x230/1/<?=  _upload_product_l.$v['photo'] ?>" alt="<?=  $v['ten_'.$lang] ?>">
  					</a>
  				</div>
  				<div class="details">
  					<a href="<?=  $v['tenkhongdau'] ?>"><h3 class="p-name" itemprop="name" content="<?= ($v['ten_'.$lang]) ?>"><?= catchuoi($v['ten_'.$lang],64) ?></h3></a>
  					<div class="row rowprice align-items-center clearfix">
  						<div class="col-6">
  							<div class="grp-price clearfix" itemprop="offers" itemscope itemtype="http://schema.org/Offer">           
  								<span class="hidden" itemprop="priceCurrency" content="VND"></span>
  								<h4 class="price-old"><?=format_money($v['giacu'],'Đ',_lienhe)?></h4>
  								<h4 class="p-price" itemprop="price" content="<?=  !empty($v['giaban'])? $v['giaban']: 0 ?>"><b> <?=format_money($v['giaban'],'Đ',_lienhe)?></b></h4>
  							</div>
  						</div>
  						<div class="col-6 pal0">
  							<h5 class="hidden"><?=  catchuoi($v['mota_'.$lang],180) ?></h5>
  							<button class="btn_buynow" data-id="<?=  $v['id'] ?>"> <i class="fas fa-cart-plus"></i> Giỏ hàng</button>
  						</div>
  					</div>
  				</div>
  			</div>
  			<i class="i_trai"></i> <i class="i_phai"></i> <i class="i_tren"></i> <i class="i_duoi"></i>
  		</div>
  	<?php } ?>
  </div>
<?=$paging->Load()?>
 