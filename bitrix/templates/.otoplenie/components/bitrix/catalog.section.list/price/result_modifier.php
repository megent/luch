<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?//Загрузка прайс-листа
$db_props = CIBlockElement::GetProperty(3,614, array("sort" => "asc"), Array("id" => 33));
if($ar_props = $db_props->Fetch()):
	$arResult['URL_PRICE'] = CFile::GetPath($ar_props['VALUE']);
endif;?>
