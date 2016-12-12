<? # заголовки 404, что бы поисковики были умничками
CHTTP::SetStatus("404 Not Found"); // может убивать некоторые серваки
@define("ERROR_404","Y");


# для 404 картинок отдаём пустышку
$arrImage = array("jpg","bmp","jpeg","jpe","gif","png");
$arrPath = pathinfo($_SERVER["REQUEST_URI"]);
if (in_array($arrPath["extension"],$arrImage)) die();

# делаем редирект, если он есть в правилах
//include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 - страница не найдена"); 
$APPLICATION->AddChainItem('404 - страница не найдена',"");?>
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