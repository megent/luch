<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Цены на системы отопления в %r%, прайс-лист, онлайн заказ");
$APPLICATION->SetPageProperty("description", "У нас можно узнать цены на самые современные отопительные системы и выполнить онлайн заказ.");
$APPLICATION->SetTitle("Прайс-лист");
?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "price", Array(
	"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COMPONENT_TEMPLATE" => ".default",
		"COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
		"IBLOCK_ID" => "16",	// Инфоблок
		"IBLOCK_TYPE" => "main",	// Тип инфоблока
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_FIELDS" => array(	// Поля разделов
			0 => "",
			1 => "",
		),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"SECTION_USER_FIELDS" => array(	// Свойства разделов
			0 => "UF_LINK",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
		"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
		"VIEW_MODE" => "LINE",	// Вид списка подразделов
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>