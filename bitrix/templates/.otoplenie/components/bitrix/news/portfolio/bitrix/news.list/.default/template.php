<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="port-list">

	<?//echo '<pre>'; print_r($arResult["ITEMS"]); echo '</pre>';?>

	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="port-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="port-title">
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
			</div>
			<div class="port-carusel">
				<?$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>445, 'height'=>315), BX_RESIZE_IMAGE_EXACT, false, $GLOBALS['WATER']);?>
				<img src="<?=$img['src']?>" alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>"/>
				
				<?if($arItem['PROPERTIES']['IB_IMG']['VALUE']):?>
					<?foreach($arItem['PROPERTIES']['IB_IMG']['VALUE'] as $arItem){?>
						<?
						$img_dop = CFile::ResizeImageGet($arItem, array('width'=>445, 'height'=>315), BX_RESIZE_IMAGE_EXACT, false, $GLOBALS['WATER']);
						?>
						<img src="<?=$img_dop['src']?>" alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>"/>
					<?}?>
				<?endif?>
			</div>
		</div>
	<?endforeach;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><?=$arResult["NAV_STRING"]?><?endif;?>
</div>
