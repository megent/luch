<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul id="left-menu2">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li><span class="item-selected"><?=$arItem["TEXT"]?></span></li>
	<?else:?>
		<?//если это главная, оставяем как есть
		if ($GLOBALS["APPLICATION"]->GetCurPage() == "/"):?>
			<li><a href="%lnk%<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?else:	//для всех других страниц применять правила ниже?>
			<li><span class="inlink" data-href="%lnk%<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></span></li>
		<?endif?>
	<?endif?>
	
<?endforeach?>

</ul>
<?endif?>