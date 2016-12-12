<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?
	//echo '<pre>'; print_r($arResult['SECTIONS']); echo '</pre>';
	foreach ($arResult['SECTIONS'] as &$arSection):
	
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		
		//echo '<pre>'; print_r($arSection['UF_LINK']); echo '</pre>';
		
		//$arSection['ID'] - ID раздела
		//$arSection['NAME']; - Название раздела
		//$arSection['DESCRIPTION']; - Описание после таблицы цен
		//$arSection['UF_LINK']; - ID привязанного товара
		//echo '<pre>'; print_r($arResult['SECTIONS']); echo '</pre>';
		?>
		
		<?if($arSection['UF_LINK'])//Если ID есть, то получаем ссылку на него
		{
			$id_sec = $arSection['UF_LINK']; //ID Элемента привязанного товара
			
			$lnk_res = CIBlockElement::GetList(array(), array('ID'=>$id_sec), false, false, array('ID', 'NAME', 'DETAIL_PAGE_URL'));
			if ($arSec = $lnk_res->GetNext())
			{?>
				<h2 id="id<?=$arSec['ID'];?>"><a href="<?=$arSec['DETAIL_PAGE_URL'];?>"><?=$arSection['NAME'];?></a></h2>
			<?};
		} else {?>
			<h2 id="id<?=$arSection['ID'];?>"><?=$arSection['NAME'];?></h2>
		<?}?>
		
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
					$SID = $arSection['ID'];   //ID секции
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
						//$arProps['IB_CENA']['VALUE']; - Цена
						
						if($arProps['IB_LINK']['VALUE']){//Если ID есть, то получаем ссылку на него
							$id_el = $arProps['IB_LINK']['VALUE']; //ID Элемента привязанного товара
							
							$url_res = CIBlockElement::GetList(array(), array('ID'=>$id_el), false, false, array('ID', 'NAME', 'DETAIL_PAGE_URL'));
							if ($arElement = $url_res->GetNext())
							{
							   $url = '<a href="' . $arElement['DETAIL_PAGE_URL'] . '">' . $arFields['NAME'] . '</a>';
							};
						} else {
							$url = $arFields['NAME']; //Если ссылки нет, будет только название
						};?>
						
						<tr <?if($count%2) echo 'class="alt"';?>>
							<td align="left" width="65%"><?=$url;?>
							<?if($arFields['PREVIEW_TEXT']){?>
								<br>
								<?=$arFields['PREVIEW_TEXT'];}?>
							</td>
							<td width="20%"><?=$arProps['IB_EDI']['VALUE'];?></td>
							<td width="10%"><?=$arProps['IB_CENA']['VALUE'];?></td>
						</tr>
						
						<?$count++;?>
					<?endwhile;?>
				</tbody>
			</table>
		</div>
		<div class="post-text"><?=$arSection['DESCRIPTION'];?></div>
		<br>
	<?endforeach;?>
	
	<div class="convert">
		<span class="cr open-vform-raschet">Рассчитать стоимость</span>
		<span class="cz open-vform-callback">Заказать звонок</span>
		<span class="czak open-vform-zakaz">Отправить заявку</span>
		<a href="<?=$arResult['URL_PRICE']?>" target="_blank" class="b-price">Скачать прайс</a>
	</div>