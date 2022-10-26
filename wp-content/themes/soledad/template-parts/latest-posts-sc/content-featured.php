<?php
/**
 * Template loop for Featured Boxed style
 */
if ( ! isset ( $n ) ) {
	$n = 1;
} else {
	$n = $n;
}
$thumbbsize         = 'penci-full-thumb';
$penci_featimg_size = isset( $penci_featimg_size ) ? $penci_featimg_size : '';
if ( 'custom' == $penci_featimg_size ) {
	$thumb_bigsize = isset( $thumb_bigsize ) ? $thumb_bigsize : '';
	if ( $thumb_bigsize ) {
		$thumbbsize = $thumb_bigsize;
	}
}
?>
    <section class="grid-featured">
        <article id="post-<?php the_ID(); ?>" class="item featured-layout">
            <div class="thumbnail">
				<?php if ( 'yes' != $grid_share_box ) : ?>
                    <div class="penci-post-share-box penci-featured-share-box">
                        <span class="penci-shareic"><a
                                    href="#"><?php penci_fawesome_icon( 'fas fa-share' ); ?></a></span>
                        <span class="penci-shareso">
					<?php echo penci_getPostLikeLink( get_the_ID() ); ?>
					<?php penci_soledad_social_share(); ?>
					</span>
                    </div>
				<?php endif; ?>
				<?php
				/* Display Review Piechart  */
				if ( function_exists( 'penci_display_piechart_review_html' ) ) {
					penci_display_piechart_review_html( get_the_ID() );
				}
				?>
				<?php if ( ! get_theme_mod( 'penci_disable_lazyload_layout' ) ) { ?>
                    <a class="penci-image-holder penci-lazy"
                       data-bgset="<?php echo penci_image_srcset( get_the_ID(), $thumbbsize ); ?>"
                       href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                    </a>
				<?php } else { ?>
                    <a class="penci-image-holder"
                       style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumbbsize ); ?>');"
                       href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                    </a>
				<?php } ?>
            </div>

            <div class="penci-featured-infor">
                <div class="grid-header-box featured-header-box">
					<?php if ( 'yes' != $grid_cat ) : ?>
                        <span class="cat"><?php penci_category( '' ); ?></span>
					<?php endif; ?>
                    <h2 class="penci-entry-title entry-title overlay-title"><a
                                href="<?php the_permalink(); ?>"><?php penci_trim_post_title( get_the_ID(), $grid_title_length ); ?></a>
                    </h2>
					<?php penci_soledad_meta_schema(); ?>
					<?php if ( 'yes' != $grid_date || 'yes' != $grid_author || 'yes' == $grid_viewscount || 'yes' == $grid_comment_other || penci_isshow_reading_time( $grid_readtime ) ) : ?>
                        <div class="grid-post-box-meta">
							<?php if ( 'yes' != $grid_author ) : ?>
                                <span class="otherl-date-author author-italic author vcard"><?php echo penci_get_setting( 'penci_trans_by' ); ?> <a
                                            class="url fn n"
                                            href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
							<?php endif; ?>
							<?php if ( 'yes' != $grid_date ) : ?>
                                <span class="otherl-date"><?php penci_soledad_time_link(); ?></span>
							<?php endif; ?>
							<?php if ( 'yes' == $grid_comment_other ) : ?>
                                <span class="otherl-comment"><a
                                            href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 ' . penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a></span>
							<?php endif; ?>
							<?php
							if ( 'yes' == $grid_viewscount ) {
								echo '<span>';
								echo penci_get_post_views( get_the_ID() );
								echo ' ' . penci_get_setting( 'penci_trans_countviews' );
								echo '</span>';
							}
							?>
							<?php if ( penci_isshow_reading_time( $grid_readtime ) ): ?>
                                <span class="otherl-readtime"><?php penci_reading_time(); ?></span>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
                </div>

				<?php if ( get_the_excerpt() && 'yes' != $grid_remove_excerpt ): ?>
                    <div class="item-content entry-content">
						<?php penci_the_excerpt( $grid_excerpt_length ); ?>
                    </div>
				<?php endif; ?>

				<?php if ( 'yes' == $grid_add_readmore ):
					$class_button = '';
					if ( 'yes' == $grid_remove_arrow ): $class_button .= ' penci-btn-remove-arrow'; endif;
					if ( 'yes' == $grid_readmore_button ): $class_button .= ' penci-btn-make-button'; endif;
					if ( $grid_readmore_align ): $class_button .= ' penci-btn-align-' . $grid_readmore_align; endif;
					?>
                    <div class="penci-readmore-btn<?php echo $class_button; ?>">
                        <a class="penci-btn-readmore"
                           href="<?php the_permalink(); ?>"><?php echo penci_get_setting( 'penci_trans_read_more' ); ?><?php penci_fawesome_icon( 'fas fa-angle-double-right' ); ?></a>
                    </div>
				<?php endif; ?>
            </div>
        </article>
    </section>
<?php
if ( isset( $infeed_ads ) && $infeed_ads ) {
	penci_get_markup_infeed_ad(
		array(
			'wrapper'    => 'section',
			'classes'    => 'grid-featured penci-infeed-data penci-infeed-vcele',
			'fullwidth'  => $infeed_full,
			'order_ad'   => $infeed_num,
			'order_post' => $n,
			'code'       => $infeed_ads,
			'echo'       => true
		)
	);
}
?>
<?php $n ++; ?>
