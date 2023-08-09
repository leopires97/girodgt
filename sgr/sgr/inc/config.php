<?php 
include('define.php');
//include('blank.php');
include('functions.php');



#$cod = AntiXssClass::filterFieldSqlInjection($_GET['cod']);

//$conn = mysql_connect(DB_HOST,DB_USER,DB_PASS);
//mysql_select_db(DB_NAME);

$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';', DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


//mysql_set_charset('utf8');
 
session_name(SS_NAME);
session_start();

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

if($_GET['logout']=='1'){
session_destroy ();
	redir('login.php');
}
?>