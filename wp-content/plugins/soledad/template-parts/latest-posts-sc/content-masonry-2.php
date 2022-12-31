<?php
/**
 * Template loop for masonry 2 columns style
 */
if ( ! isset ( $n ) ) { $n = 1; } else { $n = $n; }
?>
<article id="post-<?php the_ID(); ?>" class="item item-masonry grid-masonry grid-masonry-2 hentry<?php if( 'yes' == $grid_meta_overlay ): echo ' grid-overlay-meta'; endif; ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="thumbnail">
			<?php
			/* Display Review Piechart  */
			if( function_exists('penci_display_piechart_review_html') ) {
				penci_display_piechart_review_html( get_the_ID() );
			}
			?>
			<a href="<?php penci_permalink_fix() ?>" class="post-thumbnail<?php echo penci_class_lightbox_enable(); ?>">
				<?php
				$src_full = penci_get_featured_image_size( get_the_ID(), 'full' );
				$src_check = substr( $src_full, -4 );
				if( $src_check == '.gif' ) {
					echo penci_get_featured_image_padding_markup( get_the_ID(), 'full' );
					the_post_thumbnail( 'full' );
				} else {
					echo penci_get_featured_image_padding_markup( get_the_ID(), 'penci-masonry-thumb' );
					the_post_thumbnail( 'penci-masonry-thumb' );
				}
				?>
			</a>
			<?php if( 'yes' != $grid_icon_format ): ?>
				<?php if ( has_post_format( 'video' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php penci_fawesome_icon('fas fa-play'); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'gallery' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php penci_fawesome_icon('far fa-image'); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'audio' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php penci_fawesome_icon('fas fa-music'); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'link' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php penci_fawesome_icon('fas fa-link'); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'quote' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php penci_fawesome_icon('fas fa-quote-left'); ?></a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="grid-header-box">
		<?php if ( 'yes' != $grid_cat ) : ?>
			<span class="cat"><?php penci_category( '' ); ?></span>
		<?php endif; ?>
		<h2 class="penci-entry-title entry-title grid-title"><a href="<?php the_permalink(); ?>"><?php penci_trim_post_title( get_the_ID(), $grid_title_length ); ?></a></h2>
		<?php penci_soledad_meta_schema(); ?>
		<?php if ( 'yes' != $grid_date || 'yes' != $grid_author || 'yes' == $grid_viewscount || 'yes' == $grid_comment_other || penci_isshow_reading_time( $grid_readtime ) ) : ?>
			<div class="grid-post-box-meta">
				<?php if ( 'yes' != $grid_author ) : ?>
					<span class="otherl-date-author author-italic author vcard"><?php echo penci_get_setting('penci_trans_by'); ?> <a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
				<?php endif; ?>
				<?php if ( 'yes' != $grid_date ) : ?>
					<span class="otherl-date"><?php penci_soledad_time_link(); ?></span>
				<?php endif; ?>
				<?php if ( 'yes' == $grid_comment_other ) : ?>
					<span class="otherl-comment"><a href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 '. penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a></span>
				<?php endif; ?>
				<?php
				if ( 'yes' == $grid_viewscount ) {
					echo '<span>';
					echo penci_get_post_views( get_the_ID() );
					echo ' ' . penci_get_setting( 'penci_trans_countviews' );
					echo '</span>';
				}
				?>
				<?php if( penci_isshow_reading_time( $grid_readtime ) ): ?>
					<span class="otherl-readtime"><?php penci_reading_time(); ?></span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>

	<?php if( get_the_excerpt() && 'yes' != $grid_remove_excerpt ): ?>
		<div class="item-content entry-content">
			<?php penci_the_excerpt( $grid_excerpt_length ); ?>
		</div>
	<?php endif; ?>

	<?php if( 'yes' == $grid_add_readmore ):
	$class_button = '';
	if( 'yes' == $grid_remove_arrow ): $class_button .= ' penci-btn-remove-arrow'; endif;
	if( 'yes' == $grid_readmore_button ): $class_button .= ' penci-btn-make-button'; endif;
	if( $grid_readmore_align ): $class_button .= ' penci-btn-align-' . $grid_readmore_align; endif;
	?>
		<div class="penci-readmore-btn<?php echo $class_button; ?>">
			<a class="penci-btn-readmore" href="<?php the_permalink(); ?>"><?php echo penci_get_setting( 'penci_trans_read_more' ); ?><?php penci_fawesome_icon('fas fa-angle-double-right'); ?></a>
		</div>
	<?php endif; ?>

	<?php if ( 'yes' != $grid_share_box ) : ?>
		<div class="penci-post-box-meta penci-post-box-grid">
			<div class="penci-post-share-box">
				<?php echo penci_getPostLikeLink( get_the_ID() ); ?>
				<?php penci_soledad_social_share( );  ?>
			</div>
		</div>
	<?php endif; ?>
</article>
<?php 
if( isset( $infeed_ads ) && $infeed_ads ){
	penci_get_markup_infeed_ad(
		array(
			'wrapper' => 'article',
			'classes'      => 'item item-masonry grid-masonry grid-masonry-2 penci-infeed-data penci-infeed-vcele',
			'fullwidth'	 => $infeed_full,
			'order_ad'   => $infeed_num,
			'order_post' => $n,
			'code'       => $infeed_ads,
			'echo'       => true
		)
	); 
}
?>
<?php $n++; ?>