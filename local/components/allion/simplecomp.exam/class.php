<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;

Loader::includeModule('iblock');

class SimpleCompExam extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        $arParams['IBLOCK_ID_PRODUCTS'] = (int)$arParams['IBLOCK_ID_PRODUCTS'];
        $arParams['IBLOCK_ID_NEWS'] = (int)$arParams['IBLOCK_ID_NEWS'];
        $arParams['UF_NEWS_LINK'] = trim($arParams['UF_NEWS_LINK']);

        return $arParams;
    }

    public function executeComponent()
    {
        $arResult=$this->getNewsElem();
        $cnt=[];
        foreach($arResult as $el){
            foreach($el['ITEMS'] as $elId){
                $cnt[$elId['ID']]=$elId['ID'];
            }
        }
        $this->arResult['CNT']=count((array)$cnt);
        $this->arResult['SECTION_NEWS'] = $arResult;
        $this->includeComponentTemplate();
    }


    function getItems($idSec) 
    {
        $iblock = \Bitrix\Iblock\Iblock::wakeUp($this->arParams['IBLOCK_ID_PRODUCTS']);
        $iblockEntity = $iblock->getEntityDataClass();
        $res = $iblockEntity::getList([
            'select' =>  ['ID', 'NAME','IBLOCK_SECTION_ID', 'MATERIAL_'=>'MATERIAL', 'ARTNUMBER_'=>'ARTNUMBER', 'PRICE_'=>'PRICE'], 
            'filter' => [
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID_PRODUCTS'],
                'IBLOCK_SECTION_ID' => $idSec, 
            ],
            'group' => ['ID'], 
            'order' => ['SORT' => 'ASC'], 
        ]);

        $elements = [];
        while ($element = $res->fetch()) {
            $elements[ $element['ID']] = [
                'ID' => $element['ID'],
                'NAME' => $element['NAME'],
                'MATERIAL' => $element['MATERIAL_VALUE'],
                'ARTNUMBER' => $element['ARTNUMBER_VALUE'],
                'PRICE' => $element['PRICE_VALUE'],
            ];
        }
    
        return $elements;
    }
  function getSectionCat($id){     
        $secID = [];
        $secNAME = [];
        $entity = \Bitrix\Iblock\Model\Section::compileEntityByIblock($this->arParams['IBLOCK_ID_PRODUCTS']);
            $res = $entity::getList([
                'select' => ['ID', 'NAME'], 
                'filter' => [
                    'IBLOCK_ID' => $this->arParams['IBLOCK_ID_PRODUCTS'],
                    $this->arParams['UF_NEWS_LINK'] => $id 
                ],
                'order' => ['SORT' => 'ASC'], 
            ]);
    
           
            while ($section = $res->fetch()) {
                $secID[]= $section['ID'];
                $secNAME[]=$section['NAME'];
            }
            $secCat['ID']=$secID;
            $secCat['NAME']=$secNAME;
        
        return  $secCat;
    }
    protected function getNewsElem(){// элементы в новостях
        $res = ElementTable::getList([
            'select' => ['ID', 'NAME', 'ACTIVE_FROM'],
            'filter' => ['IBLOCK_ID' => $this->arParams['IBLOCK_ID_NEWS']],
            'order' => ['SORT' => 'ASC'] 
        ]);
        $elements = [];
        while ($element = $res->fetch()) {
            $sectionCat=self::getSectionCat($element['ID']);
            $items=self::getItems($sectionCat['ID']);
            $elements[] = [
                'ID' => $element['ID'],
                'NAME' => $element['NAME'],
                'ACTIVE_FROM' => $element['ACTIVE_FROM']->format("d.m.Y"),
                'SECTION'=> $sectionCat,
               'ITEMS'=> $items
            ];
        }
        return $elements;
    }
}