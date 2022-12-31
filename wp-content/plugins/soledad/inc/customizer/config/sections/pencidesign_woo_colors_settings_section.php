<?php
$options   = [];
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Side Cart Style', 'soledad' ),
	'id'       => 'penci_woo_section_sidebarcart_color',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_heading_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Heading Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_heading_txt_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Heading Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_product_title_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Title Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_product_title_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Title Hover Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_border_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Border Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_price_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Price Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_pitem_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_pitem_bg_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Hover Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_pitem_bg_text_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Hover Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_accent_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Accent Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_heading_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Heading Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_btn_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Button Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_btn_text_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Button Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_btn_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Button Background Hover Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_btn_text_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Button Text Hover Color',
);
$options[] = array(
	'id'       => 'penci_woo_sidecart_footer_bgcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Footer Background Color',
);
/* Product Item*/
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Product Item Style', 'soledad' ),
	'id'       => 'penci_woo_section_product_color_loop',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Title',
	'id'       => 'penci_woo_product_loop_title_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Price Color',
	'id'       => 'penci_woo_product_loop_price_color',
);
$options[] = array(
	'id'       => 'penci_woo_product_loop_cat_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Cat Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_loop_cat_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Cat Hover Color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Button Group Background Color',
	'id'       => 'penci_woo_product_loop_button_groups_bgcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Button Color',
	'id'       => 'penci_woo_product_loop_button_color',
);
$options[] = array(
	'id'       => 'penci_woo_product_loop_button_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Button Hover Color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Button Background Color',
	'id'       => 'penci_woo_product_loop_button_bg_color',
);
$options[] = array(
	'id'       => 'penci_woo_product_loop_button_bg_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Button Background Hover Color',
);
$options[] = array(
	'id'          => 'penci_woo_product_overlay_bg_color',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Overlay Background Color',
	'description' => 'Apply to Product Item style 5 & style 7',
);
$options[] = array(
	'default'     => '0.5',
	'sanitize'    => 'absint',
	'label'       => 'Product Item Overlay Opacity',
	'description' => 'Apply to Product Item style 5 & style 7',
	'id'          => 'penci_woo_product_overlay_bg_opacity',
	'type'        => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_woo_product_overlay_bg_opacity',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '0.5',
		),
	),
);
$options[] = array(
	'id'          => 'penci_woo_product_overlay_title_color',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Overlay Title Color',
	'description' => 'Apply to Product Item style 5 & style 7',
);
$options[] = array(
	'id'          => 'penci_woo_product_overlay_link_color',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Overlay Link Color',
	'description' => 'Apply to Product Item style 5 & style 7',
);
$options[] = array(
	'id'          => 'penci_woo_product_overlay_link_hover_color',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Overlay Link Hover Color',
	'description' => 'Apply to Product Item style 5 & style 7',
);
$options[] = array(
	'id'          => 'penci_woo_product_overlay_button_color',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Overlay Button Color',
	'description' => 'Apply to Product Item style 5 & style 7',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style6_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 6 Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style6_text_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 6 Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style6_title_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 6 Title Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style6_link_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 6 Link Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style6_link_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 6 Link Hover Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style6_price_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 6 Price Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style3_atc_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 3 Add To Cart Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style3_atc_bg_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 3 Add To Cart Hover Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style3_atc_text_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 3 Add To Cart Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style3_atc_text_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 3 Add To Cart Hover Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style5_atc_text_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 5 Add To Cart Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style5_atc_hv_text_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 5 Add To Cart Hover Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style5_atc_border_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 5 Add To Cart Border Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style5_atc_hv_border_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 5 Add To Cart Hover Border Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style5_atc_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 5 Add To Cart Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style5_atc_hv_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 5 Add To Cart Hover Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style4_atc_txt_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 4 Add To Cart Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style4_atc_hv_txt_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 4 Add To Cart Hover Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style4_atc_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 4 Add To Cart Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_product_item_style4_atc_hv_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Style 4 Add To Cart Hover Background Color',
);
/* Product Category Loop */
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Product Stock Progress Style', 'soledad' ),
	'id'       => 'penci_woo_product_loop_progress_section',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Progress Background Color',
	'id'       => 'penci_woo_product_loop_progress_bg_color',
);
$options[] = array(
	'id'          => 'penci_woo_product_loop_progress_height',
	'default'     => '',
	'sanitize'    => 'absint',
	'label'       => 'Custom Progress Bar Height',
	'description' => 'Set a custom height of the progress bar.',
	'type'        => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_woo_product_loop_progress_height',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Item Progress Active Background Color',
	'id'       => 'penci_woo_product_loop_progress_active_bg_color',
);
/* Product Category Loop */
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Product Category Loop Style', 'soledad' ),
	'id'       => 'penci_woo_section_product_cat_loop_color',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'id'       => 'penci_woo_section_product_cat_loop_title_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Category Color',
);
$options[] = array(
	'id'       => 'penci_woo_section_product_cat_loop_meta_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Meta Color',
);
$options[] = array(
	'id'       => 'penci_woo_section_product_cat_loop_overlay_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Overlay Color',
);
/* Cross Sell & Related Products */
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Product Item Style (Apply for Related & Upsell Products)', 'soledad' ),
	'id'       => 'penci_woo_section_product_related_upsell_color',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'label'       => 'Product Item Title',
	'type'        => 'soledad-fw-color',
	'description' => 'Apply for Upsell & Relate Products on Single Product Page',
	'id'          => 'penci_woo_product_loop_title_color_reup',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'label'       => 'Product Item Price Color',
	'type'        => 'soledad-fw-color',
	'description' => 'Apply for Upsell & Relate Products on Single Product Page',
	'id'          => 'penci_woo_product_loop_price_color_reup',
);
$options[] = array(
	'id'          => 'penci_woo_product_loop_cat_color_reup',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Cat Color',
	'description' => 'Apply for Upsell & Relate Products on Single Product Page',
);
$options[] = array(
	'id'          => 'penci_woo_product_loop_cat_hover_color_reup',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Cat Hover Color',
	'description' => 'Apply for Upsell & Relate Products on Single Product Page',
);
/* Cross Sell Products */
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Product Item Style (Apply for Crossell Products)', 'soledad' ),
	'id'       => 'penci_woo_section_product_crossell_color',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Title',
	'description' => 'Apply for Crossell Products on Cart Page',
	'id'          => 'penci_woo_product_loop_title_color_cross',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Price Color',
	'description' => 'Apply for Crossell Products on Cart Page',
	'id'          => 'penci_woo_product_loop_price_color_cross',
);
$options[] = array(
	'id'          => 'penci_woo_product_loop_cat_color_cross',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Cat Color',
	'description' => 'Apply for Crossell Products on Cart Page',
);
$options[] = array(
	'id'          => 'penci_woo_product_loop_cat_hover_color_cross',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => 'Product Item Cat Hover Color',
	'description' => 'Apply for Crossell Products on Cart Page',
);
/* Product Page */
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Product Page', 'soledad' ),
	'id'       => 'penci_woo_section_product_page_color',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Page General Text Color',
	'id'       => 'penci_product_page_general_text_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Page Links Color',
	'id'       => 'penci_product_page_general_link_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Page Links Hover Color',
	'id'       => 'penci_product_page_general_link_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Page General Border Color',
	'id'       => 'penci_product_page_general_border_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Swatches Button Border Color',
	'id'       => 'penci_product_page_button_swatches_border_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Swatches Button Border Hover Color',
	'id'       => 'penci_product_page_button_swatches_border_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Swatches Button Background Color',
	'id'       => 'penci_product_page_button_swatches_bg_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Swatches Button Background Hover Color',
	'id'       => 'penci_product_page_button_swatches_bg_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Add To Cart Background Color',
	'id'       => 'penci_product_page_button_atc_bg_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Add To Cart Background Hover Color',
	'id'       => 'penci_product_page_button_atc_bg_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Meta Color',
	'id'       => 'penci_product_page_meta_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Meta Link Color',
	'id'       => 'penci_product_page_meta_link_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Meta Link Hover Color',
	'id'       => 'penci_product_page_meta_link_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Tab Title Color',
	'id'       => 'penci_product_page_tab_title_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Product Tab Title Active Color',
	'id'       => 'penci_product_page_tab_title_active_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'WooCommerce Additional Pages', 'soledad' ),
	'id'       => 'penci_woo_section_woo_page',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Title Color',
	'id'       => 'penci_woo_page_title_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Button Background Color',
	'id'       => 'penci_woo_page_button_bg_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Button Background HoverColor',
	'id'       => 'penci_woo_page_button_bg_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Secondary Button Background Color',
	'id'       => 'penci_woo_page_button_alt_bg_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Secondary Button Background Color',
	'id'       => 'penci_woo_page_button_alt_bg_hover_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Loading Icon', 'soledad' ),
	'id'       => 'penci_woo_loading_ic_heading',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Circle Loading First Color',
	'id'       => 'penci_woo_loading_cl1',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Circle Loading Second Color',
	'id'       => 'penci_woo_loading_cl2',
);
// checkout pages
$options[] = array(
	'default' => '',
	'type'    => 'soledad-fw-header',
	'label'   => 'Checkout Page Color',
	'id'      => 'penci_woo_checkout_head',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_breadcrumb_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Breadcrumb Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_breadcrumb_active_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Breadcrumb Active Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_form_label_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Label Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_form_border_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Form Input Border Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_form_border_focus_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Form Input Focus Border Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_form_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Form Input Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_form_bg_focus_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Form Input Focus Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_order_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Order Form Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_order_table_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Order Form Table Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_order_table_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Order Form Table Text Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_order_head_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Order Form Table Head Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_order_accent_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Order Form Table Accent Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_order_table_border_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Order Form Table Border Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_btn_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Button Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_btn_txt_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Button Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_btn_hover_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Button Hover Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_btn_hover_txt_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Button Hover Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_review_order_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Review Order Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_before_content',
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => 'Custom Content Before Checkout Form',
	'type'     => 'soledad-fw-textarea',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_after_content',
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => 'Custom Content After Checkout Form',
	'type'     => 'soledad-fw-textarea',
);
/* Notice Color*/
$options[] = array(
	'default' => '',
	'type'    => 'soledad-fw-header',
	'label'   => 'Notices Color',
	'id'      => 'penci_header_notice_color_head',
);
$options[] = array(
	'id'        => 'penci_woo_notice_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Notice Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_notice_txt_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Notice Text Color',
);

return $options;
