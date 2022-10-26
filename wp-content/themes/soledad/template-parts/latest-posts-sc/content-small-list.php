<?php
/**
 * Template loop for small list style
 */
if ( ! isset ( $n ) ) {
	$n = 1;
} else {
	$n = $n;
}
$penci_featimg_size = isset( $penci_featimg_size ) ? $penci_featimg_size : '';
$thumb_size         = isset( $thumb_size ) ? $thumb_size : '';
?>
    <li class="list-post penci-item-listp penci-slistp">
        <article id="post-<?php the_ID(); ?>" class="item hentry">
			<?php if ( has_post_thumbnail() ) : ?>
                <div class="thumbnail">
					<?php
					$thumbnail_load = penci_featured_images_size_vcel( 'normal', $penci_featimg_size, $thumb_size );
					$class_load     = '';
					if ( 'yes' == $grid_nocrop_list ):
						$thumbnail_load = 'penci-masonry-thumb';
						$class_load     = ' penci-list-nocrop-thumb';
					endif;
					?>

					<?php if ( ! get_theme_mod( 'penci_disable_lazyload_layout' ) ) { ?>
                        <a class="penci-image-holder penci-lazy<?php echo penci_class_lightbox_enable() . $class_load; ?>"<?php if ( 'yes' == $grid_nocrop_list ): echo ' style="padding-bottom: ' . penci_get_featured_image_ratio( get_the_ID(), 'penci-masonry-thumb' ) . '%"'; endif; ?>
                           data-bgset="<?php echo penci_image_srcset( get_the_ID(), $thumbnail_load ); ?>"
                           href="<?php penci_permalink_fix(); ?>"
                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                        </a>
					<?php } else { ?>
                        <a class="penci-image-holder<?php echo penci_class_lightbox_enable() . $class_load; ?>"
                           style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumbnail_load ); ?>');<?php if ( 'yes' == $grid_nocrop_list ): echo 'padding-bottom: ' . penci_get_featured_image_ratio( get_the_ID(), 'penci-masonry-thumb' ) . '%;'; endif; ?>"
                           href="<?php penci_permalink_fix(); ?>"
                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                        </a>
					<?php } ?>

					<?php if ( 'yes' != $grid_icon_format ): ?>
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
					<?php if ( 'yes' != $grid_cat ) : ?>
                        <span class="cat"><?php penci_category( '' ); ?></span>
					<?php endif; ?>

                    <h2 class="penci-entry-title entry-title grid-title"><a
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
            </div>
        </article>
    </li>
<?php
if ( isset( $infeed_ads ) && $infeed_ads ) {
	penci_get_markup_infeed_ad(
		array(
			'wrapper'    => 'li',
			'classes'    => 'list-post penci-item-listp penci-slistp penci-infeed-data penci-infeed-vcele',
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
