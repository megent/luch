			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="left-sidebar">
			<nav id="left-menu">
				<div class="left-title1">Наши предложения</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"left_menu", 
						array(
							"ROOT_MENU_TYPE" => "left",
							"MAX_LEVEL" => "4",
							"CHILD_MENU_TYPE" => "left_lvl2",
							"USE_EXT" => "Y",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N",
							"MENU_CACHE_TYPE" => "N",
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MENU_THEME" => "site"
						),
						false
					);?>
				
				<div class="left-title2">Дополнительно:</div>
				<?$APPLICATION->IncludeComponent("bitrix:menu", "left_dop_menu", Array(
					"ROOT_MENU_TYPE" => "left_lvl2",	// Тип меню для первого уровня
						"MAX_LEVEL" => "1",	// Уровень вложенности меню
						"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
						"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N",	// Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
						"MENU_CACHE_TYPE" => "N",	// Тип кеширования
						"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
						"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
						"MENU_THEME" => "site"
					),
					false
				);?>
				<?/*<ul id="left-menu2">
					<li><a href="#">Вакансии</a></li>
					<li><a href="#">Партнеры</a></li>
				</ul>*/?>
			</nav>
			<div class="left-raschet parallax fancy-raschet open-vform-raschet" data-ibg-bg="<?=SITE_TEMPLATE_PATH?>/img/left_raschet.png">
				<span class="left-raschet-title">Хотите расчитать стоимость отопления вашего дома?</span>
				<span class="btn-bg fancy-raschet">Получить расчет</span>
			</div>
			
			<?//Левый блок Инструкций?>
			<?if ($GLOBALS["APPLICATION"]->GetCurPage() == "/"):?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list", 
				"left_files", 
				array(
					"DISPLAY_DATE" => "Y",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"AJAX_MODE" => "N",
					"IBLOCK_TYPE" => "-",
					"IBLOCK_ID" => "13",
					"NEWS_COUNT" => "4",
					"SORT_BY1" => "SORT",
					"SORT_ORDER1" => "ASC",
					"SORT_BY2" => "SORT",
					"SORT_ORDER2" => "ASC",
					"FILTER_NAME" => "",
					"FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"PROPERTY_CODE" => array(
						0 => "",
						1 => "IB_FILE",
						2 => "",
					),
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"SET_TITLE" => "N",
					"SET_BROWSER_TITLE" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_STATUS_404" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"INCLUDE_SUBSECTIONS" => "N",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_NOTES" => "",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"PAGER_TEMPLATE" => ".default",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => "Новости",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"COMPONENT_TEMPLATE" => "left_files",
					"SET_LAST_MODIFIED" => "N",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"SHOW_404" => "N",
					"MESSAGE_404" => ""
				),
				false
			);?>
			<?endif?>

			<?//global $USER?>
			<?//if($USER->GetID() == 1 || $USER->GetID() == 2):?>
				<?//Левый блок СЕО меню?>
				<nav id="ls_menu">
					<span class="left-title">Дополнительно</span>
					<div class="ls_menu-wrap">
						<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"left_seo_menu", 
						array(
							"ROOT_MENU_TYPE" => "left_seo",
							"MAX_LEVEL" => "4",
							"CHILD_MENU_TYPE" => "left_seo_lvl2",
							"USE_EXT" => "Y",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N",
							"MENU_CACHE_TYPE" => "N",
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MENU_THEME" => "site",
							"COMPONENT_TEMPLATE" => "left_seo_menu"
						),
						false
					);?>
					</div>
				</nav>
			<?//endif;?>
			<?//Левый блок отзывов?>
			<?if ($GLOBALS["APPLICATION"]->GetCurPage() != "/otzivi/"):
				$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"left_otzivi", 
	array(
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "-",
		"IBLOCK_ID" => "8",
		"NEWS_COUNT" => "100",
		"SORT_BY1" => "RAND",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "RAND",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "left_otzivi",
		"SET_LAST_MODIFIED" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);
			endif;
			?>
		</aside><!-- .left-sidebar -->

	</div><!-- .middle-->

</div><!-- .wrapper -->

<ul id="city-list">
	<span class="h2">Выберите ваш город</span>
	<?$APPLICATION->IncludeFile($APPLICATION->GetTemplatePath("include_areas/city_list.php"),Array(),Array("MODE"=>"text"));?>
	<span class="close"></span>
</ul>

<!--noindex-->
<footer class="footer">
	 <div class="footer-wrap">
		<img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" class="footer-logo" />
		<div class="foot-kont">
			<div class="foot-tel">
				<?/*<a class="tel-mobil-foo" rel="nofollow" href="tel:+73452611629">+7 (3452) <span>611 629</span></a>*/?>
				+7 (3452) <span>611 629</span>
			</div>
			<div class="foot-adress">г.Тюмень, ул.Молодежная д.8, оф. 205 ( <a href="%lnk%/kontakty/#cont-map">схема</a> )</div>
		</div>
		<div class="foot-cop">© 2013—<?=date("Y");?>, OOO «ОтоплениеРу». Сайт ни при каких условиях не является публичной офертой</div>
		 <div class="foot-wrap-get-form">
			 <span class="lnk-foot-raschet open-vform-raschet">Заявка на расчет</span>
			 <span class="lnk-foot-callback open-vform-callback">Заказать звонок</span>
			 <span data-href="/vopros-otvet/" class="lnk-vopros inlink">Задать вопрос</span>
		 </div>
		 <span class="extlink" data-href="http://gtsites.ru/"><img src="<?=SITE_TEMPLATE_PATH?>/img/gtsites.png" class="gt-sites" /></span>
	</div>
</footer><!--/noindex--><!-- .footer -->

<?//Контейнер для вывода форм?>
<div class="bl-forms"><div class="bl-forms-wrap"></div></div>

<?/*Блок с подключением скриптов и таблиц стилей CSS*/?>
	<?//<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.1.12.4.min.js');?>

	<!-- Фансибокс -->
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.js');?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/js/fancybox/jquery.fancybox.css");?>
	
	<?if ($GLOBALS["APPLICATION"]->GetCurPage() == "/"):?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.interactive_bg.js'); //только для главной?>
	<?endif?>
	<!-- Карусель - Слайдер -->
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/js/slick/slick.css");?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/js/slick/slick-theme.css");?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/slick/slick.min.js');?>

	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/custom.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/forms.js');?>
	
	<?$APPLICATION->IncludeFile($APPLICATION->GetTemplatePath("include_areas/counters.php"),Array(),Array("MODE"=>"text"));?>
</body>
</html>