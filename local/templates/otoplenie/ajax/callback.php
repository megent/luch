<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if($_REQUEST['action'] && CModule::IncludeModule("iblock")){
	switch($_REQUEST['action']){
		
		//формирование формы обратного звонка
		case 'form_call':?>
			<div id="vf-call" class="vform-callback-wrap">
				<div class="vform-title">Заказ обратного звонка</div>
				<span class="vform-separ"></span>
				<span class="vform-close"></span>
				
				<form id="vform-callback" class="vform-style" method="POST" onSubmit="return false;">
					<div class="field-wrapper">
						<span class="starred">*</span><span class="field-name">Имя</span>
						<input type="text" id="vf_fio" value="" />
					</div>
					<div class="field-wrapper">
						<span class="starred">*</span><span class="field-name">Телефон</span>
						<input type="text" id="vf_tel" value="" />
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
					$('.bl-forms-wrap #vf-call').slideDown(450);
					$( "#vf_fio" ).focus();
				});
			</script>
		<?break;
		
		//Отправка почты
		case 'vbtn-send':
			$PROP = array(
				"IB_URL"	=> $_REQUEST['url'],
			);
			
			$arLoadProductArray = Array(
				"IBLOCK_ID"     	=> 4,		// Инфоблок Обратный звонок
				"ACTIVE"        	=> "N",		// элемент не активен
				"NAME"          	=> $_REQUEST['name'],
				"PREVIEW_TEXT"		=> $_REQUEST['phone'],
				"PROPERTY_VALUES"	=> $PROP
			);
			$el = new CIBlockElement; //создаем элемент в инфоблоке
			
			if($PRODUCT_ID = $el->Add($arLoadProductArray)){?>
				
				<script>
					jQuery(document).ready(function() {
						$('.vform-close').click(function(){
							$(".bl-forms").fadeOut(300);
						});
					});
				</script>
				<div class='saccess vform-callback-wrap'>
						<div class="vform-title">Спасибо!</div>
						<span class="vform-separ"></span>
						<span class="vform-close"></span>
						Ваше сообщение отправлено и в ближайшее время мы перезвоним.
				</div>
				
			<?	//формируем массив для отправки на почту
				$arEventFields = array(
					"FROM_DATE"				=> ConvertTimeStamp(),
					"NAME"					=> $_REQUEST['name'],
					"TELEPHON"				=> $_REQUEST['phone'],
					"URL"					=> $_REQUEST['url'],
				);
				CEvent::Send("ADV_CALLBACK", SITE_ID, $arEventFields); //делаем отправку на почту
							
				//Отправка уведомлений в телеграмм
				require_once('./telegram.conf.php');
				$messege = 'Запросили обратный звонок с сайта otoplenieru.ru'. "\r\n\r\n" 
						.'Имя: ' . $_REQUEST['name']. "\r\n" 
						.'Телефон: ' . $_REQUEST['phone']. "\r\n"
						.'URL адрес: ' . $_REQUEST['url'];
				TelegramBot($messege);
				
			}	else echo "Ошибка записи, попробуйте повторить позже";
	break;
	}
}
?>