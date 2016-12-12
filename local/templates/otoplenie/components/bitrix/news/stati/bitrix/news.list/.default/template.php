<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$APPLICATION->SetTitle("Полезные статьи");
?>

<div class="stati-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="stati-item block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?if($arItem['PROPERTIES']['IB_LNK_CAT']['VALUE']) {
					$lnk = $arItem['PROPERTIES']['IB_LNK_CAT']['VALUE'];
				} else {
					$lnk = $arItem['DETAIL_PAGE_URL'];
				}
			?>
				
			<?if($arItem['PREVIEW_PICTURE']['SRC']):?>
				<?$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>192, 'height'=>144), BX_RESIZE_IMAGE_EXACT, true);?>
				<a href="%lnk%<?=$lnk?>"><img src="<?=$img['src']?>" /></a>
			<?endif?>
			<div class="block-title">
				<a href="%lnk%<?=$lnk?>"><?=$arItem['NAME']?></a>
			</div>
			<?=$arItem['PREVIEW_TEXT']?>
		</div>
	<?endforeach;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><?=$arResult["NAV_STRING"]?><?endif;?>
</div>
