<?php
session_start();
@define ( '_lib' , '../../libraries/');
include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";
include_once _lib."library.php";
include_once _lib."class.database.php";	
include_once _lib."pclzip.php";
$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";	
if(!isset($_SESSION['CIPMEDIA']) || $_SESSION['CIPMEDIA']==false){ header('HTTP/1.1 403 Forbidden'); die; }
$d = new database($config['database']);
$table = $_POST['table'];
$id = $_POST['id'];
$value = $_POST['value'];
$data['soluong'] = $value;
$d->setTable($table);
$d->setWhere('id', $id);
$d->update($data);
?>
