<?php
/**
 * Register customizer panels, sections, settings, and controls.
 *
 * @since  1.0.0
 * @access public
 * @param  object  $wp_customize
 * @return void
 */
# Register our customizer panels, sections, settings, and controls.
require get_template_directory() . '/inc/typography/google-fonts-list.php';

add_action('customize_register', 'meta_store_typography_customize_register', 15);

function meta_store_typography_customize_register($wp_customize) {

    require get_template_directory() . '/inc/typography/customizer-typography-control-class.php';

    // Register typography control JS template.
    $wp_customize->register_control_type('Meta_Store_Typography_Control');

    // Add the typography panel.
    $wp_customize->add_panel('meta_store_typography', array(
        'priority' => 3,
        'title' => esc_html__('Typography Settings', 'meta-store')
    ));

    // Add the body typography section.
    $wp_customize->add_section('meta_store_body_typography', array(
        'panel' => 'meta_store_typography',
        'title' => esc_html__('Body', 'meta-store')
    ));

    $wp_customize->add_setting('meta_store_body_font_family', array(
        'default' => 'Varela Round',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_body_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_body_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_body_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_body_font_size', array(
        'default' => '16',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_body_line_height', array(
        'default' => '1.6',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_body_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_body_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Meta_Store_Typography_Control($wp_customize, 'meta_store_body_typography', array(
        'label' => esc_html__('Body Typography', 'meta-store'),
        'section' => 'meta_store_body_typography',
        'settings' => array(
            'family' => 'meta_store_body_font_family',
            'style' => 'meta_store_body_font_style',
            'text_decoration' => 'meta_store_body_text_decoration',
            'text_transform' => 'meta_store_body_text_transform',
            'size' => 'meta_store_body_font_size',
            'line_height' => 'meta_store_body_line_height',
            'letter_spacing' => 'meta_store_body_letter_spacing',
            'typocolor' => 'meta_store_body_color'
        ),
        'input_attrs' => array(
            'min' => 10,
            'max' => 40,
            'step' => 1
        )
    )));

    // Add H1 typography section.
    $wp_customize->add_section('meta_store_header_typography', array(
        'panel' => 'meta_store_typography',
        'title' => esc_html__('Headers(H1, H2, H3, H4, H5, H6)', 'meta-store')
    ));

    $wp_customize->add_setting('meta_store_common_header_typography', array(
        'sanitize_callback' => 'meta_store_sanitize_text',
        'default' => true
    ));

    // Add H typography section.
    $wp_customize->add_setting('meta_store_h_font_family', array(
        'default' => 'Cardo',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_h_font_style', array(
        'default' => '700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_h_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_h_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_h_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_h_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_h_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Meta_Store_Typography_Control($wp_customize, 'meta_store_h_typography', array(
        'label' => esc_html__('Header Typography', 'meta-store'),
        'section' => 'meta_store_header_typography',
        'settings' => array(
            'family' => 'meta_store_h_font_family',
            'style' => 'meta_store_h_font_style',
            'text_decoration' => 'meta_store_h_text_decoration',
            'text_transform' => 'meta_store_h_text_transform',
            'line_height' => 'meta_store_h_line_height',
            'letter_spacing' => 'meta_store_h_letter_spacing',
            'typocolor' => 'meta_store_h_color'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add the Menu typography section.
    $wp_customize->add_section('meta_store_menu_typography', array(
        'panel' => 'meta_store_typography',
        'title' => esc_html__('Menu', 'meta-store')
    ));

    $wp_customize->add_setting('meta_store_menu_font_family', array(
        'default' => 'Varela Round',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_menu_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_menu_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_menu_text_transform', array(
        'default' => 'uppercase',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_menu_font_size', array(
        'default' => '14',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_menu_line_height', array(
        'default' => '2',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('meta_store_menu_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Meta_Store_Typography_Control($wp_customize, 'meta_store_menu_typography', array(
        'label' => esc_html__('Menu Typography', 'meta-store'),
        'section' => 'meta_store_menu_typography',
        'settings' => array(
            'family' => 'meta_store_menu_font_family',
            'style' => 'meta_store_menu_font_style',
            'text_decoration' => 'meta_store_menu_text_decoration',
            'text_transform' => 'meta_store_menu_text_transform',
            'size' => 'meta_store_menu_font_size',
            'line_height' => 'meta_store_menu_line_height',
            'letter_spacing' => 'meta_store_menu_letter_spacing',
        ),
        'input_attrs' => array(
            'min' => 10,
            'max' => 40,
            'step' => 1
        )
    )));
}

/**
 * Register control scripts/styles.
 *
 */
add_action('customize_controls_enqueue_scripts', 'meta_store_typography_customizer_script');

function meta_store_typography_customizer_script() {
    wp_enqueue_script('meta-store-customize-controls', get_template_directory_uri() . '/inc/typography/js/customize-controls.js', array('jquery'), META_STORE_VERSION, true);
    wp_enqueue_style('meta-store-customize-controls', get_template_directory_uri() . '/inc/typography/css/customize-controls.css', array(), META_STORE_VERSION);
}

/**
 * Load preview scripts/styles.
 *
 */
add_action('customize_preview_init', 'meta_store_typography_customize_preview_script');

function meta_store_typography_customize_preview_script() {
    wp_enqueue_script('webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', array('jquery'), META_STORE_VERSION, false);
    wp_enqueue_script('meta-store-customize-preview', get_template_directory_uri() . '/inc/typography/js/customize-previews.js', array('jquery', 'customize-preview', 'webfont'), META_STORE_VERSION, false);
}

function meta_store_get_google_font_variants() {

    $font_list = array_merge(meta_store_standard_font_array(), meta_store_google_font_array());

    $font_family = isset( $_REQUEST['font_family'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['font_family'] ) ) : '';
    $font_array = meta_store_search_key($font_list, 'family', $font_family);

    $variants_array = $font_array['0']['variants'];
    $options_array = "";
    foreach ($variants_array as $key => $variants) {
        $selected = $key == '400' ? 'selected="selected"' : '';
        $options_array .= '<option ' . esc_attr($selected) . ' value="' . esc_attr($key) . '">' . esc_html($variants) . '</option>';
    }

    if (!empty($options_array)) {
        echo $options_array;
    } else {
        echo $options_array = '';
    }
    die();
}

add_action("wp_ajax_get_google_font_variants", "meta_store_get_google_font_variants");

function meta_store_search_key($array, $key, $value) {
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }
        foreach ($array as $subarray) {
            $results = array_merge($results, meta_store_search_key($subarray, $key, $value));
        }
    }
    return $results;
}
