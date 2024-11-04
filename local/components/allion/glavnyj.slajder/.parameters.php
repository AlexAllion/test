<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = array(
    "GROUPS" => array(
        "PRODUCT_SETTINGS" => array(
            "NAME" => "Настройки товаров",
            "SORT" => 100,
        ),
        "NEWS_SETTINGS" => array(
            "NAME" => "Настройки новостей",
            "SORT" => 200,
        ),
    ),
    "PARAMETERS" => array(
        "IBLOCK_ID_PRODUCTS" => array(
            "PARENT" => "PRODUCT_SETTINGS",
            "NAME" => "ID инфоблока с товарами",
            "TYPE" => "TEXT",
            "MULTIPLE" => "N",
            "DEFAULT" => "1",
            "REFRESH" => "Y",
        ),
        "IBLOCK_ID_NEWS" => array(
            "PARENT" => "NEWS_SETTINGS",
            "NAME" => "ID инфоблока с новостями",
            "TYPE" => "TEXT",
            "MULTIPLE" => "N",
            "DEFAULT" => "2",
            "REFRESH" => "Y",
        ),
        "CACHE_TIME" => array(
            "DEFAULT" => 3600,
        ),
    ),
);
?>