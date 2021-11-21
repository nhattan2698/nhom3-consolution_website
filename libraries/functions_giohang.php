<?php

function get_size($id){
	global $d;
	$d->reset();
	$sql = "select * from #_size where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$size = $d->fetch_array();
	return $size;
}
function get_color($id){
	global $d;
	$d->reset();
	$sql = "select * from #_mausac where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$color = $d->fetch_array();
	return $color;
}

function isSaling($pid){ ## Sản phẩm đang giảm giá
	global $d, $row,$lang;
	$sql = "select sp_khuyenmai from #_product where id='".$pid."'";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['sp_khuyenmai'];
}

function get_order_qTotal(){
	$max = count($_SESSION['cart']);
	$result=0;
	for($i=0;$i<$max;$i++){
		$q=$_SESSION['cart'][$i]['qty'];
		$result+=$q;
	}
	return $result;
}
function get_product_name($pid){
	global $d, $row,$lang;
	$sql = "select ten_$lang from #_product where id='".$pid."'";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['ten_'.$lang];
}
function get_productlist_icon($pid){
	global $d, $row,$lang;
	$sql = "select icon from #_product_list where id='".$pid."'";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['icon'];
}
function get_order_pay(){
	$sum=0;
	global $d;
	foreach ((array) $_SESSION['cart'] as $key => $value) {
		$sql = "select giaban from #_product where id='".$value['productid']."'  limit 1";
		$d->query($sql);
		$result_Price = $d->fetch_array();
		$sum += $result_Price['giaban'] * $value['qty'];        	
	}	
	return $sum;
}
function get_price($pid){
	global $d, $row;
	$sql = "select giaban from table_product where id='".$pid."'";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['giaban'];
}

function get_thumb($pid){
	global $d, $row;
	$sql = "select photo from table_product where id='".$pid."' ";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['photo'];
}
function remove_product2($pid){
	$pid=intval($pid);
	$max=count($_SESSION['cart']);
	for($i=0;$i<$max;$i++){
		if($pid==$_SESSION['cart'][$i]['productid']){
			unset($_SESSION['cart'][$i]);
			break;
		}
	}
	$_SESSION['cart']=array_values($_SESSION['cart']);
}
function remove_product($pid,$size,$mausac){
	$pid=intval($pid);
	$max=count($_SESSION['cart']);
	for($i=0;$i<$max;$i++){
		if($pid==$_SESSION['cart'][$i]['productid'] && $size==$_SESSION['cart'][$i]['size'] && $mausac==$_SESSION['cart'][$i]['mausac']){
			unset($_SESSION['cart'][$i]);
			break;
		}
	}
	$_SESSION['cart']=array_values($_SESSION['cart']);
}
function remove_pro_thanh($pid){
	$pid=intval($pid);
	$max=count($_SESSION['cart']);
	for($i=0;$i<$max;$i++){
		if($pid==$_SESSION['cart'][$i]['productid']){
			unset($_SESSION['cart'][$i]);
			break;
		}
	}
	$_SESSION['cart']=array_values($_SESSION['cart']);
	redirect('gio-hang.html');
}
function get_order_total(){
	$max=count($_SESSION['cart']);
	$sum=0;
	for($i=0;$i<$max;$i++){
		$pid=$_SESSION['cart'][$i]['productid'];
		$q=$_SESSION['cart'][$i]['qty'];
		$price=get_price($pid);
		$sum+=$price*$q;
	}
	return $sum;
}
function addtocart($pid,$q,$mausac,$size){
	if($pid<1 or $q<1) return;
	if(is_array($_SESSION['cart'])){
		if(product_exists($pid,$q,$mausac,$size)) return 0;
		$max=count($_SESSION['cart']);
		$_SESSION['cart'][$max]['productid']=$pid;
		$_SESSION['cart'][$max]['qty']=$q;
		$_SESSION['cart'][$max]['size']=$size;
		$_SESSION['cart'][$max]['mausac']=$mausac;		
		return count($_SESSION['cart']);
	}
	else{
		unset($_SESSION['cart']);
		$_SESSION['cart']=array();
		$_SESSION['cart'][0]['productid']=$pid;
		$_SESSION['cart'][0]['qty']=$q;
		$_SESSION['cart'][0]['size']=$size;
		$_SESSION['cart'][0]['mausac']=$mausac;
		return count($_SESSION['cart']);	
	}		
}
function product_exists($pid,$q,$mausac,$size){
	$pid=intval($pid);
	$max=count($_SESSION['cart']);
	$flag=0;
	for($i=0;$i<$max;$i++){
		if($pid==$_SESSION['cart'][$i]['productid']
			&& $mausac==$_SESSION['cart'][$i]['mausac']
			&& $size==$_SESSION['cart'][$i]['size']
		){
			$_SESSION['cart'][$i]['qty'] = $_SESSION['cart'][$i]['qty'] + $q;
		$flag=1;
		break;
	}
}
return $flag;
}

?>