<?php
/**
 * Template loop for 1st standard then boxed 1
 */


/**
 * Create var $jj to count order posts
 * If $jj = 1, to show standard post, $jj > 1 to show grid post
 *
 * @since 1.0
 */
if ( ! isset ( $jj ) ) { $jj = 1; } else { $jj = $jj; }

if ( $jj == 1 ) {
	//get_template_part( 'content', 'standard' );
	include( locate_template( 'content-standard.php' ) );
}
else {
	include( locate_template( 'content-boxed-1.php' ) );
}

$jj++;
?>

