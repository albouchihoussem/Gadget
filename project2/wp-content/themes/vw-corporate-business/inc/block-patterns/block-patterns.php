<?php
/**
 * VW Corporate Business: Block Patterns
 *
 * @package VW Corporate Business
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-corporate-business',
		array( 'label' => __( 'VW Corporate Business', 'vw-corporate-business' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-corporate-business/slider-section',
		array(
			'title'      => __( 'Banner Section', 'vw-corporate-business' ),
			'categories' => array( 'vw-corporate-business' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider.png\",\"id\":2700,\"align\":\"full\",\"className\":\"sliderbox\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim sliderbox\" style=\"background-image:url(" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider.png)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"full\",\"className\":\"mx-0\"} -->\n<div class=\"wp-block-columns alignfull mx-0\"><!-- wp:column {\"width\":\"25%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"50%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:50%\"><!-- wp:group {\"className\":\"sliderbox-content\"} -->\n<div class=\"wp-block-group sliderbox-content\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"style\":{\"typography\":{\"fontSize\":30}}} -->\n<h1 class=\"has-text-align-center\" style=\"font-size:30px\"><strong>LOREM IPSUM IS SIMPLY DUMMY</strong></h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"typography\":{\"fontSize\":14}}} -->\n<p class=\"has-text-align-center text-center\" style=\"font-size:14px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":0,\"style\":{\"color\":{\"background\":\"#7fbe4b\"}},\"textColor\":\"white\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-white-color has-text-color has-background no-border-radius\" style=\"background-color:#7fbe4b\"><strong>GET STARTED</strong></a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"25%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-corporate-business/about-section',
		array(
			'title'      => __( 'About Section', 'vw-corporate-business' ),
			'categories' => array( 'vw-corporate-business' ),
			'content'    => "<!-- wp:columns {\"align\":\"wide\",\"className\":\"about-box mt-5 mx-md-5 mx-0\"} -->\n<div class=\"wp-block-columns alignwide about-box mt-5 mx-md-5 mx-0\"><!-- wp:column {\"className\":\"about-content pr-md-4\"} -->\n<div class=\"wp-block-column about-content pr-md-4\"><!-- wp:heading {\"textAlign\":\"left\",\"style\":{\"color\":{\"text\":\"#7fbe4b\"},\"typography\":{\"fontSize\":28}}} -->\n<h2 class=\"has-text-align-left has-text-color\" style=\"color:#7fbe4b;font-size:28px\"><strong>ABOUT US</strong></h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"className\":\"text-left\",\"style\":{\"color\":{\"text\":\"#999999\"},\"typography\":{\"fontSize\":14}}} -->\n<p class=\"text-left has-text-color\" style=\"color:#999999;font-size:14px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":0,\"style\":{\"color\":{\"background\":\"#7fbe4b\"}},\"textColor\":\"white\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-white-color has-text-color has-background no-border-radius\" style=\"background-color:#7fbe4b\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":2784,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"aboutbox-img\"} -->\n<figure class=\"wp-block-image size-large aboutbox-img\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/about.png\" alt=\"\" class=\"wp-image-2784\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);
}