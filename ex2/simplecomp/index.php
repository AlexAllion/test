<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?
/*
use Bitrix\Main\Loader;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;

// Убедитесь, что модуль инфоблоков загружен
if (!Loader::includeModule('iblock')) {
    throw new \Exception('Module iblock not found');
}
$iblockId = 1; // Замените на нужный ID инфоблока

// Получаем элементы инфоблока
$res = ElementTable::getList([
    'select' => ['ID', 'NAME', 'DATE_CREATE'],
    'filter' => ['IBLOCK_ID' => $iblockId],
    'order' => ['SORT' => 'ASC'] // Упорядочиваем по полю SORT (по умолчанию)
]);

// Массив для хранения элементов
$elements = [];

// Обрабатываем результат
while ($element = $res->fetch()) {
    $elements[] = [
        'ID' => $element['ID'],
        'NAME' => $element['NAME'],
        'DATE_CREATE' => $element['DATE_CREATE'],
    ];
}
//$elements все элементы новостей


$iblockId = 1; // Замените на нужный ID инфоблока
// Задайте значение свойства, по которому будет выполнен фильтр
$propertyValue = 1; // Замените на нужное значение свойства
$propertyCode = 'UF_NEWS_LINK'; // Замените на код вашего пользовательского свойства

// Получаем разделы инфоблока
$entity = \Bitrix\Iblock\Model\Section::compileEntityByIblock(2);
$res = $entity::getList([
    'select' => ['ID', 'NAME'], // Выберите нужные поля
    'filter' => [
        'IBLOCK_ID' => 2,
        $propertyCode => $propertyValue // Фильтр по значению свойства
    ],
    'order' => ['SORT' => 'ASC'], // Упорядочиваем по полю SORT
]);

$secCat = [];

// Обрабатываем результат
while ($section = $res->fetch()) {
    $secCat[] = [
        'ID' => $section['ID'],
        'NAME' => $section['NAME'],
    ];
}





$sectionIds = array_column($secCat,'ID'); // Замените на массив ID разделов, по которым будет выполнен запрос
$iblock = \Bitrix\Iblock\Iblock::wakeUp(2);
$iblock::getEntityDataClass()::
$res = $iblockProjectsEntity::getList([
    'select' =>  ['ID', 'NAME','IBLOCK_SECTION_ID', 'MATERIAL_'=>'MATERIAL', 'ARTNUMBER_'=>'ARTNUMBER', 'PRICE_'=>'PRICE'], // Укажите поля, которые нужно получить
    'filter' => [
        'IBLOCK_ID' => $iblockId,
        'IBLOCK_SECTION_ID' => $sectionIds 
    ],
    'group' => ['ID'], // Исключаем дубликаты по ID элемента
    'order' => ['SORT' => 'ASC'], // Упорядочиваем по полю SORT
]);

// Массив для хранения элементов
$elements = [];

// Обрабатываем результат
while ($element = $res->fetch()) {
    $elements[] = [
        'ID' => $element['ID'],
        'NAME' => $element['NAME'],
        'SECTION_ID' => $element['SECTION_ID'],
    ];
}
print_r($elements);
*/



$APPLICATION->IncludeComponent(
	"allion:simplecomp.exam",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"IBLOCK_ID_NEWS" => "1",
		"IBLOCK_ID_PRODUCTS" => "2",
		"UF_NEWS_LINK" => "UF_NEWS_LINK"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>