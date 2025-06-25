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

// Cargar clase principal del plugin
require_once plugin_dir_path(__FILE__) . 'includes/class-registro-chicas.php';

// Activación / desactivación
register_activation_hook(__FILE__, ['Registro_Chicas', 'activate']);
register_deactivation_hook(__FILE__, ['Registro_Chicas', 'deactivate']);

// Inicializar el plugin
add_action('plugins_loaded', ['Registro_Chicas', 'init']);
