<?php
/**
 * The theme searchform
 *
 * @package Umbrella
 */
?>
<form method="get" action="<?php echo esc_url( home_url() ); ?>" class="nk-form" novalidate="novalidate">
    <div class="input-group">
        <input type="text" class="form-control" name="s" placeholder="<?php esc_html_e( 'Type something...', 'umbrella' ); ?>">
        <span class="nk-input-group-btn">
            <button class="nk-btn nk-btn-lg"><?php esc_html_e( 'Search', 'umbrella' ); ?></button>
        </span>
    </div>
</form>
