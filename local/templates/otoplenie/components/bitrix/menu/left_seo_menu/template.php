<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?/*
<ul id="left-menu1" class="accordion">
	<li><i class="ico-arr"></i><span>Зебра</span>
		<ul>
			<li><a href="#">Описание технологии</a></li>
			<li><a href="#">Прайс-лист</a></li>
		</ul>
	</li>
	<li class="hover"><i class="ico-arr"></i><span>Плэн</span></a>
		<ul>
			<li><a href="#">Описание технологии</a></li>
			<li><a href="#">Прайс-лист</a></li>
		</ul>
	</li>
	<li><a href="index.html">XL-Pipe</a></li>
	<li><a href="#">Плинтусное отопление</a></li>
	<li><a href="#">ИК панели</a></li>
	<li><a href="#">Обогреватели</a></li>
	<li><a href="#">Электромонтаж</a></li>
	<li><a href="#">Дополнительное оборудование</a></li>
	<li><a href="#">Информация</a></li>
</ul>*/?>

<ul id="left-menu1" class="accordion">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li<?if ($arItem["SELECTED"]):?> class="selected"<?endif?>><i class="ico-arr"></i><a class="noclick" href="%lnk%<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				<ul class="root-item<?if ($arItem["SELECTED"]):?> active<?endif?>">
		<?else:?>
			<li><a href="%lnk%<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="%lnk%<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><span><?=$arItem["TEXT"]?></span></a></li>
			<?else:?>
				<li><a href="%lnk%<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><span><?=$arItem["TEXT"]?></span></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="%lnk%/" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><span><?=$arItem["TEXT"]?></span></a></li>
			<?else:?>
				<li><a href="%lnk%/" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><span><?=$arItem["TEXT"]?></span></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>