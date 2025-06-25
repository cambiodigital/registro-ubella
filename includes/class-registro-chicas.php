<?php
/**
 * Clase principal del plugin Registro-Chicas.
 */
class Registro_Chicas {
    /**
     * Instancia única de la clase.
     *
     * @var self|null
     */
    private static $instance = null;

    /**
     * Obtiene la instancia singleton.
     *
     * @return self
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor.
     * Registra los hooks necesarios.
     */
    private function __construct() {
        $this->registrar_hooks();
    }

    /**
     * Ejecutado al activar el plugin.
     */
    public static function activate() {
        // Aquí podría crearse tablas o inicializar opciones.
    }

    /**
     * Ejecutado al desactivar el plugin.
     */
    public static function deactivate() {
        // Aquí podría limpiarse o desactivar componentes temporales.
    }

    /**
     * Registra los hooks de WordPress.
     */
    private function registrar_hooks() {
        add_action( 'init', [ $this, 'cargar_textdomain' ] );
        add_shortcode( 'registro_chicas_form', [ $this, 'mostrar_formulario' ] );
    }

    /**
     * Carga los archivos de traducción.
     */
    public function cargar_textdomain() {
        load_plugin_textdomain(
            'registro-chicas',
            false,
            dirname( plugin_basename( __FILE__ ) ) . '/../languages'
        );
    }

    /**
     * Genera el formulario de registro.
     *
     * @return string HTML del formulario.
     */
    public function mostrar_formulario() {
        return '<form>Formulario básico de registro...</form>';
    }
}
