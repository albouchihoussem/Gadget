<?php
/** Header Options Panel */
$wp_customize->add_panel('meta_store_header_settings', array(
    'title' => esc_html__('Header Settings', 'meta-store'),
    'description' => esc_html__('Configure header settings', 'meta-store'),
    'priority' => 10,
));

/** Title & Tagline */
$wp_customize->get_section('title_tagline')->panel = 'meta_store_header_settings';

$wp_customize->add_setting('meta_store_display_title', array(
    'default' => true,
    'transport' => 'postMessage',
    'sanitize_callback' => 'meta_store_sanitize_checkbox',
));

$wp_customize->add_control('meta_store_display_title', array(
    'label' => esc_html__('Display Site Title', 'meta-store'),
    'section' => 'title_tagline',
    'type' => 'checkbox'
));

$wp_customize->add_setting('meta_store_display_tagline', array(
    'default' => true,
    'transport' => 'postMessage',
    'sanitize_callback' => 'meta_store_sanitize_checkbox',
));

$wp_customize->add_control('meta_store_display_tagline', array(
    'label' => esc_html__('Display Site Tagline', 'meta-store'),
    'section' => 'title_tagline',
    'type' => 'checkbox'
));

$wp_customize->add_setting('meta_store_title_tagline_color', array(
    'default' => '#000000',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_title_tagline_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Site Title Tagline Color', 'meta-store')
)));

/** Top Header Options */
$wp_customize->add_section('meta_store_top_header_options', array(
    'title' => esc_html__('Top Header', 'meta-store'),
    'panel' => 'meta_store_header_settings',
));

$wp_customize->add_setting('meta_store_top_header_nav', array(
    'transport' => 'refresh',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Meta_Store_Tab($wp_customize, 'meta_store_top_header_nav', array(
    'type' => 'meta-store-tab',
    'section' => 'meta_store_top_header_options',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'meta-store'),
            'fields' => array(
                'meta_store_top_header_display',
                'meta_store_th_separator1',
                'meta_store_th_center_display',
                'meta_store_th_left_display',
                'meta_store_th_right_display',
                'meta_store_th_separator2',
                'meta_store_th_heading',
                'meta_store_th_social_link',
                'meta_store_th_menu',
                'meta_store_th_widget',
                'meta_store_th_text',
                'meta_store_th_ticker_title',
                'meta_store_th_ticker_category',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'meta-store'),
            'fields' => array(
                'meta_store_th_height',
                'meta_store_th_bg_color',
                'meta_store_th_bottom_border_color',
                'meta_store_th_text_color',
                'meta_store_th_anchor_color',
            ),
        ),
    ),
)));

$wp_customize->add_setting('meta_store_top_header_display', array(
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'default' => 'left-right'
));

$wp_customize->add_control('meta_store_top_header_display', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Top Header Display', 'meta-store'),
    'choices' => array(
        'none' => esc_html__('None', 'meta-store'),
        'center' => esc_html__('Center', 'meta-store'),
        'left' => esc_html__('Left', 'meta-store'),
        'right' => esc_html__('Right', 'meta-store'),
        'left-right' => esc_html__('Left & Right', 'meta-store'),
    )
));

$wp_customize->add_setting('meta_store_th_separator1', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Separator($wp_customize, 'meta_store_th_separator1', array(
    'section' => 'meta_store_top_header_options',
)));

$wp_customize->add_setting('meta_store_th_center_display', array(
    'default' => 'text',
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_th_center_display', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Center Header', 'meta-store'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'meta-store'),
        'widget' => esc_html__('Widget', 'meta-store'),
        'text' => esc_html__('HTML Text', 'meta-store'),
        'date' => esc_html__('Date', 'meta-store'),
        'menu' => esc_html__('Menu', 'meta-store')
    )
));

$wp_customize->add_setting('meta_store_th_left_display', array(
    'default' => 'date',
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_th_left_display', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Left Header', 'meta-store'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'meta-store'),
        'widget' => esc_html__('Widget', 'meta-store'),
        'text' => esc_html__('HTML Text', 'meta-store'),
        'date' => esc_html__('Date & Time', 'meta-store'),
        'menu' => esc_html__('Menu', 'meta-store')
    )
));

$wp_customize->add_setting('meta_store_th_right_display', array(
    'default' => 'social',
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_th_right_display', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Right Header', 'meta-store'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'meta-store'),
        'widget' => esc_html__('Widget', 'meta-store'),
        'text' => esc_html__('HTML Text', 'meta-store'),
        'date' => esc_html__('Date & Time', 'meta-store'),
        'menu' => esc_html__('Menu', 'meta-store')
    )
));

