<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//if(!CModule::IncludeModule("iblock")) return; ?>
<?//global $USER; if($USER->IsAdmin()){echo'<pre>'; print_r($arResult); echo'</pre>';}?>

<div class="cont-r-text">
	<div class="detx-wrap">
		<?=$arResult["DETAIL_TEXT"]?>
	</div>
	
	<?//Связка с каталогом?>
	<?if($arResult['PROPERTIES']['IB_EL']['VALUE']):?>
		<h2>Наши предложения</h2>
		<?foreach($arResult['PROPERTIES']['IB_EL']['VALUE'] as $key=>$Filds):
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
	
	%convert%
	
	<?//Связка с инструкциями?>
	<?/*if($arResult['PROPERTIES']['IB_FILES']['VALUE']):
		foreach($arResult['PROPERTIES']['IB_FILES']['VALUE'] as $key=>$Filds):
			$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL","PROPERTY_*");
			$arFilter = Array("ID"=>$Filds);
			$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
			
			while($ob = $res->GetNextElement()){ 
				$arFields = $ob->GetFields(); 
				$arProps = $ob->GetProperties();?>
				
				<p><a href="<?=CFile::GetPath($arProps['IB_FILE']['VALUE'])?>" target="_blank"><?=$arFields['NAME']?></a></p>

			<?}?>
		<?endforeach;?>
	<?endif*/?>
</div>

<?//global $USER; if($USER->IsAdmin()){echo'<pre>'; print_r($arResult); echo'</pre>';}?>