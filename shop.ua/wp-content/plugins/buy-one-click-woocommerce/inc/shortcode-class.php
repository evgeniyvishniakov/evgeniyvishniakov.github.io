<?php

/*
 * Code is distributed as-is
 * the Developer may change the code at its discretion without prior notice
 * Developers: Djo 
 * Website: http://zixn.ru
 * Twitter: https://twitter.com/Zixnru
 * Email: izm@zixn.ru
 */

class BuyShortcode {

    /**
     * Кнопка купить
     * Возможно размещение только в цикле вывода товаров
     */
    public function __construct() {
        if (!shortcode_exists('viewBuyButton')) {
            add_shortcode('viewBuyButton', array($this, 'viewBuyButton'));
        }
        if (!shortcode_exists('viewBuyButtonCustom')) {
            add_shortcode('viewBuyButtonCustom', array($this, 'viewBuyButtonCustom'));
        }
    }

    /**
     * Класическая кнопка покупки в один клик
     * Используется везде где можно получить ИД товара из Объекта WP
     * @return string
     */
    public function viewBuyButton() {
        $buyoptions = get_option('buyoptions');
        if (!empty($buyoptions['enable_button_shortcod']) and $buyoptions['enable_button_shortcod'] == 'on') {
            $core = new BuyCore();
            $core->styleAddFrontPage();
            $core->scriptAddFrontPage();
            return BuyFunction::viewBuyButton();
        } else {
            return '';
        }
    }

    /**
     * @param array $arParams id - код товара, name- наименование, count-количество,price- цена(число)
     * Кнопка с возможностью передать параметры
     */
    public function viewBuyButtonCustom($arParams) {
        $buyoptions = get_option('buyoptions');
        if (!empty($buyoptions['enable_button_shortcod']) and $buyoptions['enable_button_shortcod'] == 'on') {
            $arParams = shortcode_atts(array(
                'id' => '1',
                'name' => 'noname',
                'count' => 1,
                'price' => 5,
                    ), $arParams);
            $core = new BuyCore();
            $core->styleAddFrontPage();
            $core->scriptAddFrontPage();
            return BuyFunction::viewBuyButtonCustrom($arParams);
        } else {
            return '';
        }
    }

}
