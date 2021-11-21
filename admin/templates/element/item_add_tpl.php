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
<script type="text/javascript">	
	function TreeFilterChanged2(){
		$('#validate').submit();
	}
</script>
<div class="wrapper">
	<div class="control_frm" style="margin-top:25px;">
		<div class="bc">
			<ul id="breadcrumbs" class="breadcrumbs">
				<li><a href="index.php?com=element&act=man"><span>Element</span></a></li>
				<li class="current"><a href="#" onclick="return false;">Add</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	<form name="supplier" id="validate" class="form" action="index.php?com=element&act=save" method="post" enctype="multipart/form-data">
		<div class="widget">
			<div class="title chonngonngu">
				<ul>
					<li><a href="vi" class="active tipS" title="Choose lang "><img src="./images/vi.png" alt="" class="tiengviet" /><?=  $config["langs"]['vi'] ?></a></li>
					<!-- <li><a href="en" class="tipS" title="Choose lang "><img src="./images/en.png" alt="" class="tienganh" /><?=  $config["langs"]['en'] ?></a></li> -->
				</ul>
			</div>		
			<div class="formRow">
				<label>Upload photo:</label>
				<div class="formRight">
					<input type="file" id="file" name="file" />
					<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
					<div class="note"> width : 150 px , Height : 100 px </div>
				</div>
				<div class="clear"></div>
			</div>
			<?php if ($_GET['act']=='edit'): ?>	
				<div class="formRow">
					<label>Photo curent :</label>
					<div class="formRight">
						<div class="mt10"><img src="<?=_upload_hinhanh.$item['thumb']?>"  alt="NO PHOTO" width="100" /></div>
					</div>
					<div class="clear"></div>
				</div>
			<?php endif ?>
			<div class="formRow lang_hidden lang_vi active">
				<label>Tên ngân hàng:</label>
				<div class="formRight">
					<input type="text" name="name_vi" title="Nhập tên danh mục" id="name_vi" class="tipS" value="<?=@$item['name_vi']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow lang_hidden lang_en">
				<label>Name:</label>
				<div class="formRight">
					<input type="text" name="name_en" title="Nhập tên danh mục" id="name_en" class="tipS" value="<?=@$item['name_en']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow lang_hidden lang_cn">
				<label>Name (<?=  $config["langs"]['cn'] ?>):</label>
				<div class="formRight">
					<input type="text" name="name_cn" title="Nhập tên danh mục" id="name_cn" class="tipS" value="<?=@$item['name_cn']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow lang_hidden lang_vi active">
				<label>Tên chủ tài khoản:</label>
				<div class="formRight">
					<input type="text" name="name2_vi" title="Nhập tên danh mục" id="name2_vi" class="tipS" value="<?=@$item['name2_vi']?>" />
				</div>
				<div class="clear"></div>
			</div>			
<?php /*?> 		<div class="formRow lang_hidden lang_en active">
			<label>Quantity:</label>
			<div class="formRight">
                <input type="text" name="quantity_en" title="Nhập tên danh mục" id="quantity_en" class="tipS" value="<?=@$item['quantity_en']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_cn">
			<label>Quantity (<?=  $config["langs"]['cn'] ?>):</label>
			<div class="formRight">
                <input type="text" name="quantity_cn" title="Nhập tên danh mục" id="quantity_cn" class="tipS" value="<?=@$item['quantity_cn']?>" />
			</div>
			<div class="clear"></div>
		</div> <?php */?>
		<div class="formRow lang_hidden lang_vi active">
			<label>Chi nhánh:</label>
			<div class="formRight">
				<input type="text" name="address_vi" title="Nhập tên danh mục" id="address_vi" class="tipS" value="<?=@$item['address_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_vi active">
			<label>Số tài khoản: </label>
			<div class="formRight">
				<input type="text" name="geo" title="Nhập tên danh mục" id="geo" class="tipS" value="<?=@$item['geo']?>" />
			</div>
			<div class="clear"></div>
		</div>
<?php /*?> 
		<div class="formRow lang_hidden lang_vi active">
			<label>Điện thoại: </label>
			<div class="formRight">
                <input type="text" name="phone_vi" title="Nhập tên danh mục" id="phone_vi" class="tipS" value="<?=@$item['phone_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_vi active">
			<label>Hotline: </label>
			<div class="formRight">
                <input type="text" name="hotline_vi" title="Nhập tên danh mục" id="hotline_vi" class="tipS" value="<?=@$item['hotline_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php */?>
		<div class="formRow">
			<label>Option: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
			<div class="formRight">
				<input type="checkbox" name="active" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
				<label for="check1">Display</label>            
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Number: </label>
			<div class="formRight">
				<input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<div class="formRight">
				<input type="hidden" name="id" id="id_this_element" value="<?=@$item['id']?>" />
				<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Finish" />
			</div>
			<div class="clear"></div>
		</div>
	</div>  
</form>        </div>