<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="otziv-list">

	<!--noindex-->
	<div class="otziv-form block">
		<div class="form-desc"><i>Уважаемые клиенты, мы будем признательны за оставленные отзывы</i></div>
			<span class="lnk-show-form btn-bg">Написать отзыв</span>
			<span class="lnk-hide-form">Скрыть форму</span>
		<span class="form-separ"></span>
		
		<form id="form-otziv" class="form-style" method="POST" onSubmit="return false;">
			<div class="field-wrapper">
				<span class="starred">*</span><span class="field-name">Представьтесь пожалуйста</span>
				<input type="text" id="cf_fio" value="" />
			</div>
			<div class="field-wrapper">
				<span class="field-name">Оставьте Email или телефон</span>
				<input type="text" id="cf_mail" value="" />
			</div> 
			<div class="field-cont-wrapper">
				<span class="starred">*</span><span class="field-name">Напишите отзыв о нашей работе</span>
				<textarea name="comments" id="cf_comm" value=""></textarea>
			</div> 
			<input type="text" id="cf_phone" value="" class="inp_inv" />
			<div class="form-wrap-check">
				<?/*<input type="checkbox" name="checkme" checked="checked" class="cf_check" />*/?>
				Я согласен на обработку персональных данных
			</div>
			<span class="form-atten">Заполните, пожалуйста, все обязательные поля</span>
			<div class="form-btn-wrap">
				<i></i><input type="submit" value="Отправить отзыв" id="btn-send" class="btn-bg"/>
			</div>
		</form>
	</div>
	<!--/noindex-->

<?
/**
 * Функция для получения правильных окончаний слов
 * @param int    $iNumber       Число, к которому привязываемся
 * @param array  $aTitles       Массив слов для склонения
 * @return string
 **/
function pluralTuning($iNumber, $aTitles) {
    $cases = array(2, 0, 1, 1, 1, 2);
    return sprintf($aTitles[ ($iNumber%100>4 && $iNumber%100<20)? 2 : $cases[min($iNumber%10, 5)] ], $iNumber);
}
 
$i = CIBlock::GetElementCount(8); //Указывается инфоблок для выдергивания данных
$count = pluralTuning($i, array("%d отзыв", "%d отзыва", "%d отзывов"));
?>

<div class="otziv-old">Все отзывы</div><span class="title-count"><?=$count?></span>
	
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="otziv-block block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arItem["PREVIEW_PICTURE"]):?>
			<?
			$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>1000, 'height'=>1000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
			$img_mini = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>160, 'height'=>230), BX_RESIZE_IMAGE_EXACT, true);
			?>
			<a class="otz-scan fancy" href="<?=$img['src']?>"><img src="<?=$img_mini['src']?>"/></a>
		<?endif?>
		<div class="otziv-block-wp">
			<div class="otziv-title">
				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<?=$arItem["NAME"]?>
					
					<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
						<span class="date"> / <?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
					<?endif?>
				<?endif;?>
			</div>
			
			<div class="otziv-txt">
				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<?=$arItem["PREVIEW_TEXT"];?>
				<?endif;?>
			</div>
			
			<?if($arItem["PROPERTIES"]['IB_VIDEO']['VALUE']):?>
				<?$video = str_replace("https://youtu.be/", "https://www.youtube.com/embed/", $arItem["PROPERTIES"]['IB_VIDEO']['VALUE']);?>
				<iframe class="otz-video" width="420" height="315" src="<?=$video?>" frameborder="0" allowfullscreen></iframe>
			<?endif;?>
			
			<?if($arItem["DETAIL_TEXT"]):?>
				<div class="otziv-otvet">
					<span class="otv-metka">Ответ: </span>
					<div class="otv-txt"><?=$arItem["DETAIL_TEXT"];?></div>
				</div>
			<?endif;?>
				
			<?//Заплатка для ссылок, пока 2 раздела, потом нужно доработать?>
			<?if($arItem['IBLOCK_SECTION_ID']): //если отзыв находится в папке?>
				<?if($arItem['IBLOCK_SECTION_ID'] == 32){
					$brand = "ЗЕБРА"; 
					$url = "/otzivi/zebra/";
				}else{
					$brand = "ПЛЭН";
					$url = "/otzivi/plen/";
				}?>
				<div class="otziv-otvet">
					<span class="otv-metka"><a href="<?=$url?>">Все отзывы о системе отопления <?=$brand;?></a></span>
				</div>
			<?endif?>
		</div>
	</div>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
