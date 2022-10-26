<?php
$sidebar_enable = penci_single_sidebar_return();
$sidebar_position = penci_get_posts_sidebar_class();
$sidebar_small_width = penci_single_smaller_content_enable();

// Check layout magazine
$single_magazine = 'container-single penci-single-style-10 penci-single-smore container-single-fullwidth hentry  penci-header-text-white';
if( get_theme_mod( 'penci_home_layout' ) == 'magazine-1' || get_theme_mod( 'penci_home_layout' ) == 'magazine-2' ) {
	$single_magazine .= ' container-single-magazine';
}

// Check class main content
$class_container_single = 'container container-single penci-single-style-10 penci-single-smore';
if ( $sidebar_enable ){
	$class_container_single .= ' penci_sidebar';
	$class_container_single .= ' ' . $sidebar_position;
} else {
	$class_container_single .= ' penci_is_nosidebar';
	$single_magazine .= ' penci_is_nosidebar';
}

if( $sidebar_small_width ) {
	$class_container_single .= ' penci-single-smaller-width';
}

if( ! get_theme_mod( 'penci_disable_lightbox_single' ) ){
	$class_container_single .= ' penci-enable-lightbox';
}

$post_format = get_post_format();
$show_post_format = true;
if( get_theme_mod( 'penci_post_thumb' ) && ! in_array( $post_format, array( 'link', 'quote','gallery','video' ) )  ) {
	$class_container_single .= ' penci-single-pheader-noimg';
	$show_post_format = false;
}

$postID = get_the_ID();
$current_permalink = get_permalink( $postID );
$current_title = get_the_title( $postID );
$infinite_load  = get_theme_mod( 'penci_loadnp_posts' ) ? get_theme_mod( 'penci_loadnp_posts' ) : false;
$prev_post_id = $prev_post_url = $prev_post_title = $wrap_inficlass = $flag_infi = '';
$data_infiads = get_theme_mod( 'penci_loadnp_ads' ) ? '<div class="penci-single-infiads">' . get_theme_mod( 'penci_loadnp_ads' ) . '</div>' : '';
if( get_theme_mod( 'penci_loadnp_posts' ) ){
	$prev_post = penci_get_next_prev_posts();
	$flag_infi = 'no_data';
	if( ! empty( $prev_post ) && $prev_post != null && $prev_post != '' ) {
		$prev_post_id = $prev_post->ID;
		$prev_post_url = get_permalink( $prev_post_id );
		$prev_post_title = get_the_title( $prev_post_id );
		$wrap_inficlass = ' penci-single-infiscroll';
		$flag_infi = 'has_data';
	}
}
?>

<div class="penci-single-wrapper<?php echo $wrap_inficlass; ?>"<?php if( get_theme_mod( 'penci_loadnp_posts' ) && $data_infiads ) echo ' data-infiads="' . htmlentities( $data_infiads ) . '"'; ?>>
	<div class="penci-single-block<?php if( $flag_infi == 'no_data' ){ echo ' penci-single-infiblock-end'; } ?>"<?php if( get_theme_mod( 'penci_loadnp_posts' ) ): ?> data-prev-url="<?php echo esc_url( $prev_post_url );?>" data-current-url="<?php echo esc_url( $current_permalink );?>" data-post-title="<?php echo esc_attr( $current_title );?>" data-edit-post="<?php echo get_edit_post_link( $postID ); ?>" data-postid="<?php echo $postID; ?><?php endif; ?>">
		<div class="penci-single-pheader <?php echo ( $single_magazine );?>">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					echo '<div class="penci-post-image-wrapper">';
					echo '<div class="container' . ( 'two-sidebar' == $sidebar_position ? ' two-sidebar' : '' ) . '">';
					if ( ! get_theme_mod( 'penci_move_breadcrumbs' ) ) {
						get_template_part( 'template-parts/single', 'breadcrumb-inner' );
					}
					echo '<div class="post-format-entry-header">';
					echo '<div class="penci-sidebar-content">';
					if ( get_theme_mod( 'penci_move_breadcrumbs' ) ) {
						get_template_part( 'template-parts/single', 'breadcrumb-inner' );
					}
					get_template_part( 'template-parts/single', 'entry-header' );

					if ( get_theme_mod( 'penci_post_adsense_single10' ) ) {
						echo '<div class="penci-google-adsense-single-s10">';
						echo do_shortcode( get_theme_mod( 'penci_post_adsense_single10' ) );
						echo '</div>';
					}

					echo '</div>';
					if ( $show_post_format ) {
									echo '<div class="penci-single-s10-content">';
									get_template_part( 'template-parts/single', 'post-format' );
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';

				endwhile;
			endif;
			?>
		</div>
		<div class="<?php echo $class_container_single; ?>">
			<div id="main"<?php if ( get_theme_mod( 'penci_sidebar_sticky' ) ): ?> class="penci-main-sticky-sidebar"<?php endif; ?>>
				<div class="theiaStickySidebar">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php penci_set_post_views( $post->ID ); ?>
						<?php get_template_part( 'template-parts/single', 'content-main' ); ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<?php get_template_part( 'template-parts/single', 'sidebar' ); ?>
		</div>
		<?php do_action( 'penci_action_after_post_content' ); ?>
	</div>
</div>
<?php if( get_theme_mod( 'penci_loadnp_posts' ) && $flag_infi != 'no_data' ){ ?>
	<div class="penci-ldsingle"><div class="penci-ldspinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
<?php } ?>
<?php get_footer(); ?>
