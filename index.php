<?php
session_start();
//$expired = '2020-05-07 0:0:0';
//$expired = strtotime($expired);
//if (time() >= $expired) {if ($_REQUEST['com']=='') {header("Location: cip.php"); die(); } }
@define ( '_template' , './templates/');
@define ( '_tpl' , './templates/layouts/');
@define ( '_source' , './sources/');
@define ( '_lib' , './libraries/');
if(!isset($_SESSION['lang'])){
	$_SESSION['lang']='vi';
}

$lang=$_SESSION['lang'];
include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";
include_once _lib."functions_share.php";
include_once _lib."class.database.php";
include_once _source."lang_$lang.php";
include_once _lib."functions_giohang.php";
include_once _lib."file_requick.php";
include_once _lib."counter.php"; 
include_once _lib."getdatahome.php"; 

if($_GET['lang']!=''){
	$_SESSION['lang']=$_GET['lang'];
	header("location:".$_SESSION['links']);
} else {
	$_SESSION['links']=getCurrentPageURL();
}

?>

<!DOCTYPE html>
<html lang="<?=$lang ?>">
<head>
	<?php include _tpl."lib_meta.php" ?>
	<?php include _tpl."lib_css.php" ?>
	<?php include _tpl."addon/noscript_tpl.php"; ?>
	<?=str_replace('&#039;',"'",$row_setting['analytics']) ?>	
</head>
<body>
	<div class="headersite">
		<?php include _tpl."header_tpl.php"; ?>
	</div>	
	<div class="sectionsite">
		<section class="body-content clearfix">
			<?php if ($template=='index'): ?>
				<div class="blockslider clearfix">
					<?php include _tpl."slider_tpl.php"; ?>
				</div>
			<?php endif ?>
			<div class="<?=  $no_container=='true' ? 'blockbody clearfix' : 'container clearfix' ?> pad0">
				<?php include _template.$template."_tpl.php";?>
			</div>

		</section>
	</div>
	<div class="footersite">
		<?php include _tpl."footer_tpl.php"; ?>
	</div>
	<?php include _tpl."lib_jquery.php" ?>
	<?php //include _tpl."popup_tpl.php"; ?>
	<script type="text/javascript" src="<?= _tpl."lib_myscript.js" ?>" defer></script>
	<?php include _tpl."lib_javascript.php" ?>
	<?= str_replace('&#039;',"'",$row_setting['vchat'])?>
	<?=  Organization(); ?>
</body>
</html>