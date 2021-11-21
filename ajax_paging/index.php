<?php
session_start();
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
include_once _lib."functions_share.php";
include_once _lib."class.database.php";
include_once _source."lang_$lang.php";
include_once _lib."functions_giohang.php";
include_once _lib."file_requick.php";
include_once _lib."counter.php"; 
include_once _lib."getdatahome.php"; 
$d = new database($config['database']);
$per_page = 12;
$where ='';

if(isset($_POST["page"]))
{
  $paging = new paging_ajax();
  $paging->class_pagination = "pagination";
  $paging->class_active = "active";
  $paging->class_inactive = "inactive";
  $paging->class_go_button = "go_button";
  $paging->class_text_total = "total";
  $paging->class_txt_goto = "txt_go_button";
  $paging->per_page = 12;  
  $paging->page = $_POST["page"];
  $paging->text_sql = "select ten_$lang,id,tenkhongdau,photo,thumb,giaban, giacu,masp,mota_$lang,hot from table_product where hienthi=1 and type='product' $where order by stt,id desc";
  $result_pag_data = $paging->GetResult();
  $message = "";
  $paging->data = "" . $message . "";
}
?>
<div class="blockproductnew grp-product" >
  <?php while ($v = mysql_fetch_array($result_pag_data) ) {?>  
    <div class="h-product " itemscope itemtype="http://schema.org/Product">
      <div class="item clearfix">
        <div class="img itemhover hv_light1">
          <a class="u-url " href="<?=  $v['tenkhongdau'] ?>">
            <img class="u-photo  " itemprop="image" src="thumb/270x215/1/<?=  _upload_product_l.$v['photo'] ?>" alt="<?=  $v['ten_'.$lang] ?>">
          </a>
      <i class="i_trai"></i> <i class="i_phai"></i> <i class="i_tren"></i> <i class="i_duoi"></i>
        </div>
        <div class="details">
          <a href="<?=  $v['tenkhongdau'] ?>"><h3 class="p-name" itemprop="name" content="<?= ($v['ten_'.$lang]) ?>"><?= catchuoi($v['ten_'.$lang],64) ?></h3></a>
          <div class="grp-prices clearfix">
            <div class="grp-price clearfix" itemprop="offers" itemscope itemtype="http://schema.org/Offer">           
              <span class="hidden" itemprop="priceCurrency" content="VND"></span>
              <h4 class="p-price" itemprop="price" content="<?=  !empty($v['giaban'])? $v['giaban']: 0 ?>"> <span>Giá: </span><b> <?=format_money($v['giaban'],' VNĐ',_lienhe)?></b></h4>
              <h4 class="p-price-old <?=  $v['giacu'] > 0 ? '' : 'hidden' ?>"><?=format_money($v['giacu'],' VNĐ',_lienhe)?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<div class="clear"></div>
<?php if ($paging->num_row > $per_page) {?><?=$paging->Load()?><?php }?>