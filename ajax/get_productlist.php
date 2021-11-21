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
  $typep = $_REQUEST['typep'];
  if ($typep=='tab') {
    $idl = $_REQUEST['idl'];
    $d->reset();
    if ($idl=='all') {
      $sql = "select ten_$lang,id,tenkhongdau,photo,thumb, giacu,giaban,masp,mota_$lang from #_product where hienthi=1 and type='product' and noibat=1 order by stt,id desc limit 8";
    }else{
      $sql = "select ten_$lang,id,tenkhongdau,photo,thumb, giacu,giaban,masp,mota_$lang from #_product where hienthi=1 and type='product' and noibat=1 and id_list='$idl' order by stt,id desc limit 8";
    }
    $d->query($sql);
    $product_hot = $d->result_array();
    ?>
    <div class="pad0 grp-product content-boder">
      <?php foreach ($product_hot as $k => $v): ?>
        <div class="h-product " itemscope itemtype="http://schema.org/Product">
          <div class="item clearfix">
            <div class="img">
              <a class="u-url hv_light1" href="<?=  $v['tenkhongdau'] ?>">
                <img class="u-photo zimges" itemprop="image" src="thumb/280x270/1/<?=  _upload_product_l.$v['photo'] ?>" alt="<?=  $v['ten_'.$lang] ?>">
              </a>
            </div>
            <div class="details">
              <a href="<?=  $v['tenkhongdau'] ?>"><h3 class="p-name" itemprop="name" content="<?= ($v['ten_'.$lang]) ?>"><?= catchuoi($v['ten_'.$lang],64) ?></h3></a>
              <p class="code hidden">Mã sp: <b><?=  $v['masp'] ?></b></p>
              <div class="grp-prices clearfix">
                <div class="grp-price clearfix" itemprop="offers" itemscope itemtype="http://schema.org/Offer">           
                  <span class="hidden" itemprop="priceCurrency" content="VND"></span>
                  <h4 class="p-price-old <?=  $v['giacu'] > 0 ? '' : 'hidden' ?>"><?=format_money($v['giacu'],' vnđ',_lienhe)?></h4>
                  <h4 class="p-price" itemprop="price" content="<?=  !empty($v['giaban'])? $v['giaban']: 0 ?>"> <span>Giá: </span><b> <?=format_money($v['giaban'],' vnđ',_lienhe)?></b></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php  endforeach ?>
    </div>
  <? }else{
    $where = "hienthi=1 and type='product' and noibat=1";
    $idl = $_REQUEST['idl'];
    if ($idl!='all') {$where.= " and id_list=$idl "; }
    $page = $_REQUEST['page'];
    $item = $_REQUEST['item'];
    $page_first = $page*$item;
    $limit = " $page_first,$item";
    $sql = "select ten_$lang,id,tenkhongdau,photo,thumb, giacu,giaban,masp,mota_$lang from #_product where $where order by stt,id desc limit $limit";
    $d->query($sql);
    $product_hot = $d->result_array();
    ?>
    <?php foreach ($product_hot as $k => $v): ?>
      <div class="h-product " itemscope itemtype="http://schema.org/Product">
        <div class="item clearfix">
          <div class="img">
            <a class="u-url hv_light1" href="<?=  $v['tenkhongdau'] ?>">
              <img class="u-photo zimges" itemprop="image" src="thumb/280x270/1/<?=  _upload_product_l.$v['photo'] ?>" alt="<?=  $v['ten_'.$lang] ?>">
            </a>
          </div>
          <div class="details">
            <a href="<?=  $v['tenkhongdau'] ?>"><h3 class="p-name" itemprop="name" content="<?= ($v['ten_'.$lang]) ?>"><?= catchuoi($v['ten_'.$lang],64) ?></h3></a>
            <p class="code hidden">Mã sp: <b><?=  $v['masp'] ?></b></p>
            <div class="grp-prices clearfix">
              <div class="grp-price clearfix" itemprop="offers" itemscope itemtype="http://schema.org/Offer">           
                <span class="hidden" itemprop="priceCurrency" content="VND"></span>
                <h4 class="p-price-old <?=  $v['giacu'] > 0 ? '' : 'hidden' ?>"><?=format_money($v['giacu'],' vnđ',_lienhe)?></h4>
                <h4 class="p-price" itemprop="price" content="<?=  !empty($v['giaban'])? $v['giaban']: 0 ?>"> <span>Giá: </span><b> <?=format_money($v['giaban'],' vnđ',_lienhe)?></b></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php  endforeach ?>
    <?}