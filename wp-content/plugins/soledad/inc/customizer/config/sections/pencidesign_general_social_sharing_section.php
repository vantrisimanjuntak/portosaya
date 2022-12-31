<?php
$options           = [];
$list_block_social = array(
	'plike'       => array( esc_html__( 'Hide Like Post', 'soledad' ), '' ),
	'facebook'    => array( esc_html__( 'Hide Facebook Share Button', 'soledad' ), '' ),
	'twitter'     => array( esc_html__( 'Hide Twitter Share Button', 'soledad' ), '' ),
	'pinterest'   => array( esc_html__( 'Hide Pinterest Share Button', 'soledad' ), '' ),
	'linkedin'    => array( esc_html__( 'Hide Linkedin Share Button', 'soledad' ), '' ),
	'tumblr'      => array( esc_html__( 'Hide Tumblr Share Button', 'soledad' ), '' ),
	/* 'messenger'        => array( esc_html__( 'Hide Share Messenger Button', 'soledad' ), '' ), */
	'vk'          => array( esc_html__( 'Hide VKontakte Share Button', 'soledad' ), '' ),
	'ok'          => array( esc_html__( 'Hide Odnoklassniki Share Button', 'soledad' ), '' ),
	'reddit'      => array( esc_html__( 'Hide Reddit Share Button', 'soledad' ), '' ),
	'stumbleupon' => array( esc_html__( 'Hide Stumbleupon Share Button', 'soledad' ), '' ),
	'whatsapp'    => array(
		esc_html__( 'Hide Whatsapp Share Button', 'soledad' ),
		esc_html__( 'Works for Mobile Only', 'soledad' )
	),
	'telegram'    => array(
		esc_html__( 'Hide Telegram Share Button', 'soledad' ),
		esc_html__( 'Works for Mobile Only', 'soledad' )
	),
	'line'        => array(
		esc_html__( 'Hide LINE Share Button', 'soledad' ),
		esc_html__( 'Works for Mobile Only', 'soledad' )
	),
	'pocket'      => array( esc_html__( 'Hide Pocket Share Button', 'soledad' ), '' ),
	'skype'       => array( esc_html__( 'Hide Skype Share Button', 'soledad' ), '' ),
	'viber'       => array(
		esc_html__( 'Hide Viber Share Button', 'soledad' ),
		esc_html__( 'Works for Mobile Only', 'soledad' )
	),
	'email'       => array( esc_html__( 'Hide Email Share Button', 'soledad' ), '' ),
);
foreach ( $list_block_social as $social_id => $social_label ) {
	$default = '';
	if ( in_array( $social_id, array(
		'messenger',
		'vk',
		'ok',
		'pocket',
		'skype',
		'viber',
		'linkedin',
		'tumblr',
		'reddit',
		'stumbleupon',
		'whatsapp',
		'telegram',
		'line'
	) ) ) {
		$default = 1;
	}
	$options[] = array(
		'label'       => $social_label[0],
		'description' => $social_label[1],
		'type'        => 'soledad-fw-toggle',
		'id'          => 'penci__hide_share_' . $social_id,
		'sanitize'    => 'penci_sanitize_checkbox_field',
		'default'     => $default
	);
}
$options[] = array(
	'label'       => 'Custom Sharing Text for Twitter',
	'description' => __( 'Custom prefix text on preview share of Twitter', 'soledad' ),
	'id'          => 'penci_post_twitter_share_text',
	'type'        => 'soledad-fw-textarea',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field'
);

return $options;
