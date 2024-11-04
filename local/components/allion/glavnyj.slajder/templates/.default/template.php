<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
ййййййй
<div class="catalog-section">
    <?php foreach ($arResult['SECTIONS'] as $section): ?>
        <h2><?php echo $section['NAME']; ?></h2>
        <p>Дата активности: <?php echo $section['UF_NEWS_LINK']; ?></p>
        
        <ul>
            <?php foreach ($arResult['ITEMS'] as $item): ?>
                <li>
                    <strong><?php echo $item['NAME']; ?></strong>
                    <ul>
                        <li>Материал: <?php echo $item['PROPERTY_MATERIAL']; ?></li>
                        <li>Артикул: <?php echo $item['PROPERTY_ARTIKUL']; ?></li>
                        <li>Цена: <?php echo $item['PROPERTY_PRICE']; ?></li>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div>