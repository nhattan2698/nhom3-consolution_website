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
<div class="control_frm" style="margin-top:25px;">
	<div class="bc">
		<ul id="breadcrumbs" class="breadcrumbs">
			<li><a href="index.php?com=setting&act=capnhat"><span>Thiết lập hệ thống</span></a></li>
			<li class="current"><a href="#" onclick="return false;">Cấu hình website</a></li>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
		$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=setting&act=save&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	

	<div class="widget">

		<div class="title chonngonngu">
			<ul>
				<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
				<li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
			</ul>
		</div>	

		<div class="formRow lang_hidden lang_vi active">
			<label>Tên Công Ty</label>
			<div class="formRight">
				<input type="text" name="ten_vi" title="Nhập tên công ty" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow lang_hidden lang_en">
			<label>Tên Công Ty (Tiếng anh)</label>
			<div class="formRight">
				<input type="text" name="ten_en" title="Nhập tên công ty" id="ten_en" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Slogan: </label>
			<div class="formRight">
				<input type="text" value="<?=@$item['slogan_'.$lang]?>" name="slogan_vi" title="Slogan" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['email']?>" name="email" title="Nhập địa chỉ email" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Hotline</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['hotline']?>" name="hotline" title="Nhập hotline" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Điện thoại</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['dienthoai']?>" name="dienthoai" title="Nhập số điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_vi active">
			<label>Địa chỉ</label>
			<div class="formRight">
				<input type="text" name="diachi_vi" title="Nhập địa chỉ công ty" id="diachi_vi" class="tipS validate[required]" value="<?=@$item['diachi_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_vi active">
			<label>Địa chỉ 2</label>
			<div class="formRight">
				<input type="text" name="diachi2_vi" title="Nhập địa chỉ công ty" id="diachi2_vi" class="tipS validate[required]" value="<?=@$item['diachi2_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow lang_hidden lang_en">
			<label>Địa chỉ (Tiếng anh)</label>
			<div class="formRight">
				<input type="text" name="diachi_en" title="Nhập địa chỉ công ty" id="diachi_en" class="tipS validate[required]" value="<?=@$item['diachi_en']?>" />
			</div>
			<div class="clear"></div>
		</div>
<?php /*?> 
		<div class="formRow">
			<label>Mailserver link</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['tenph']?>" name="tenph" title="Nhập địa chỉ website" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	
		<div class="formRow">
			<label>GPS link</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['linkgps']?>" name="linkgps" title="Nhập địa chỉ website" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	 <?php */?>

		<div class="formRow">
			<label>Website</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['website']?>" name="website" title="Nhập địa chỉ website" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	
<!-- 
		<div class="formRow">
			<label>Tọa độ bản đồ</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['toado']?>" name="toado" title="Nhập tọa độ vị trí công ty" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	 -->

	<div class="formRow">
		<label>Iframe GoogleMap:</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Code Analytics" class="tipS" name="iframemap"><?=@$item['iframemap']?></textarea>
		</div>
		<div class="clear"></div>
	</div>	

		<div class="formRow">
			<label>FanPage Facebook</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['facebook']?>" name="facebook" title="Nhập link fanpage facebook" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<?php /*?> <div class="formRow">
					<label>Thời gian làm việc</label>
					<div class="formRight">
						<input type="text" value="<?=@$item['thoigian']?>" name="thoigian" title=" thoigian" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>
		
		
				<div class="formRow">
					<label>Cấu hình phân trang</label>
					<div class="formRight">
						<input type="number" value="<?=@$item['pagenumber']?>" name="pagenumber" title="Nhập số sản phẩm phân trang" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>	 <?php */?>
		

<?php /*?> 		<div class="formRow">
			<label>Lọc giá trị tối đa</label>
			<div class="formRight">
				<input type="number" value="<?=@$item['maxfilter']?>" name="maxfilter" title="Nhập số tiền tối đa để lọc" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	 <?php */?>



	<!-- 	<div class="formRow">
			<label>Đóng dấu ảnh</label>
			<div class="formRight">
				 <div class="mt10"><img src="../upload/watermark.png"  alt="NO PHOTO" width="100" /></div><br>
				<input type="file" id="dongdau" name="dongdau" />
				<div class="note"> width : 1/4 kích thước sản phẩm </div>
			</div>
			<div class="clear"></div>
		</div>
	-->
</div>
		

		<div class="widget">
			<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
				<h6>Recaptcha</h6>
			</div>			

			<div class="formRow">
				<label>Site key</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['gsitekey']?>" name="gsitekey" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>


			<div class="formRow">
				<label>Secret key</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['gsecretkey']?>" name="gsecretkey" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>

		</div>

