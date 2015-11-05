<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wp_unitee');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'cBPPKH0[-t9cwAY4xR[bAXD0dYF+.GGv<`,Qk(a]z|rjO/4L*2<@oSA=KzK,,<=+');
define('SECURE_AUTH_KEY', 'pSO[v-kkG5D@noD6qgf4:2`X hkqTWyyz1!YiuLV2d$I.E$+x7i68M0NeZ%Q;9-2');
define('LOGGED_IN_KEY', 'O|tN.q?,z^d27auW.P0_jMt>Z+Q-?{Y>.JK{(-V^B8TdXVx|3*Y-[3A)_-4o7hG@');
define('NONCE_KEY', 'RQuW/}6JZK-nf W=@EmoM#@%w+SpIndnOoOqVg}$sR%QWT-u2n`+mO0u4K9Pb2+8');
define('AUTH_SALT', '(0/3a/z7TD97,@7l6ph&]y+pt{J1CX##xNB2%^r!jo=`V*B{2=+A9rOMO,+JKHIB');
define('SECURE_AUTH_SALT', 'HbZIZ2v|gqjsac-/5MY6|m?GX>ESY1nFk=#,!&Vb]QK,N}wet:,-[d1e`_N@yASP');
define('LOGGED_IN_SALT', 'Att;l_~Gc/KAR3k G`ur B]3L40|!|080uUI3CA`UGxg~PYzt,B0h)C @[odiDjg');
define('NONCE_SALT', '<T{+pD5gkm}!yFzeT(AR;}5EC#HQ|1(j;tQ%$.WmcdJF2fvAWfTk^4{J4`]Kxk1B');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

