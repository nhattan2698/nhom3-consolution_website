<?php 
	/**
	 * CIPMEDIA Framework
	 * Vertion 1.0
	 * Author CIP MEDIA JSC. (cskh@cipmedia.vn)
	 * Copyright (C) 2015 CIPMEDIA Co.,Ltd. All rights reserved
	 * Technican Lam Anh Tran (trananh.cipmedia@gmail.com)
	*/
	if(!defined('_lib')) die("Error");
	function nettuts_error_handler($number, $message, $file, $line, $vars)
	{
		if ( ($number !== E_NOTICE) && ($number < 2048) ) {
			include 'templates/error_tpl.php';
			die();
		}
	}
	include_once 'AntiSQLInjection.php';
	//set_error_handler('nettuts_error_handler');
	error_reporting(0);
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	//error_reporting(E_ALL);
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$config_port = $_SERVER['SERVER_PORT'] != '80' ? ':'.$_SERVER['SERVER_PORT'] : '';
	$config['debug']=1;    #Bật chế độ debug dành cho developer
	$config['lang']="vi";
	@define(_SCHEME_, !empty($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'http');
	@define(_SITEURL_, $_SERVER["SERVER_NAME"].':801/sharecode/madeco');
	// CONFIG  CKFINDER
	@define(_SITEURLs_, _SCHEME_.'://'._SITEURL_.'/');
	// CONFIG  CKFINDER
	$_SESSION['folder_ckfinder']  = _SCHEME_.'://'._SITEURL_.'/upload/';
	$_SESSION['ckfinder_license'] = 'madeco.com.vn';
	$_SESSION['ckfinder_key']     = 'WH3HXKVKDWBB4E63SRM3QS5VGKTH5';
	/*$_SESSION['ckfinder_license'] = 'demo1.thietkewebcip.com';
	$_SESSION['ckfinder_key']     = 'XW7WHKVMGMKPLHXT5YHTZGF1898N5';*/
	// CONFIG MAIL SERVER
	$config_email="noreply@madeco.com.vn";
	$config_pass="72z21myD";
	$config_ip= '45.117.169.196';
	// CONFIG ENCRYPTION
	@define(_encrypt_salt, '@NUW215rt2@[e^');
	@define(_encrypt_pepper, '^B[4qrdf7*b#@');
	// CONFIG DATABASE
	$config['database']['servername'] = 'localhost';
	$config['database']['username'] = 'root';
	$config['database']['password'] = '';
	$config['database']['database'] = 'sharecode_madeco';
	$config['database']['refix'] = 'table_';

	$config['login']['attempt'] = 3;
	$config['login']['delay'] = 3;
	?>