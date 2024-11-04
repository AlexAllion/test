<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {die();} ?>
<div class="catalog_news">
    <ul>
    <?foreach ($arResult['SECTION_NEWS'] as $section){ ?>
        <li><b><?echo $section['NAME']; ?></b>-
       Дата активности:<?php echo $section['ACTIVE_FROM']; ?>(<?=implode(',',$section['SECTION']['NAME'])?>)     
            <ul>
                <?foreach ($section['ITEMS'] as $item){ ?>
                    <li>
                        <?php echo $item['NAME']; ?> - <?=$item['PRICE'];?> - <?= $item['MATERIAL'];?> - <?=$item['ARTNUMBER']; ?>
                    </li>
                <?} ?>
            </ul>
        </li>
    <?} ?>
    </ul>
</div>