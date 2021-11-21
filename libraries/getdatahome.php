<?php
$subTitle = json_decode($row_setting['tieude'], TRUE);
$Desktop = json_decode($row_setting['desktop'], TRUE);

$d->reset();
$sql = "select photo_$lang as photo,thumb_$lang as thumb,link from #_photo where type='logo'  order by stt,id desc limit 1";
$d->query($sql);
$result_Logosite = $d->fetch_array();
$Logo = $result_Logosite['photo'];

$d->reset();
$sql = "select photo_$lang as photo, thumb_$lang as thumb from #_photo where type='bgheader' and hienthi=1 order by stt,id desc limit 1";
$d->query($sql);
$result_bgheader = $d->fetch_array();
$bg_header = $result_bgheader['photo'];

$d->reset();
$sql = "select photo_$lang as photo, thumb_$lang as thumb from #_photo where type='bgfooter' and hienthi=1 order by stt,id desc limit 1";
$d->query($sql);
$bg_footerrs = $d->fetch_array();
$bg_footer = $bg_footerrs['photo'];

$d->reset();
$sql = "select photo_$lang as photo, thumb_$lang as thumb from #_photo where type='banner'  order by stt,id desc limit 1";
$d->query($sql);
$result_bannertitle = $d->fetch_array();
$Banner = $result_bannertitle['photo'];
 
$d->reset();
$sql = "select photo_$lang as photo,thumb_$lang as thumb from #_photo where type='bocongthuong' and hienthi=1 order by stt,id desc limit 1";
$d->query($sql);
$Bocongthuong = $d->fetch_array();

$d->reset();
$sql = "select photo_$lang as photo, thumb_$lang as thumb from #_photo where type='bgsite1' and hienthi=1 order by stt,id desc limit 1";
$d->query($sql);
$bgsite1 = $d->fetch_array();
$bgsite1 = $bgsite1['photo'];

$d->reset();
$sql = "select photo_$lang as photo, thumb_$lang as thumb from #_photo where type='bgsite2' and hienthi=1 order by stt,id desc limit 1";
$d->query($sql);
$bgsite2 = $d->fetch_array();
$bgsite2 = $bgsite2['photo'];

$d->reset();
$sql = "select id, tenkhongdau, ten_$lang from #_baiviet_list where hienthi=1 and type='chukyso' order by stt,id desc";
$d->query($sql);
$list_bv = $d->result_array();


$d->reset();
$sql = "select * from #_photo where hienthi=1 and type='socialleft'  order by stt,id desc";
$d->query($sql);
$result_socialtop = $d->result_array();
$d->reset();
$sql = "select * from #_photo where hienthi=1 and type='socialfooter'  order by stt,id desc";
$d->query($sql);
$result_socialbottom = $d->result_array();
# sql footer 
$d->reset();
$sql = "select noidung_$lang from #_company where type='footer' ";
$d->query($sql);
$footer = $d->fetch_array();
# sql footer 
$d->reset();
$sql = "select noidung_$lang from #_company where type='footer2' ";
$d->query($sql);
$footer2 = $d->fetch_array();
$d->reset();
$sql = "select noidung_$lang from #_company where type='footer3' ";
$d->query($sql);
$footer3 = $d->fetch_array();
