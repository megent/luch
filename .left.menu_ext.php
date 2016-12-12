<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt=$APPLICATION->IncludeComponent(
	"custom:menu.sections.elements",
	"",
	array(
	"IS_SEF" => "N",
	"ID" => "",
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "2",
	"SECTION_URL" => "",
	"DEPTH_LEVEL" => "5",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000"
	),
	false
);
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
?>