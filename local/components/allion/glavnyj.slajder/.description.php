<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

return [
    'NAME' => 'Мой компонент',
    'DESCRIPTION' => 'Компонент для отображения каталога товаров',
    'COMPLEX' => 'N',
    'PATH' => [
        'ID' => 'exam',
        'NAME' => 'Экзамен №2',
    ],
    'PARAMETERS' => [
        'IBLOCK_ID_PRODUCTS' => [
            'NAME' => 'ID инфоблока с каталогом товаров',
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'IBLOCK_ID_NEWS' => [
            'NAME' => 'ID инфоблока с новостями',
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'UF_NEWS_LINK' => [
            'NAME' => 'Код пользовательского свойства разделов каталога',
            'TYPE' => 'STRING',
            'DEFAULT' => 'UF_NEWS_LINK',
        ],
        'CACHE_TIME' => [
            'DEFAULT' => 3600,
        ],
        'CACHE_TYPE' => [
            'PARENT' => 'CACHE_SETTINGS',
            'NAME' => 'Тип кеширования',
            'TYPE' => 'LIST',
            'VALUES' => [
                'A' => 'Авто',
                'Y' => 'Кешировать',
                'N' => 'Не кешировать',
            ],
            'DEFAULT' => 'A',
        ],
        'TEMPLATE' => [
            'PARENT' => 'BASE',
            'NAME' => 'Шаблон',
            'TYPE' => 'STRING',
            'DEFAULT' => '.default',
        ],
    ],
];