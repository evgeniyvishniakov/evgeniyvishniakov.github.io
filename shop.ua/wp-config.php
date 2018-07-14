<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'shop');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#vWHnb2YAF$V}s_VHV[xPhmUbB S,)Cq6Ny{992IEkk:!2kCNe231E$o<]0z<1e`');
define('SECURE_AUTH_KEY',  't(TlIe|2#XT4e_2#UMGR&F<6b!G=.5ou,a4yNFbrc~xq8m(AsRE`j2+rt]8a10MQ');
define('LOGGED_IN_KEY',    '-mpI#G|.rhPc.VX, HOCvAoW;xSo+o:DGnhA96!1e<V--p2B2J0BnqN*mUOC#1TI');
define('NONCE_KEY',        'RV]~$Mg]m@7<q_&*zn.f~;:s+}I]CM=u,a.@n-;d9<|Gwq 0i<8>TY_SNqJN8#~c');
define('AUTH_SALT',        'XAWvJ[iSN0dTHS|eDN<LA?]%2k!vdgE=m.H]=<7,W3`=+<(a0yXe~[+P+w%1Xfr@');
define('SECURE_AUTH_SALT', '_FXo@n9L29)Q:r|2@;L|m,n?S$uY@pWdp9PG8z_dK!shDt-2`:E*=WGjV0#T^x_X');
define('LOGGED_IN_SALT',   ']ldGAZPykW0r<PI3(dB%3dRO3zOM$mTG+c%}exp{yyWZze,jD}8o+~hBx&Kq^XH`');
define('NONCE_SALT',       '!,0O3LUI3.{ld+~!@bsR,3LtPVdOK6BvB%I]C_~* %ZPfg(`{ ftyW{|ssR`]lH-');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
