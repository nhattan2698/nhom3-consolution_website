		<?php
		$type             = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";	
		$act              = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
		$act              = explode('_',$act);
		if(count($act>1)){
			if (!empty($act[1])) {
				$act              = $act[1];
			}else{
				$act              = '';
			}
		} else {
			$act              = $act[0];
		}
		switch($type){
		//-------------product------------------
			case 'logo':
			$title_main       = 'Logo';
			@define ( _width_thumb , 190 );
			@define ( _height_thumb , 125 );
			@define ( _style_thumb , 3 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$links_           = 'false';
			$ratio_           = 1;
			break;
			case 'banner':
			$title_main       = 'Banner';
			@define ( _width_thumb , 622 );
			@define ( _height_thumb , 100 );
			@define ( _style_thumb , 3 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$links_           = 'false';
			$ratio_           = 1;
			break;
			case 'quytrinh':
			$title_main       = 'quy trình';
			@define ( _width_thumb , 440 );
			@define ( _height_thumb , 280 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$links_           = 'false';
			$ratio_           = 1;
			break;
			case 'doitac':
			$title_main       = "Đối tác";
			@define ( _width_thumb , 200 );
			@define ( _height_thumb ,100 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 2;
			$links_           = "true";
			break;
			case 'popup':
			$title_main       = 'Hình ảnh Popup';
			@define ( _width_thumb , 800 );
			@define ( _height_thumb , 600 );
			@define ( _style_thumb , 3 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$links_           = 'true';
			$config_hienthi           = 'true';
			$ratio_           = 1;
			break;
			case 'chukyso':
			switch($act){
				case 'list':
				$title_main       = "Danh mục cấp 1";
				$config_images    = "true";
				$config_mota      = "true";
				$config_noidung      = "true";
				$config_noibat    = "true";
				$config_icon      = "false";
				$config_adv       = "false";
				$config_qt   = "true";
				@define ( _width_thumb , 380 );
				@define ( _height_thumb , 250 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
				case 'cat':
				$title_main       = "Danh mục cấp 2";
				$config_images    = "false";
				$config_mota      = "false";
				$config_noidung      = "true";
				@define ( _width_thumb , 280 );
				@define ( _height_thumb , 220 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
				default:
				$title_main       = "sản phẩm";
				$config_images    = "true";
				$config_mota      = "true";
				$config_list      = "true";
				$config_cat       = "false";
				$config_item      = "false";
				$config_sub       = "false";
				$config_noibat    = "false";
				$config_noidung   = "true";
				$config_duan   = "false";
				$config_price   = true;
				$config_motack   = true;
				@define ( _width_thumb , 380 );
				@define ( _height_thumb , 250 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
			}
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
			case 'quy-trinh':
			$title_main       = "quy trình";	
			$config_ten       = "true";
			$config_noidung   = "true";
			$config_id_list   = "true";
			break;
			case 'bao-gia':
			$title_main       = "báo giá";	
			$config_ten       = "true";
			$config_noidung   = "true";
			$config_gia   = "true";
			$config_id_list   = "true";
			break;	

			case 'hoadon':
			switch($act){
				case 'list':
				$title_main       = "Danh mục cấp 1";
				$config_images    = "false";
				$config_mota      = "false";
				$config_icon      = "false";
				$config_adv       = "false";
				@define ( _width_thumb , 350 );
				@define ( _height_thumb , 225 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
				case 'cat':
				$title_main       = "Danh mục cấp 2";
				$config_images    = "false";
				$config_mota      = "false";
				@define ( _width_thumb , 280 );
				@define ( _height_thumb , 220 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
				default:
				$title_main       = "Hóa đơn điện tử";
				$config_images    = "true";
				$config_mota      = "true";
				$config_list      = "true";
				$config_cat       = "true";
				$config_item      = "false";
				$config_sub       = "false";
				$config_noibat    = "true";
				$config_noidung   = "true";
				$config_duan   = "false";
				@define ( _width_thumb , 480 );
				@define ( _height_thumb , 320 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
			}
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
			case 'baohiem':
			switch($act){
				case 'list':
				$title_main       = "Danh mục cấp 1";
				$config_images    = "false";
				$config_mota      = "false";
				$config_icon      = "false";
				$config_adv       = "false";
				@define ( _width_thumb , 350 );
				@define ( _height_thumb , 225 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
				case 'cat':
				$title_main       = "Danh mục cấp 2";
				$config_images    = "false";
				$config_mota      = "false";
				@define ( _width_thumb , 280 );
				@define ( _height_thumb , 220 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
				default:
				$title_main       = "Bảo hiểm xã hội điện tử";
				$config_images    = "true";
				$config_mota      = "true";
				$config_list      = "true";
				$config_cat       = "true";
				$config_item      = "false";
				$config_sub       = "false";
				$config_noibat    = "true";
				$config_noidung   = "true";
				$config_duan   = "false";
				@define ( _width_thumb , 480 );
				@define ( _height_thumb , 320 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
			}
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
			case 'software':
			switch($act){
				case 'list':
				$title_main       = "Danh mục cấp 1";
				$config_images    = "false";
				$config_mota      = "false";
				$config_icon      = "false";
				$config_adv       = "false";
				@define ( _width_thumb , 350 );
				@define ( _height_thumb , 225 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
				case 'cat':
				$title_main       = "Danh mục cấp 2";
				$config_images    = "false";
				$config_mota      = "false";
				@define ( _width_thumb , 280 );
				@define ( _height_thumb , 220 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
				default:
				$title_main       = "Download file";
				$config_images    = "true";
				$config_link    = "true";
				$config_mota      = "false";
				$config_list      = "true";
				$config_cat       = "false";
				$config_item      = "false";
				$config_sub       = "false";
				$config_noibat    = "false";
				$config_noidung   = "false";
				$config_files   = "true";
				@define ( _width_thumb , 100 );
				@define ( _height_thumb , 100 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
			}
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
			case 'about':
			$title_main       = "Giới thiệu về chúng tôi";	
			$config_images    = "true";
			$config_mota      = "true";
			$config_ten       = "true";
			$config_album      = "false";
			$config_hienthi       = "true";
			$config_noidung   = "false";
			$links_       = "true";
			@define ( _width_thumb , 465 );
			@define ( _height_thumb , 465 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 1;
			break;	
			case 'soft':
			$title_main       = "Tải về phần mềm";
			@define ( _width_thumb , 280 );
			@define ( _height_thumb ,220 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 2;
			$links_           = "false";
			break;
			case 'album':
			$title_main       = "Album photo";
			@define ( _width_thumb , 280 );
			@define ( _height_thumb ,220 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 1;
			$links_           = "false";
			break;
			case 'favicon':
			$title_main       = 'Favicon';
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 1;
			break;
			case 'socialfooter':
			$title_main       = "Liên kết web";
			@define ( _width_thumb , 20 );
			@define ( _height_thumb , 20 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 2;
			$links_           = "true";
			break;
			case 'socialtop':
			$title_main       = "Liên kết web";
			@define ( _width_thumb , 38 );
			@define ( _height_thumb , 38 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 1;
			$links_           = "true";
			break;	
			case 'bocongthuong':
			$title_main       = 'Logo bộ công thương';
			@define ( _width_thumb , 230 );
			@define ( _height_thumb , 90 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 1;
			$links_           = 'true';
			$config_hienthi   = 'true';
			break;
		// -----------------------------------------
			case 'tintuc':
			switch($act){
				case 'list':
				$title_main       = "Danh mục cấp 1";
				$config_images    = "false";
				$config_mota      = "false";
				$config_icon      = "false";
				$config_adv       = "false";
				@define ( _width_thumb , 350 );
				@define ( _height_thumb , 225 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
				case 'cat':
				$title_main       = "Danh mục cấp 2";
				$config_images    = "false";
				$config_mota      = "false";
				@define ( _width_thumb , 280 );
				@define ( _height_thumb , 220 );
				@define ( _style_thumb , 1 );
				$ratio_           = 1;
				break;
				default:
				$title_main       = "Tin tức";
				$config_images    = "true";
				$config_mota      = "true";
				$config_list      = "false";
				$config_cat       = "false";
				$config_item      = "false";
				$config_sub       = "false";
				$config_noibat    = "true";
				$config_noidung   = "true";
				@define ( _width_thumb , 280 );
				@define ( _height_thumb , 170 );
				@define ( _style_thumb , 1 );
				$ratio_           = 2;
				break;
			}
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
			case 'gioithieu':
			$title_main       = "Giới thiệu";	
			$config_images    = "false";
			$config_mota      = "false";
			$config_list      = "false";
			$config_cat       = "false";
			$config_item      = "false";
			$config_ten       = "false";
			$config_noidung   = "true";
			$config_noibat    = "false";
			$config_sub       = "false";
			@define ( _width_thumb , 480 );
			@define ( _height_thumb , 320 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 2;
			break;
			case 'hotro':
			$title_main       = "Hỗ trợ";	
			$config_images    = "false";
			$config_mota      = "false";
			$config_list      = "false";
			$config_cat       = "false";
			$config_item      = "false";
			$config_ten       = "false";
			$config_noidung   = "true";
			$config_noibat    = "false";
			$config_sub       = "false";
			@define ( _width_thumb , 480 );
			@define ( _height_thumb , 320 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 2;
			break;	
			case 'dichvu':
			$title_main       = "Dịch vụ";	
			$config_images    = "true";
			$config_mota      = "true";
			$config_list      = "false";
			$config_cat       = "false";
			$config_item      = "false";
			$config_ten       = "true";
			$config_noidung   = "true";
			$config_noibat    = "true";
			$config_sub       = "false";
			@define ( _width_thumb , 130 );
			@define ( _height_thumb , 130 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 2;
			break;		
			case 'visao':
			$title_main       = "Vì sao chọn chúng tôi";	
			$config_images    = "false";
			$config_mota      = "true";
			$config_list      = "false";
			$config_cat       = "false";
			$config_item      = "false";
			$config_ten       = "true";
			$config_noidung   = "false";
			$config_noibat    = "false";
			$config_sub       = "false";
			@define ( _width_thumb , 130 );
			@define ( _height_thumb , 130 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_           = 2;
			break;	
			case 'slider':
			$title_main     = "Hình ảnh slider";	
			$config_images  = "true";
			$config_mota    = "true";
			$config_list    = "false";
			$config_cat     = "false";
			$config_item    = "false";
			$config_ten     = "false";
			$config_noidung = "false";
			$config_noibat  = "false";
			$config_sub     = "false";
			$config_link     = "true";
			$seo            = "false";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 430 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_         = 1;
			$seo_         = 0;
			break;	
			case 'tienich':
			$title_main     = "Tiện ích";	
			$config_images  = "true";
			$config_mota    = "false";
			$config_list    = "false";
			$config_cat     = "false";
			$config_item    = "false";
			$config_ten     = "false";
			$config_noidung = "false";
			$config_noibat  = "false";
			$config_sub     = "false";
			$config_link     = "true";
			$seo            = "false";
			@define ( _width_thumb , 72 );
			@define ( _height_thumb , 72 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_         = 1;
			$seo_         = 0;
			break;	
			case 'thanhtuu':
			$title_main     = "thành tựu";	
			$config_images  = "true";
			$config_mota    = "true";
			$config_list    = "false";
			$config_cat     = "false";
			$config_item    = "false";
			$config_ten     = "false";
			$config_noidung = "false";
			$config_noibat  = "false";
			$config_sub     = "false";
			$config_link     = "false";
			$seo            = "false";
			@define ( _width_thumb , 90 );
			@define ( _height_thumb , 90 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_         = 1;
			$seo_         = 0;
			break;	
			case 'khachhang':
			$title_main     = "khách hàng";	
			$config_images  = "true";
			$config_mota    = "false";
			$config_list    = "false";
			$config_cat     = "false";
			$config_item    = "false";
			$config_ten     = "false";
			$config_noidung = "true";
			$config_noibat  = "true";
			$config_sub     = "false";
			$config_link     = "false";
			$seo            = "false";
			@define ( _width_thumb , 220 );
			@define ( _height_thumb , 100 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_         = 1;
			$seo_         = 0;
			break;	
			case 'support':
			$title_main     = "dịch vụ hỗ trợ";	
			$config_images  = "true";
			$config_phone    = "true";
			$config_mota    = "false";
			$config_list    = "false";
			$config_cat     = "false";
			$config_item    = "false";
			$config_ten     = "false";
			$config_noidung = "false";
			$config_noibat  = "false";
			$config_sub     = "false";
			$config_link     = "false";
			$seo            = "false";
			@define ( _width_thumb , 101 );
			@define ( _height_thumb , 101 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_         = 1;
			$seo_         = 0;
			break;	
			case 'chinhanh':
			$title_main     = "chi nhánh";	
			$config_images  = "false";
			$config_phone    = "true";
			$config_mota    = "true";
			$config_list    = "false";
			$config_cat     = "false";
			$config_item    = "false";
			$config_ten     = "false";
			$config_noidung = "false";
			$config_noibat  = "false";
			$config_sub     = "false";
			$config_link     = "false";
			$seo            = "false";
			@define ( _width_thumb , 220 );
			@define ( _height_thumb , 100 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_         = 1;
			$seo_         = 0;
			break;	
			case 'bgsite':
			$title_main       = 'Background site';
			$config_hienthi   = 'true';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb ,768 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_           = 1;
			break;
			case 'bgsite1':
			case 'bgsite2':
			case 'bgsite3':
			case 'bgsite4':
			$title_main       = 'Background site';
			$config_hienthi   = 'true';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb ,600 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_           = 1;
			break;
			case 'bgheader':
			$title_main       = 'Background header';
			$config_hienthi   = 'true';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb ,180 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_           = 1;
			break;
			case 'bgfooter':
			$config_hienthi   = 'true';
			$title_main       = 'Banner';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb ,405 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_           = 1;
			break;
		## SET PHOTO
			case 'video':
			$title_main       = 'video';
			$config_hienthi   = 'true';
			@define ( _width_thumb , 360 );
			@define ( _height_thumb ,220 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_           = 1;
			break;
			case 'videos':
			$title_main       = 'video';
			$config_hienthi   = 'true';
			@define ( _width_thumb , 360 );
			@define ( _height_thumb ,220 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_           = 1;
			break;
			case 'tags':
			$title_main       = 'tags';
			$config_ten       = 'true';
			break;
			case 'lienhe':
			$title_main       = 'Liên hệ';
			$config_ten       = 'true';
			break;
			case 'lienhe_index':
			$title_main       = 'Liên hệ trang chủ';
			$config_ten       = 'true';
			break;
		//--------------defaut---------------
			default: 
			$source           = "";
			$template         = "index";
			break;
		}
		?>