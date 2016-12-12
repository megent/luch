<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?//echo '<pre>'; print_r($arResult); echo '</pre>';?>

<div class="title"><a href="%lnk%/nashi-raboty/">Наши работы</a></div>
<div class="slider-one">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				
		$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>608, 'height'=>346), BX_RESIZE_IMAGE_EXACT, true);
		?>
		
		<a href="%lnk%<?=$arItem['DETAIL_PAGE_URL']?><?=$arItem['ID']?>/" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><img src="<?=$img['src']?>" alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>"/></a>
		
	<?endforeach;?>
</div>