<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
global $IB_CITY;
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>$IB_CITY, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
$count = 0;
while($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();

	$arResult['SECTIONS'][$count]['NAME'] = $arFields['NAME'];
	$arResult['SECTIONS'][$count]['CODE'] = $arFields['CODE'];
	$count++;
}?>

<?//Список разбитый по алфавиту
	$numberColumn = intval(20 / 3);
	$curentLetter = "";
	$semafor = 0;
	$colum = 1;
	global $arNOCITY;
	asort($arResult['SECTIONS']);
	
	foreach ($arResult['SECTIONS'] as $arSection):
		$tempLetter = substr($arSection['NAME'], 0, 1);
		if($curentLetter == "" || $curentLetter != $tempLetter)
		{
			if($semafor >= $numberColumn){$semafor = 0; echo '</div>';}
			if($semafor == 0) {echo '<div class="column mgr' . $colum . '">'; $colum++;}
			$curentLetter = $tempLetter;
			echo '<span class="big-string">'.$curentLetter.'</span>';
		}
			
			if($arSection['CODE'] == $_SESSION['code']){?>
				<li><span class="city-selected"><?=$arSection['NAME'];?></span></li>
			<?} else {
				$code = $arSection['CODE'] == 'tyumen' ? "" : "/" . $arSection['CODE'];
				
				//Коррекция адреса для ссылок в разделах исключений
				if(strstr($GLOBALS["APPLICATION"]->GetCurPage(),'/stati/')) {
					$url = '/';
				} elseif(strstr($GLOBALS["APPLICATION"]->GetCurPage(),'/nashi-raboty/')) {
					$url = '/';
				} elseif(in_array($GLOBALS["APPLICATION"]->GetCurPage(),$arNOCITY)) {
					$url = '/';
				} else {
					$url = $GLOBALS["APPLICATION"]->GetCurPage();
				}
				?>
				<li><a href="<?=$code?><?=$url?>"><?=$arSection['NAME'];?></a></li>
		<?}
		$semafor ++;
	endforeach;
?>