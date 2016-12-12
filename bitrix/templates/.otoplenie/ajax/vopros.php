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
			"IBLOCK_ID"     => 12,		// Инфоблок Обратный звонок
			"ACTIVE"        => "N",		// элемент не активен
			"NAME"          => $_REQUEST['name'] . ", " . ConvertTimeStamp(),
			"PREVIEW_TEXT"	=> $_REQUEST['comment'],
			"PROPERTY_VALUES"=> $PROP
			);
			$el = new CIBlockElement; //создаем элемент в инфоблоке
			
			if($PRODUCT_ID = $el->Add($arLoadProductArray)){?>
				
				<div class='saccess form-vopros-wrap'>
					<div class="form-title">Ваш вопрос отправлен!</div>
					<br>Мы оперативно обработаем его и свяжемся с вами.
				</div>
				
				<?	//формируем массив для отправки на почту
				$arEventFields = array(
					"FROM_DATE"				=> ConvertTimeStamp(),
					"NAME"					=> $_REQUEST['name'],
					"TELEPHON"				=> $_REQUEST['phone'],
					"COMMENT"				=> $_REQUEST['comment'],
				);
				CEvent::Send("ADV_VOPROS", SITE_ID, $arEventFields); //делаем отправку на почту				
			}	else echo "Ошибка записи, попробуйте повторить позже";
	break;
	}
}
?>