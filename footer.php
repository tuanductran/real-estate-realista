<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package real-estate-realista
 */

$real_estate_realista_footer_logo = get_theme_mod('footer_logo');
if (get_theme_mod('footer_logo')) {
	$real_estate_realista_footer_logo = get_theme_mod('footer_logo');
}
$real_estate_realista_footer_content = get_theme_mod('footer_content');
$real_estate_realista_footer_phone_number = get_theme_mod('footer_phone_number');
$real_estate_realista_email_address = get_theme_mod('footer_email_address');

?>

<?php if(!empty($real_estate_realista_email_address) && !empty($real_estate_realista_footer_phone_number) && !empty($real_estate_realista_footer_content)):?>
	<footer>
		<div class="container">
			<div class="top-footer">
				<div class="row">
					<?php if( $real_estate_realista_footer_logo ) : ?>
						<div class="col-lg-3">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr(bloginfo( 'name' )); ?>" class="logo"><img src="<?php echo esc_url( $real_estate_realista_footer_logo ) ?>" alt="<?php echo esc_attr( 'footer logo' ) ?>"></a>
						</div>
					<?php endif; ?>
				</div>
				<div class="row">
					<?php
						if( is_active_sidebar( 'footer' ) ) : 
							dynamic_sidebar( 'footer' ); 
						endif;
					?>
				</div>
			</div><!--top-footer end-->
		</div>
	</footer><!--footer end-->
<?php else:?>
<footer class="sec-footer">
	<div class="bottom-f">
		<div class="container">
			<?php if(!empty(get_theme_mod( 'footer_powered_by_link' ))):?>
				<a href="<?php echo esc_url(get_theme_mod( 'footer_powered_by_link' ));?>" target="_blank"><?php echo esc_html(get_theme_mod( 'footer_powered_by' ));?></a>
			<?php else:?>
				<?php echo esc_html(get_theme_mod( 'footer_powered_by' ));?>
			<?php endif;?>
		</div>
	</div>
</footer>
<?php endif;?>
</div><!--wrapper end-->
<?php wp_footer(); ?>
</body>

</html>