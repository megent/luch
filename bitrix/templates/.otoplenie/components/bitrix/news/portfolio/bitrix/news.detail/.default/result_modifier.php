<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// сортировку берем из параметров компонента
$arSort = array(
        $arParams["SORT_BY1"]=>$arParams["SORT_ORDER1"],
        $arParams["SORT_BY2"]=>$arParams["SORT_ORDER2"],
    );
// выбрать нужно id элемента, его имя и ссылку
$arSelect = array(
        "ID",
        "NAME",
        "DETAIL_PICTURE",
        "DETAIL_PAGE_URL"
    );
// выбираем активные элементы из нужного инфоблока
$arFilter = array (
        "IBLOCK_ID" => $arResult["IBLOCK_ID"],
        "SECTION_ID" => $arParams["SECTION_ID"],
        "ACTIVE" => "Y",
        "CHECK_PERMISSIONS" => "Y",
    );
// выбирать будем по 1 соседу с каждой стороны от текущего
$arNavParams = array(
        "nPageSize" => 1,
        "nElementID" => $arResult["ID"],
    );
    
$arItems = Array();
$rsElement = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);
$rsElement->SetUrlTemplates($arParams["DETAIL_URL"]);
while($obElement = $rsElement->GetNextElement())
        $arItems[] = $obElement->GetFields();
// возвращается от 1го до 3х элементов в зависимости от наличия соседей, обрабатываем эту ситуацию      
if(count($arItems)==3):
    $arResult["TOLEFT"] = Array("NAME"=>$arItems[0]["NAME"], "URL"=>$arItems[0]["DETAIL_PAGE_URL"]);
    $arResult["TORIGHT"] = Array("NAME"=>$arItems[2]["NAME"], "URL"=>$arItems[2]["DETAIL_PAGE_URL"]);
elseif(count($arItems)==2):
    if($arItems[0]["ID"]!=$arResult["ID"])
        $arResult["TOLEFT"] = Array("NAME"=>$arItems[0]["NAME"], "URL"=>$arItems[0]["DETAIL_PAGE_URL"]);
    else
        $arResult["TORIGHT"] = Array("NAME"=>$arItems[1]["NAME"], "URL"=>$arItems[1]["DETAIL_PAGE_URL"]);
endif;
// в $arResult["TORIGHT"] и $arResult["TOLEFT"] лежат массивы с информацией о соседних элементах
?>

<?//global $USER; if($USER->IsAdmin()){echo'<pre>'; print_r($arResult['URL_COMPLITED']); echo'</pre>';}?>