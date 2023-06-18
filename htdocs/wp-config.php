<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'paradise' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'wJ`TXZ0CSC*6gs&?]VplF}9E3K=nieJH*c&.SVC0Ys5do]l5sLQ:[a46<7Mlpt62' );
define( 'SECURE_AUTH_KEY',  'n7vcpmbsoD3X*)0cbPpT, j5OQ{3 >AcSedfRqgbwGr~)l1T1c*YN$:Dpt[J{YAN' );
define( 'LOGGED_IN_KEY',    'w8=T2)xhEe~~5P$j VV<cK=]o_W70J-._GgEU`f@DHFA&6De$P@Uh.0tDp>Zg3z ' );
define( 'NONCE_KEY',        'O(XZ^*hhPo;zGjF_ptk,,j$E~Y&JmOz# @$y`MAf4|D 0m^ ]2fewX0Qt!n$p vL' );
define( 'AUTH_SALT',        '>,QyC}/*&iIpXC+h!/G)3%UI]p@WS+Z#{=fsdmp&P2h&ARI&r*--/rz8>4b#gmr8' );
define( 'SECURE_AUTH_SALT', 'N=L2g&C_s@&Iy;47G]Z{m[frYZI5&~U.L 5R?,gM-bnwGF>u>G>tp?,]d_N,eY>(' );
define( 'LOGGED_IN_SALT',   't_PvLm},R <T3Q=|@!Xk>;*OXXG(kbz708Uun?n#uaf`GK,3W5fODAImK)QoM+<D' );
define( 'NONCE_SALT',       'dCK)qcTn]+;(hR=/enE*v6pCY(sBnros!;N{)cK/nWkfbT5ID]CPr=x3R~)jk/20' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
