<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="robots" content="noyaca" />
	<?$APPLICATION->ShowHead()?>
	<title><?$APPLICATION->ShowTitle()?></title>
	
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
</head>
<body oncopy="return notcopy()">

<?/*//вывод только на главной
if ($GLOBALS["APPLICATION"]->GetCurPage() == "/"):
if (!CSite::InDir('/index.php')):

<?$APPLICATION->IncludeFile($APPLICATION->GetTemplatePath("include_areas/top_kontakty.php"),Array(),Array("MODE"=>"text"));?>

<div style="display:none;"><div id="callback"></div></div>
*/?>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>

<header class="header">
	<div class="header-wrap">
		<?//вывод только на главной
		if ($GLOBALS["APPLICATION"]->GetCurPage() == "/"):?>
			<img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" class="logo" alt="Группа компаний ЛУЧ Тюмень"/>
		<?else:?>
			<a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" class="logo" alt="Группа компаний ЛУЧ Тюмень"/></a>
		<?endif?>
		
		<?//вывод только на главной
		/*if ($GLOBALS["APPLICATION"]->GetCurPage() == "/"):?>
			<h1 id="main-h1">Системы отопления в Тюмени</h1>
			<div class="head-desc">Инфракрасные технологии, теплый пол, системы обогрева</div>
		<?else:*/?>
			<!--noindex-->
				<div class="top-h1">Системы отопления в Тюмени</div>
				<div class="head-desc">Инфракрасные технологии, теплый пол, системы обогрева</div>
			<!--/noindex-->
		<?//endif?>
		<!--noindex-->
		<div class="head-kont">
			<div>Телефон в Тюмени:</div>
			<div>+7 (3452) <span>611 629</span></div>
		</div>
		<div class="head-kont2">
			<a href="mailto:info@otoplenieru.ru" class="lnk-email">info@otoplenieru.ru</a>
			<span class="lnk-callback open-vform-callback">Заказать звонок</span>
		</div>
		<div class="head-line"></div>
		<!--/noindex-->
		<nav id="top-menu">
			<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_menu", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		)
	),
	false
);?>
		</nav>
		<!--noindex--><div class="all-year"><i class="snezh"></i>Монтаж<br> круглый год</div><!--/noindex-->
	</div>   
</header><!-- .header-->

<div class="wrapper">


	<div class="middle">

		<div class="container">
			<main id="content">
			<?if ($GLOBALS["APPLICATION"]->GetCurPage() != "/"):?>
				<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", Array(
					"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
						"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
						"SITE_ID" => "-",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
					),
					false
				);?>
				
				<?//вывод только на странице ИК обогреватели
				if ($GLOBALS["APPLICATION"]->GetCurPage() == "/ik-obogrevateli/"):?>
					<h1>Инфракрасные обогреватели в Тюмени</h1>
				<?else:?>
					<h1><?$APPLICATION->ShowTitle(false)?></h1>
				<?endif?>
			<?endif?>

