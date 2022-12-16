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
 * * Настройки MySQL
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
define( 'DB_NAME', 'loft' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'loft_adm' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'j_8_LwMj_Yl2EOmsu)Wn_' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

define('WP_SITEURL', 'https://loft.partners');
define('WP_HOME', 'https://loft.partners');

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
define( 'AUTH_KEY',         'E{#7Sm|?ywAXF%g44e?z&(*];3|/pw(w%K}j.>C/A{b>pk8c{Ow.QKs3w**`JK ;' );
define( 'SECURE_AUTH_KEY',  'n8^9K{6:a-~(qaVMv?O_W<6>.^(b8zwp(4Y{/40}lL!+#):P:+`XZ;A?@m4Uy-/&' );
define( 'LOGGED_IN_KEY',    'Xvu{JAT+zZ`)]HBe~f}`i&J}pa0=ocVtH)t@1qP]!XY(KdEPWUW3{a=2X`-|Np->' );
define( 'NONCE_KEY',        'UOFd.Pmx s-yX>=n)NCbKn6)ZQ%aCG[?XE0(IGeS{QnCP Up<>[s:NAJLy,HI*rM' );
define( 'AUTH_SALT',        'yb7l-LWzRBRKM~Ysk0i]RZ~,+Ymj6$s(?MhG9[v%ElpQpIJ(YzCfrl]E|R$5hbFH' );
define( 'SECURE_AUTH_SALT', '(h8*hE~3H=fp4T*_Aa:P_S7O~+,8In9~k`;MH*4s:OV3k)*=F%#b[wgGT3SCHg*l' );
define( 'LOGGED_IN_SALT',   'Ao~4-yRd,U|Sw{I~Wu9[8A53h[.JyD`nDgt|b%c5x*[{z{{jx$$=r$(b8cYEchTH' );
define( 'NONCE_SALT',       '32K;y4tl{iz;QJ3haxUtf~@ff~m+nv}3(Xw=DnhfV9:~0.g{F-F~]&|Rtl3e zmS' );

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
define( 'FS_METHOD', 'direct' );
