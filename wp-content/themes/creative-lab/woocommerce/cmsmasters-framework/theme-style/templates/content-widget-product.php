<?php
/**
 * @cmsmasters_package 	Creative Lab
 * @cmsmasters_version 	1.1.1
 */


global $product;
?>
<li>
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

	<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<?php echo creative_lab_return_content($product->get_image()); ?>
		<span class="product-title"><?php echo wp_kses_post($product->get_name()); ?></span>
	</a>

	<?php if ( ! empty( $show_rating ) ) : ?>
		<?php creative_lab_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full'); ?>
	<?php endif; ?>

	<?php echo creative_lab_return_content($product->get_price_html()); ?>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>