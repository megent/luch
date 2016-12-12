<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?//дописывание для страниц пагинатора уникальный title
//$title = $APPLICATION->GetPageProperty("title");

if (isset($_GET['PAGEN_1'])) {
	$pagen_name = "Интересные статьи";
	$pagen_desc = "Полезные статьи на тему систем отопления: электро, пленочное, водяное";

	$title_new = "{$pagen_name} страница {$_GET['PAGEN_1']}";
	$APPLICATION->SetPageProperty("title", $title_new);
	
	$desc_new = "{$pagen_desc} - страница {$_GET['PAGEN_1']}";
	$APPLICATION->SetPageProperty("description", $desc_new);
	$arResult['STR'] = " страница {$_GET['PAGEN_1']}";
}
?>