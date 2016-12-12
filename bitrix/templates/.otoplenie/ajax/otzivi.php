<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if($_REQUEST['action'] && CModule::IncludeModule("iblock")){

	switch($_REQUEST['action']){
		
		//Отправка почты
		case 'btn-send':
			$PROP = array(
				"IB_MAIL"	=> $_REQUEST['phone'],
			);
			
			$arLoadProductArray = Array(
			"IBLOCK_ID"     => 8,		// Инфоблок Обратный звонок
			"ACTIVE"        => "N",		// элемент не активен
			"NAME"          => $_REQUEST['name'],
			"PREVIEW_TEXT"	=> $_REQUEST['comment'],
			"ACTIVE_FROM"	=> date("d.m.Y"),
			"PROPERTY_VALUES"=> $PROP
			);
			$el = new CIBlockElement; //создаем элемент в инфоблоке
			
			if($PRODUCT_ID = $el->Add($arLoadProductArray)){?>
				
				<div class='saccess form-vopros-wrap'>
					<div class="form-title">Большое спасибо, ваш отзыв успешно отправлен!</div>
					<br>В ближайшее время он будет обработан и появится на сайте.
				</div>
				
				<?	//формируем массив для отправки на почту
				$arEventFields = array(
					"FROM_DATE"				=> ConvertTimeStamp(),
					"NAME"					=> $_REQUEST['name'],
					"TELEPHON"				=> $_REQUEST['phone'],
					"COMMENT"				=> $_REQUEST['comment'],
				);
				CEvent::Send("ADV_OTZIV", SITE_ID, $arEventFields); //делаем отправку на почту				
			}	else echo "Ошибка записи, попробуйте повторить позже";
	break;
	}
}
?>