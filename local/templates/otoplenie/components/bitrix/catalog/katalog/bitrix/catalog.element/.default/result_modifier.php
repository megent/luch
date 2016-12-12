<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?//Проверка на правильность URL адреса
if(strstr($_SERVER['REQUEST_URI'], "?utm_source") || strstr($_SERVER['REQUEST_URI'], "?clear_cache")):
	//CHTTP::SetStatus("404 Not Found");
else:
	if($arResult['DETAIL_PAGE_URL'] != strstr($_SERVER['REQUEST_URI'], $arResult['DETAIL_PAGE_URL'])){
		CHTTP::SetStatus("404 Not Found");
		global $APPLICATION;
		$APPLICATION->RestartBuffer();
		include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php";
		require ($_SERVER["DOCUMENT_ROOT"]."/404.php");
		include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/".SITE_TEMPLATE_ID."/footer.php";
	}
endif;
?>
<?
//var_dump($arResult['DETAIL_PAGE_URL']);
//var_dump($_SERVER['REQUEST_URI']);
?>
<?//if ($arResult['PROPERTIES']['CUST_H1']['VALUE']) {
	//$arResult['NAME'] = $arResult['PROPERTIES']['CUST_H1']['VALUE'];}?>

<?foreach($arResult['PROPERTIES']['IB_IMG']['VALUE'] as $key=>$Filds):?>
	<?if($Filds):?>
		<?$Filds = CFile::GetFileArray($Filds); // Получает данные изображения, название, путь
		
		$razmeri[$key] = explode(";", $arResult['PROPERTIES']['IB_IMG']['DESCRIPTION'][$key]);
		
		//$razmeri[$key][0] - размер оригинала, пример 300-300
		list($width,$height)=explode('-',$razmeri[$key][0]);
		
		//$razmeri[$key][1] - размер миниатюры, пример 100-100
		list($width_mini,$height_mini)=explode('-',$razmeri[$key][1]);
		
		$url[$key] = CFile::ResizeImageGet($Filds, array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, $bInitSizes = false, $GLOBALS['WATER']);
		$url_mini[$key] = CFile::ResizeImageGet($Filds, array('width'=>$width_mini, 'height'=>$height_mini), BX_RESIZE_IMAGE_EXACT, true);
		
		//подмена
		$i = $key + 1;
		$metka = array("#img".$i."#");
		$arResult['DETAIL_TEXT'] = str_replace($metka, $url[$key]['src'], $arResult['DETAIL_TEXT']);
		
		$metka_mini = array("#img".$i."_mini#");
		$arResult['DETAIL_TEXT'] = str_replace($metka_mini, $url_mini[$key]['src'], $arResult['DETAIL_TEXT']);
		?>
	<?endif;?>
<?endforeach;?>

<?//global $USER; if($USER->IsAdmin()){echo'<pre>'; print_r($arResult['PROPERTIES']['IB_PRICE']['VALUE']); echo'</pre>';}?>