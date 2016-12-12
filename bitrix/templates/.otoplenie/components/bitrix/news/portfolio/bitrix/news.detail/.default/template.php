<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="port-detail">
	<?=$arResult["PREVIEW_TEXT"]?>
	<span class="clear"></span>
	<span class="foto-title">Фотографии с объекта</span><span class="count"><?=(count($arResult['PROPERTIES']['IB_IMG']['VALUE'])+1);?></span>
	<div class="foto-wrap">
		<?$img_or = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array('width'=>1000, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, $GLOBALS['WATER']);?>
		<?$img_mini = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array('width'=>445, 'height'=>315), BX_RESIZE_IMAGE_EXACT, false, $GLOBALS['WATER']);?>
		<a href="<?=$img_or['src']?>" rel="gall" class="fancy"><img src="<?=$img_mini['src']?>" alt="<?=$arResult['PREVIEW_PICTURE']['ALT']?>"/></a>
		
		<?if($arResult['PROPERTIES']['IB_IMG']['VALUE']):?>
			<?foreach($arResult['PROPERTIES']['IB_IMG']['VALUE'] as $arIm){?>
				<?
				$img_dop_or = CFile::ResizeImageGet($arIm, array('width'=>1000, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, $GLOBALS['WATER']);
				$img_dop_mini = CFile::ResizeImageGet($arIm, array('width'=>445, 'height'=>315), BX_RESIZE_IMAGE_EXACT, false, $GLOBALS['WATER']);
				?>
				<a href="<?=$img_dop_or['src']?>" rel="gall" class="fancy"><img src="<?=$img_dop_mini['src']?>" alt="<?=$arResult['PREVIEW_PICTURE']['ALT']?>"/></a>
			<?}?>
		<?endif?>
	</div>
</div>

<div class="bot-pag-wrap">
 
<?if(is_array($arResult["TOLEFT"])):?>
<a class="btn-bg pag-left" href="<?=$arResult["TOLEFT"]["URL"]?>">
        <?=$arResult["TOLEFT"]["NAME"]?>
        </a>
<?endif?>
 
<?if(is_array($arResult["TORIGHT"])):?>
    <a class="btn-bg pag-right" href="<?=$arResult["TORIGHT"]["URL"]?>">
            <?=$arResult["TORIGHT"]["NAME"]?>
    </a>
<?endif?>
</div>