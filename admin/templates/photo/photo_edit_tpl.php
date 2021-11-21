<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=photo&act=man_photo&type=<?=  $type ?>"><span>Hình ảnh <?=  $title_main ?></span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Cập nhật hình ảnh</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">   

  $(document).ready(function() {
    $('.chonngonngu li a').click(function(event) {
      var lang = $(this).attr('href');
      $('.chonngonngu li a').removeClass('active');
      $(this).addClass('active');
      $('.lang_hidden').removeClass('active');
      $('.lang_'+lang).addClass('active');
      return false;
    });
});
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=photo&act=save_photo<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">
    <div class="title chonngonngu">
    <ul>
      <li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
      <li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
      <li><a href="cn" class="tipS validate[required]" title="Chọn tiếng trung "><img src="./images/cn.png" alt="" class="tiengtrung" />Tiếng Trung</a></li>
    </ul>
    </div>  



        <div class="formRow lang_hidden lang_vi active">
            <label>Tên hình ảnh</label>
            <div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên hình ảnh" id="name" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
            </div>
            <div class="clear"></div>
        </div>  

        <div class="formRow lang_hidden lang_en  ">
            <label>Tên hình ảnh (EN)</label>
            <div class="formRight">
                <input type="text" name="ten_en" title="Nhập tên hình ảnh" id="name" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
            </div>
            <div class="clear"></div>
        </div>  

		<div class="formRow lang_hidden lang_cn">
			<label>Tên hình ảnh (CN)</label>
			<div class="formRight">
                <input type="text" name="ten_cn" title="Nhập tên hình ảnh" id="name" class="tipS validate[required]" value="<?=@$item['ten_cn']?>" />
			</div>
			<div class="clear"></div>
		</div>	

        <?php if($config_map=='true'){?>
            <div class="formRow">
                <label>Map x :</label>
                <div class="formRight">
                    <select name="mapx" class="main_select select_danhmuc">
                        <option value="11" <?php if($item['mapx']==11){ echo 'selected="selected"';}?>>1x - 1y</option>
                        <option value="12" <?php if($item['mapx']==12){ echo 'selected="selected"';}?>>1x - 2y</option>
                        <option value="13" <?php if($item['mapx']==13){ echo 'selected="selected"';}?>>1x - 3y</option>
                        <option value="21" <?php if($item['mapx']==21){ echo 'selected="selected"';}?>>2x - 1y</option>
                        <option value="22" <?php if($item['mapx']==22){ echo 'selected="selected"';}?>>2x - 2y</option>
                        <option value="23" <?php if($item['mapx']==23){ echo 'selected="selected"';}?>>2x - 3y</option>
                        <option value="31" <?php if($item['mapx']==31){ echo 'selected="selected"';}?>>3x - 1y</option>
                        <option value="32" <?php if($item['mapx']==32){ echo 'selected="selected"';}?>>3x - 2y</option>
                    </select>
                </div>
                <div class="clear"></div>
            </div>
        <?php } ?>

<?php if (!empty($item['photo_vi'])): ?>
        <div class="formRow lang_hidden lang_vi active">
            <label>Hình ảnh hiện tại :</label>
            <div class="formRight">
                  <div class="mt10"><img src="<?=_upload_hinhanh.$item['photo_vi']?>"  alt="NO PHOTO" width="100" /></div>
            </div>
            <div class="clear"></div>
        </div>
<?php endif ?>

        <div class="formRow lang_hidden lang_vi active">
            <label>Tải hình ảnh:</label>
            <div class="formRight">
                                <input type="file" id="photo_vi" name="photo_vi" />
                <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                <span class="note">width : <?php echo _width_thumb*$ratio_;?>px  - Height : <?php echo _height_thumb*$ratio_;?>px</span>
            </div>
            <div class="clear"></div>
        </div>
<?php if (!empty($item['photo_en'])): ?>
        <div class="formRow lang_hidden lang_en">
            <label>Hình ảnh hiện tại (EN):</label>
            <div class="formRight">
                  <div class="mt10"><img src="<?=_upload_hinhanh.$item['photo_en']?>"  alt="NO PHOTO" width="100" /></div>
            </div>
            <div class="clear"></div>
        </div>
<?php endif ?>
        <div class="formRow lang_hidden lang_en  ">
            <label>Tải hình ảnh (EN):</label>
            <div class="formRight">
                                <input type="file" id="photo_en" name="photo_en" />
                <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                <span class="note">width : <?php echo _width_thumb*$ratio_;?>px  - Height : <?php echo _height_thumb*$ratio_;?>px</span>
            </div>
            <div class="clear"></div>
        </div>
<?php if (!empty($item['photo_cn'])): ?>
        <div class="formRow lang_hidden lang_cn">
            <label>Hình ảnh hiện tại (CN):</label>
            <div class="formRight">
                  <div class="mt10"><img src="<?=_upload_hinhanh.$item['photo_cn']?>"  alt="NO PHOTO" width="100" /></div>
            </div>
            <div class="clear"></div>
        </div>
<?php endif ?>
		<div class="formRow lang_hidden lang_cn">
			<label>Tải hình ảnh (CN):</label>
			<div class="formRight">
            					<input type="file" id="photo_cn" name="photo_cn" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                <span class="note">width : <?php echo _width_thumb*$ratio_;?>px  - Height : <?php echo _height_thumb*$ratio_;?>px</span>
			</div>
			<div class="clear"></div>
		</div>

          <?php if($links_=='true'){?>        
        <div class="formRow">
            <label>Link liên kết: </label>
            <div class="formRight">
                <input type="text" id="price" name="link" value="<?=@$item['link']?>"  title="Nhập link liên kết cho hình ảnh" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>   
        <?php } ?>
        
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
                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của hình ảnh, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
			
	<div class="formRow">
			<div class="formRight">
            <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
            <input type="hidden" name="id" id="id_this_photo" value="<?=@$item['id']?>" />
            <input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>     
		
	</div>
   
</form>   