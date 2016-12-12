<? # заголовки 404, что бы поисковики были умничками
//CHTTP::SetStatus("404 Not Found"); // может убивать некоторые серваки
@define("ERROR_403","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("403 - Доступ запрещен"); 
$APPLICATION->AddChainItem('403 - Доступ запрещен',"");?>
<?
$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
	"LEVEL"	=>	"3",
	"COL_NUM"	=>	"2",
	"SHOW_DESCRIPTION"	=>	"Y",
	"SET_TITLE"	=>	"N",
	"CACHE_TIME"	=>	"3600"
	)
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>