<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->AddChainItem($arResult["NAME"],"");
$this->setFrameMode(true);?>

<?//global $USER; if($USER->IsAdmin()){echo'<pre>'; print_r($arResult); echo'</pre>';}?>
<?/*
<ul>
<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
	<?
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
	?>
	
	<li>
		<?//$link = str_replace("/termoregulyatory/", "/dop/", $arElement["DETAIL_PAGE_URL"]);?>
		<?//Заплатка для формирования корректного URL адреса для подкатегорий?>
		<?if ($arElement['IBLOCK_SECTION_ID'] != $arElement['~IBLOCK_SECTION_ID']):
			$arElement["DETAIL_PAGE_URL"] = str_replace("/dop/", "/termoregulyatory/", $arElement["DETAIL_PAGE_URL"]);
		endif?>
		<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a>
	</li>
	
<?endforeach;?>
</ul>*/?>
<div class="sect-txt">
	<?=$arResult['DESCRIPTION']?>
</div>

	<?//Связка с каталогом?>
	<?if($arResult['UF_EL']):?>
		<h2>Наши предложения</h2>
		<?foreach($arResult['UF_EL'] as $key=>$Filds):
			$res = CIBlockElement::GetByID($Filds);
			if($ar_res = $res->GetNext()):?>
				<div class="el-item block click" onclick="location.href='%lnk%<?=$ar_res['DETAIL_PAGE_URL']?>'">
					<?//echo'<pre>'; print_r($ar_res); echo'</pre>';?>
					<?if($ar_res['PREVIEW_PICTURE']):?>
						<?$img = CFile::ResizeImageGet($ar_res['PREVIEW_PICTURE'], array('width'=>220, 'height'=>220), BX_RESIZE_IMAGE_EXACT, true);?>
						<img src="<?=$img['src']?>"/>
					<?endif?>
					<div class="lnk-title">
						<a href="%lnk%<?=$ar_res['DETAIL_PAGE_URL']?>"><?=$ar_res['NAME'];?></a>
					</div>
				</div>
			<?endif?>
		<?endforeach;?>
	<?endif?>