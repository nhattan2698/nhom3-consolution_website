<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~8192);
@define ( '_lib' , '../libraries/');
include_once _lib."config.php";
include_once _lib."constant.php";;
include_once _lib."functions.php";
include_once _lib."functions_giohang.php";
include_once _lib."class.database.php";
$d = new database($config['database']);
@$soluong = 1;
@$pid = $_POST['pid'];
if(($_POST['psoluong']>0) && isset($_POST['psoluong'])){
	$soluong = $_POST['psoluong'];
}else {
	$soluong = 1;
}
@$pcolor = $_POST['pcolor'];
@$psize = $_POST['psize'];
$lang='vi';
$result_giohang = addtocart($pid,$soluong,$pcolor,$psize);
$count = count($_SESSION['cart']);

$data = array('num' => get_order_qTotal(), 'price' => number_format(get_order_total(),0, ',', '.'));
$data = json_encode($data);
print($data);
?>