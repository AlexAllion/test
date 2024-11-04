<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Iblock;

Loader::includeModule('iblock');

class SimpleCompExam extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        // Устанавливаем ID инфоблоков и других параметров
        $arParams['IBLOCK_ID_PRODUCTS'] = (int)$arParams['IBLOCK_ID_PRODUCTS'];
        $arParams['IBLOCK_ID_NEWS'] = (int)$arParams['IBLOCK_ID_NEWS'];
        $arParams['UF_NEWS_LINK'] = trim($arParams['UF_NEWS_LINK']);

        return $arParams;
    }

    public function executeComponent()
    {
        // Получаем разделы каталога товаров с примыкаемыми новостями
        $this->arResult['SECTIONS'] = $this->getSections();
        
        // Получаем товары
        $this->arResult['ITEMS'] = $this->getItems();
        
        // Устанавливаем заголовок страницы
        $this->setTitle();

        $this->includeComponentTemplate();
    }

    protected function getSections()
    {
        $sections = [];
        $filter = [
            'IBLOCK_ID' => $this->arParams['IBLOCK_ID_PRODUCTS'],
            'ACTIVE' => 'Y',
        ];

        $sectionsResult = Iblock\SectionTable::getList([
            'filter' => $filter,
            'select' => ['ID', 'NAME', 'UF_NEWS_LINK'],
        ]);

        while ($section = $sectionsResult->fetch()) {
            $sections[] = $section;
        }

        return $sections;
    }

    protected function getItems()
    {
        $items = [];
        $filter = [
            'IBLOCK_ID' => $this->arParams['IBLOCK_ID_PRODUCTS'],
            'ACTIVE' => 'Y',
        ];

        $itemsResult = Iblock\ElementTable::getList([
            'filter' => $filter,
            'select' => ['ID', 'NAME', 'PROPERTY_MATERIAL', 'PROPERTY_ARTIKUL', 'PROPERTY_PRICE'],
        ]);

        while ($item = $itemsResult->fetch()) {
            $items[] = $item;
        }

        return $items;
    }

    protected function setTitle()
    {
        global $APPLICATION;
        $count = count($this->arResult['ITEMS']);
        $APPLICATION->SetTitle("В каталоге товаров представлено товаров: $count");
    }
}