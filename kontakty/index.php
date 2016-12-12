<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Раздел с актуальной контактной информацией и интерактивной картой, а также ссылки на соц.сети");
$APPLICATION->SetPageProperty("title", "Группа компаний ЛУЧ в %r%: Контакты");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->AddHeadString('<script src="//api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU"  type="text/javascript" /></script>',true)
?>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

<div class="block contact-wrap">
	<div class="adres">
		<span class="tit"><i></i>Адрес</span>
		г.Тюмень, ул.Молодежная 8, оф.205
	</div>
	<div class="phone">
		<span class="tit"><i></i>Телефон в %r%</span>
		<a class="tel-mobil" rel="nofollow" href="tel:+73452611629">8 (3452) 611 629</a> <span href="#callback" class="lnk-callback fancy-callback open-vform-callback">Заказать звонок</span>
	</div>
	<div class="mail">
		<span class="tit"><i></i>Почта</span>
		<a href="mailto:info@otoplenieru.ru">info@otoplenieru.ru</a>
	</div>
</div>

<div class="cont-ln2">
	<div class="rejim">
		<span class="rej-tit">Режим работы:</span>
		<ul>
			<li>понедельник - пятница с 9:00 до 18:00</li>
			<li>суббота с 10:00 до 15:00</li>
		</ul>
		<span class="rej-bot">Звонки принимаются ежедневно без выходных</span>
	</div>
	
	<!-- VK Widget -->
	<div id="vk_groups"></div>
	<script type="text/javascript">
	VK.Widgets.Group("vk_groups", {mode: 0, width: "540", height: "215", color1: 'FFFFFF', color2: '2C4875', color3: 'BB517A'}, 62297678);
	</script>
</div>
<div class="cont-ln3 block">
<p><strong>Группа компаний «ЛУЧ»</strong> является единственным региональным представителем от завода изготовителя пленочных систем отопления («ПСО» г. Челябинск) в г.%i%, Тюменской области, ХМАО и ЯНАО.</p>

<p>Расширяем дилерскую сеть (<a href="%lnk%/partnerstvo/">подробности</a>)</p>
</div>

<div id="cont-map"></div>

<?//913x490?>
<script>
ymaps.ready(function () {
    var myMap = new ymaps.Map('cont-map', {
            center: [57.12840397, 65.52503244],
            zoom: 17,
			controls: ['largeMapDefaultSet']
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: 'ул.Молодежная 8, оф.205'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: '/local/templates/otoplenie/img/ico_cont_map2.png',
            // Размеры метки.
            iconImageSize: [90, 80],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-45, -75]
        });

    myMap.geoObjects.add(myPlacemark);
});
</script>
<?/*
<div class="cont-ln4 block">
<h2 class="kart-pr">Карточка компании</h2>
<p>Юридический адрес: 625000, г. Тюмень, ул. Молодежная, д.8, оф.310</p>
<p>Фактический адрес: 625000, г. Тюмень, ул. Молодежная, д.8, оф.205</p>
<p>ОГРН 1117232004075</p>
<p>ИНН 7204165250</p>
<p>КПП 720401001</p>
<p>Р/с 40702810238290000317</p>
<p>Наименование банка: филиал "Екатеринбургский" ОАО "Альфа-Банк"</p>
<p>К/с 30101810100000000964</p>
<p>БИК 046577964</p>
<p>ОКПО 90880594</p>
</div>*/?>

<?//Партнеры?>
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"partnery", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "main",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "100",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "IB_P1_SITE",
			1 => "IB_P2_KONT",
			2 => "",
			3 => "",
			4 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "partnery"
	),
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>