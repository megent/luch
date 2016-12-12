<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<h2>Наши официальные представители</h2>

<?//Создание сортировки по ID раздела?>
<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	//$сity = $arItem['IBLOCK_SECTION_ID'];
	$res = CIBlockSection::GetByID($arItem['IBLOCK_SECTION_ID']);
	if($ar_res = $res->GetNext()) $сity = $ar_res['NAME'];
	
	$arMas[$сity][$key]['NAME'] = $arItem["NAME"];
	$arMas[$сity][$key]['URL'] = $arItem['DISPLAY_PROPERTIES']['IB_P1_SITE']['VALUE'];
	$arMas[$сity][$key]['TEL'] = $arItem['DISPLAY_PROPERTIES']['IB_P2_KONT']['VALUE'];
	?>
<?endforeach;?>
<?ksort($arMas);?>
<?//echo'<pre>'; print_r($arMas); echo'</pre>';?>
<div class="part-list">
	<?foreach($arMas as $key => $arItem):?>
		<h3 class="name-city-part"><?=$key;?></h3>

		<?foreach($arItem as $Item):?>
			<div class="el-part">
				<span class="p-name"><?=$Item["NAME"]?></span>
				<span class="extlink lnk" data-href="<?=$Item['URL'];?>"><?=$arItem['URL'];?></span>
				<span><?=$Item['TEL'];?></span>
			</div>
		<?endforeach;?>
	<?endforeach;?>
</div>
