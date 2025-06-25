<?php
/**
 * Shortcode y funciones para el formulario de login de modelos.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Evitar acceso directo.
}

/**
 * Encola los estilos y scripts necesarios para el formulario.
 */
function rc_enqueue_login_assets() {
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', [], '5.3.0' );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', [], '5.3.0', true );
    wp_enqueue_style( 'rc-login-style', REGISTRO_CHICAS_URL . 'assets/css/login-style.css', [], REGISTRO_CHICAS_VERSION );
}

/**
 * Renderiza el formulario de login para modelos.
 *
 * @return string HTML del formulario o mensaje si ya está logueado.
 */
function rc_login_modelos_shortcode() {
    if ( is_user_logged_in() ) {
        return '<div class="alert alert-success">Ya estás logueado. <a href="' . esc_url( admin_url() ) . '">Ir al panel</a></div>';
    }

    rc_enqueue_login_assets();
    $redir = esc_url( $_SERVER['REQUEST_URI'] );
    ob_start();
    ?>
    <div class="container mt-5" style="max-width: 400px;">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h5>Ingreso exclusivo para Modelos</h5>
            </div>
            <div class="card-body">
                <form action="<?php echo esc_url( wp_login_url( $redir ) ); ?>" method="post">
                    <div class="mb-3">
                        <label for="user_login" class="form-label">Usuario o Email</label>
                        <input type="text" class="form-control" name="log" id="user_login" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_pass" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="pwd" id="user_pass" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Ingresar</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">¿Olvidaste tu contraseña?</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'login_modelos', 'rc_login_modelos_shortcode' );
