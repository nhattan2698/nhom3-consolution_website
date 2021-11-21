<?php 
session_start();
	@define ( '_lib' , '../../libraries/');
	include_once _lib."config.php";
	include_once _lib."class.database.php";
	if(!isset($_SESSION['CIPMEDIA']) || $_SESSION['CIPMEDIA']==false){ header('HTTP/1.1 403 Forbidden'); die; }
	$d = new database($config['database']);
	if(isset($_POST["id"])){
		$sql = "update ".$_POST["bang"]." SET ".$_POST["type"]."=".$_POST["value"]." WHERE  id = ".$_POST["id"]."";
		//$data = mysql_query($sql) or die("Not query sql");
		$d->query($sql) or die("Not query sql");

	}
?>