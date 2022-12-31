<?php
$options   = [];
$options[] = array(
	'label'    => 'Heading Text Color',
	'id'       => 'penci_featured_video_heading_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color'
);
$options[] = array(
	'label'    => 'Sub Heading Text Color',
	'id'       => 'penci_featured_video_sub_heading_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color'
);

return $options;
