<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf8">
	<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowHead();
	use Bitrix\Main\Page\Asset;
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/template_style.css");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-1.8.2.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/functions.js");
?>

</head>
<body>
<?$APPLICATION->ShowPanel();?>
	<div class="wrap">
		<div class="hd_header_area">
			<div class="hd_header">
				<table>
					<tr>
						<td rowspan="2" class="hd_companyname">
							<h1><a href="">Мебельный магазин</a></h1>
						</td>
						<td rowspan="2" class="hd_txarea">
							<span class="tel">8 (495) 212-85-06</span>	<br/>	
							время работы <span class="workhours">ежедневно с 9-00 до 18-00</span>						
						</td>
						<td style="width:232px">
							<form action="">
								<div class="hd_search_form" style="float:right;">
									<input placeholder="Поиск" type="text"/>
									<input type="submit" value=""/>
								</div>
							</form>
						</td>
					</tr>
					<tr>
						<td style="padding-top: 11px;">
						<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form", 
	"auth", 
	array(
		"FORGOT_PASSWORD_URL" => "/",
		"PROFILE_URL" => "/user/",
		"REGISTER_URL" => "/",
		"SHOW_ERRORS" => "Y",
		"COMPONENT_TEMPLATE" => "auth"
	),
	false
);?>
						</td>
					</tr>
				</table>
				<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MAX_LEVEL" => "3",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "360000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"COMPONENT_TEMPLATE" => "top",
		"MENU_THEME" => "site"
	),
	false
);?>
				
			</div>
		</div>
		
		<!--- // end header area --->


		<div class="bc_breadcrumbs">
			<ul>
				<li><a href="">Каталог</a></li>
				<li><a href="">Мебель</a></li>
				<li><a href="">Выставки и события</a></li>
			</ul>
			<div class="clearboth"></div>
		</div>
		<div class="main_container page">
			<div class="mn_container">
				<div class="mn_content">
					<div class="main_post">
						<div class="main_title">
							<h1><?$APPLICATION->ShowTitle()?></h1>
						</div>
		