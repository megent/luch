<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?//<div class="akcii-title2">Отопление стало ещё доступнее!</div>?>

<div class="main-akcii-carusel">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="akcii-item-wrap" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="akcii-title"><?=$arItem['NAME']?></div>
			<div class="akcii-desc">
				<?=$arItem['PREVIEW_TEXT']?>
			</div>
		</div>
	<?endforeach;?>
</div>

<a href="/akcii/" class="akcii-more">Все акции</a>