<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="left-otzivi">
	<a href="/otzivi/" class="otz-title">О нас говорят:</a>
	<div class="carusel-otziv">
		<?$cont = 1; //Для того чтобы отслеживать отзывы только с контентом?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<?if ($arItem['PREVIEW_TEXT'] && ($cont < 4))://выводить не более 3х отзывов?>
				<?$cont++?>
				<div class="otz-bl cont<?=$cont?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="otz-name"><?=$arItem['NAME'];?></div>
					<div class="otz-wrap">
						<div class="otz-cont">
							<?=substr($arItem['PREVIEW_TEXT'], 0 , 200);?>
							<div class="otz-cont-hide">
								<?=substr($arItem['PREVIEW_TEXT'], 200 , 1000);?>
							</div>
							<span class="otz-show">Весь отзыв</span>
						</div>
					</div>
				</div>
			<?endif?>
		<?endforeach;?>
	</div>
	<a href="/otzivi/" class="otz-all">Написать отзыв</a>
</div>

<?/*
<div class="otz-cont">
	Остался очень доволен сотрудничеством. Заказывал ИК панели для дачи, привезли и смотировали все за 2 дня.<br>
	Теперь професиионализм команды чувствуют вся семья)))<br>
	Буду рекомендовать знакомым. Спасибо!
	<div class="otz-cont-hide">
		<br><br><br>Остался очень доволен сотрудничеством. Заказывал ИК панели для дачи, привезли и смотировали все за 2 дня.<br>
		Теперь професиионализм команды чувствуют вся семья)))<br>
		Буду рекомендовать знакомым. Спасибо!
	</div>
</div>
*/?>