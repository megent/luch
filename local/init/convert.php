<?
//Добавление конверсионного блока в конец страниц %convert%
AddEventHandler("main", "OnEndBufferContent", "ChangeConvert");
function ChangeConvert(&$content)
{
	global $APPLICATION;
	if(preg_match("/\/bitrix\/admin\//",$APPLICATION->GetCurPage()) == 0) {
		//Конверсионный блок %convert%
		$convert = "
			<div class=\"convert\">
				<span class=\"cr open-vform-raschet\">Рассчитать стоимость</span>
				<span class=\"cz open-vform-callback\">Заказать звонок</span>
				<span class=\"czak open-vform-zakaz\">Отправить заявку</span>
			</div>";
		$given = array('%convert%');
		$replace = array($convert);
		$content = str_replace($given, $replace, $content);
		
		//Заплатка для ссылок на отзывы
		$given = array('/zebra/otzyvy-o-zebre/', '/plen/otzyvy-plen/');
		$replace = array('/otzivi/zebra/', '/otzivi/plen/');
		$content = str_replace($given, $replace, $content);
	}
}
?>