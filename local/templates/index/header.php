<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Asperansa\Helper\Helper;
\Bitrix\Main\Localization\Loc::loadMessages(__FILE__);
CUtil::InitJSCore(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- (c) Lazareva N. | asperansa@gmail.com -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?$APPLICATION->ShowTitle()?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />
    <?$APPLICATION->ShowHead();
    $APPLICATION->SetAdditionalCSS('http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,700,400,600&subset=latin,cyrillic');
	$APPLICATION->SetAdditionalCSS('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');
	$APPLICATION->SetAdditionalCSS(DEFAULT_TEMPLATE_PATH.'/style/common.css');
    $APPLICATION->SetAdditionalCSS(DEFAULT_TEMPLATE_PATH.'/style/slick.css');
	//$APPLICATION->SetAdditionalCSS(DEFAULT_TEMPLATE_PATH.'/fancybox/jquery.fancybox.css');
    $APPLICATION->SetAdditionalCSS(DEFAULT_TEMPLATE_PATH.'/style/style.css');?>
    <!--[if lt IE 9]>
    <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?CJSCore::Init(array("jquery"));
	if (CSite::InDir('/contacts/') || CSite::InDir(SITE_DIR.'index.php')){
        $APPLICATION->AddHeadScript("http://api-maps.yandex.ru/2.1/?lang=ru_RU");
    }
    $APPLICATION->AddHeadScript(DEFAULT_TEMPLATE_PATH."/js/slick.js");
	$APPLICATION->AddHeadScript(DEFAULT_TEMPLATE_PATH.'/js/maskedinput.js');
	$APPLICATION->AddHeadScript(DEFAULT_TEMPLATE_PATH.'/js/jquery.ui.totop.min.js');
	$APPLICATION->AddHeadScript('//code.jquery.com/ui/1.11.4/jquery-ui.js');
    $APPLICATION->AddHeadScript(DEFAULT_TEMPLATE_PATH."/js/script.js");
	//$APPLICATION->AddHeadScript(DEFAULT_TEMPLATE_PATH."/fancybox/jquery.fancybox.js");?>
</head>
<body class="<?= CSite::InDir(SITE_DIR.'index.php')? '': 'inner_page'?>">
<?$APPLICATION->ShowPanel();?>
	<div id="main">
		<header>
			<div class="header_top_pl">
				<div class="center">
					<div class="header_pl_left">
						<span><?Helper::IncludeFile('phone_trade');?></span>
						<a href="#">Обратный звонок</a>
					</div>
					<div class="header_pl_right">
						<span><?Helper::IncludeFile('phone_center');?></span>
						<a href="#">Обратный звонок</a>
					</div>
					<div class="logo">
						<?if (CSite::InDir(SITE_DIR.'index.php')): ?>
							<?Helper::IncludeFile('logo');?>
						<? else:?>
							<a href="<?=SITE_DIR?>"><?Helper::IncludeFile('logo');?></a>
						<? endif;?>						
					</div>
				</div>
			</div>
			<div class="header_nav clearfix center">
				<div class="header_nav_left">
					<div class="header_nav_head"><?Helper::IncludeFile('trade_name');?></div>
					<div class="bl_header_basket">
						<span class="bl_header_basket_count">3</span>
						<span class="bl_header_basket_price">7 800 <i class="rub">a</i></span>
					</div>
					<div class="header_nav_menu">
						<? $APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
							"ROOT_MENU_TYPE" => "top_trade",	// Тип меню для первого уровня
								"MENU_CACHE_TYPE" => "Y",	// Тип кеширования
								"MENU_CACHE_TIME" => "36000000",	// Время кеширования (сек.)
								"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
								"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
								"MAX_LEVEL" => "1",	// Уровень вложенности меню
								"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
								"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							),
							false
						); ?>
					</div>
				</div>
				<div class="header_nav_right">
					<div class="header_nav_head"><?Helper::IncludeFile('center_name');?></div>
					<div class="header_nav_menu">
						<? $APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
							"ROOT_MENU_TYPE" => "top_center",	// Тип меню для первого уровня
								"MENU_CACHE_TYPE" => "Y",	// Тип кеширования
								"MENU_CACHE_TIME" => "36000000",	// Время кеширования (сек.)
								"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
								"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
								"MAX_LEVEL" => "1",	// Уровень вложенности меню
								"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
								"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							),
							false
						); ?>
					</div>
				</div>
			</div>
		</header>
		<div id="content">
						<?/*$APPLICATION->IncludeComponent(
							"asperansa:iblock.element.add.xform", 
							"make_order", 
							array(
								"IBLOCK_TYPE" => "feedback",
								"IBLOCK_ID" => "3",
								"STATUS_NEW" => "N",
								"LIST_URL" => "",
								"USE_CAPTCHA" => "N",
								"USER_MESSAGE_EDIT" => "",
								"USER_MESSAGE_ADD" => "Ваша заявка на запись принята, спасибо. Наш менеджер свяжется с вами в ближайшее время.",
								"DEFAULT_INPUT_SIZE" => "30",
								"RESIZE_IMAGES" => "N",
								"PROPERTY_CODES" => array(
									0 => "NAME",
									1 => "PREVIEW_TEXT",
									2 => "1",
								),
								"PROPERTY_CODES_REQUIRED" => array(
									0 => "NAME",
									1 => "1",
								),
								"GROUPS" => array(
									0 => "2",
								),
								"STATUS" => "ANY",
								"ELEMENT_ASSOC" => "CREATED_BY",
								"MAX_USER_ENTRIES" => "100000",
								"MAX_LEVELS" => "100000",
								"LEVEL_LAST" => "Y",
								"MAX_FILE_SIZE" => "0",
								"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
								"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
								"RULES" => "",
								"SEF_MODE" => "N",
								"SEF_FOLDER" => "/",
								"AJAX_MODE" => "Y",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "N",
								"AJAX_OPTION_HISTORY" => "N",
								"CUSTOM_TITLE_NAME" => "Ваше имя",
								"CUSTOM_TITLE_TAGS" => "",
								"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
								"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
								"CUSTOM_TITLE_IBLOCK_SECTION" => "",
								"CUSTOM_TITLE_PREVIEW_TEXT" => "Комментарий",
								"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
								"CUSTOM_TITLE_DETAIL_TEXT" => "",
								"CUSTOM_TITLE_DETAIL_PICTURE" => "",
								"AJAX_OPTION_ADDITIONAL" => ""
							),
							false
						);*/?>
			<? /*if (!CSite::InDir(SITE_DIR.'index.php')): ?>		
						
						<h1><?$APPLICATION->ShowTitle(false);?></h1>
						<?=$APPLICATION->GetDirProperty('after_h1')?>
					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "babydent_2", array(
								"START_FROM" => "1",
								"PATH" => "",
								"SITE_ID" => "-"
							),
							false,
							Array('HIDE_ICONS' => 'Y')
						);?>
				<? if ($APPLICATION->GetDirProperty('no_article') != "Y"):?>
				<article class="page_article">
				<? endif;?>
			<? endif; */?>