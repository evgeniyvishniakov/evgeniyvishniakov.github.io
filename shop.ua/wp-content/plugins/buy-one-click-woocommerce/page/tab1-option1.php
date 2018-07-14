<h3>Общие настройки дополнения <?php echo BuyCore::NAME_PLUGIN; ?></h3>
<p>Не забывайте нажимать кнопку сохранить после изменения настроек в каждой вкладке.</p>
<?php
$buyoptions = get_option('buyoptions'); //Массив настроек
?>

<form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <fieldset>
        <legend>Общие</legend>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Включить показ кнопки?</th>
                <td>
                    <input type="checkbox" name="buyoptions[enable_button]" <?php
                    if (isset($buyoptions['enable_button'])) {
                        checked($buyoptions['enable_button'], 'on', 1);
                    }
                    ?>/>
                    <span class="description">Включить или отключить отображение кнопки быстрого заказа на сайте. Галочка стоит - кнопка показывается</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Включить показ кнопки-шорткода?</th>
                <td>
                    <input type="checkbox" name="buyoptions[enable_button_shortcod]" <?php
                    if (isset($buyoptions['enable_button_shortcod'])) {
                        checked($buyoptions['enable_button_shortcod'], 'on', 1);
                    }
                    ?>/>
                    <span class="description">Включить или отключить отображение кнопки быстрого заказа черет шорткод. Галочка стоит - кнопка показывается</span>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Название кнопки на сайте</th>
                <td>
                    <input type="text" name="buyoptions[namebutton]" value="<?php
                    if (isset($buyoptions['namebutton'])) {
                        echo $buyoptions['namebutton'];
                    }
                    ?>" />
                    <span class="description">Наппример "Купить в один клик"</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Положение кнопки в карточке</th>
                <td>

                    <select name="buyoptions[positionbutton]">
                        <option value="woocommerce_simple_add_to_cart" <?php
                        if (isset($buyoptions['positionbutton'])) {
                            selected($buyoptions['positionbutton'], 'woocommerce_simple_add_to_cart', true);
                        }
                        ?>>Над кнопкой количества</option>
                        <option value="woocommerce_product_description_heading" <?php
                        if (isset($buyoptions['positionbutton'])) {
                            selected($buyoptions['positionbutton'], 'woocommerce_product_description_heading', true);
                        }
                        ?>>В вкладке описания товара</option>
                        <option value="woocommerce_before_single_product" <?php
                        if (isset($buyoptions['positionbutton'])) {
                            selected($buyoptions['positionbutton'], 'woocommerce_before_single_product', true);
                        }
                        ?>>Над изображением товара</option>
                        <option value="woocommerce_before_single_product_summary" <?php
                        if (isset($buyoptions['positionbutton'])) {
                            selected($buyoptions['positionbutton'], 'woocommerce_before_single_product_summary', true);
                        }
                        ?>>Над полной информацией о товаре</option>
                        <option value="woocommerce_after_single_product_summary" <?php
                        if (isset($buyoptions['positionbutton'])) {
                            selected($buyoptions['positionbutton'], 'woocommerce_after_single_product_summary', true);
                        }
                        ?>>Под полной информацией о товаре</option>

                    </select>
                    <span class="description">Место где будет распологаться кнопка в карточке товара</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Записывать заказы в таблицу Woocommerce</th>
                <td>
                    <input type="checkbox" name="buyoptions[add_tableorder_woo]" <?php
                    if (isset($buyoptions['add_tableorder_woo'])) {
                        checked($buyoptions['add_tableorder_woo'], 'on', 1);
                    }
                    ?>/>
                    <span class="description">Установка галочки включит механизм когда заказы будут попадать не только в таблицу плагина, но и в меню "Заказы" - Woocommerce</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Включить отображение кнопки в категориях</th>
                <td>
                    <input type="checkbox" name="buyoptions[enable_button_category]" <?php
                    if (isset($buyoptions['enable_button_category'])) {
                        checked($buyoptions['enable_button_category'], 'on', 1);
                    }
                    ?>/>
                    <span class="description">Опция включает или отключает показ кнопки заказа в один клик в категориях товаров. Позицию показа вы можете выбрать далее</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Положение кнопки в категории</th>
                <td>

                    <select name="buyoptions[positionbutton_category]">
                        <option value="woocommerce_before_shop_loop_item_title" <?php
                        if (isset($buyoptions['positionbutton_category'])) {
                            selected($buyoptions['positionbutton_category'], 'woocommerce_before_shop_loop_item_title', true);
                        }
                        ?>>Над товаром</option>
                        <option value="woocommerce_after_shop_loop_item_title" <?php
                        if (isset($buyoptions['positionbutton_category'])) {
                            selected($buyoptions['positionbutton_category'], 'woocommerce_after_shop_loop_item_title', true);
                        }
                        ?>>Под названием товара до цены</option>
                        <option value="woocommerce_after_shop_loop_item" <?php
                        if (isset($buyoptions['positionbutton_category'])) {
                            selected($buyoptions['positionbutton_category'], 'woocommerce_after_shop_loop_item', true);
                        }
                        ?>>Под товаром</option>

                    </select>
                    <span class="description">Место где будет распологаться кнопка в категории товара</span>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Информация в форме заказа</legend>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Показывать информацию о товаре?</th>
                <td>
                    <input type="checkbox" name="buyoptions[infotovar_chek]" <?php
                    if (isset($buyoptions['infotovar_chek'])) {
                        checked($buyoptions['infotovar_chek'], 'on', 1);
                    }
                    ?>/>
                    <span class="description">Будет или не будет отображаться информация о товаре в модальном окне? Галочка стоит - будет отображаться</span>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Спрашивать ФИО</th>
                <td>
                    <input type="checkbox" name="buyoptions[fio_chek]" <?php
                    if (isset($buyoptions['fio_chek'])) {
                        checked($buyoptions['fio_chek'], 'on', 1);
                    }
                    ?>/>
                    <span class="description">Предлагать ли покупателю вводить своё имя?Галочка стоит - предлагать</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Спрашивать телефон</th>
                <td>
                    <input type="checkbox" name="buyoptions[fon_chek]" <?php
                    if (isset($buyoptions['fon_chek'])) {
                        checked($buyoptions['fon_chek'], 'on', 1);
                    }
                    ?>/>
                    <span class="description">Предлагать ли покупателю вводить свой телефон? Галочка стоит - предлагать</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Спрашивать Email</th>
                <td>
                    <input type="checkbox" name="buyoptions[email_chek]" <?php
                    if (isset($buyoptions['email_chek'])) {
                        checked($buyoptions['email_chek'], 'on', 1);
                    }
                    ?>/>
                    <span class="description">Предлагать ли покупателю вводить свой email? Галочка стоит - предлагать</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Поле доп.информации</th>
                <td>
                    <input type="checkbox" name="buyoptions[dopik_chek]" <?php
                    if (isset($buyoptions['dopik_chek'])) {
                        checked($buyoptions['dopik_chek'], 'on', 1);
                    }
                    ?>/>
                    <span class="description">Предлагать ли покупателю ввод дополнительной информации? Галочка стоит - предлагать</span>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Описание полей формы</legend>
        <table class="form-table">

            <tr valign="top">
                <th scope="row">Поле ФИО</th>
                <td>
                    <input type="text" name="buyoptions[fio_descript]" value="<?php
                    if (isset($buyoptions['fio_descript'])) {
                        echo $buyoptions['fio_descript'];
                    }
                    ?>" />
                    <span class="description">Например "Ваше имя?"</span>
                </td>
                <th scope="row">Обязательное поле?</th>
                <td>
                    <input type="checkbox" name="buyoptions[fio_verifi]" <?php
                    if (isset($buyoptions['fio_verifi'])) {
                        checked($buyoptions['fio_verifi'], 'on', 1);
                    }
                    ?>/>

                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Поле телефон</th>
                <td>
                    <input type="text" name="buyoptions[fon_descript]" value="<?php
                    if (isset($buyoptions['fon_descript'])) {
                        echo $buyoptions['fon_descript'];
                    }
                    ?>" />
                    <span class="description">Например "Ваш телефон?"</span>
                </td>
                <th scope="row">Обязательное поле?</th>
                <td>
                    <input type="checkbox" name="buyoptions[fon_verifi]" <?php
                    if (isset($buyoptions['fon_verifi'])) {
                        checked($buyoptions['fon_verifi'], 'on', 1);
                    }
                    ?>/>

                </td>
                <th scope="row">Подсказка формата</th>
                <td>
                    <input type="input" name="buyoptions[fon_format]" value="<?php
                    if (isset($buyoptions['fon_format'])) {
                        echo $buyoptions['fon_format'];
                    }
                    ?>" />
                    <span class="description">Например "+7 XXX XXX XX XX"</span>

                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Поле email</th>
                <td>
                    <input type="text" name="buyoptions[email_descript]" value="<?php
                    if (isset($buyoptions['email_descript'])) {
                        echo $buyoptions['email_descript'];
                    }
                    ?>" />
                    <span class="description">Например "Ваш email?"</span>
                </td>
                <th scope="row">Обязательное поле?</th>
                <td>
                    <input type="checkbox" name="buyoptions[email_verifi]" <?php
                    if (isset($buyoptions['email_verifi'])) {
                        checked($buyoptions['email_verifi'], 'on', 1);
                    }
                    ?>/>

                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Поле "Дополнительно"</th>
                <td>
                    <input type="text" name="buyoptions[dopik_descript]" value="<?php
                    if (isset($buyoptions['dopik_descript'])) {
                        echo $buyoptions['dopik_descript'];
                    }
                    ?>" />
                    <span class="description">Например "Адрес доставки"</span>
                </td>
                <th scope="row">Обязательное поле?</th>
                <td>
                    <input type="checkbox" name="buyoptions[dopik_verifi]" <?php
                    if (isset($buyoptions['dopik_verifi'])) {
                        checked($buyoptions['dopik_verifi'], 'on', 1);
                    }
                    ?>/>

                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Имя кнопки в форме</th>
                <td>
                    <input type="text" name="buyoptions[butform_descript]" value="<?php
                    if (isset($buyoptions['butform_descript'])) {
                        echo $buyoptions['butform_descript'];
                    }
                    ?>" />
                    <span class="description">Например "Заказать"</span>
                </td>

            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Действия и уведомления</legend>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Сообщение в форме</th>
                <td>
                    <input type="text" name="buyoptions[success]" value="<?php
                    if (isset($buyoptions['success'])) {
                        echo $buyoptions['success'];
                    }
                    ?>" />
                    <span class="description">Сообщение об успешном оформление заказа. Например: "Спасибо за заказ!". Сообщение появляется в форме заказа «В один клик», после того как пользователь нажал кнопку подтверждения заказа. Сообщение должно быть коротким.</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Что делать после нажатия кнопки <?php
                    if (isset($buyoptions['butform_descript'])) {
                        echo $buyoptions['butform_descript'];
                    }
                    ?></th>
                <td>
                    <p><input name="buyoptions[success_action]" type="radio" value="1" <?php checked($buyoptions['success_action'], '1', 1); ?>> Ни чего не делать</p><span class="description">Окно останется открытым, пользователь увидит сообщение указанное выше</span>
                    <p><input name="buyoptions[success_action]" type="radio" value="2" <?php checked($buyoptions['success_action'], '2', 1); ?>> Закрыть через <input type="text" name="buyoptions[success_action_close]" maxlength="6" pattern="[0-9]*" size="5"  value="<?php
                        if (isset($buyoptions['success_action_close'])) {
                            echo $buyoptions['success_action_close'];
                        }
                        ?>" />мсек.</p><span class="description">Например: "2000". Пользователь увидит сообщение указанное выше и форма будет закрыта через указанное время</span>
                    <p><input name="buyoptions[success_action]" type="radio" value="3" <?php checked($buyoptions['success_action'], '3', 1); ?>> Показать сообщение(возможен html)</p>  <textarea cols="20" rows="4" name="buyoptions[success_action_message]"><?php
                        if (isset($buyoptions['success_action_message'])) {
                            echo $buyoptions['success_action_message'];
                        }
                        ?></textarea>
                    <p><input name="buyoptions[success_action]" type="radio" value="4" <?php checked($buyoptions['success_action'], '4', 1); ?>> Сделать редирект на страницу <input type="text" name="buyoptions[success_action_redirect]" value="<?php
                        if (isset($buyoptions['success_action_redirect'])) {
                            echo $buyoptions['success_action_redirect'];
                        }
                        ?>" />


                    </p><span class="description">Например: <a href="http://zixn.ru">"http://zixn.ru"</a>. Пользователь увидит сообщение и  попадёт на указанную страницу</span>

                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Формы быстрого заказа - стили</legend>
        <p>№1. <input name="buyoptions[form_style_color]" type="radio" value="1" <?php checked($buyoptions['form_style_color'], '1', 1); ?>> Базовая</p>
        <p>№2. <input name="buyoptions[form_style_color]" type="radio" value="2" <?php checked($buyoptions['form_style_color'], '2', 1); ?>> Голубая</p>
        <p>№3. <input name="buyoptions[form_style_color]" type="radio" value="3" <?php checked($buyoptions['form_style_color'], '3', 1); ?>> Красная</p>
        <p>№4. <input name="buyoptions[form_style_color]" type="radio" value="4" <?php checked($buyoptions['form_style_color'], '4', 1); ?>> Зелёная</p>
        <p>№5. <input name="buyoptions[form_style_color]" type="radio" value="5" <?php checked($buyoptions['form_style_color'], '5', 1); ?>> Оранжевая</p>
        <span>Для "заточки" стиля под свой магазин, вы можете в папке плагина "css" отредактировать файл стиля "form_выбраный номер.csv" под себя</span>
    </fieldset>
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="buyoptions" />
    <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>

