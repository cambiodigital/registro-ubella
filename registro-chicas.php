<?php
/*
Plugin Name: Registro-Chicas
Plugin URI: https://github.com/usuario/registro-chicas
Description: Registro ágil de usuarios con gestión individual de perfiles. Cada usuario puede acceder, actualizar y mantener su información personal de manera independiente.
Version: 1.0.0
Author: cambiodigital.shop
Author URI: https://cambiodigital.shop
Text Domain: registro-chicas
GitHub Plugin URI: https://github.com/usuario/registro-chicas
GitHub Branch: main
*/

defined( 'ABSPATH' ) || exit;

/**
 * Constantes de configuración del plugin.
 */
define( 'REGISTRO_CHICAS_VERSION', '1.0.0' );
define( 'REGISTRO_CHICAS_PATH', plugin_dir_path( __FILE__ ) );
define( 'REGISTRO_CHICAS_URL', plugin_dir_url( __FILE__ ) );
define( 'RC_LOGIN_PAGE_SLUG', 'login-modelos' );
define( 'RC_LOGIN_PAGE_TITLE', 'Ingreso de Modelos' );
define( 'RC_OPTION_LOGIN_URL', 'rc_login_page_url' );

// Cargar clase principal del plugin
require_once REGISTRO_CHICAS_PATH . 'includes/class-registro-chicas.php';
require_once REGISTRO_CHICAS_PATH . 'includes/login-form.php';

// Activación / desactivación
register_activation_hook( __FILE__, [ 'Registro_Chicas', 'activate' ] );
register_deactivation_hook( __FILE__, [ 'Registro_Chicas', 'deactivate' ] );

// Crear la página de login personalizado durante la activación.
function rc_crear_pagina_login_personalizado() {
    $pagina = get_page_by_path( RC_LOGIN_PAGE_SLUG );

    if ( ! $pagina ) {
        $page_id = wp_insert_post([
            'post_title'   => RC_LOGIN_PAGE_TITLE,
            'post_name'    => RC_LOGIN_PAGE_SLUG,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '[login_modelos]',
        ]);
    } else {
        $page_id = $pagina->ID;
    }

    if ( $page_id ) {
        update_option( RC_OPTION_LOGIN_URL, get_permalink( $page_id ) );
    }
}
register_activation_hook( __FILE__, 'rc_crear_pagina_login_personalizado' );

// Muestra una notificación con la URL de la página al activar el plugin.
function rc_mostrar_url_login_modelo() {
    $url = get_option( RC_OPTION_LOGIN_URL );
    if ( $url ) {
        echo '<div class="notice notice-success is-dismissible"><p>🟢 Página de login creada: <a href="' . esc_url( $url ) . '" target="_blank">' . esc_html( $url ) . '</a></p></div>';
        delete_option( RC_OPTION_LOGIN_URL );
    }
}
add_action( 'admin_notices', 'rc_mostrar_url_login_modelo' );

// Inicializar el plugin
add_action( 'plugins_loaded', [ 'Registro_Chicas', 'get_instance' ] );
