<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $key=>$arItem){
	$arResult['NEW_ITEMS'][$arItem['IBLOCK_SECTION_ID']][$key]['NAME'] = $arItem['NAME'];
	$arResult['NEW_ITEMS'][$arItem['IBLOCK_SECTION_ID']][$key]['DETAIL_TEXT'] = $arItem['DETAIL_TEXT'];
	$arResult['NEW_ITEMS'][$arItem['IBLOCK_SECTION_ID']][$key]['~PREVIEW_TEXT'] = $arItem['~PREVIEW_TEXT'];
}?>
<?ksort($arResult['NEW_ITEMS'])//сортировка по ID категории?>
<?//global $USER; if($USER->IsAdmin()){echo'<pre>'; print_r($arResult['NEW_ITEMS']); echo'</pre>';}?>