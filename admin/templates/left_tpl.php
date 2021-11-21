<div class="logo"> <a href="#" target="_blank" onclick="return false;"> <img src="images/logo.png" width="150" alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
  <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>
<?php /*?>   <li class="categories_li <?php if($_GET['com']=='product' || $_GET['com']=='order' || $_GET['com']=='size' || $_GET['com']=='mausac' || $_GET['com']=='gia' || $_GET['com']=='tieude' || $_GET['com']=='excel') echo ' activemenu' ?>" id="menu2"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
     <ul class="sub">
       <?php
       adminmenu('Quản lý danh mục 1','product','man_list','product');
       adminmenu('Quản lý danh mục 2','product','man_cat','product');
         // adminmenu('Quản lý danh mục 3','product','man_item','product');
       adminmenu('Quản lý sản phẩm','product','man','product');
       // adminmenu('Quản lý giỏ hàng','order','man','');
        // adminmenu('Quản lý thẻ tag','tags','man','');
       ?>
     </ul>
     </li> <?php */?> 
     <li class="categories_li <?php if($_GET['com']=='baiviet' && ( $_GET['type']=='chukyso' ||  $_GET['type']=='quy-trinh' || $_GET['type']=='bao-gia') ) echo ' activemenu' ?>" id="menu_chuky"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
      <ul class="sub">
        <?php
        adminmenu('Quản lý danh mục 1','baiviet','man_list','chukyso');
        /*adminmenu('Quản lý danh mục 2','baiviet','man_cat','chukyso');*/
        adminmenu('Sản phẩm','baiviet','man','chukyso');
        ?>
      </ul>
    </li> 

    <li class="categories_li <?php if($_GET['com']=='baiviet' && ( $_GET['type']!='chinhanh' && $_GET['type']!='chukyso' &&  $_GET['type']!='quy-trinh' && $_GET['type']!='bao-gia') ) echo ' activemenu' ?>" id="menu_tintuc"><a href="" title="" class="exp"><span>Bài viết</span><strong></strong></a>
      <ul class="sub">
        <?php
            adminmenu('Slider','baiviet','man','slider');
            adminmenu('Tiện ích','baiviet','man','tienich');
            adminmenu('Thành tựu','baiviet','man','thanhtuu');
            adminmenu('Khách hàng','baiviet','man','khachhang');
            adminmenu('Giới thiệu','baiviet','man','gioithieu');
            //adminmenu('Dịch vụ chúng tôi','baiviet','man','dichvu');
            //adminmenu('Vì sao chọn chúng tôi','baiviet','man','visao');
            adminmenu('Tin tức','baiviet','man','tintuc');
        ?>
      </ul>
    </li> 

     <li class="categories_li <?php if($_GET['com']=='baiviet' && $_GET['type']=='software') echo ' activemenu' ?>" id="menu_file"><a href="" title="" class="exp"><span>Download file</span><strong></strong></a>
      <ul class="sub">
        <?php
            adminmenu('Danh mục file','baiviet','man_list','software');
            adminmenu('File download','baiviet','man','software');
        ?>
      </ul>
    </li>
    <?php /*?>     
    <li class="categories_li <?php if($_GET['com']=='info') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
        <ul class="sub">
            <?php adminmenu('Mô tả giới thiệu','info','capnhat','about'); ?>
        </ul>
    </li> 
    <?php */?>

    <li class="template_li<?php if($_GET['com']=='setphoto') echo ' activemenu' ?>" id="menu_hinhanh"><a href="#" title="" class="exp"><span>Cấu hình hình ảnh</span><strong></strong></a>
      <ul class="sub">  
        <?php
        adminmenu('Logo','setphoto','capnhat','logo');
        adminmenu('Banner','setphoto','capnhat','banner');
      // adminmenu('Banner phải','setphoto','capnhat','banner2');
        adminmenu('Favicon','setphoto','capnhat','favicon');
        //adminmenu('Hình ảnh quy trình','setphoto','capnhat','quytrinh');
      // adminmenu('Bộ công thương','setphoto','capnhat','bocongthuong');
      // adminmenu('Background header','setphoto','capnhat','bgheader');
        //adminmenu('Background footer','setphoto','capnhat','bgfooter');
        //adminmenu('Hình ảnh Popup','setphoto','capnhat','popup');
        //adminmenu('Background Vì sao chọn chúng tôi','setphoto','capnhat','bgsite1');
        ?>
      </ul>
    </li>
    <li class="marketing_li<?php if($_GET['com']=='photo') echo ' activemenu' ?>" id="menu7"><a href="#" title="" class="exp"><span>Liên kết</span><strong></strong></a>
      <ul class="sub">
        <?php
        adminmenu('Mạng xã hội','photo','man_photo','socialtop');
        // adminmenu('Hình ảnh slider','photo','man_photo','slider');
        // adminmenu('Mạng xã hội','photo','man_photo','socialfooter');
        adminmenu('Đối tác','photo','man_photo','doitac');
        ?>
      </ul>
    </li>
    <li class="gallery_li<?php if($_GET['com']=='video') echo ' activemenu' ?>" id="menu_v"><a href="#" title="" class="exp"><span>Video</span><strong></strong></a>
      <ul class="sub">  
        <?php
        adminmenu('Video nổi bật','video','man','video');
        adminmenu('Video hướng dẫn','video','man','videos');
        ?>
      </ul>
    </li>
    <?php /*?>     
      <li class="gallery_li<?php if($_GET['com']=='download') echo ' activemenu' ?>" id="menu_download"><a href="#" title="" class="exp"><span>Download</span><strong></strong></a>
      <ul class="sub">  
      <?php
      adminmenu('Download','download','man','soft');
      ?>
      </ul>
      </li> 
    <?php */?>

        <li class="template_li<?php if($_GET['type']=='chinhanh' || $_GET['com']=='setting' || $_GET['com']=='newsletter'  || $_GET['com']=='company' || $_GET['com']=='yahoo'  || $_GET['com']=='lkweb') echo ' activemenu' ?>" id="menu5"><a href="#" title="" class="exp"><span>Thông tin công ty</span><strong></strong></a>
      <ul class="sub">
        <?php 
            adminmenu('Cấu hình chung','setting','capnhat','');
            adminmenu('Liên hệ trang chủ','company','capnhat','lienhe_index');
            adminmenu('Liên hệ','company','capnhat','lienhe');
            //adminmenu('Footer','company','capnhat','footer');
            //adminmenu('Footer 2','company','capnhat','footer2');
            //adminmenu('Footer 3','company','capnhat','footer3');
            // adminmenu('Đăng ký nhận tin','newsletter','man','');
            adminmenu('Quản lý chi nhánh','baiviet','man','chinhanh');
            adminmenu('Dịch vụ hỗ trợ','baiviet','man','support');
        ?>
      </ul>
    </li>

  </ul>