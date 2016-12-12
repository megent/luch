<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?//echo '<pre>'; print_r($arResult); echo '</pre>';?>
<div class="files-list">

	<div class="left-files">
		<span class="left-title">Бланки-заявки</span>
		<div class="files-wrap block">
		
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			
			if($arItem['PROPERTIES']['IB_TIPE']['VALUE_XML_ID'] != 'blank') continue; //Блок Бланки-заявки
			
			$file_pach = CFile::GetPath($arItem['PROPERTIES']['IB_FILE']['VALUE']); //Получение пути до файла
			//для значка расширения файла
			if((strstr($file_pach, '.doc')) || (strstr($file_pach, '.docx'))) $ras = 'doc';
			if((strstr($file_pach, '.xls')) || strstr($file_pach, '.xlsx')) $ras = 'xls';
			if(strstr($file_pach, '.pdf')) $ras = 'pdf';?>
			
			<a class="<?=$ras?>" href="<?=$file_pach?>" target="_blank" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><span><?=$arItem['NAME']?></span></a>
			
		<?endforeach;?>
		</div>
	</div>
	
	<div class="left-files">
		<span class="left-title">Инструкции</span>
		<div class="files-wrap block">
		
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			
			if($arItem['PROPERTIES']['IB_TIPE']['VALUE_XML_ID'] != 'manual') continue; //Блок Инструкции
			
			$file_pach = CFile::GetPath($arItem['PROPERTIES']['IB_FILE']['VALUE']); //Получение пути до файла
			//для значка расширения файла
			if((strstr($file_pach, '.doc')) || (strstr($file_pach, '.docx'))) $ras = 'doc';
			if((strstr($file_pach, '.xls')) || strstr($file_pach, '.xlsx')) $ras = 'xls';
			if(strstr($file_pach, '.pdf')) $ras = 'pdf';?>
			
			<a class="<?=$ras?>" href="<?=$file_pach?>" target="_blank" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><span><?=$arItem['NAME']?></span></a>
		<?endforeach;?>
		</div>
	</div>
	
	<div class="left-files">
		<span class="left-title">Другие файлы</span>
		<div class="files-wrap block">
		
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			
			if($arItem['PROPERTIES']['IB_TIPE']['VALUE_XML_ID'] != 'other') continue; //Блок Другие файлы
			
			$file_pach = CFile::GetPath($arItem['PROPERTIES']['IB_FILE']['VALUE']); //Получение пути до файла
			//для значка расширения файла
			if((strstr($file_pach, '.doc')) || (strstr($file_pach, '.docx'))) $ras = 'doc';
			if((strstr($file_pach, '.xls')) || strstr($file_pach, '.xlsx')) $ras = 'xls';
			if(strstr($file_pach, '.pdf')) $ras = 'pdf';?>
			
			<a class="<?=$ras?>" href="<?=$file_pach?>" target="_blank" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><span><?=$arItem['NAME']?></span></a>
		<?endforeach;?>
		</div>
	</div>
</div>
