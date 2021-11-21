<style>
.clearfix:before,
.clearfix:after{display: table; content: " "; }
.clearfix:after{clear: both;}
.list_inputprice{}
.list_inputprice .itemsremove{text-align: center;}
.list_inputprice .itemsremove img{cursor: pointer;}
.list_inputprice .item_price{}
.list_inputprice .item_price{margin-bottom: 1.5em; }
.list_inputprice .item_price input{width:  100%; }
.list_inputprice .item_price label{}
.list_inputprice .w50{width: 45%; float:  left; padding:  0 15px; position:  relative; display:  inline-block; }
.list_inputprice .w60{width: 50%;float:  left;display: inline-block;margin-left:  3%;}
.list_inputprice .w30{width: 19%;float:  left;}
.list_inputprice .w10{width: 9%; float:  right;  }
.list_inputprice .w90{width: 89%; float: left;}
.block_addprice{margin:  1em 0; }
.block_addprice .addprice{}
.block_addprice .addprice{display:  inline-block; padding: 1em; padding-left: 3em; background:  url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAABL1BMVEUAAABH1z5Q20c/1DZY3k5D1TpW3UxKw0FL2UJEzztU3Eo/xDdU3Uo+vjZX3k1O2kU7szQ+tjY1my4/pDcylCw+ozcoeCNA0Tc+zTU9wDVW3kxR3Ec+xDVX3U1Q2kY9wDVY305N2kNK1UE9vjVY305N20RI0T88ujRCwTpGyz1V3ExR2khM1EJAuDg3pzA4ozEsgSYpeCRW20xV2UxP0UZNzEQ4njE2lS8vhir///9Q3EZS3UhG2D1F1zxV3kxU3kpC1TlD1jpN20NL2UFX3038/vxK1EJI2D9B1Tf2/PXc99pJ2UDe6t1P20XR9c/V9tL5/fn2+fbx/PHv9u5/5Xlq4GLf697Z6Nhmz19g4FZXz1Dy9fLI78af65qc25eb2ZeX6ZKD53yC1nx713Vs4WViHck1AAAAOXRSTlMA/v7+/v7+KPz26urU1J+fn48oCykSEv39/Pj4+PT09O7u7u7Pz8/PoJ6Pj15eXjULC15eNTUpExKpZnp+AAABwUlEQVQ4y3WPZ1vqQBCFJ5ENvQrYe+/X2zGXTS4xJrqCAmLv+v9/g7Mla0HfD/vMmXNmJoFXKj9y89Ox2PR87nsF+onnJmKaiVz8gz24OmrtvsEaXR18N56xLIsi3KQIysybJb9SVHHR611Edeqnnk851OHQm2Pf7zwo4aTi6n7GdiS0U6vV/BZV0s7I71izI6z9GnJEdWNNHBjTmsqAoxtj/EjeNHcUjgzYkTbNPMCfSaX6A8hkBdZxQYStA3rFOuSbCFacaINUO9zJw0Kj0WjeHx0IfB7Yl3XrpInWAszg+3yMzkf8jo3WDCTwPeF+fyKGVgISnud9FUArAbP49j490TXRmoVFxph3d3bIORW59qkQZ48eWouwEgQBY3sS8ZstJRhDawU2DCMIDIknA54Qsr8B1aTxL0IFmG4Yyb8Ay4ZOMBkItG8sA0A5WY8IVEA3kr8BKRLyPmAoSUgRONtZQv4L6l30/eu6VIRkv4GglHZdGbm9are7T9J23XQJFFuYEJDL8/NLokR6CzSl7FDohmEoDFGEQ1k+r9kujg8goYBX40V1X1MuTA0PKIanCmXop7pZWJobGZlbKmxWQfMCM6ytfTqOyDwAAAAASUVORK5CYII=') left center no-repeat; font-weight:  bold; color: #46d83d; cursor:  pointer; }
</style>
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
<div class="wrapper">
	<div class="control_frm" style="margin-top:25px;">
		<div class="bc">
			<ul id="breadcrumbs" class="breadcrumbs">
				<li><a href="index.php?com=filter&act=add<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm bộ lọc</span></a></li>
				<li class="current"><a href="#" onclick="return false;">Thêm</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	<form name="supplier" id="validate" class="form" action="index.php?com=filter&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
		<div class="widget">
			<div class="title chonngonngu">
				<ul>
					<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
					<li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
				</ul>
			</div>	
			<div class="formRow lang_hidden lang_vi active">
				<label>Tên quản trị</label>
				<div class="formRight">
					<input type="text" name="ten_vi" title="Nhập tên danh mục" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow lang_hidden lang_en">
				<label>Tên quản trị (Tiếng anh)</label>
				<div class="formRight">
					<input type="text" name="ten_en" title="Nhập tên danh mục" id="ten_en" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow lang_hidden lang_vi active">
				<label>Tên hiển thị</label>
				<div class="formRight">
					<input type="text" name="tenhienthi_vi" title="Nhập tên danh mục" id="tenhienthi_vi" class="tipS validate[required]" value="<?=@$item['tenhienthi_vi']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow lang_hidden lang_en">
				<label>Tên hiển thị (Tiếng anh)</label>
				<div class="formRight">
					<input type="text" name="tenhienthi_en" title="Nhập tên danh mục" id="tenhienthi_en" class="tipS validate[required]" value="<?=@$item['tenhienthi_en']?>" />
				</div>
				<div class="clear"></div>
			</div>
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
			<div class="formRow">
				<label>Giá trị thuộc tính</label>
				<div class="formRight">
					<?php /*?> <input type="text" name="giaban" title="Nhập giá bán" id="giaban" class="conso tipS validate[required]" value="<?=@$item['giaban']?>" /> <?php */?>
					<ol class="list_inputprice clearfix">

						<?php if ($_GET['act'] == 'edit'): 
								########################################################  EDITOR  #####################################

	
							$num = count($item_value);
							for ($i=0; $i < $num; $i++) { ?>
								<?php if (!empty($item_value[$i]) ): ?>
									<li class="item_price clearfix" id="item_price-<?=  $i ?>">
										<div class="w90 clearfix"><input type="text" class=" w100 tipS" name="property[][ten_vi]" value="<?=  $item_value[$i]['ten_vi'] ?>"></div>
										<?php if ($i>0): ?>							
											<div class="itemsremove w10"><img class="remove_price" data-item="<?=  $i ?>" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAABvFBMVEUAAABRDQAAAACfHAOgGwIAAACLFAAAAAAAAACKEwCMEgAAAACfGwCHEwAAAAAAAAAAAAAAAAAAAAChGwGOFgGIEwFrDAFoDAFuDAGhHAF8EASQFgGGEgGWGAGAEAF5EANUCQKcGgJ9EAJ3DQKgGgKFEgCSFgCiHABNCAAAAAAAAACiFwApBQApBQAAAAAAAAAAAADOIxXzPBLmNBPSJhPsOBPpNhPhMBPvOhPJIBX6+vrx8fHp6enfwsLoin7cLRPGHhXEHBXYKxTWKRT3PxL9o4z9noT9mX/WbWvUaWbUZWP3cVHSVVHPR0H5Yz7PMyjMLyalLSTiPCHGKCHZNSD5Sx+sHgeQFAX8lXv7jHDyhWr7hmj6gWPufWDVY2D6fF3TXFjncVb6dlTFV1T1a0y/UEzRUEq6SUTRS0PyYEDSRz7XWTzLPDbTQTXvUzPzVTLJNzKnNzHOSy71Uy3UOSzRSCvwTSr6UynzTSnrSCnoRSbVNSTqQSDeNR7ULh3DIh3tPxy8NxvQKhvQJxj0QRfKIheSIBfHNRaiHxOwLRHDJBCGGhDTLQ+xGw7QLgy8JQmkHQSMFAGKFAF0DQGGeoLHAAAAMXRSTlMABi/IvzEtKyYTCgI+OiEcFg8L/O3t4dbTzMnGxsPDwqqfn5yZfHl4ak9HIXFvPjgTlfBLiQAAAcFJREFUOMvN0lVTAlEYxnF2QUoJsbu7FUUsLLql7O5uJaS74wu7MAc4xIy3/u5env8Me3Fw/8zIAKGppqaJMDBSdq7CB+4OdgWC3YO7AL6qZEZ6HSdCPl8gFAr4fOGJoxcp3CmE173tnVPFl073pTjd2d57JVDgnYr/ONpX6DYBnWL/6ANPhYIun1T65p7Ocb9Jpb4u6Pv0T+ff0wW+z5/0tFzQFr35nC/yeRNty+7EuP1xtsSjPU4EQX/MaJkrYTHG+kHQEjbNlGEKt4CglrfFwSxD0vcWrxYECU4mWIBkAk4CBEneDw+zCMFO7MckCOrY2nXMEiR9a9l1IGgNajcwK5D0rQ22gqBPb7ayS1jN+j4QEA3Od9dUEde700DEAe2RB2VxoHyItOOyaAblrcrDhXhUt0oDDZfT7Zdfq7irOVzVtdzfDT+YZvWl7F6zBmjuZZfqZmrBk+tQyw6P5c8am03zLD8+lKk7KEWPtsd7JRGJxBKJWCSSXHl7EHitRKoZ5MHG0MvFmVh8dvESahwk0ZksJB+wmOSJ4aGxzob6VKq+oXN0aHgcZVQjlfk/YE0y6GQSilZgUJREItOZYP/TLxq+mC2gGkvpAAAAAElFTkSuQmCC" alt="icon minus"></div>
										<?php endif ?>
									<?php endif ?>
								</li>
								<?}
								########################################################  ADD NEW #####################################
								else: ?>
									<li class="item_price clearfix" id="item_price-0">
										<div class="w100 clearfix"><input type="text" class=" w100 tipS" name="property[][ten_vi]"></div>				
									</li>
								<?php endif ?>

							</ol>
							<div class="clearfix"></div>
							<div class="block_addprice clearfix"><div class="clearfix"><span class="addprice" data-num="0">Thêm</span></div></div>
						</div>
						<div class="clear"></div>
					</div>
				</div> 
				<div class="widget">
					<div class="formRow">
						<div class="formRight">
							<input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
							<input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
							<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
							<a href="index.php?com=filter&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</form>        </div>
			<script>
				$(document).ready(function() {
					$('.addprice').click(function(event) {
						var num = $(this).attr('data-num');
						var numadd = parseInt(num) + 1;
						var string = '<li class="item_price clearfix" id="item_price-'+numadd+'">';
						string += '<div class="w90 clearfix"><input type="text" class=" w100 tipS" name="property[][ten_vi]"></div>\
						<div class="itemsremove w10"><img class="remove_price" data-item="'+numadd+'" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAABvFBMVEUAAABRDQAAAACfHAOgGwIAAACLFAAAAAAAAACKEwCMEgAAAACfGwCHEwAAAAAAAAAAAAAAAAAAAAChGwGOFgGIEwFrDAFoDAFuDAGhHAF8EASQFgGGEgGWGAGAEAF5EANUCQKcGgJ9EAJ3DQKgGgKFEgCSFgCiHABNCAAAAAAAAACiFwApBQApBQAAAAAAAAAAAADOIxXzPBLmNBPSJhPsOBPpNhPhMBPvOhPJIBX6+vrx8fHp6enfwsLoin7cLRPGHhXEHBXYKxTWKRT3PxL9o4z9noT9mX/WbWvUaWbUZWP3cVHSVVHPR0H5Yz7PMyjMLyalLSTiPCHGKCHZNSD5Sx+sHgeQFAX8lXv7jHDyhWr7hmj6gWPufWDVY2D6fF3TXFjncVb6dlTFV1T1a0y/UEzRUEq6SUTRS0PyYEDSRz7XWTzLPDbTQTXvUzPzVTLJNzKnNzHOSy71Uy3UOSzRSCvwTSr6UynzTSnrSCnoRSbVNSTqQSDeNR7ULh3DIh3tPxy8NxvQKhvQJxj0QRfKIheSIBfHNRaiHxOwLRHDJBCGGhDTLQ+xGw7QLgy8JQmkHQSMFAGKFAF0DQGGeoLHAAAAMXRSTlMABi/IvzEtKyYTCgI+OiEcFg8L/O3t4dbTzMnGxsPDwqqfn5yZfHl4ak9HIXFvPjgTlfBLiQAAAcFJREFUOMvN0lVTAlEYxnF2QUoJsbu7FUUsLLql7O5uJaS74wu7MAc4xIy3/u5env8Me3Fw/8zIAKGppqaJMDBSdq7CB+4OdgWC3YO7AL6qZEZ6HSdCPl8gFAr4fOGJoxcp3CmE173tnVPFl073pTjd2d57JVDgnYr/ONpX6DYBnWL/6ANPhYIun1T65p7Ocb9Jpb4u6Pv0T+ff0wW+z5/0tFzQFr35nC/yeRNty+7EuP1xtsSjPU4EQX/MaJkrYTHG+kHQEjbNlGEKt4CglrfFwSxD0vcWrxYECU4mWIBkAk4CBEneDw+zCMFO7MckCOrY2nXMEiR9a9l1IGgNajcwK5D0rQ22gqBPb7ayS1jN+j4QEA3Od9dUEde700DEAe2RB2VxoHyItOOyaAblrcrDhXhUt0oDDZfT7Zdfq7irOVzVtdzfDT+YZvWl7F6zBmjuZZfqZmrBk+tQyw6P5c8am03zLD8+lKk7KEWPtsd7JRGJxBKJWCSSXHl7EHitRKoZ5MHG0MvFmVh8dvESahwk0ZksJB+wmOSJ4aGxzob6VKq+oXN0aHgcZVQjlfk/YE0y6GQSilZgUJREItOZYP/TLxq+mC2gGkvpAAAAAElFTkSuQmCC" alt="icon minus"></div>\
						</li>';
						$('.list_inputprice').append(string);
						$('.addprice').attr('data-num', numadd);
						console.log('Add item '+numadd+' success!');
					});
					$('.list_inputprice').on('click', '.remove_price', function() {
						var num = $(this).attr('data-item');
						$('#item_price-'+num).remove();
						console.log('Remove item '+num+' success!');
					});
				});
			</script>