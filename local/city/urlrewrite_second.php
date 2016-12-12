<?php
//var_dump(!CHTTP::isPathTraversalUri($_SERVER["REQUEST_URI"]));
//die();
if (!CHTTP::isPathTraversalUri($_SERVER["REQUEST_URI"]))
{
    foreach($arUrlRewrite as $val)
    {
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
    }
}