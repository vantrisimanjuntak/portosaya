<div class="penci-bgitem<?php if ( 'style-2' == $biggid_style ) {
	echo ' item-masonry';
}
echo $is_big_item . penci_big_grid_count_classes( $bg, $biggid_style ); ?>">
    <div class="penci-bgitin">
        <div class="penci-bgmain">
            <div class="pcbg-thumb">
				<?php
				/* Display Review Piechart  */
				if ( 'yes' == $show_reviewpie && function_exists( 'penci_display_piechart_review_html' ) ) {
					penci_display_piechart_review_html( get_the_ID() );
				}
				?>
				<?php if ( 'yes' == $show_formaticon ): ?>
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
                <div class="pcbg-thumbin">
                    <a class="pcbg-bgoverlay<?php if ( 'whole' == $overlay_type && 'on' != $bgcontent_pos ): echo ' active-overlay'; endif; ?>"
                       href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
					<?php if ( ! $disable_lazy ) { ?>
                        <div class="penci-image-holder penci-lazy"<?php if ( 'style-2' == $biggid_style ) {
							echo ' style="padding-bottom: ' . penci_get_featured_image_padding_markup( get_the_ID(), $thumbnail, true ) . '%"';
						} ?>
                             data-bgset="<?php echo penci_image_srcset( get_the_ID(),$thumbnail ); ?>">
                        </div>
					<?php } else { ?>
                        <div class="penci-image-holder"
                             style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumbnail ); ?>');<?php if ( 'style-2' == $biggid_style ) {
							     echo 'padding-bottom: ' . penci_get_featured_image_padding_markup( get_the_ID(), $thumbnail, true ) . '%';
						     } ?>">
                        </div>
					<?php } ?>
                </div>
            </div>
            <div class="pcbg-content">
                <div class="pcbg-content-flex">
                    <a class="pcbg-bgoverlay<?php if ( 'whole' == $overlay_type && 'on' == $bgcontent_pos ): echo ' active-overlay'; endif; ?>"
                       href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
                    <div class="pcbg-content-inner<?php if ( 'inline-block' == $content_display ) {
						echo ' bgcontent-inline-block';
					} else {
						echo ' bgcontent-block';
					} ?>">
                        <a href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                           class="pcbg-bgoverlaytext<?php if ( 'text' == $overlay_type ): echo ' active-overlay'; endif; ?> item-hover"></a>
						<?php if ( in_array( 'cat', $post_meta ) && ! $hide_cat_small_flag ) : ?>
                            <div class="pcbg-above item-hover">
							<span class="cat pcbg-sub-title">
								<?php penci_category( '', $primary_cat ); ?>
							</span>
                            </div>
						<?php endif; ?>

						<?php if ( in_array( 'title', $post_meta ) ) : ?>
                            <div class="pcbg-heading item-hover">
                                <h3 class="pcbg-title"><a
                                            href="<?php the_permalink(); ?>"><?php if ( ! $title_length ) {
											the_title();
										} else {
											echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $title_length, '...' );
										} ?></a></h3>
                            </div>
						<?php endif; ?>

						<?php if ( ! $hide_meta_small_flag && count( array_intersect( array(
								'author',
								'date',
								'comment',
								'views',
								'reading'
							), $post_meta ) ) > 0 ) { ?>
                            <div class="grid-post-box-meta pcbg-meta item-hover">
                                <div class="pcbg-meta-desc">
									<?php if ( in_array( 'author', $post_meta ) ) : ?>
                                        <span class="bg-date-author author-italic author vcard">
										<?php echo penci_get_setting( 'penci_trans_by' ); ?> <a class="url fn n"
                                                                                                href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
									</span>
									<?php endif; ?>
									<?php if ( in_array( 'date', $post_meta ) ) : ?>
                                        <span class="bg-date"><?php penci_soledad_time_link(); ?></span>
									<?php endif; ?>
									<?php if ( in_array( 'comment', $post_meta ) ) : ?>
                                        <span class="bg-comment">
										<a href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 ' . penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a>
									</span>
									<?php endif; ?>
									<?php
									if ( in_array( 'views', $post_meta ) ) {
										echo '<span>';
										echo penci_get_post_views( get_the_ID() );
										echo ' ' . penci_get_setting( 'penci_trans_countviews' );
										echo '</span>';
									}
									?>
									<?php
									$hide_readtime = in_array( 'reading', $post_meta ) ? false : true;
									if ( penci_isshow_reading_time( $hide_readtime ) ): ?>
                                        <span class="bg-readtime"><?php penci_reading_time(); ?></span>
									<?php endif; ?>
                                </div>
                            </div>
						<?php } ?>

						<?php if ( $show_readmore && ! $hide_rm_small_flag ) { ?>
                            <div class="pcbg-readmore-sec item-hover">
                                <a href="<?php the_permalink(); ?>"
                                   class="pcbg-readmorebtn <?php echo 'pcreadmore-icon-' . $readmore_icon_pos; ?>">
                                    <span class="pcrm-text"><?php echo penci_get_setting( 'penci_trans_read_more' ); ?></span>
									<?php if ( $readmore_icon ):
										vc_icon_element_fonts_enqueue( 'fontawesome' );
										if ( $readmore_icon ) {
											$icon .= '<i class="penci-cup_iconn--i ' . $readmore_icon . '"></i>';
											echo $icon;
										}
									endif; ?>
                                </a>
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
