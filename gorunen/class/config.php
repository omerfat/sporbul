<?
	//error_reporting();
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	@session_start();

	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/functions.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/db.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/sorgu.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/theme.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/kayit.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/select.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/format.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/row.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/mail.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/resim.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/sayfalama.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/excel_sayfasi.php');
	
	$DB = new DB();

	define("JSVERSION","1.0");
	define("CSSVERSION","1.0");

	//define('HOST',	'104.247.160.211');
	//define('DB',	'ozgurhtr_sporbul');
	//define('USER',	'ozgurhtr_sporbul');
	//define('PASS',	'H@mL5eHK.M2bDzlw.');

	define('HOST',	'94.73.151.142');
	define('DB',	'u2118044_sporbul');
	define('USER',	'u2118044_sporbul');
	define('PASS',	'~T3rV_AMLP82');

	$cDB  = $DB->baglan(HOST, DB, USER, PASS);

	$cSorgu 			= new Sorgu2();

	$cKayit 			= new Kayit2();
	$cSelect2 			= new Select2();
	$cMail 				= new Mail();
	$cResim 			= new ResimYukle();
	$cTheme 			= new Theme($row_site, $row_kullanici, $rows_anamenuler, $rows_menuler);

	date_default_timezone_set('Europe/Istanbul');
