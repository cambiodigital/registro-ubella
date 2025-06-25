<?php
class Registro_Chicas {
    public static function init() {
        add_shortcode('registro_chicas_form', [__CLASS__, 'mostrar_formulario']);
    }

    public static function activate() {
        // Código al activar el plugin (crear tablas, opciones, etc.)
    }

    public static function deactivate() {
        // Código al desactivar el plugin
    }

    public static function mostrar_formulario() {
        return '<form>Formulario básico de registro...</form>';
    }
}

