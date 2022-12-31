<?php
/**
 * Welcome section.
 *
 * @package soledad
 */

$theme_data    = wp_get_theme();
$is_child = false;
$parent_theme = $theme_data->parent();
if ( ! empty( $parent_theme ) ) {
    $is_child = true;
}

$parent_version = '';
if ( $is_child ) {
    $parent_version = $theme_data->parent()->Version;
}
?>
<h1>
	<?php
	if ( $parent_version ) {
		echo esc_html__('Welcome to Soledad Child Theme', 'soledad' ) . '<br>';
		echo '<span style="display: block; font-size: 22px; font-weight: 500; margin-top: 10px;">' . esc_html__( sprintf( __( 'Inherit from %1$s Parent Theme - Version %2$s', 'soledad' ), 'Soledad', $parent_version ) ) . '</span>';
	} else {
		// Translators: %1$s - Theme name, %2$s - Theme version.
		echo esc_html__( sprintf( __( 'Welcome to %1$s - Version %2$s', 'soledad' ), 'Soledad', $theme_data->version ) );
	}
	?>
</h1>
<div class="about-text"><?php echo esc_html__( "Thank you for purchasing our theme!
Interested in keeping up to date with PenciDesign's future projects and releases.
Thanks so much!", 'soledad' ); ?>
	
<?php
$admin_wel_page_text = get_theme_mod( 'admin_wel_page_text' );
if( $admin_wel_page_text ) {
	echo do_shortcode( wpautop( $admin_wel_page_text ) );
}
?>	
</div>
<a rel="nofollow" target="_blank" href="<?php echo esc_url( 'https://pencidesign.net/' ); ?>" class="wp-badge">PenciDesign</a>
