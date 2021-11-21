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
		$('.delete_images').click(function(){
			if (confirm('Bạn có muốn xóa hình này ko ? ')) {
				var id = $(this).attr('title');
				var table = 'product_photo';
				var links = "../upload/product/";
				$.ajax ({
					type: "POST",
					url: "ajax/delete_images.php",
					data: {id:id,table:table,links:links},
					success: function(result) { 
					}
				});
				$(this).parent().slideUp();
			}
			return false;
		});
	});
</script>

<?php 
$d->reset();
$sql = "select * from #_filter where hienthi=1 order by stt asc";
$d->query($sql);
$filters = $d->result_array();
?>

<div class="wrapper">
	<div class="control_frm" style="margin-top:25px;">
		<div class="bc">
			<ul id="breadcrumbs" class="breadcrumbs">
				<li><a href="index.php?com=product&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm <?=  $title_main ?></span></a></li>
				<li class="current"><a href="#" onclick="return false;">Thêm</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
		<div class="widget">
			<div class="title chonngonngu">
				<ul>
					<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
					<li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
					<li><a href="cn" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/cn.png" alt="" class="tiengtrung" />Tiếng TRUNG</a></li>
				</ul>
			</div>	
			<?
			if($config_images=='true'){
				?>
				<div class="formRow">
					<label>Background:</label>
					<div class="formRight">
						<input type="file" id="file" name="file" />
						<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
						<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
					</div>
					<div class="clear"></div>
				</div>
				<?php if($_GET['act']=='edit_list'){?>
					<div class="formRow">
						<label>Background hiện tại :</label>
						<div class="formRight">
							<div class="mt10"><img src="<?=_upload_product.$item['thumb']?>"  alt="NO PHOTO" width="200" /></div>
						</div>
						<div class="clear"></div>
					</div>
				<?php } ?> 
			<? }?>
			<?php if($config_icon=='true'){ ?>
				<div class="formRow">
					<label>Tải Icon:</label>
					<div class="formRight">
						<input type="file" id="file" name="icon" />
						<img src="./images/question-button.png" alt="Upload icon" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
						<div class="note"> width : 80 px , Height : 80 px </div>
					</div>
					<div class="clear"></div>
				</div>
				<?php if($_GET['act']=='edit_list'){?>
					<div class="formRow">
						<label>Icon hiện tại:</label>
						<div class="formRight">
							<div class="mt10"><img src="<?=_upload_product.$item['icon']?>"  alt="NO PHOTO" width="40px" /></div>
						</div>
						<div class="clear"></div>
					</div>
				<?php } ?>
			<?php } ?>
			<?php if($config_album=='true'){ ?>
				<div class="formRow">
					<label>Hình ảnh kèm theo: </label>
					<div class="formRight">
						<a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><img src="images/image_add.png" alt="" width="100"></a>                
						<div class="note"> width : 560 px , Height : 600 px </div>
						<div class="clear"></div>
						<?php if($act=='edit_list'){ ?>
							<?php if(count($ds_photo)!=0){?>       
								<?php for($i=0;$i<count($ds_photo);$i++){?>
									<div class="item_trich">
										<img class="img_trich" width="140px" height="110px" src="<?=_upload_product.$ds_photo[$i]['photo']?>" />
										<input type="text" rel="<?=$ds_photo[$i]['id']?>" value="<?=$ds_photo[$i]['stt']?>" class="update_stt tipS" />
										<a class="delete_images" title="<?=$ds_photo[$i]['id']?>"><img src="images/delete.png"></a>
									</div>
								<?php } ?>
							<?php }?>
						<?php }?>
					</div>
					<div class="clear"></div>
				</div> 
			<?php } ?>
			<div class="formRow lang_hidden lang_vi active">
				<label>Tiêu đề</label>
				<div class="formRight">
					<input type="text" name="ten_vi" title="Nhập tên danh mục" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow lang_hidden lang_en">
				<label>Tiêu đề (Tiếng anh)</label>
				<div class="formRight">
					<input type="text" name="ten_en" title="Nhập tên danh mục" id="ten_en" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow lang_hidden lang_cn">
				<label>Tiêu đề (Tiếng trung)</label>
				<div class="formRight">
					<input type="text" name="ten_cn" title="Nhập tên danh mục" id="ten_cn" class="tipS validate[required]" value="<?=@$item['ten_cn']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<?php if($config_mota=='true'){ ?>
				<div class="formRow lang_hidden lang_vi active">
					<label>Mô tả</label>
					<div class="formRight">
						<textarea rows="4" cols="" title="Nhập mô tả . " class="tipS" name="mota_vi"><?=@$item['mota_vi']?></textarea>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow lang_hidden lang_en">
					<label>Mô tả (Tiếng anh)</label>
					<div class="formRight">
						<textarea rows="4" cols="" title="Nhập mô tả . " class="tipS" name="mota_en"><?=@$item['mota_en']?></textarea>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow lang_hidden lang_cn">
					<label>Mô tả (Tiếng trung)</label>
					<div class="formRight">
						<textarea rows="4" cols="" title="Nhập mô tả . " class="tipS" name="mota_cn"><?=@$item['mota_cn']?></textarea>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<?php if($config_adv=='true'){ ?>
				<div class="formRow">
					<label>Tải Quảng cáo:</label>
					<div class="formRight">
						<input type="file" id="file" name="quangcao" />
						<img src="./images/question-button.png" alt="Upload quảng cáo" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
						<div class="note"> width : 1366 px , Height : 320 px </div>
					</div>
					<div class="clear"></div>
				</div>
				<?php if($_GET['act']=='edit_list'){?>
					<div class="formRow">
						<label>Quảng cáo :</label>
						<div class="formRight">
							<div class="mt10"><img src="<?=_upload_product.$item['quangcao']?>"  alt="NO PHOTO" width="100%" /></div>
						</div>
						<div class="clear"></div>
					</div>
				<?php } ?>
			<?php } ?>
 <?/*
		 <div class="formRow">
			<label>Link</label>
			<div class="formRight">
                <input type="text" name="Link" title="Nhập link quảng cáo" id="Link" class="" value="<?=@$item['Link']?>" />
			</div>
			<div class="clear"></div>
			</div> */?>

