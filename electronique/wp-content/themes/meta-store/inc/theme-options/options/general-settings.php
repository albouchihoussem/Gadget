<?php
/** General Settings */
$wp_customize->add_section('meta_store_general_settings', array(
    'title' => esc_html__('General Settings', 'meta-store'),
    'priority' => 1
));

$wp_customize->add_setting('meta_store_website_layout', array(
    'default' => 'wide',
    'sanitize_callback' => 'meta_store_sanitize_choices',
));

$wp_customize->add_control('meta_store_website_layout', array(
    'section' => 'meta_store_general_settings',
    'type' => 'radio',
    'label' => esc_html__('Website Layout', 'meta-store'),
    'description' => sprintf( '%1$s %2$s', esc_html__( 'If boxed is selected, change background color/image', 'meta-store' ), '<a href="javascript:wp.customize.section( \'background_image\' ).focus()">' . esc_html__('here', 'meta-store') . '</a>'),
    'choices' => array(
        'wide' => esc_html__('Wide', 'meta-store'),
        'boxed' => esc_html__('Boxed', 'meta-store')
    )
));

$wp_customize->add_setting('meta_store_website_width', array(
    'sanitize_callback' => 'meta_store_sanitize_number_absint',
    'default' => 1170,
));

$wp_customize->add_control(new Meta_Store_Range_Slider($wp_customize, 'meta_store_website_width', array(
    'section' => 'meta_store_general_settings',
    'label' => esc_html__('Website Container Width', 'meta-store'),
    'input_attrs' => array(
        'min' => 900,
        'max' => 1800,
        'step' => 10
    )
)));

$wp_customize->add_setting('meta_store_sidebar_width', array(
    'sanitize_callback' => 'meta_store_sanitize_number_absint',
    'default' => 30,
));

$wp_customize->add_control(new Meta_Store_Range_Slider($wp_customize, 'meta_store_sidebar_width', array(
    'section' => 'meta_store_general_settings',
    'label' => esc_html__('Sidebar Width (%)', 'meta-store'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 50,
        'step' => 1
    )
)));

$wp_customize->add_setting('meta_store_scroll_animation_seperator', array(
    'sanitize_callback' => 'meta_store_sanitize_text'
));

$wp_customize->add_control(new Meta_Store_Separator($wp_customize, 'meta_store_scroll_animation_seperator', array(
    'section' => 'meta_store_general_settings'
)));

$wp_customize->add_setting('meta_store_show_title', array(
    'sanitize_callback' => 'meta_store_sanitize_checkbox',
    'default' => true
));

$wp_customize->add_setting('meta_store_enable_preloader', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Switch($wp_customize, 'meta_store_enable_preloader', array(
    'section' => 'meta_store_general_settings',
    'label' => esc_html__('Enable Preloader', 'meta-store'),
    'description' => esc_html__('Is a simple logo animations to keep visitors entertained while site is loading.', 'meta-store')
)));

$wp_customize->add_setting('meta_store_backtotop', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Switch($wp_customize, 'meta_store_backtotop', array(
    'section' => 'meta_store_general_settings',
    'label' => esc_html__('Back to Top Button', 'meta-store'),
    'description' => esc_html__('A button on click scrolls to the top of the page.', 'meta-store')
)));