$wp_customize->add_setting('meta_store_th_separator2', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Separator($wp_customize, 'meta_store_th_separator2', array(
    'section' => 'meta_store_top_header_options',
)));

$wp_customize->add_setting('meta_store_th_heading', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Heading_Control($wp_customize, 'meta_store_th_heading', array(
    'section' => 'meta_store_top_header_options',
    'label' => esc_html__('Top Header Contents', 'meta-store')
)));

$wp_customize->add_setting('meta_store_th_menu', array(
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_th_menu', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Menu', 'meta-store'),
    'choices' => meta_store_get_menulist()
));

$wp_customize->add_setting('meta_store_th_widget', array(
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_th_widget', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Widget', 'meta-store'),
    'choices' => meta_store_widget_lists()
));

$wp_customize->add_setting('meta_store_th_text', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'default' => esc_html__('Welcome To Meta Store', 'meta-store'),
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Mini_Editor($wp_customize, 'meta_store_th_text', array(
    'section' => 'meta_store_top_header_options',
    'label' => esc_html__('Html Text', 'meta-store'),
    'include_admin_print_footer' => true
)));

$wp_customize->add_setting('meta_store_th_social_link', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Info($wp_customize, 'meta_store_th_social_link', array(
    'label' => esc_html__('Social Icons', 'meta-store'),
    'section' => 'meta_store_top_header_options',
    'description' => sprintf(esc_html__('Add your %s here', 'meta-store'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('meta_store_th_height', array(
    'sanitize_callback' => 'meta_store_sanitize_integer',
    'default' => 42,
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Range_Slider($wp_customize, 'meta_store_th_height', array(
    'section' => 'meta_store_top_header_options',
    'label' => esc_html__('Top Header Height', 'meta-store'),
    'input_attrs' => array(
        'min' => 5,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('meta_store_th_bg_color', array(
    'default' => '#FC596B',
    'sanitize_callback' => 'meta_store_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Alpha_Color_Picker($wp_customize, 'meta_store_th_bg_color', array(
    'label' => esc_html__('Top Header Background', 'meta-store'),
    'section' => 'meta_store_top_header_options',
    'palette' => array(
        '#FFFFFF',
        '#000000',
        '#f5245f',
        '#1267b3',
        '#feb600',
        '#00C569',
        'rgba( 255, 255, 255, 0.2 )',
        'rgba( 0, 0, 0, 0.2 )'
    )
)));

$wp_customize->add_setting('meta_store_th_bottom_border_color', array(
    'default' => '',
    'sanitize_callback' => 'meta_store_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Alpha_Color_Picker($wp_customize, 'meta_store_th_bottom_border_color', array(
    'label' => esc_html__('Top Header Bottom Border Color', 'meta-store'),
    'description' => esc_html__('Leave Empty to Hide Border', 'meta-store'),
    'section' => 'meta_store_top_header_options'
)));

$wp_customize->add_setting('meta_store_th_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_th_text_color', array(
    'section' => 'meta_store_top_header_options',
    'label' => esc_html__('Text Color', 'meta-store')
)));

$wp_customize->add_setting('meta_store_th_anchor_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_th_anchor_color', array(
    'section' => 'meta_store_top_header_options',
    'label' => esc_html__('Anchor(Link) Color', 'meta-store')
)));

/** Main Header Options */
$wp_customize->add_section('meta_store_main_header_options', array(
    'title' => esc_html__('Main Header', 'meta-store'),
    'panel' => 'meta_store_header_settings',
));

$wp_customize->add_setting('meta_store_main_header_nav', array(
    'transport' => 'refresh',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Meta_Store_Tab($wp_customize, 'meta_store_main_header_nav', array(
    'type' => 'meta-store-tab',
    'section' => 'meta_store_main_header_options',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'meta-store'),
            'fields' => array(
                'meta_store_contact_no',
                'meta_store_sticky_header',
                'meta_store_mh_layout',
                'meta_store_mh_show_category_search',
                'meta_store_mh_show_minicart',
                'meta_store_show_toggle_menu',
                'meta_store_mh_separator1',
                'meta_store_toggle_menu_label',
                'meta_store_toggle_menu',
                'meta_store_show_menu_on'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'meta-store'),
            'fields' => array(
                'meta_store_logo_height',
                'meta_store_logo_padding'
            ),
        ),
    ),
)));

$wp_customize->add_setting('meta_store_mh_layout', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'header-style1'
));

$wp_customize->add_control(new Meta_Store_Image_Chooser($wp_customize, 'meta_store_mh_layout', array(
    'section' => 'meta_store_main_header_options',
    'label' => esc_html__('Header Layout', 'meta-store'),
    'class' => 'ht-full-width',
    'options' => array(
        'header-style1' => META_STORE_OPT_DIR_URI_IMAGES . 'headers/header-1.jpg',
        'header-style2' => META_STORE_OPT_DIR_URI_IMAGES . 'headers/header-2.jpg',
        'header-style3' => META_STORE_OPT_DIR_URI_IMAGES . 'headers/header-3.jpg',
    )
)));

$wp_customize->add_setting('meta_store_contact_no', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'default' => esc_html__('+ 474 876543210', 'meta-store'),
));

$wp_customize->add_control('meta_store_contact_no', array(
    'section' => 'meta_store_main_header_options',
    'type' => 'text',
    'label' => esc_html__('Contact No.', 'meta-store'),
));

$wp_customize->add_setting('meta_store_mh_show_category_search', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));
$wp_customize->add_control(new Meta_Store_Switch($wp_customize, 'meta_store_mh_show_category_search', array(
    'section' => 'meta_store_main_header_options',
    'label' => esc_html__('Show Category Search', 'meta-store')
)));

$wp_customize->add_setting('meta_store_mh_show_minicart', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Switch($wp_customize, 'meta_store_mh_show_minicart', array(
    'section' => 'meta_store_main_header_options',
    'label' => esc_html__('Show Mini Cart', 'meta-store')
)));

$wp_customize->add_setting('meta_store_show_toggle_menu', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Switch($wp_customize, 'meta_store_show_toggle_menu', array(
    'section' => 'meta_store_main_header_options',
    'label' => esc_html__('Show Toggle Menu', 'meta-store')
)));

$wp_customize->add_setting('meta_store_mh_separator1', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Separator($wp_customize, 'meta_store_mh_separator1', array(
    'section' => 'meta_store_main_header_options',
)));

$wp_customize->add_setting('meta_store_toggle_menu_label', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'default' => esc_html__('Categories', 'meta-store'),
));