<?php /*?> 			<div class="formRow">
				<label>Chọn bộ lọc</label>
				<div class="formRight">
					<?php 
					$filter = explode(',',$item['filter']);
					for($i=0;$i<count($filters);$i++){?>
						<label><input type="checkbox" name="filter[]" id="filter_<?=$i?>" value="<?=$filters[$i]['id']?>" <?php if(in_array($filters[$i]['id'], $filter)){ echo "checked='checked'";}?> /> <?=$filters[$i]['ten_vi']?></label>
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div> <?php */?>



<?php /*?> 		<div class="formRow lang_hidden lang_vi active">
			<label>Nội Dung</label>
			<div class="ck_editor">
				<textarea id="noidung_vi" name="noidung_vi"><?=@$item['noidung_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_en">
			<label>Nội Dung (Tiếng anh)</label>
			<div class="ck_editor">
				<textarea id="noidung_en" name="noidung_en"><?=@$item['noidung_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div> <?php */?>

			<div class="formRow">
				<label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
				<div class="formRight">
					<input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
					<label>Số thứ tự: </label>
					<input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
				</div>
				<div class="clear"></div>
			</div>
		</div>  
		<div class="widget">
			<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
				<h6>Nội dung seo</h6>
			</div>
			<div class="formRow">
				<label>Title</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Từ khóa</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho danh mục" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Description:</label>
				<div class="formRight">
					<textarea rows="4" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"><?=@$item['description']?></textarea>
					<input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$item['des_char']?>" /> ký tự <b>(Tốt nhất là 68 - 170 ký tự)</b>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<div class="formRight">
					<input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
					<input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
					<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
					<a href="index.php?com=product&act=man_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</form>        </div>
	<script>
		$(document).ready(function() {
			$('.file_input').filer({
				showThumbs: true,
				templates: {
					box: '<ul class="jFiler-item-list"></ul>',
					item: '<li class="jFiler-item">\
					<div class="jFiler-item-container">\
					<div class="jFiler-item-inner">\
					<div class="jFiler-item-thumb">\
					<div class="jFiler-item-status"></div>\
					<div class="jFiler-item-info">\
					<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
					</div>\
					{{fi-image}}\
					</div>\
					<div class="jFiler-item-assets jFiler-row">\
					<ul class="list-inline pull-left">\
					<li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
					</ul>\
					<ul class="list-inline pull-right">\
					<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
					</ul>\
					</div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập STT" />\
					</div>\
					</div>\
					</li>',
					itemAppend: '<li class="jFiler-item">\
					<div class="jFiler-item-container">\
					<div class="jFiler-item-inner">\
					<div class="jFiler-item-thumb">\
					<div class="jFiler-item-status"></div>\
					<div class="jFiler-item-info">\
					<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
					</div>\
					{{fi-image}}\
					</div>\
					<div class="jFiler-item-assets jFiler-row">\
					<ul class="list-inline pull-left">\
					<span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
					</ul>\
					<ul class="list-inline pull-right">\
					<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
					</ul>\
					</div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập STT" />\
					</div>\
					</div>\
					</li>',
					progressBar: '<div class="bar"></div>',
					itemAppendToEnd: true,
					removeConfirmation: true,
					_selectors: {
						list: '.jFiler-item-list',
						item: '.jFiler-item',
						progressBar: '.bar',
						remove: '.jFiler-item-trash-action',
					}
				},
				addMore: true
			});
		});
	</script>