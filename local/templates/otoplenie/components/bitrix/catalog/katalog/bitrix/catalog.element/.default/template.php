<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//global $USER; if($USER->IsAdmin()){echo'<pre>'; print_r($arResult); echo'</pre>';}?>

<div class="cont-r-text">
	<?//Связка с статьями?>
	<?if($arResult['PROPERTIES']['IB_STATI']['VALUE']):
		foreach($arResult['PROPERTIES']['IB_STATI']['VALUE'] as $key=>$Filds):
			
			
				$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_PAGE_URL","PROPERTY_*");
				$arFilter = Array("ID"=>$Filds);
				$mas = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
				
				while($ob = $mas->GetNextElement()):
					$arFields = $ob->GetFields();
					$arProps = $ob->GetProperties();
					
					if($arProps['IB_LNK_CAT']['VALUE']) {
						$lnk = $arProps['IB_LNK_CAT']['VALUE'];
					} else {
						$lnk = $arFields['DETAIL_PAGE_URL'];
					}?>
					
					<div class="stati-item block">
						<?if($arFields['PREVIEW_PICTURE']):?>
							<?$img = CFile::ResizeImageGet($arFields['PREVIEW_PICTURE'], array('width'=>192, 'height'=>144), BX_RESIZE_IMAGE_EXACT, true);?>
							<a href="%lnk%<?=$lnk?>"><img src="<?=$img['src']?>" /></a>
						<?endif?>
						<div class="block-title">
							<a href="%lnk%<?=$lnk?>"><?=$arFields['NAME'];?></a>
						</div>
						<?=$arFields['PREVIEW_TEXT']?>
					</div>
					
				<?endwhile?>


		<?endforeach;?>
	<?endif?>
	
	<?//Связка с инструкциями?>
	<?if($arResult['PROPERTIES']['IB_FILES']['VALUE']):
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
	<?endif?>
	
	<div class="detx-wrap">
		<?=$arResult["DETAIL_TEXT"]?>
		
		<?//Формирование массива с ценами?>
		<?if($arResult['PROPERTIES']['IB_PRICE']['VALUE']):?>
		<div class="table-wrap">
			<table>
				<thead>
					<tr>
						<th>Название</th>
						<th>Ед.измерения</th>
						<th>Цена</th>
					</tr>
				</thead>
				<tbody align="center">
					<?
					$BID = 16;   //ID инфоблока
					$SID = $arResult['PROPERTIES']['IB_PRICE']['VALUE'];   //ID секции
					$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "PROPERTY_*");
					$arFilter = Array("IBLOCK_ID"=>IntVal($BID), "ACTIVE"=>"Y","SECTION_ID"=>$SID);
					$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
					
					$count = 1;
					while($ob = $res->GetNextElement()):
						$arFields = $ob->GetFields();
						$arProps = $ob->GetProperties();
						
						//echo '<pre>'; print_r($arFields); echo '</pre>';
						//$arFields['NAME']; - Название товара для таблицы цен
						//$arProps['IB_EDI']['VALUE']; - Единицы измерения
						//$arProps['IB_CENA']['VALUE']; - Цена?>
										
						<tr <?if($count%2) echo 'class="alt"';?>>
							<td align="left" width="60%"><?=$arFields['NAME'];?>
							<?if($arFields['PREVIEW_TEXT']){?>
								<br>
								<?=$arFields['PREVIEW_TEXT'];}?>
							</td>
							<td><?=$arProps['IB_EDI']['VALUE'];?></td>
							<td><?=$arProps['IB_CENA']['VALUE'];?></td>
						</tr>
						
						<?$count++;?>
					<?endwhile;?>
				</tbody>
			</table>
		</div>
		<?endif?>
	
		%convert%
	</div>
</div>

<?//global $USER; if($USER->IsAdmin()){echo'<pre>'; print_r($arResult); echo'</pre>';}?>