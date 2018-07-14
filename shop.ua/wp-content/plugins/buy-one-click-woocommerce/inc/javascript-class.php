<?php

/**
 * Класс для работы с JavaScript функциями отправляемыми через скрипты
 */
class BuyJavaScript {

    /**
     * Конструктор класса
     */
    public function __construct() {
        $this->addaction();
    }

    /**
     * Адды
     */
    public function addaction() {
        add_action('wp_ajax_buybuttonform', array($this, 'ajaxBuyButtonForm')); //buybuttonform Посылается из js файла
        add_action('wp_ajax_nopriv_buybuttonform', array($this, 'ajaxBuyButtonForm')); //buybuttonform Посылается из js файла
        add_action('wp_ajax_removeorder', array($this, 'ajaxRemoveOrderId'));
        add_action('wp_ajax_nopriv_removeorder', array($this, 'ajaxRemoveOrderId'));
        add_action('wp_ajax_updatestatus', array($this, 'ajaxStatusOrderId'));
        add_action('wp_ajax_nopriv_updatestatus', array($this, 'ajaxStatusOrderId'));
        add_action('wp_ajax_removeorderall', array($this, 'ajaxRemoveOrderAll'));
        add_action('wp_ajax_nopriv_removeorderall', array($this, 'ajaxRemoveOrderAll'));
        add_action('wp_ajax_getViewForm', array($this, 'ajaxgetViewForm')); //Запрос формы
        add_action('wp_ajax_nopriv_getViewForm', array($this, 'ajaxgetViewForm')); //Запрос формы
        add_action('wp_ajax_getViewFormCustom', array($this, 'ajaxgetViewFormCustom')); //Запрос Кастомной формы
        add_action('wp_ajax_nopriv_getViewFormCustom', array($this, 'ajaxgetViewFormCustom')); //Запрос Кастомной формы
    //
    }

    /**
     * Функция выполняется после нажатия на кнопку в форме заказа
     */
    static public function ajaxBuyButtonForm() {

        $textjson = $_POST['text'];
        if (empty($textjson)) {
            wp_die('error' . __LINE__);
        }

        if (!empty($textjson['txtname'])) {
            $txtname = wp_specialchars_decode(esc_html($textjson['txtname']), ENT_QUOTES);
        } else {
            $txtname = '';
        }
        if (!empty($textjson['txtphone'])) {
            $txtphone = $textjson['txtphone'];
        } else {
            $txtphone = '';
        }
        if (isset($textjson['txtemail']) and ! empty($textjson['txtemail'])) {
            $txtemail = sanitize_email($textjson['txtemail']);
        } else {
            $txtemail = '';
        }
        $nametovar = $textjson['nametovar'];
        $pricetovar = $textjson['pricetovar'];
        $idtovar = intval($textjson['idtovar']);
        if ($idtovar < 1) {
            wp_die('error ' . __LINE__);
        }
        if (isset($textjson['message']) and ! empty($textjson['message'])) {
            $dopinfo = wp_specialchars_decode(esc_html($textjson['message']), ENT_QUOTES);
        } else {
            $dopinfo = '';
        }
        $linktovar = '<a href="' . get_the_permalink($idtovar) . '" target="_blank"><span class="glyphicon glyphicon-share"></span></a>';
        $infotovar_old = get_option('buyzakaz');
        $time = current_time('mysql');
        $status = '1'; //По умолчанию статус - новый
        $smslog = ''; //Лог смс
        //В таблицу Woo
        if (isset(BuyCore::$buyoptions['add_tableorder_woo']) and $textjson['custom'] == 0) {
            $blockNull = ''; //Заглушка
            $order = wc_create_order(); //создаём новый заказ
//Записываем в массив данные о доставке заказа и данные клиента
            $address = array(
                'first_name' => (!empty($txtname) ? $txtname : 'Не указан'),
                'last_name' => (!empty($txtname) ? $txtname : 'Не указан'),
                'company' => (!empty($txtname) ? $txtname : 'Не указан'),
                'email' => (!empty($txtemail) ? $txtemail : 'Не указан'),
                'phone' => (!empty($txtphone) ? $txtphone : 'Не указан'),
                'address_1' => (!empty($dopinfo) ? $dopinfo : 'Не указан'),
                'address_2' => (!empty($blockNull) ? $blockNull : 'Не указан'),
                'city' => (!empty($blockNull) ? $blockNull : 'Не указан'),
                'state' => (!empty($blockNull) ? $blockNull : 'Не указан'),
                'postcode' => (!empty($blockNull) ? $blockNull : 'Не указан'),
                'country' => (!empty($blockNull) ? $blockNull : 'Не указан'),
            );
            $order->add_product(get_product($idtovar), 1); //Добавляем в заказ товары: 99-ID товара, 1-количество
            $order->set_address($address, 'billing'); //Добавляем данные о доставке
            $order->set_address($address, 'shipping'); // и оплате
            $order->update_status('processing', __('Платеж успешно оплачен', 'woocommerce')); //Статус заказа изменяем
            $order->calculate_totals(); //подбиваем сумму и видим что наш заказ появился в админке
        }
        //---таблица Woo



        if (isset(BuyCore::$buynotification['namemag'])) {
            $namemag = BuyCore::$buynotification['namemag'];
        } else {
            $namemag = '';
        }
        if (isset(BuyCore::$buynotification['dopiczakaz'])) {
            $dopiczakaz = BuyCore::$buynotification['dopiczakaz'];
        } else {
            $dopiczakaz = '';
        }
        if (isset(BuyCore::$buyoptions['success_action'])) { // опции "действия после нажатия кнопки в форме"
            if (!empty(BuyCore::$buyoptions['success_action_close'])) {
                $success_time = BuyCore::$buyoptions['success_action_close']; // 2 Закрытие формы через мсек
            }
            if (!empty(BuyCore::$buyoptions['success_action_message'])) {
                $success_message = BuyCore::$buyoptions['success_action_message']; // 3 Сообщение после нажатия кнопки в форме
            }
            if (!empty(BuyCore::$buyoptions['success_action_redirect'])) {
                $success_redirect = BuyCore::$buyoptions['success_action_redirect']; // 4  Редирект на страницу после нажатия на кнопку в форме
            }
            switch (BuyCore::$buyoptions['success_action']) {
                case 1: $success_action = 'no'; //Ни чего не делать, пользователь сам закроет форму
                    $num = 1;
                    break;
                case 2: $success_action = $success_time;
                    $num = 2;
                    break;
                case 3: $success_action = $success_message;
                    $num = 3;
                    break;
                case 4: $success_action = $success_redirect;
                    $num = 4;
                    break;
                default: $success_action = 'no';
                    $num = 2; //Ни чего не делать, пользователь сам закроет форму
            }
        } //конец IF действий после нажатия кнопки в форме
        $message = array(
            'time' => $time,
            'url' => '<a href="' . get_the_permalink($idtovar) . '" target="_blank">Посмотреть</a>',
            'price' => $pricetovar,
            'nametov' => $nametovar,
            'namemag' => $namemag,
            'dopinfo' => $dopiczakaz,
            'fon' => $txtphone,
            'fio' => $txtname
        );
        if (!empty($txtemail) and ! empty(BuyCore::$buynotification['infozakaz_chek'])) {
            BuyFunction::BuyEmailNotification($txtemail, BuyCore::$buynotification['namemag'], $message);
        }
        if (!empty(BuyCore::$buynotification['emailbbc'])) {
            BuyFunction::BuyEmailNotification(BuyCore::$buynotification['emailbbc'], BuyCore::$buynotification['namemag'], $message);
        }
        //Отправка СМС
        if (!empty(BuyCore::$buysmscoptions['enable_smsc'])) {
            //echo BuyCore::$buysmscoptions['enable_smsc'];
            $smsmessage = array(
                'fon' => $txtphone,
                'fio' => $txtname,
                'txtemail' => $txtemail,
                'dopinfo' => $dopiczakaz,
                'price' => $pricetovar,
                'nametov' => $nametovar
            );
            $sms = new BuySMSC();
            $smslog = $sms->send_sms(trim($smsmessage['fon']), BuyFunction::composeSms(BuyCore::$buysmscoptions['smshablon'], $smsmessage));
            //$smslog = BuySMSC::send_sms('79082339278', 'test');
            //$smslog = BuySMSC::send_sms(); 
            ///Переписать функцию sms? помнить про static
        }
        //Журналирование
        $infotovar_temp = array('time' => $time, 'idtovar' => $idtovar, 'txtname' => $txtname, 'txtphone' => $txtphone,
            'txtemail' => $txtemail, 'nametovar' => $nametovar, 'pricetovar' => $pricetovar, 'message' => $dopinfo, 'status' => $status, 'linktovar' => $linktovar, 'smslog' => $smslog
        );

        $infotovar_new = $infotovar_old;
        array_push($infotovar_new, $infotovar_temp);
        update_option('buyzakaz', $infotovar_new);
        //Конец журналирования

        $returnresult = array('result' => BuyCore::$buyoptions['success'], 'num' => $num, 'action' => $success_action);
        echo json_encode($returnresult);
        wp_die();
    }

