<?
//*** Работа с городами (храним всю инфу в сесии)
// ID Инфоблока городов
session_start(); //Инициализация сессии
global $IB_CITY;
$IB_CITY = 17; //Нужно вписать свой ID инфоблока с городами

// ID первого города
global $ID_CITY;
$ID_CITY = 737; //Нужно вписать свой ID элемента первого добавленного города

//Символьный код основного города
global $CITY_MAIN;
$CITY_MAIN = "tyumen"; //Нужно добавить свой символьный код основного города, не может быть пустой

global $REQUEST_URI_NEW; //код города из URL, без Тюмени
global $arCity; //Получение данных из urlrewrite
$city = $REQUEST_URI_NEW == "" ? $CITY_MAIN : $REQUEST_URI_NEW; //Для поиска города в ИБ по коду
$REQUEST_URI = $_SERVER['REQUEST_URI']; //Получение URL адреса без города

//Массив разделов исключений (общих разделов для всех городов)
global $arNOCITY;
$arNOCITY = Array(
	'/stati/',
	'/nashi-raboty/',
	'/vopros-otvet/',
	'/video/',
	'/files/');

//*** Инициализация функции сбора данных города
if(empty($_SESSION['code'])) { //Если город не был иниициирован
	directory($city);
	echo ' '; //Заплатка, странно, но без неё не хочет работать
} elseif($_SESSION['code'] != $city) { //Если город изменился
	foreach($arNOCITY as $el): //Перебираем массив исключений
		if(preg_match($el, $REQUEST_URI)) {
			$sim_city = 1; //Отловили раздел исключения
		}	
	endforeach;
	if($sim_city != 1) {
		directory($city);
	}//Если переманная пустая, инициируем функцию получения данных города
}

//*** Проверка URL, чтобы в нем не было города для общих разделов (разделов исключений)
if($arCity['preg'][0]){ //Если для разделов исключений в URL встречается город, редиректить на без него 
	foreach($arNOCITY as $elRed):
		if(strstr($REQUEST_URI,$elRed)) LocalRedirect($REQUEST_URI,false,'301 Found'); //проверка на вложенные страницы раздела исключений
	endforeach;
}

//*** функция сбора и определения города
function directory($city){
	CModule::IncludeModule("iblock");
	session_start(); //Инициализация сессии
	global $REQUEST_URI_NEW;
	global $IB_CITY;
	
	$name_gorod = $city;
	//собираем список городов
	$arSelect = Array("ID", "NAME", "CODE", 'PROPERTY_CITY_PP', 'PROPERTY_CITY_RP');
	$arFilter = Array("IBLOCK_ID" => $IB_CITY, "CODE" => $name_gorod);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		if($name_gorod == $arFields['CODE']):
			$_SESSION['imenit'] = $arFields['NAME'];
			$_SESSION['predlog'] = $arFields['PROPERTY_CITY_RP_VALUE'];
			$_SESSION['rodit'] = $arFields['PROPERTY_CITY_PP_VALUE'];
			$_SESSION['code'] = $arFields['CODE'];
			$_SESSION['lnk'] = $REQUEST_URI_NEW == "" ? "" : '/'.$REQUEST_URI_NEW;
		endif;
	}
}

//*** Подмена меток для городов во всем контенте
AddEventHandler("main", "OnEndBufferContent", "ChangeCity");
function ChangeCity(&$content)
{
	global $APPLICATION;
	if(preg_match("/\/bitrix\/admin\//",$APPLICATION->GetCurPage()) == 0) {
		$given = array(
			'http://otoplenieru.ru/',
			'/dop/termoregulyatory/',
			'%i%',
			'%p%',
			'%r%',
			'%lnk%/stati/',
			'%lnk%/nashi-raboty/',
			'%lnk%/vopros-otvet/',
			'%lnk%/video/',
			'%lnk%/files/',
			'%lnk%',
			'611 629',
			'611-629');
		$replace = array(
			'/',
			'/termoregulyatory/',
			$_SESSION['imenit'],
			$_SESSION['predlog'],
			$_SESSION['rodit'],
			'/stati/',
			'/nashi-raboty/',
			'/vopros-otvet/',
			'/video/',
			'/files/',
			$_SESSION['lnk'],
			'<span class="lptracker_phone">611 629</span>',
			'<span class="lptracker_phone">611 629</span>');
		$content = str_replace($given, $replace, $content);
		
		//Авто подмена для всех ссылок на сайте
		/*global $arCity;
		//$arCity['regExp'] - список городов из json массива
		
		$content = preg_replace('/<a(.+?)\bhref="(\/{1}(?!b|tyumen'.$arCity['regExp'].'\b|javascript|upload|mailto|tel|images|img\B))((?!\/){1,}.+?)"(.+?)<\/a>/s','<a$1href="/'.$_SESSION['lnk'].'/$3"$4</a>',$content);
		
		$content = preg_replace('/<a(.+?)href="\/{2}(.+?)"(.+?)<\/a>/s','<a$1href="/$2"$3</a>',$content);
		$content = preg_replace('/<a(.+?)href="\/tyumen\/(.+?)"(.+?)<\/a>/s','<a$1href="/$2"$3</a>',$content);*/
	}
}

//*** Автоформирование файла city.json, при добавлении новых городов
// События которые срабатывают при создании, удалении или изменении элемента инфоблока
AddEventHandler("iblock", "OnAfterIBlockElementAdd", "city_json");
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", "city_json");
AddEventHandler("iblock", "OnAfterIBlockElementDelete", "city_json");

function city_json(&$arFields)
{
	global $ID_CITY; //ID элемента первого города
	global $CITY_MAIN; //Символьный код основного города
	if($arFields['ID'] >= $ID_CITY) { //Города начинаются с ID $ID_CITY и выше. чтобы не для всех элементов срабатывал обработчик для снижения нагрузки
		//Собираем данные городов
		CModule::IncludeModule("iblock");
		global $IB_CITY;
		
		$arSelect = Array("ID", "NAME", "CODE");
		$arFilter = Array("IBLOCK_ID"=>$IB_CITY,"ACTIVE"=>"Y"); //Инфоблок с городами
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement()){
			$arElem = $ob->GetFields();
			if($arElem['CODE'] == $CITY_MAIN) $arElem['CODE'] = ''; //Если найден символьный код основного города, то пишем пустую строку
			$city_php[$arElem['ID']] = $arElem['CODE'];
		}

		// Преобразовываем php-массив в строку в формате JSON 
		$city_json = json_encode($city_php);
		
		//Записываем данные в файл
		$file_cities_json = fopen($_SERVER['DOCUMENT_ROOT']."/local/city/cities.json", "w"); //Открываем файл
		$error = fwrite($file_cities_json, $city_json); //Записываем в файл
		fclose($file_cities_json); //Закрываем файл
		
		if (!$error) //Выводим ошибку если записать не удалось
			{
				global $APPLICATION;
				$APPLICATION->throwException("Не удалось обновить файл cities.json");
				return false;
			}
	}
}
?>