<?php /*?> 
		<div class="widget">
			<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
				<h6>Cài đặt hiển thị</h6>
			</div>		
			<div class="formRow">
				<label>Vì sao chọn chúng tôi: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "></label>
				<div class="formRight">
					<input type="checkbox" name="desktop[whychoose]" id="check1" value="1" <?=( isset($desktop['whychoose']) && $desktop['whychoose']==1)?'checked="checked"':''?> /> Hiển thị
				</div>
				<div class="clear"></div>
			</div>	
			<div class="formRow">
				<label>Ý kiến khách hàng: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "></label>
				<div class="formRight">
					<input type="checkbox" name="desktop[customer]" id="check1" value="1" <?=( isset($desktop['customer']) && $desktop['customer']==1)?'checked="checked"':''?> /> Hiển thị
				</div>
				<div class="clear"></div>
			</div>	
			<div class="formRow">
				<label>Album ảnh: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "></label>
				<div class="formRight">
					<input type="checkbox" name="desktop[album]" id="check1" value="1" <?=( isset($desktop['album']) && $desktop['album']==1)?'checked="checked"':''?> /> Hiển thị
				</div>
				<div class="clear"></div>
			</div>	
			<div class="formRow">
				<label>Tin tức - video: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "></label>
				<div class="formRight">
					<input type="checkbox" name="desktop[news]" id="check1" value="1" <?=( isset($desktop['news']) && $desktop['news']==1)?'checked="checked"':''?> /> Hiển thị
				</div>
				<div class="clear"></div>
			</div>	
			<div class="formRow">
				<label>Đối tác: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "></label>
				<div class="formRight">
					<input type="checkbox" name="desktop[doitac]" id="check1" value="1" <?=( isset($desktop['doitac']) && $desktop['doitac']==1)?'checked="checked"':''?> /> Hiển thị
				</div>
				<div class="clear"></div>
			</div>	
	 		
		</div> 
 <?php */?>

<?php /*?> 
<div class="widget">
			<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
				<h6>Tiêu đề phụ</h6>
			</div>		
			<div class="formRow">
				<label>Dịch vụ:  </label>
				<div class="formRight">
					<input type="text" value="<?=@$tieude['dichvu']?>" name="tieude[dichvu]" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>	
	 		
			<div class="formRow">
				<label>Chăm sóc SK:  </label>
				<div class="formRight">
					<input type="text" value="<?=@$tieude['chamsoc']?>" name="tieude[chamsoc]" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>	
	 		
			<div class="formRow">
				<label>Sản phẩm:  </label>
				<div class="formRight">
					<input type="text" value="<?=@$tieude['sanpham']?>" name="tieude[sanpham]" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>	
	 		
			<div class="formRow">
				<label>Khách hàng nói gì:  </label>
				<div class="formRight">
					<input type="text" value="<?=@$tieude['khachhang']?>" name="tieude[khachhang]" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>	
	 		
			<div class="formRow">
				<label>Album ảnh:  </label>
				<div class="formRight">
					<input type="text" value="<?=@$tieude['album']?>" name="tieude[album]" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>	
	 		
			<div class="formRow">
				<label>Video clips:  </label>
				<div class="formRight">
					<input type="text" value="<?=@$tieude['video']?>" name="tieude[video]" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>	
	 		
			<div class="formRow">
				<label>Hành trình làm mẹ:  </label>
				<div class="formRight">
					<input type="text" value="<?=@$tieude['hanhtrinh']?>" name="tieude[hanhtrinh]" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>	
	 		
		</div>  <?php */?>




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
			<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho website" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>

	<div class="formRow">
		<label>Description:</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"><?=@$item['description']?></textarea>
			<input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$item['des_char']?>" /> ký tự <b>(Tốt nhất là 160 ký tự)</b>
		</div>
		<div class="clear"></div>
	</div>	

	<div class="formRow">
		<label>Analyrics:</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Code Analytics" class="tipS" name="analytics"><?=@$item['analytics']?></textarea>
		</div>
		<div class="clear"></div>
	</div>	

	<div class="formRow">
		<label>V chat :</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Code vchat" class="tipS" name="vchat"><?=@$item['vchat']?></textarea>
		</div>
		<div class="clear"></div>
	</div>	

	<div class="formRow">
		<div class="formRight">
			<input type="hidden" name="id" id="id_this_setting" value="<?=@$item['id']?>" />
			<input type="submit" class="blueB"  value="Hoàn tất" />
		</div>
		<div class="clear"></div>
	</div> 			
</div>


</form>   