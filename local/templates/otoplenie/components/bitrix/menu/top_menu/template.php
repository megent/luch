<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul>
	<?
	foreach($arResult as $arItem):
		if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
			continue;
		if($arItem["SELECTED"]):?>
			<li><span class="selected<?if($arItem["LINK"] == '/akcii/') echo " m-akcii";?>"><?=$arItem["TEXT"]?></span></li>
		<?else:?>
			<?//если это главная, оставяем как есть
			if ($GLOBALS["APPLICATION"]->GetCurPage() == "/"):?>
				<li><a href="%lnk%<?=$arItem["LINK"]?>" <?if($arItem["LINK"] == '/akcii/') echo 'class="m-akcii"';?>><?=$arItem["TEXT"]?></a></li>
			<?else:	//для всех других страниц применять правила ниже?>
				<?if (($arItem["LINK"] == '/otzivi/') || ($arItem["LINK"] == '/prays-list/')): //Только этим ссылкам передавать вес?>
					<li><a href="%lnk%<?=$arItem["LINK"]?>" <?if($arItem["LINK"] == '/akcii/') echo 'class="m-akcii"';?>><?=$arItem["TEXT"]?></a></li>
				<?else:?>
					<li><span class="inlink<?if($arItem["LINK"] == '/akcii/') echo ' m-akcii';?>" data-href="%lnk%<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></span></li>
				<?endif;?>
			<?endif?>
		<?endif?>
	<?endforeach?>
</ul>
<?endif?>