    /**
     * Функция удаляет элемент заказа из таблицы
     * Данные отправляются из файла admin_order.js
     */
    public function ajaxRemoveOrderId() {
        $id = $_POST['text'];
        $infotovar_old = get_option('buyzakaz');
        unset($infotovar_old[$id]);
        $infotovar_new = $infotovar_old;
        update_option('buyzakaz', $infotovar_new);
        wp_die();
    }

    /**
     * Функция удаляет всю таблицу заказов
     * Данные отправляются из файла admin_order.js
     */
    public function ajaxRemoveOrderAll() {
        $nonce = $_POST['nonce']; // Массив URL и NONCE

        if (wp_verify_nonce($nonce['nonce'], 'superKey')) {
            update_option('buyzakaz', array());
            wp_die('ok');
        } else {
            wp_die('Ты хаккер?');
        }
    }

    /**
     * Функция Изменения статуса заказа
     * Данные отправляются из файла admin_order.js
     */
    public function ajaxStatusOrderId() {
        $text = $_POST['text'];
        $id = $text['id'];
        $infotovar_old = get_option('buyzakaz');
        $infotovar_old[$id]['status'] = $text['status'];
        $infotovar_new = $infotovar_old;
        update_option('buyzakaz', $infotovar_new);

        wp_die();
    }

    /**
     * Возвращает форму для быстрого заказа
     */
    public static function ajaxgetViewForm() {
        $url = $_POST['urlpost'];
        $productid = $_POST['productid'];
        $cartinfo = BuyFunction::BuyInfoCart($productid, $url);
        $cartinfo['custom'] = 0;

        echo BuyFunction::viewBuyForm($cartinfo);
        wp_die();
    }

    public static function ajaxgetViewFormCustom() {
        $url = $_POST['urlpost'];
        $productid = $_POST['productid'];
        $name = $_POST['name'];
        $count = $_POST['count'];
        $price = $_POST['price'];
        $arProduct = array(
            'article' => $productid,
            'name' => $name,
            'imageurl' => '',
            'amount' => $price,
            'quantity' => $count,
            'custom' => 1,
        );

        echo BuyFunction::viewBuyForm($arProduct);
        wp_die();
    }

}
