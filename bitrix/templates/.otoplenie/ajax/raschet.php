<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if($_REQUEST['action'] && CModule::IncludeModule("iblock")){

	switch($_REQUEST['action']){
		
		//формирование формы Заказать расчет
		case 'form_raschet':?>
			<div id="vf-ras" class="vform-raschet-wrap">
				<div class="vform-title">Заказать расчет</div>
				<span class="vform-separ"></span>
				<span class="vform-close"></span>
				
				<form id="vform-raschet" class="vform-style" method="POST" onSubmit="return false;">
					<div class="vf-left-bl">
						<div class="field-wrapper">
							<span class="starred">*</span><span class="field-name">Имя</span>
							<input type="text" id="vf_fio" value="" />
						</div>
						<div class="field-wrapper">
							<span class="starred">*</span><span class="field-name">Телефон</span>
							<input type="text" id="vf_tel" value="" />
						</div> 
						<div class="field-wrapper">
							<span class="starred">*</span><span class="field-name">Кол-во помещений</span>
							<input type="text" id="vf_kol" value="" />
						</div> 
						<div class="field-wrapper">
							<span class="starred">*</span><span class="field-name">Отапливаемая площадь</span>
							<input type="text" id="vf_plosh" value="" />
						</div>
					</div>
					<div class="field-wrapper-comment">
						<span class="field-name">Комментарий</span>
						<textarea name="comments" id="vf_comment" value=""></textarea>
					</div>
					<input type="text" id="cf_phone" value="" class="inp_inv" />
					<span class="form-atten">Вы не заполнили обязательные поля</span>
					<div class="form-btn-wrap">
						<input type="submit" value="Отправить" id="vbtn-send" class="btn-bg"/>
					</div>
				</form>
			</div>
			<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.maskedinput.min.js" type="text/javascript" ></script>
			<script>
				jQuery(document).ready(function() {
					$('.vform-close').click(function(){
						$(".bl-forms").fadeOut(300);
					});
					$("#vf_tel").mask("+7 (999) 999-9999");
					$('.bl-forms-wrap #vf-ras').slideDown(450);
					$( "#vf_fio" ).focus();
				});
			</script>
		<?break;
		
		//Отправка почты
		case 'vbtn-send':
			$PROP = array(
				"IB_TELEPHON"	=> $_REQUEST['phone'],
				"IB_KOL"		=> $_REQUEST['kol'],
				"IB_PLOSH"		=> $_REQUEST['plosh'],
				"IB_URL"		=> $_REQUEST['url'],
			);
	
			$arLoadProductArray = Array(
			"IBLOCK_ID"     	=> 6,		// Инфоблок Заказать расчет
			"ACTIVE"        	=> "N",		// элемент не активен
			"NAME"          	=> $_REQUEST['name'],
			"PREVIEW_TEXT"		=> $_REQUEST['comment'],
			"PROPERTY_VALUES"	=> $PROP
			);
			$el = new CIBlockElement; //создаем элемент в инфоблоке
			
			if($PRODUCT_ID = $el->Add($arLoadProductArray)){?>
				
				<script>
					jQuery(document).ready(function() {
						$('.vform-close').click(function(){
							$(".bl-forms").hide(300);
						});
					});
				</script>
				<div class='saccess vform-callback-wrap'>
						<div class="vform-title">Спасибо!</div>
						<span class="vform-separ"></span>
						<span class="vform-close"></span>
						Ваше сообщение отправлено! В ближайшее время мы выполним расчет и перезвоним.
				</div>
				
			<?	//формируем массив для отправки на почту
				$arEventFields = array(
					"FROM_DATE"				=> ConvertTimeStamp(),
					"NAME"					=> $_REQUEST['name'],
					"TELEPHON"				=> $_REQUEST['phone'],
					"KOL"					=> $_REQUEST['kol'],
					"PLOSH"					=> $_REQUEST['plosh'],
					"COMMENT"				=> $_REQUEST['comment'],
					"URL"					=> $_REQUEST['url'],
				);
				CEvent::Send("ADV_RASCHET", SITE_ID, $arEventFields); //делаем отправку на почту				
			}	else echo "Ошибка записи, попробуйте повторить позже";
	break;
	}
}
?>