$wp_customize->add_control('meta_store_toggle_menu_label', array(
    'section' => 'meta_store_main_header_options',
    'type' => 'text',
    'label' => esc_html__('Toggle Menu Label', 'meta-store'),
));

$wp_customize->add_setting('meta_store_toggle_menu', array(
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_toggle_menu', array(
    'section' => 'meta_store_main_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Toggle Menu', 'meta-store'),
    'choices' => meta_store_get_menulist()
));

$wp_customize->add_setting('meta_store_show_menu_on', array(
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'default' => 'click',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_show_menu_on', array(
    'section' => 'meta_store_main_header_options',
    'type' => 'select',
    'label' => esc_html__('Show Toggle Menu Dropdown on', 'meta-store'),
    'choices' => array(
        'click' => esc_html__('Click', 'meta-store'),
        'hover' => esc_html__('Hover', 'meta-store'),
    )
));

$wp_customize->add_setting('meta_store_logo_height', array(
    'sanitize_callback' => 'meta_store_sanitize_number_absint',
    'default' => 60,
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Range_Slider($wp_customize, 'meta_store_logo_height', array(
    'section' => 'meta_store_main_header_options',
    'label' => esc_html__('Logo Height(px)', 'meta-store'),
    'description' => esc_html__('The logo height will not increase beyond the header height. Increase the header height first. Logo will appear blur if the image size is small.', 'meta-store'),
    'input_attrs' => array(
        'min' => 40,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->add_setting('meta_store_logo_padding', array(
    'sanitize_callback' => 'meta_store_sanitize_number_absint',
    'default' => 15,
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Range_Slider($wp_customize, 'meta_store_logo_padding', array(
    'section' => 'meta_store_main_header_options',
    'label' => esc_html__('Logo Top & Bottom Spacing(px)', 'meta-store'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1
    )
)));

/** Main Header Options */
$wp_customize->add_section('meta_store_page_banner_options', array(
    'title' => esc_html__('Page Banner', 'meta-store'),
    'panel' => 'meta_store_header_settings',
));

$wp_customize->add_setting('meta_store_banner_style', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'default' => 'banner-style1'
));

$wp_customize->add_control(new Meta_Store_Image_Chooser($wp_customize, 'meta_store_banner_style', array(
    'section' => 'meta_store_page_banner_options',
    'label' => esc_html__('Page Banner Style', 'meta-store'),
    'class' => 'ht-full-width',
    'description' => esc_html__('Applies to all the General Pages.', 'meta-store'),
    'options' => array(
        'banner-style1' => META_STORE_OPT_DIR_URI_IMAGES . 'page-banners/banner-style1.jpg',
        'banner-style2' => META_STORE_OPT_DIR_URI_IMAGES . 'page-banners/banner-style2.jpg',
    )
)));

$wp_customize->add_setting('meta_store_pg_header_bg_url', array(
    'sanitize_callback' => 'meta_store_sanitize_link',
    'transport' => 'refresh'
));

$wp_customize->add_setting('meta_store_pg_header_bg_id', array(
    'sanitize_callback' => 'meta_store_sanitize_integer',
    'transport' => 'refresh'
));

$wp_customize->add_setting('meta_store_pg_header_bg_repeat', array(
    'default' => 'no-repeat',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh'
));

$wp_customize->add_setting('meta_store_pg_header_bg_size', array(
    'default' => 'cover',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh'
));

$wp_customize->add_setting('meta_store_pg_header_bg_position', array(
    'default' => 'center-center',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh'
));

$wp_customize->add_setting('meta_store_pg_header_bg_attach', array(
    'default' => 'scroll',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh'
));

// Registers example_background control
$wp_customize->add_control(new Meta_Store_Background_Image($wp_customize, 'meta_store_pg_bgimage', array(
    'label' => esc_html__('Page Banner Image', 'meta-store'),
    'section' => 'meta_store_page_banner_options',
    'settings' => array(
        'image_url' => 'meta_store_pg_header_bg_url',
        'image_id' => 'meta_store_pg_header_bg_id',
        'repeat' => 'meta_store_pg_header_bg_repeat',
        'size' => 'meta_store_pg_header_bg_size',
        'position' => 'meta_store_pg_header_bg_position',
        'attach' => 'meta_store_pg_header_bg_attach'
    )
)));

$wp_customize->add_setting('meta_store_pg_overlay', array(
    'sanitize_callback' => 'meta_store_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Alpha_Color_Picker($wp_customize, 'meta_store_pg_overlay', array(
    'label' => esc_html__('Page Banner Overlay', 'meta-store'),
    'section' => 'meta_store_page_banner_options',
    'palette' => array(
        '#FFFFFF',
        '#000000',
        '#f5245f',
        '#1267b3',
        '#feb600',
        '#00C569',
        'rgba( 255, 255, 255, 0.2 )',
        'rgba( 0, 0, 0, 0.2 )'
    )
)));

$wp_customize->add_setting('meta_store_pg_bgcolor', array(
    'default' => '#FC596B',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_pg_bgcolor', array(
    'label' => esc_html__('Background Color', 'meta-store'),
    'section' => 'meta_store_page_banner_options',
    'settings' => 'meta_store_pg_bgcolor',
)));

$wp_customize->add_setting('meta_store_pg_titlecolor', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_pg_titlecolor', array(
    'label' => esc_html__('Page Title Color', 'meta-store'),
    'section' => 'meta_store_page_banner_options',
    'settings' => 'meta_store_pg_titlecolor',
)));

$wp_customize->add_setting('meta_store_page_banner_padding', array(
    'sanitize_callback' => 'meta_store_sanitize_number_absint',
    'default' => 40,
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Range_Slider($wp_customize, 'meta_store_page_banner_padding', array(
    'section' => 'meta_store_page_banner_options',
    'label' => esc_html__('Page Banner Padding (Top/Bottom)', 'meta-store'),
    'input_attrs' => array(
        'min' => 10,
        'max' => 250,
        'step' => 1
    )
)));

$wp_customize->add_setting('meta_store_breacrumb_heading', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Heading_Control($wp_customize, 'meta_store_breacrumb_heading', array(
    'section' => 'meta_store_page_banner_options',
    'label' => esc_html__('Customize Breadcrumb', 'meta-store')
)));

$wp_customize->add_setting('meta_store_breadcrumb', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Switch($wp_customize, 'meta_store_breadcrumb', array(
    'section' => 'meta_store_page_banner_options',
    'label' => esc_html__('BreadCrumb', 'meta-store'),
    'description' => esc_html__('Breadcrumbs are a great way of letting your visitors find out where they are on your site.', 'meta-store')
)));

$wp_customize->add_setting('meta_store_breadcrumb_textcolor', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_breadcrumb_textcolor', array(
    'label' => esc_html__('Breadcrumb Text Color', 'meta-store'),
    'section' => 'meta_store_page_banner_options',
)));

$wp_customize->add_setting('meta_store_breadcrumb_linkcolor', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_breadcrumb_linkcolor', array(
    'label' => esc_html__('Breadcrumb Link Color', 'meta-store'),
    'section' => 'meta_store_page_banner_options',
)));
