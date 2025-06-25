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

// Cargar clase principal del plugin
require_once REGISTRO_CHICAS_PATH . 'includes/class-registro-chicas.php';

// Activación / desactivación
register_activation_hook( __FILE__, [ 'Registro_Chicas', 'activate' ] );
register_deactivation_hook( __FILE__, [ 'Registro_Chicas', 'deactivate' ] );

// Inicializar el plugin
add_action( 'plugins_loaded', [ 'Registro_Chicas', 'get_instance' ] );
