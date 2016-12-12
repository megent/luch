<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="faq-list">

	<div class="faq-form block">
		<div class="form-title">Задать вопрос</div>
		<div class="form-desc">Мы ответим на вопрос в течение рабочего дня</div>
		<!--noindex-->
			<span class="lnk-show-form btn-bg">Задать вопрос</span>
			<span class="lnk-hide-form">Скрыть форму</span>
		<!--/noindex-->
		<span class="form-separ"></span>
		
		<form id="form-vopros" class="form-style" method="POST" onSubmit="return false;">
			<div class="field-wrapper">
				<span class="starred">*</span><span class="field-name">Представьтесь пожалуйста</span>
				<input type="text" id="cf_fio" value="" />
			</div>
			<div class="field-wrapper">
				<span class="starred">*</span><span class="field-name">Оставьте Email или телефон</span>
				<input type="text" id="cf_mail" value="" />
			</div> 
			<div class="field-cont-wrapper">
				<span class="starred">*</span><span class="field-name">Задайте вопрос специалисту</span>
				<textarea name="comments" id="cf_comm" value=""></textarea>
			</div> 
			<input type="text" id="cf_phone" value="" class="inp_inv" />
			<div class="form-wrap-check">
				<?/*<input type="checkbox" name="checkme" checked="checked" class="cf_check" />*/?>
				Я согласен на обработку персональных данных
			</div>
			<span class="form-atten">Заполните, пожалуйста, все обязательные поля</span>
			<div class="form-btn-wrap">
				<i></i><input type="submit" value="Отправить вопрос" id="btn-send" class="btn-bg"/>
			</div>
		</form>
	</div>

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
 
$i = CIBlock::GetElementCount(12);
$count = pluralTuning($i, array("%d ответ", "%d ответа", "%d ответов"));
?>

<div class="faq-old">Предыдущие вопросы и ответы</div><span class="title-count"><?=$count?></span>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="faq-block block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			
		<?endif?>
		
		<div class="faq-title">
			Вопрос:
		</div>
		
		<div class="faq-txt">
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<?=$arItem["PREVIEW_TEXT"];?>
			<?endif;?>
		</div>
		<div class="faq-autor">
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<?=$arItem["NAME"]?>
			<?endif;?>
		</div>
		
		<div class="faq-otvet">
			<span class="show-otvet">Показать ответ</span>
			<div class="faq-otvet-item">
				<?if($arItem["DETAIL_TEXT"]):?>
					<span class="otv-metka">Ответ: </span>
					<div class="faq-txt"><?=$arItem["DETAIL_TEXT"];?>
					</div>
				<?endif;?>
			</div>
			<?//<span class="hide-otvet">Скрыть ответ</span>*/?>
		</div>
	</div>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
