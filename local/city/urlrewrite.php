<?php
//require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/charset_converter.php");
//require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/tools.php");
//include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/virtual_io.php");

global $arCity;
//берем файл
$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/local/city/cities.json',"r");
//берем его размер
$fileSize = filesize($_SERVER['DOCUMENT_ROOT'].'/local/city/cities.json');
//считываем строку, размера файла +1, т.к. у нас там json массив в одну строку
$arCitiesTest = json_decode(fgets($handle,$fileSize+1),true);
$regExp = "";
foreach($arCitiesTest as $city_key => $city){
    $regExp .= $city."|";
}
$regExp = mb_strcut($regExp,0,strlen($regExp)-1);
global $REQUEST_URI_NEW;

preg_match("/\/(".$regExp.")\//",$_SERVER["REQUEST_URI"],$arMatch);

$arCity['preg'] = $arMatch;
//$arCity['regExp'] = $regExp; //Формирование массива для исключений
$arCity['request'] = $_SERVER["REQUEST_URI"];
if(isset($arMatch[1])) {
    $REQUEST_URI_NEW = $arMatch[1];
    //if($REQUEST_URI_NEW == "/tyumen/") $REQUEST_URI_NEW = "";
    $_SERVER["REQUEST_URI"] = preg_replace("/^." . $arMatch[1] . "/", "/", $_SERVER["REQUEST_URI"],1);
    $_SERVER["REQUEST_URI"] = preg_replace('/\/\//', "/", $_SERVER["REQUEST_URI"]);

}else{
    $REQUEST_URI_NEW = "";
}
/*
$requestUri = $_SERVER["REQUEST_URI"];
$io = CBXVirtualIo::GetInstance();
if (!CHTTP::isPathTraversalUri($_SERVER["REQUEST_URI"])){
    $exit = false;

    if (($pos = strpos($requestUri, "?")) !== false) {
        $params = substr($requestUri, $pos + 1);
        parse_str($params, $vars);
        unset($vars["SEF_APPLICATION_CUR_PAGE_URL"]);

        $_GET += $vars;
        $_REQUEST += $vars;
        //$GLOBALS += $vars;
        $_SERVER["QUERY_STRING"] = $QUERY_STRING = $params;
        $requestUri = substr($requestUri, 0, $pos);
    }

    $requestUri = _normalizePath($requestUri);
    if(!strpos($requestUri,".php")) $requestUri .= "index.php";

    if (!$io->FileExists($_SERVER['DOCUMENT_ROOT'] . $requestUri))
        $exit = true;

    if (!$io->ValidatePathString($requestUri))
        $exit = true;

    $urlTmp = strtolower(ltrim($requestUri, "/\\"));
    $urlTmp = str_replace(".", "", $urlTmp);
    $bxUrlTmp = substr($urlTmp, 0, 16);
    $urlTmp = substr($urlTmp, 0, 7);

    if (($urlTmp == "upload/" || ($urlTmp == "bitrix/" && $bxUrlTmp != "bitrix/services/")))
        $exit = true;

    $ext = strtolower(GetFileExtension($requestUri));
    if ($ext != "php")
        $exit = true;

    if (strpos($requestUri,"404.php"))
        $exit = true;

    if (!$exit) {

        CHTTP::SetStatus("200 OK");

        $_SERVER["REAL_FILE_PATH"] = $requestUri;

        include_once($io->GetPhysicalName($_SERVER['DOCUMENT_ROOT'] . $requestUri));

        die();
    }
}*/