<fieldset>
    <legend>Шорткоды плагина</legend>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>

                    <th class="active">Элемент</th>
                    <th class="success">Код для использования</th>
                    <th class="warning">Описание</th>
                </tr>
                <tr>
                    <td class="active">Кнопка купить</td>
                    <td class="success">[viewBuyButton]</td>
                    <td class="warning">Шорткод кнопки нужно вставлять в циклах вывода товара, где возможно получить ID товара. При этом 
                        Шорткод загружает для себя стили и скрипты,а кнопка "купить" будет показана при наличие галочки "Включить показ кнопки-шорткода"
                    </td>

                </tr>
                <tr>
                    <td class="active">Кнопка купить в произвольном исполнении</td>
                    <td class="success">[viewBuyButtonCustom id="ваш код товара(строка)" name="ваше наименование(строка)" count="количество для покупки(число)" price="цена(число)"]</td>
                    <td class="warning">Шорт код кнопки с произвольными параметрами, можно задавать "отсебятину" не привязанную к реальным товарам.
                        С данным шорткодом заказы будут записываться только в таблицу плагина, в таблицу Woocommerce — записи не будет. 
                        При этом Шорткод загружает для себя стили и скрипты,а кнопка "купить" будет показана при наличие галочки "Включить показ кнопки-шорткода" 
                    </td>

                </tr>
        </table>
    </div>
</fieldset>
<!--<a class="clickBuyButton" href="<?php echo admin_url('admin.php?page=buyone&testform'); ?>">Посмотреть форму</a>-->

<?php
//BuyFunction::viewBuyForm();
?>