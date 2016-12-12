<?
//Блокировка редактирования элемента для пользователя editor ID 2

// регистрируем обработчик
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "OnBeforeIBlockElementUpdateHandler");

// создаем обработчик события "OnBeforeIBlockElementUpdate"
function OnBeforeIBlockElementUpdateHandler(&$arFields)
{
	global $USER;
	if($USER->GetID() == 2) { //Если это пользователь 2
		CModule::IncludeModule('iblock');
		$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL","PROPERTY_*");
		$arFilter = Array("IBLOCK_ID"=>2);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		
		while($ob = $res->GetNextElement()){
			$arElem = $ob->GetFields();
			$arProps = $ob->GetProperties();
			
			if($arElem['ID'] == $arFields['ID'] && $arProps['IB_LOW']['VALUE_XML_ID'] == "on")
			{
				global $APPLICATION;
				$APPLICATION->throwException("Данный материал находится на СЕО продвижении, Вам нельзя его редактировать");
				return false;
			}
		}
	}
}
?>