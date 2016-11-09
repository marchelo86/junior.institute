<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'junior');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'stopitnow');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'yy.MxF2B~[+=|-KFD{k+<O,XF2A(D77@U{>4l5bV}E-V#hRH&S}loy6p|+v0b`|-');
define('SECURE_AUTH_KEY',  ' -GlAmSGnG;Fgx<EFF`NS{v87tT+/[aWDoh*2?$D;~SFUVGWc@w8;?^u~zb7.xJ,');
define('LOGGED_IN_KEY',    'kRwYz[n}p@SsQ?VT+J,5b0++03wU-I7 qKnw9C,oNJLuWg 6p(|J<Va *D?aRQWW');
define('NONCE_KEY',        '^tWMZy]hS.<Rl=_,E1NN=af92_D?Hben?nzw4G8n<{>c;.uuX3`|w Yuqj+?E_fh');
define('AUTH_SALT',        'IQ:orzdDJ^-ZpRgW0,0SG0sQbDB.kh/Pl.ca[aF+tNzr+ve.`uXDkxLwKH&>>.wQ');
define('SECURE_AUTH_SALT', '`yGGoQ9Y;P4n=%`6w<0b& +}(w=nxhGXu_=METhJL0b,m<Q|!K^@Bm,mbb L|qb0');
define('LOGGED_IN_SALT',   'ouS|5dvU}q9/-/8F 3oy!C#/40Q0DJ= 9Xi|g|dk.5uZH<vL-%-)ZeX#&tUnm]Bt');
define('NONCE_SALT',       '2|acOV{u*9F1fC#Ke W.z3V&Mtw|8|at7u)KP`#wyL{%jQp{Z]Brr#FN!=8;_eid');

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
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
