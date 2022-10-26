<?php
$headline_uppercase = penci_get_builder_mod( 'penci_header_pb_news_ticker_disable_uppercase' );
$title_uppercase = penci_get_builder_mod( 'penci_header_pb_news_ticker_post_titles_uppercase' );
$title_classes   = $headline_class = ' penci-enable-uppercase';
if ( 'enable' == $title_uppercase ) {
	$title_classes = ' penci-disable-uppercase';
}
if ( 'enable' == $headline_uppercase ) {
	$headline_class = ' penci-disable-uppercase';
}
?>
<div class="penci-builder-element pctopbar-item penci-topbar-trending <?php echo penci_get_builder_mod( 'penci_header_pb_news_ticker_class' ); ?>">
	<?php if ( penci_get_builder_mod( 'penci_header_pb_news_ticker_text', 'Top Posts' ) ) {
		$toptext_style = penci_get_builder_mod( 'penci_header_pb_news_ticker_style', 'nticker-style-1' );
		?>
        <span class="headline-title <?php echo $toptext_style.$headline_class; ?>"><?php echo penci_get_builder_mod( 'penci_header_pb_news_ticker_text' ); ?></span>
	<?php } ?>
	<?php
	/**
	 * Display headline slider
	 */
	$number_posts = penci_get_builder_mod( 'penci_header_pb_news_ticker_total_posts', 10 );
	$topbar_sort  = penci_get_builder_mod( 'penci_header_pb_news_ticker_by' );
	$title_length = penci_get_builder_mod( 'penci_header_pb_news_ticker_post_titles', 8 );

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => $number_posts
	);

	if ( penci_get_builder_mod( 'penci_header_pb_news_ticker_cats' ) || penci_get_builder_mod( 'penci_header_pb_news_ticker_filter_by' ) == 'category' ) {
		$list_cat          = penci_get_builder_mod( 'penci_header_pb_news_ticker_cats' );
		$list_cat_trim     = str_replace( ' ', '', $list_cat );
		$list_cats         = explode( ',', $list_cat_trim );
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $list_cat
			),
		);
	} elseif ( penci_get_builder_mod( 'penci_header_pb_news_ticker_tags' ) && penci_get_builder_mod( 'penci_header_pb_news_ticker_filter_by' ) == 'tags' ) {
		$list_tag          = penci_get_builder_mod( 'penci_header_pb_news_ticker_tags' );
		$list_tag_trim     = str_replace( ' ', '', $list_tag );
		$list_tags         = explode( ',', $list_tag_trim );
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'slug',
				'terms'    => $list_tags
			),
		);
	}

	if ( $topbar_sort == 'all' ) {
		$args['meta_key'] = penci_get_postviews_key();
		$args['orderby']  = 'meta_value_num';
		$args['order']    = 'DESC';
	} elseif ( $topbar_sort == 'week' ) {
		$args['meta_key'] = 'penci_post_week_views_count';
		$args['orderby']  = 'meta_value_num';
		$args['order']    = 'DESC';
	} elseif ( $topbar_sort == 'month' ) {
		$args['meta_key'] = 'penci_post_month_views_count';
		$args['orderby']  = 'meta_value_num';
		$args['order']    = 'DESC';
	}

	$news = new WP_Query( $args );
	if ( $news->have_posts() ):
		$auto_play = 'true';
		if ( 'enable' == penci_get_builder_mod( 'penci_header_pb_news_ticker_disable_autoplay' ) ): $auto_play = 'false'; endif;
		$auto_time  = penci_get_builder_mod( 'penci_header_pb_news_ticker_autoplay_timeout' );
		$auto_speed = penci_get_builder_mod( 'penci_header_pb_news_ticker_autoplay_speed' );
		$auto_time  = ( is_numeric( $auto_time ) && $auto_time > 0 ) ? $auto_time : '3000';
		$auto_speed = ( is_numeric( $auto_speed ) && $auto_speed > 0 ) ? $auto_speed : '200';
		$animation  = penci_get_builder_mod( 'penci_header_pb_news_ticker_animation', 'slideInUp' );
		?>
        <span class="penci-trending-nav">
			<a class="penci-slider-prev" href="#"><?php penci_fawesome_icon( 'fas fa-angle-left' ); ?></a>
			<a class="penci-slider-next" href="#"><?php penci_fawesome_icon( 'fas fa-angle-right' ); ?></a>
		</span>
        <div class="penci-owl-carousel penci-owl-carousel-slider penci-headline-posts"
             data-auto="<?php echo $auto_play; ?>" data-nav="false" data-autotime="<?php echo $auto_time; ?>"
             data-speed="<?php echo $auto_speed; ?>" data-anim="<?php echo $animation; ?>">
			<?php while ( $news->have_posts() ): $news->the_post();
				$title_full = get_the_title();
				?>
                <div>
                    <a class="penci-topbar-post-title <?php echo esc_attr($title_classes);?>"
                       href="<?php the_permalink(); ?>"><?php echo sanitize_text_field( wp_trim_words( get_the_title(), $title_length, '...' ) ); ?></a>
                </div>
			<?php endwhile;
			wp_reset_postdata(); ?>
        </div>
	<?php endif; /* End check if no posts */ ?>
</div>
