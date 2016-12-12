<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->AddChainItem($arResult["NAME"],"");
$this->setFrameMode(true);
$APPLICATION->SetTitle($arResult['UF_H1']);
//$APPLICATION->SetPageProperty('title', $arResult['UF_H1']);
$APPLICATION->SetPageProperty("title", "123");
?>
<?//=$arResult['UF_H1']?>

<?//global $USER; if($USER->IsAdmin()){echo'<pre>'; print_r($arResult); echo'</pre>';}?>

<ul>
<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
	<?
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
	?>
	
	<?//Заплатка для формирования корректного URL адреса для подкатегорий?>
	<?if ($arElement['IBLOCK_SECTION_ID'] != $arElement['~IBLOCK_SECTION_ID']):
		$arElement["DETAIL_PAGE_URL"] = str_replace("/dop/", "/termoregulyatory/", $arElement["DETAIL_PAGE_URL"]);
	endif?>
	
	<?if($arElement['DETAIL_PICTURE']['SRC']):?>
		<div class="el-item block click" onclick="location.href='%lnk%<?=$arElement["DETAIL_PAGE_URL"]?>'">
			<?$img = CFile::ResizeImageGet($arElement['DETAIL_PICTURE']['ID'], array('width'=>220, 'height'=>220), BX_RESIZE_IMAGE_EXACT, true);?>
			<img src="<?=$img['src']?>"/>
			
			<div class="lnk-title">
				<a href="%lnk%<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a>
			</div>
		</div>
	<?else:?>
		<li>
			<?//$link = str_replace("/termoregulyatory/", "/dop/", $arElement["DETAIL_PAGE_URL"]);?>
			<a href="%lnk%<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a>
		</li>
	<?endif?>
<?endforeach;?>
<span class="clear"></span>
</ul>
<div class="sect-txt">
	<?=$arResult['DESCRIPTION']?>
</div>