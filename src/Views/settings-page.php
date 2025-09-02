<?php
// Safety check
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<div class="wrap">
    <h1><?php esc_html_e( 'E‑Catalogue', 'ecatalogue' ); ?></h1>

    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
        <?php
        // A simple nonce to secure the form
        wp_nonce_field( 'ecatalogue_export_action', 'ecatalogue_export_nonce' );
        ?>
        <input type="hidden" name="action" value="ecatalogue_admin_export" />

        <p>
            <input type="submit"
                   class="button button-primary"
                   value="<?php esc_attr_e( 'Generate PDF', 'ecatalogue' ); ?>">
        </p>
    </form>
</div>
