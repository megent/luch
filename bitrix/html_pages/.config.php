<?
$arHTMLPagesOptions = array(
	"INCLUDE_MASK" => "*.php;*/",
	"EXCLUDE_MASK" => "/bitrix/*;/404.php",
	"FILE_QUOTA" => "100",
	"COMPOSITE" => "N",
	"BANNER_BGCOLOR" => "#E94524",
	"BANNER_STYLE" => "white",
	"STORAGE" => "files",
	"ONLY_PARAMETERS" => "referrer1;r1;referrer2;r2;referrer3;r3;utm_source;utm_medium;utm_campaign;utm_content;fb_action_ids",
	"WRITE_STATISTIC" => "Y",
	"ALLOW_HTTPS" => "",
	"~INCLUDE_MASK" => array(
		0 => "'^.*?\\.php\$'",
		1 => "'^.*?/\$'",
	),
	"~EXCLUDE_MASK" => array(
		0 => "'^/bitrix/.*?\$'",
		1 => "'^/404\\.php\$'",
	),
	"~FILE_QUOTA" => "104857600",
	"INDEX_ONLY" => "",
	"~GET" => array(
		0 => "referrer1",
		1 => "r1",
		2 => "referrer2",
		3 => "r2",
		4 => "referrer3",
		5 => "r3",
		6 => "utm_source",
		7 => "utm_medium",
		8 => "utm_campaign",
		9 => "utm_content",
		10 => "fb_action_ids",
	),
	"COMPRESS" => "1",
	"STORE_PASSWORD" => "Y",
	"COOKIE_LOGIN" => "BITRIX_SM_LOGIN",
	"COOKIE_PASS" => "BITRIX_SM_UIDH",
	"COOKIE_NCC" => "BITRIX_SM_NCC",
	"COOKIE_CC" => "BITRIX_SM_CC",
	"COOKIE_PK" => "BITRIX_SM_PK",
	"IGNORED_PARAMETERS" => "utm_source; utm_medium; utm_campaign; utm_content; fb_action_ids; utm_term; yclid; gclid; _openstat; from; referrer1; r1; referrer2; r2; referrer3; r3; ",
	"EXCLUDE_PARAMS" => "ncc; ",
	"~IGNORED_PARAMETERS" => array(
		0 => "utm_source",
		1 => "utm_medium",
		2 => "utm_campaign",
		3 => "utm_content",
		4 => "fb_action_ids",
		5 => "utm_term",
		6 => "yclid",
		7 => "gclid",
		8 => "_openstat",
		9 => "from",
		10 => "referrer1",
		11 => "r1",
		12 => "referrer2",
		13 => "r2",
		14 => "referrer3",
		15 => "r3",
	),
	"~EXCLUDE_PARAMS" => array(
		0 => "ncc",
	),
	"NO_PARAMETERS" => "N",
	"GROUPS" => array(
	),
	"DOMAINS" => array(
		"otoplenieru.ru" => "otoplenieru.ru",
	),
	"AUTO_UPDATE" => "Y",
	"AUTO_UPDATE_TTL" => "0",
	"FRAME_MODE" => "N",
	"FRAME_TYPE" => "DYNAMIC_WITH_STUB",
	"AUTO_COMPOSITE" => "N",
);
?>