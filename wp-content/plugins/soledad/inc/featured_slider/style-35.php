<?php
/**
 * Template part for Slider Style 35
 */

$feat_query = penci_get_query_featured_slider();
if ( ! $feat_query ) {
	return;
}
$slider_title_length = get_theme_mod( 'penci_slider_title_length' ) ? get_theme_mod( 'penci_slider_title_length' ) : 12;
$image_size          = get_theme_mod( 'featured_slider_imgsize' ) ? get_theme_mod( 'featured_slider_imgsize' ) : 'penci-slider-full-thumb';

	$post_thumb_msize = get_theme_mod( 'featured_slider_imgsize_mobile' ) ? get_theme_mod( 'featured_slider_imgsize_mobile' ) : 'penci-masonry-thumb';

?>
<?php if ( $feat_query->have_posts() ) : while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>
    <div class="item">
		<?php if ( ! get_theme_mod( 'penci_disable_lazyload_slider' ) ) { ?>
            <a class="penci-image-holder <?php echo penci_classes_slider_lazy(); ?>"
               data-bgset="<?php echo penci_image_srcset( get_the_ID(), $image_size,$post_thumb_msize ); ?>"
               href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		<?php } else { ?>
            <a class="penci-image-holder"
               style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), penci_is_mobile() ? $post_thumb_msize : $image_size ); ?>');"
               href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		<?php } ?>
		<?php if ( ! get_theme_mod( 'penci_featured_center_box' ) ): ?>
            <div class="penci-featured-content-right">
                <div class="feat-text-right">
					<?php if ( ! get_theme_mod( 'penci_featured_hide_categories' ) ): ?>
                        <div class="cat featured-cat"><?php penci_category( '' ); ?></div>
					<?php endif; ?>
                    <h3><a title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                           href="<?php the_permalink() ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $slider_title_length, '...' ); ?></a>
                    </h3>
					<?php if ( ( get_the_excerpt() && ! get_theme_mod( 'penci_featured_meta_excerpt' ) ) || ! get_theme_mod( 'penci_featured_meta_comment' ) || ! get_theme_mod( 'penci_featured_meta_date' ) ): ?>
                        <div class="featured-content-excerpt">
							<?php if ( ! get_theme_mod( 'penci_featured_meta_comment' ) || ! get_theme_mod( 'penci_featured_meta_date' ) || get_theme_mod( 'penci_featured_meta_author' ) ): ?>
                                <div class="feat-meta">
									<?php if ( get_theme_mod( 'penci_featured_meta_author' ) ): ?>
                                        <span class="feat-author"><?php echo penci_get_setting( 'penci_trans_by' ); ?> <a
                                                    href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
									<?php endif; ?>
									<?php if ( ! get_theme_mod( 'penci_featured_meta_date' ) ): ?>
                                        <span class="feat-time"><?php penci_soledad_time_link(); ?></span>
									<?php endif; ?>
									<?php if ( ! get_theme_mod( 'penci_featured_meta_comment' ) ): ?>
                                        <span class="feat-comments"><a
                                                    href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 ' . penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a></span>
									<?php endif; ?>
                                </div>
							<?php endif; ?>
							<?php if ( get_the_excerpt() && ! get_theme_mod( 'penci_featured_meta_excerpt' ) ): ?>
								<?php the_excerpt(); ?>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
                    <div class="penci-featured-slider-button">
                        <a href="<?php the_permalink() ?>"><?php echo penci_get_setting( 'penci_trans_read_more' ); ?></a>
                    </div>
                </div>
            </div>
		<?php endif; ?>
    </div>
<?php endwhile;
	wp_reset_postdata(); endif; ?>
