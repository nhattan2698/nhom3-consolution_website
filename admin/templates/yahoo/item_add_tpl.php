<script type="text/javascript"> 
    function TreeFilterChanged2(){
        $('#validate').submit();
    }
</script>
<div class="wrapper">
    <div class="control_frm" style="margin-top:25px;">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="index.php?com=yahoo&act=man"><span>Hỗ trợ trực tuyến</span></a></li>
                <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <form name="supplier" id="validate" class="form" action="index.php?com=yahoo&act=save" method="post" enctype="multipart/form-data">
        <div class="widget">
            <div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
                <h6>Nhập dữ liệu</h6>
            </div>      
            <div class="formRow">
                <label>Tên</label>
                <div class="formRight">
                    <input type="text" name="name" title="Nhập tên nhân viên hỗ trợ" id="name" class="tipS validate[required]" value="<?=@$item['ten']?>" />
                </div>
                <div class="clear"></div>
            </div>  
<?php /*?>         <div class="formRow">
            <label>Bộ phận</label>
            <div class="formRight">
                <input type="text" name="bophan" title="Nhập tên nhân viên hỗ trợ" id="bophan" class="tipS validate[required]" value="<?=@$item['bophan']?>" />
            </div>
            <div class="clear"></div>
            </div> <?php */?>

<?php /*?>             <div class="formRow">
                <label>Tải hình ảnh:</label>
                <div class="formRight">
                    <input type="file" id="file" name="file" />
                    <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                    <div class="note"> width : 150 px , Height :  150 px </div>
                </div>
                <div class="clear"></div>
            </div>
            <?php if($_GET['act']=='edit'){?>
                <div class="formRow">
                    <label>Hình Hiện Tại :</label>
                    <div class="formRight">
                        <div class="mt10"><img src="<?=_upload_hinhanh.$item['thumb']?>"  alt="NO PHOTO" height="150" /></div>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php } ?> <?php */?>

            <div class="formRow">
                <label>Email</label>
                <div class="formRight">
                    <input type="text" name="email" title="Nhập địa chỉ email" id="email" class="tipS " value="<?=@$item['email']?>" />
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Điện thoại</label>
                <div class="formRight">
                    <input type="text" name="dienthoai" title="Nhập số điện thoại" id="dienthoai" class="tipS validate[required]" value="<?=@$item['dienthoai']?>" />
                </div>
                <div class="clear"></div>
            </div>
        <?php /*?>  <div class="formRow">
            <label>Điện thoại 2</label>
            <div class="formRight">
                <input type="text" name="dienthoai2" title="Nhập số điện thoại" id="dienthoai2" class="tipS " value="<?=@$item['dienthoai2']?>" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Điện thoại 3</label>
            <div class="formRight">
                <input type="text" name="dienthoai3" title="Nhập số điện thoại" id="dienthoai3" class="tipS " value="<?=@$item['dienthoai3']?>" />
            </div>
            <div class="clear"></div>
            </div> <?php */?>
        <?php /*?>   <div class="formRow">
                    <label>Facebook</label>
                    <div class="formRight">
                        <input type="text" name="facebook" title="Nhập địa chỉ facebook" id="facebook" class="tipS " value="<?=@$item['facebook']?>" />
                    </div>
                    <div class="clear"></div>
                    </div> <?php */?>
                    <div class="formRow">
                        <label>Zalo</label>
                        <div class="formRight">
                            <input type="text" name="zalo" title="Nhập nick chat yahoo" id="zalo" class="tipS " value="<?=@$item['zalo']?>" />
                        </div>
                        <div class="clear"></div>
                    </div> 
<?php /*?>                 <div class="formRow">
                    <label>Viber</label>
                    <div class="formRight">
                        <input type="text" name="viber" title="Nhập nick chat viber" id="viber" class="tipS " value="<?=@$item['viber']?>" />
                    </div>
                    <div class="clear"></div>
                    </div> <?php */?>
                    <div class="formRow">
                        <label>Skype</label>
                        <div class="formRight">
                            <input type="text" name="skype" title="Nhập nick chat skype" id="skype" class="tipS " value="<?=@$item['skype']?>" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                      <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
                      <div class="formRight">
                        <input type="checkbox" name="active" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
                        <label for="check1">Hiển thị</label>            
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label>Số thứ tự: </label>
                    <div class="formRight">
                        <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <div class="formRight">
                       <input type="hidden" name="id" id="id_this_yahoo" value="<?=@$item['id']?>" />
                <input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            </div>
            <div class="clear"></div>
        </div>
    </div>  
</form>        </div>