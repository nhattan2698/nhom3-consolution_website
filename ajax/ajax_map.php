<?php
	session_start();
	@define ( '_template' , '../templates/');
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
	
	//print_r($_POST);
	$id_map=$_POST['id'];
	
  $d->reset();
  $sql = "select * from table_daily where hienthi >0 and id='".$id_map."' order by  stt,id desc ";
  $d->query($sql);
  $result_daily= $d->result_array();
?>

 	<div class="padding0  col-lg-12 col-md-12 col-xsm-12 col-xs-12">
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyC_reXxFyqYV70NpNj12ZyAaxgcauZ58cY"></script>

     
 
  		<div class="ggmaps">
              	<div id="map" style=" width:100%; height:350px"></div>  
                <script type="text/javascript">  
                var locations = [  
                ['<b style="color:red; font-size:15px; font-family:arial"><?=$result_daily[0]['ten_'.$lang]?></b><br /><b>ĐC:<?=$result_daily[0]['diachi_'.$lang]?></b><br /><div style="font-family:arial">Điện thoại:<?=$result_daily[0]['dienthoai']?></div>', <?=$result_daily[0]['toado']?> , 1],  
                ];  
                var map = new google.maps.Map(document.getElementById('map'), {  
                 zoom: 13,  
                 center: new google.maps.LatLng(<?=$result_daily[0]['toado']?>),  
                 mapTypeId: google.maps.MapTypeId.ROADMAP  
                });  
                var infowindow = new google.maps.InfoWindow();  
                var marker, i;  
                for (i = 0; i < locations.length; i++) {   
				
                 marker = new google.maps.Marker({  
                   position: new google.maps.LatLng(locations[i][1], locations[i][2]),  
                   map: map  
                 });  
                 google.maps.event.addListener(marker, 'click', (function(marker, i) {  
                   return function() {  
                     infowindow.setContent(locations[i][0]);  
                     infowindow.open(map, marker);  
                   }  
                 })(marker, i));  
                }  
                </script>

      
      
        
  </div>
  
  </div>