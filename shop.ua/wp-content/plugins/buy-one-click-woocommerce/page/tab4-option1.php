<h3>Информация о  <?php echo BuyCore::NAME_PLUGIN; ?></h3>
<p>Да да да, я когда нибудь добирусь и до этой страницы :). А пока тут "бяка".</p>
<div id="yandexOrtext">
    <div class="left">
        <p>
            <span class="dashicons dashicons-format-chat"></span><span>Страница плагина, обсуждения, пожелания, предложения <a href="http://www.zixn.ru/plagin-zakazat-v-odin-klik-dlya-woocommerce.html" target="_blank">Переход</a></span><br>
        </p>   
        <p>
            <span class="dashicons dashicons-edit"></span><span>Любые другие предложения коммерческого и иного характера по разработке плагинов для Wordpress <a href="http://www.zixn.ru/kontakty" target="_blank">Переход</a></span><br>

        </p>
        <h3><span class="dashicons dashicons-megaphone"></span> Другие плагины Автора</h3>
        <p>
            <span class="dashicons dashicons-yes"></span><span class="boold">Проверка уровня доверия продавца на Aliexpress <a href="http://alisp.ru/" target="_blank">Переход</a></span><br>
        </p>
        <p>
            <span class="dashicons dashicons-yes"></span><span class="boold">Страница плагинов автора на ресурсе Wordpress  <a href="https://profiles.wordpress.org/northmule/#content-plugins" target="_blank">Переход</a></span><br>
        </p>
                <p>
            <span class="dashicons dashicons-yes"></span><span class="boold">Тест вашего хостинга при помощи плагина Wordpress!  <a href="http://www.zixn.ru/compare-hosting-performance-table-html" target="_blank">Переход</a></span><br>

        </p>
        <h3>Следи за обновлениями через:</h3>
        <p>
            <span class="dashicons dashicons-twitter"></span><a href="https://twitter.com/Zixnru" target="_blank">Twitter</a>
        </p>


    </div>
    <div class="right">
        <span>Супер хостинг для Wordpress</span>
        <a href="https://beget.com/?id=5193" target="_blank"><img src="https://cp.beget.com/promo_data/static/static300x1050_2.png" border="0"></a>
    </div>

</div>

<h3>Ниже отладочная информация</h3>
<p>Опции общие в базе WP buyoptions</p>
<?php
echo '<pre>';
print_r(BuyCore::$buyoptions);
echo '</pre>';
?>
<p>Опции уведомлений в базе WP buynotification</p>
<?php
echo '<pre>';
print_r(BuyCore::$buynotification);
echo '</pre>'
?>
<p>Опции SMSC в базе WP buysmscoptions</p>
<?php
echo '<pre>';
print_r(BuyCore::$buysmscoptions);
echo '</pre>'
?>
<p>Для изменения внешнего вида формы быстрого заказ нужно править файлы</p>
1)"css/button21.css"<br>
2)"css/form.css"<br>
<p>Для изменения окна дополнительного сообщения нужно править файл</p>
1)"css/formmessage.css"<br>