<?php
/**
 * Template loop for list style
 */
if ( ! isset ( $j ) ) {
	$j = 1;
} else {
	$j = $j;
}
?>
<li class="list-post pclist-layout">
    <article id="post-<?php the_ID(); ?>" class="item hentry">
		<?php if ( penci_get_post_format( 'gallery' ) ) : ?>
			<?php $images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>
			<?php if ( $images ) : ?>
                <div class="thumbnail">
                    <div class="penci-owl-carousel penci-owl-carousel-slider penci-nav-visible" data-auto="true">
						<?php foreach ( $images as $image ) : ?>

							<?php $the_image = wp_get_attachment_image_src( $image, penci_featured_images_size() ); ?>
							<?php $the_caption = get_post_field( 'post_excerpt', $image ); ?>

							<?php if ( ! get_theme_mod( 'penci_disable_lazyload_layout' ) ) { ?>
                                <figure class="penci-image-holder penci-lazy"
                                        data-bgset="<?php echo penci_image_srcset( get_the_ID() ); ?>"
								        <?php if ( $the_caption ) : ?>title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?>>
                                </figure>
							<?php } else { ?>
                                <figure class="penci-image-holder"
                                        <?php if ( $the_caption ) : ?> title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?>
                                        style="background-image: url('<?php echo esc_url( $the_image[0] ); ?>');">
                                </figure>
							<?php } ?>

						<?php endforeach; ?>
                    </div>
                </div>
			<?php endif; ?>

		<?php elseif ( has_post_thumbnail() ) : ?>
            <div class="thumbnail">
				<?php
				/* Display Review Piechart  */
				if ( function_exists( 'penci_display_piechart_review_html' ) ) {
					penci_display_piechart_review_html( get_the_ID() );
				}
				$thumbnail_load = penci_featured_images_size();
				$class_load     = '';
				if ( get_theme_mod( 'penci_grid_nocrop_list' ) ):
					$thumbnail_load = 'penci-masonry-thumb';
					$class_load     = ' penci-list-nocrop-thumb';
				endif;
				?>

				<?php if ( ! get_theme_mod( 'penci_disable_lazyload_layout' ) ) { ?>
                    <a class="penci-image-holder penci-lazy<?php echo penci_class_lightbox_enable() . $class_load; ?>"<?php if ( get_theme_mod( 'penci_grid_nocrop_list' ) ): echo ' style="padding-bottom: ' . penci_get_featured_image_ratio( get_the_ID(), 'penci-masonry-thumb' ) . '%"'; endif; ?>
                       data-bgset="<?php echo penci_image_srcset( get_the_ID(),$thumbnail_load ); ?>"
                       href="<?php penci_permalink_fix(); ?>"
                       title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                    </a>
				<?php } else { ?>
                    <a class="penci-image-holder<?php echo penci_class_lightbox_enable() . $class_load; ?>"
                       style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumbnail_load ); ?>');<?php if ( get_theme_mod( 'penci_grid_nocrop_list' ) ): echo 'padding-bottom: ' . penci_get_featured_image_ratio( get_the_ID(), 'penci-masonry-thumb' ) . '%;'; endif; ?>"
                       href="<?php penci_permalink_fix(); ?>"
                       title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                    </a>
				<?php } ?>

				<?php if ( ! get_theme_mod( 'penci_grid_icon_format' ) ): ?>
					<?php if ( has_post_format( 'video' ) ) : ?>
                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                           aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-play' ); ?></a>
					<?php endif; ?>
					<?php if ( has_post_format( 'gallery' ) ) : ?>
                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                           aria-label="Icon"><?php penci_fawesome_icon( 'far fa-image' ); ?></a>
					<?php endif; ?>
					<?php if ( has_post_format( 'audio' ) ) : ?>
                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                           aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-music' ); ?></a>
					<?php endif; ?>
					<?php if ( has_post_format( 'link' ) ) : ?>
                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                           aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-link' ); ?></a>
					<?php endif; ?>
					<?php if ( has_post_format( 'quote' ) ) : ?>
                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                           aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-quote-left' ); ?></a>
					<?php endif; ?>
				<?php endif; ?>
            </div>
		<?php endif; ?>

        <div class="content-list-right content-list-center<?php if ( ! has_post_thumbnail() ) : echo ' fullwidth'; endif; ?>">
            <div class="header-list-style">
				<?php if ( ! get_theme_mod( 'penci_grid_cat' ) ) : ?>
                    <span class="cat"><?php penci_category( '' ); ?></span>
				<?php endif; ?>

                <h2 class="penci-entry-title entry-title grid-title"><a
                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php penci_soledad_meta_schema(); ?>
				<?php $hide_readtime = get_theme_mod( 'penci_grid_readingtime' ); ?>
				<?php if ( ! get_theme_mod( 'penci_grid_date' ) || ! get_theme_mod( 'penci_grid_author' ) || get_theme_mod( 'penci_grid_countviews' ) || get_theme_mod( 'penci_grid_comment_other' ) || penci_isshow_reading_time( $hide_readtime ) ) : ?>
                    <div class="grid-post-box-meta">
						<?php if ( ! get_theme_mod( 'penci_grid_author' ) ) : ?>
                            <span class="otherl-date-author author-italic author vcard"><?php echo penci_get_setting( 'penci_trans_by' ); ?> <a
                                        class="url fn n"
                                        href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
						<?php endif; ?>
						<?php if ( ! get_theme_mod( 'penci_grid_date' ) ) : ?>
                            <span class="otherl-date"><?php penci_soledad_time_link(); ?></span>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'penci_grid_comment_other' ) ) : ?>
                            <span class="otherl-comment"><a
                                        href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 ' . penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a></span>
						<?php endif; ?>
						<?php
						if ( get_theme_mod( 'penci_grid_countviews' ) ) {
							echo '<span>';
							echo penci_get_post_views( get_the_ID() );
							echo ' ' . penci_get_setting( 'penci_trans_countviews' );
							echo '</span>';
						}
						?>
						<?php if ( penci_isshow_reading_time( $hide_readtime ) ): ?>
                            <span class="otherl-readtime"><?php penci_reading_time(); ?></span>
						<?php endif; ?>
                    </div>
				<?php endif; ?>
            </div>

			<?php if ( get_the_excerpt() && ! get_theme_mod( 'penci_grid_remove_excerpt' ) ): ?>
                <div class="item-content entry-content">
					<?php the_excerpt(); ?>
                </div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'penci_grid_add_readmore' ) ):
				$class_button = '';
				if ( get_theme_mod( 'penci_grid_remove_arrow' ) ): $class_button .= ' penci-btn-remove-arrow'; endif;
				if ( get_theme_mod( 'penci_grid_readmore_button' ) ): $class_button .= ' penci-btn-make-button'; endif;
				if ( get_theme_mod( 'penci_grid_readmore_align' ) ): $class_button .= ' penci-btn-align-' . get_theme_mod( 'penci_grid_readmore_align' ); endif;
				?>
                <div class="penci-readmore-btn<?php echo $class_button; ?>">
                    <a class="penci-btn-readmore"
                       href="<?php the_permalink(); ?>"><?php echo penci_get_setting( 'penci_trans_read_more' ); ?><?php penci_fawesome_icon( 'fas fa-angle-double-right' ); ?></a>
                </div>
			<?php endif; ?>

			<?php if ( ! get_theme_mod( 'penci_grid_share_box' ) ) : ?>
                <div class="penci-post-box-meta penci-post-box-grid penci-post-box-listpost">
                    <div class="penci-post-share-box">
						<?php echo penci_getPostLikeLink( get_the_ID() ); ?>
						<?php penci_soledad_social_share(); ?>
                    </div>
                </div>
			<?php endif; ?>
        </div>

    </article>
</li>
<?php
if ( isset( $infeed_ads ) && $infeed_ads ) {
	penci_get_markup_infeed_ad(
		array(
			'wrapper'    => 'li',
			'classes'    => 'list-post pclist-layout penci-infeed-data',
			'fullwidth'  => $infeed_full,
			'order_ad'   => $infeed_num,
			'order_post' => $j,
			'code'       => $infeed_ads,
			'echo'       => true
		)
	);
}
?>
<?php $j ++; ?>
