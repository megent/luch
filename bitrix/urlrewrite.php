<?
require_once($_SERVER['DOCUMENT_ROOT']."/local/city/urlrewrite.php");
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
require_once($_SERVER['DOCUMENT_ROOT']."/local/city/urlrewrite_second.php");
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/404.php'))
	include_once($_SERVER['DOCUMENT_ROOT'].'/404.php');
?>