<?php
/**
 * VW Corporate Business Theme Customizer
 *
 * @package VW Corporate Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_corporate_business_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_corporate_business_custom_controls' );

function vw_corporate_business_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'blogname', array( 
        'selector' => '.logo .site-title a', 
        'render_callback' => 'vw_corporate_business_customize_partial_blogname', 
    )); 

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
        'selector' => 'p.site-description', 
        'render_callback' => 'vw_corporate_business_customize_partial_blogdescription', 
    ));

    //add home page setting pannel
	$VWCorporateBusinessParentPanel = new VW_Corporate_Business_WP_Customize_Panel( $wp_customize, 'vw_corporate_business_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-corporate-business' ),
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_corporate_business_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-corporate-business' ),
		'priority'   => 30,
		'panel' => 'vw_corporate_business_panel_id'
	) );

	$wp_customize->add_setting('vw_corporate_business_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Corporate_Business_Image_Radio_Control($wp_customize, 'vw_corporate_business_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-corporate-business'),
        'description' => __('Here you can change the width layout of Website.','vw-corporate-business'),
        'section' => 'vw_corporate_business_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_corporate_business_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_corporate_business_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-corporate-business'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-corporate-business'),
        'section' => 'vw_corporate_business_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-corporate-business'),
            'Right Sidebar' => __('Right Sidebar','vw-corporate-business'),
            'One Column' => __('One Column','vw-corporate-business'),
            'Three Columns' => __('Three Columns','vw-corporate-business'),
            'Four Columns' => __('Four Columns','vw-corporate-business'),
            'Grid Layout' => __('Grid Layout','vw-corporate-business')
        ),
	));

	$wp_customize->add_setting('vw_corporate_business_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control('vw_corporate_business_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-corporate-business'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-corporate-business'),
        'section' => 'vw_corporate_business_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-corporate-business'),
            'Right Sidebar' => __('Right Sidebar','vw-corporate-business'),
            'One Column' => __('One Column','vw-corporate-business')
        ),
	) );

	//Pre-Loader
	$wp_customize->add_setting( 'vw_corporate_business_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-corporate-business' ),
        'section' => 'vw_corporate_business_left_right'
    )));

	$wp_customize->add_setting('vw_corporate_business_loader_icon',array(
        'default' => 'Two Way',
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control('vw_corporate_business_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-corporate-business'),
        'section' => 'vw_corporate_business_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-corporate-business'),
            'Dots' => __('Dots','vw-corporate-business'),
            'Rotate' => __('Rotate','vw-corporate-business')
        ),
	) );
    
	//Topbar section
	$wp_customize->add_section('vw_corporate_business_topbar',array(
		'title'	=> __('Topbar Section','vw-corporate-business'),
		'description'	=> __('Add TopBar Content here','vw-corporate-business'),
		'priority'	=> null,
		'panel' => 'vw_corporate_business_panel_id',
	));

	$wp_customize->add_setting( 'vw_corporate_business_topbar_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-corporate-business' ),
      'section' => 'vw_corporate_business_topbar'
    )));

    $wp_customize->add_setting('vw_corporate_business_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_corporate_business_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-corporate-business' ),
        'section' => 'vw_corporate_business_topbar'
    )));

    $wp_customize->add_setting('vw_corporate_business_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_topbar',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_corporate_business_search_hide_show',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_search_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Search','vw-corporate-business' ),
      'section' => 'vw_corporate_business_topbar'
    )));

    $wp_customize->add_setting('vw_corporate_business_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_search_font_size',array(
		'label'	=> __('Search Font Size','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_topbar',
		'type'=> 'text'
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_corporate_business_location', array( 
        'selector' => '.top-bar span', 
        'render_callback' => 'vw_corporate_business_customize_partial_vw_corporate_business_location', 
    ));

    $wp_customize->add_setting('vw_corporate_business_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Corporate_Business_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_corporate_business_location_icon',array(
		'label'	=> __('Add Location Icon','vw-corporate-business'),
		'transport' => 'refresh',
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_corporate_business_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_corporate_business_location',array(
		'label'	=> __('Add Location Address','vw-corporate-business'),
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_location',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Corporate_Business_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_corporate_business_phone_icon',array(
		'label'	=> __('Add Phone Number Icon','vw-corporate-business'),
		'transport' => 'refresh',
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_corporate_business_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'vw_corporate_business_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_corporate_business_call',array(
		'label'	=> __('Add Call Number','vw-corporate-business'),
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_call',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_email_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Corporate_Business_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_corporate_business_email_icon',array(
		'label'	=> __('Add Email Icon','vw-corporate-business'),
		'transport' => 'refresh',
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_corporate_business_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'vw_corporate_business_sanitize_email'
	));	
	$wp_customize->add_control('vw_corporate_business_email',array(
		'label'	=> __('Add Email Address','vw-corporate-business'),
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_started_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_corporate_business_started_text',array(
		'label'	=> __('Add Get Started Text','vw-corporate-business'),
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_started_text',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('vw_corporate_business_started_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_corporate_business_started_link',array(
		'label'	=> __('Add Get Started Link','vw-corporate-business'),
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_started_link',
		'type'		=> 'text'
	));	

	//Slider
	$wp_customize->add_section( 'vw_corporate_business_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-corporate-business' ),
		'priority'   => null,
		'panel' => 'vw_corporate_business_panel_id'
	) );

	$wp_customize->add_setting( 'vw_corporate_business_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-corporate-business' ),
      'section' => 'vw_corporate_business_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_corporate_business_slider_hide_show',array(
        'selector'        => '#slider .inner_carousel h1',
        'render_callback' => 'vw_corporate_business_customize_partial_vw_corporate_business_slider_hide_show',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_corporate_business_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_corporate_business_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_corporate_business_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-corporate-business' ),
			'description' => __('Slider image size (1500 x 765)','vw-corporate-business'),
			'section'  => 'vw_corporate_business_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_corporate_business_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_slidersettings',
		'type'=> 'text'
	));

	//content layout
	$wp_customize->add_setting('vw_corporate_business_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Corporate_Business_Image_Radio_Control($wp_customize, 'vw_corporate_business_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-corporate-business'),
        'section' => 'vw_corporate_business_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_corporate_business_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_corporate_business_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_corporate_business_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_corporate_business_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_corporate_business_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_corporate_business_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-corporate-business' ),
	'section'     => 'vw_corporate_business_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_corporate_business_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-corporate-business'),
      '0.1' =>  esc_attr('0.1','vw-corporate-business'),
      '0.2' =>  esc_attr('0.2','vw-corporate-business'),
      '0.3' =>  esc_attr('0.3','vw-corporate-business'),
      '0.4' =>  esc_attr('0.4','vw-corporate-business'),
      '0.5' =>  esc_attr('0.5','vw-corporate-business'),
      '0.6' =>  esc_attr('0.6','vw-corporate-business'),
      '0.7' =>  esc_attr('0.7','vw-corporate-business'),
      '0.8' =>  esc_attr('0.8','vw-corporate-business'),
      '0.9' =>  esc_attr('0.9','vw-corporate-business')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_corporate_business_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_slider_height',array(
		'label'	=> __('Slider Height','vw-corporate-business'),
		'description'	=> __('Specify the slider height (px).','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_corporate_business_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'vw_corporate_business_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_corporate_business_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-corporate-business'),
		'section' => 'vw_corporate_business_slidersettings',
		'type'  => 'number',
	) );

	// About Us
	$wp_customize->add_section('vw_corporate_business_about_section',array(
		'title'	=> __('About Section','vw-corporate-business'),
		'description'	=> __('Add About sections below.','vw-corporate-business'),
		'panel' => 'vw_corporate_business_panel_id',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'vw_corporate_business_about_post', array( 
        'selector' => '.about h2', 
        'render_callback' => 'vw_corporate_business_customize_partial_vw_corporate_business_about_post',
    ));
	
	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_corporate_business_about_post',array(
		'sanitize_callback' => 'vw_corporate_business_sanitize_choices',
	));
	$wp_customize->add_control('vw_corporate_business_about_post',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','vw-corporate-business'),
		'description'	=> __('Size of image should be 1280 x 853','vw-corporate-business'),
		'section' => 'vw_corporate_business_about_section',
	));

	//About excerpt
	$wp_customize->add_setting( 'vw_corporate_business_about_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_corporate_business_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_corporate_business_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_about_section',
		'type'        => 'range',
		'settings'    => 'vw_corporate_business_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_corporate_business_about_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_about_button_text',array(
		'label'	=> __('Add About Button Text','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_about_section',
		'type'=> 'text'
	));

	//Blog Post
	$wp_customize->add_panel( $VWCorporateBusinessParentPanel );

	$BlogPostParentPanel = new VW_Corporate_Business_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-corporate-business' ),
		'panel' => 'vw_corporate_business_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_corporate_business_post_settings', array(
		'title' => __( 'Post Settings', 'vw-corporate-business' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_corporate_business_toggle_postdate', array( 
        'selector' => '.post-main-box h2 a', 
        'render_callback' => 'vw_corporate_business_customize_partial_vw_corporate_business_toggle_postdate', 
    ));

	$wp_customize->add_setting( 'vw_corporate_business_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-corporate-business' ),
        'section' => 'vw_corporate_business_post_settings'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_toggle_author',array(
		'label' => esc_html__( 'Author','vw-corporate-business' ),
		'section' => 'vw_corporate_business_post_settings'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-corporate-business' ),
		'section' => 'vw_corporate_business_post_settings'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-corporate-business' ),
		'section' => 'vw_corporate_business_post_settings'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_corporate_business_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_corporate_business_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_corporate_business_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_corporate_business_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Corporate_Business_Image_Radio_Control($wp_customize, 'vw_corporate_business_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-corporate-business'),
        'section' => 'vw_corporate_business_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_corporate_business_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
    ));
    $wp_customize->add_control('vw_corporate_business_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-corporate-business'),
        'section' => 'vw_corporate_business_post_settings',
        'choices' => array(
            'Content' => __('Content','vw-corporate-business'),
            'Excerpt' => __('Excerpt','vw-corporate-business'),
            'No Content' => __('No Content','vw-corporate-business')
        ),
    ) );

    $wp_customize->add_setting('vw_corporate_business_excerpt_suffix',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_corporate_business_excerpt_suffix',array(
        'label' => __('Add Excerpt Suffix','vw-corporate-business'),
        'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-corporate-business' ),
        ),
        'section'=> 'vw_corporate_business_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'vw_corporate_business_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-corporate-business' ),
      'section' => 'vw_corporate_business_post_settings'
    )));

	$wp_customize->add_setting( 'vw_corporate_business_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_corporate_business_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_corporate_business_blog_pagination_type', array(
        'section' => 'vw_corporate_business_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-corporate-business' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-corporate-business' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-corporate-business' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_corporate_business_button_settings', array(
		'title' => __( 'Button Settings', 'vw-corporate-business' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_corporate_business_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_corporate_business_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_corporate_business_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_corporate_business_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_corporate_business_button_text', array( 
        'selector' => '.post-main-box .content-bttn a', 
        'render_callback' => 'vw_corporate_business_customize_partial_vw_corporate_business_button_text', 
    ));

    $wp_customize->add_setting('vw_corporate_business_button_text',array(
		'default'=> esc_html__('Read More','vw-corporate-business'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_button_text',array(
		'label'	=> __('Add Button Text','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_corporate_business_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-corporate-business' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_corporate_business_related_post_title', array( 
        'selector' => '.related-post h3', 
        'render_callback' => 'vw_corporate_business_customize_partial_vw_corporate_business_related_post_title', 
    ));

    $wp_customize->add_setting( 'vw_corporate_business_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_related_post',array(
		'label' => esc_html__( 'Related Post','vw-corporate-business' ),
		'section' => 'vw_corporate_business_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_corporate_business_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_corporate_business_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_corporate_business_sanitize_float'
	));
	$wp_customize->add_control('vw_corporate_business_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_corporate_business_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-corporate-business' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_corporate_business_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-corporate-business' ),
		'section' => 'vw_corporate_business_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_corporate_business_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_corporate_business_404_page',array(
		'title'	=> __('404 Page Settings','vw-corporate-business'),
		'panel' => 'vw_corporate_business_panel_id',
	));	

	$wp_customize->add_setting('vw_corporate_business_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_404_page_title',array(
		'label'	=> __('Add Title','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_404_page_content',array(
		'label'	=> __('Add Text','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_404_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_corporate_business_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-corporate-business'),
		'panel' => 'vw_corporate_business_panel_id',
	));	

	$wp_customize->add_setting('vw_corporate_business_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_social_icon_width',array(
		'label'	=> __('Icon Width','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_social_icon_height',array(
		'label'	=> __('Icon Height','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_corporate_business_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_corporate_business_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_corporate_business_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_corporate_business_responsive_media',array(
		'title'	=> __('Responsive Media','vw-corporate-business'),
		'panel' => 'vw_corporate_business_panel_id',
	));

	$wp_customize->add_setting( 'vw_corporate_business_resp_topbar_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
	));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-corporate-business' ),
      'section' => 'vw_corporate_business_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_stickyheader_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-corporate-business' ),
      'section' => 'vw_corporate_business_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_resp_slider_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-corporate-business' ),
      'section' => 'vw_corporate_business_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_corporate_business_metabox_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-corporate-business' ),
      'section' => 'vw_corporate_business_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-corporate-business' ),
      'section' => 'vw_corporate_business_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-corporate-business' ),
      'section' => 'vw_corporate_business_responsive_media'
    )));

     $wp_customize->add_setting('vw_corporate_business_res_open_menus_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Corporate_Business_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_corporate_business_res_open_menus_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-corporate-business'),
		'transport' => 'refresh',
		'section'	=> 'vw_corporate_business_responsive_media',
		'setting'	=> 'vw_corporate_business_res_open_menus_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_corporate_business_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Corporate_Business_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_corporate_business_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-corporate-business'),
		'transport' => 'refresh',
		'section'	=> 'vw_corporate_business_responsive_media',
		'setting'	=> 'vw_corporate_business_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('vw_corporate_business_footer',array(
		'title'	=> __('Footer','vw-corporate-business'),
		'description'=> __('This section will appear in the footer','vw-corporate-business'),
		'panel' => 'vw_corporate_business_panel_id',
	));	

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_corporate_business_footer_text', array( 
        'selector' => '.copyright p', 
        'render_callback' => 'vw_corporate_business_customize_partial_vw_corporate_business_footer_text', 
    ));
	
	$wp_customize->add_setting('vw_corporate_business_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_corporate_business_footer_text',array(
		'label'	=> __('Copyright Text','vw-corporate-business'),
		'section'=> 'vw_corporate_business_footer',
		'setting'=> 'vw_corporate_business_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_corporate_business_copyright_alingment',array(
        'default' => __('center','vw-corporate-business'),
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Corporate_Business_Image_Radio_Control($wp_customize, 'vw_corporate_business_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-corporate-business'),
        'section' => 'vw_corporate_business_footer',
        'settings' => 'vw_corporate_business_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_corporate_business_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_corporate_business_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-corporate-business' ),
      	'section' => 'vw_corporate_business_footer'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_corporate_business_scroll_to_top_icon', array( 
        'selector' => '.scrollup i', 
        'render_callback' => 'vw_corporate_business_customize_partial_vw_corporate_business_scroll_to_top_icon', 
    ));

    $wp_customize->add_setting('vw_corporate_business_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Corporate_Business_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_corporate_business_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-corporate-business'),
		'transport' => 'refresh',
		'section'	=> 'vw_corporate_business_footer',
		'setting'	=> 'vw_corporate_business_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_corporate_business_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_corporate_business_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_corporate_business_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_corporate_business_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_corporate_business_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Corporate_Business_Image_Radio_Control($wp_customize, 'vw_corporate_business_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-corporate-business'),
        'section' => 'vw_corporate_business_footer',
        'settings' => 'vw_corporate_business_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_corporate_business_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-corporate-business'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_corporate_business_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-corporate-business' ),
		'section' => 'vw_corporate_business_woocommerce_section'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_corporate_business_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-corporate-business' ),
		'section' => 'vw_corporate_business_woocommerce_section'
    )));

	//Products per page
    $wp_customize->add_setting('vw_corporate_business_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_corporate_business_sanitize_float'
	));
	$wp_customize->add_control('vw_corporate_business_products_per_page',array(
		'label'	=> __('Products Per Page','vw-corporate-business'),
		'description' => __('Display on shop page','vw-corporate-business'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_corporate_business_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_corporate_business_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control('vw_corporate_business_products_per_row',array(
		'label'	=> __('Products Per Row','vw-corporate-business'),
		'description' => __('Display on shop page','vw-corporate-business'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_corporate_business_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_corporate_business_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_corporate_business_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-corporate-business'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-corporate-business'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-corporate-business' ),
        ),
		'section'=> 'vw_corporate_business_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_corporate_business_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_corporate_business_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_corporate_business_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_corporate_business_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_corporate_business_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_corporate_business_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Corporate_Business_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Corporate_Business_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_corporate_business_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Corporate_Business_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_corporate_business_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Corporate_Business_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_corporate_business_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_corporate_business_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_corporate_business_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Corporate_Business_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Corporate_Business_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Corporate_Business_Customize_Section_Pro($manager,'vw_corporate_business_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Business Pro Theme', 'vw-corporate-business' ),
			'pro_text' => esc_html__( 'Upgrade Pro', 'vw-corporate-business' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-themes-for-business/'),
		)));

		$manager->add_section(new VW_Corporate_Business_Customize_Section_Pro($manager,'vw_corporate_business_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-corporate-business' ),
			'pro_text' => esc_html__( 'Docs', 'vw-corporate-business' ),
			'pro_url'  => admin_url('themes.php?page=vw_corporate_business_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-corporate-business-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-corporate-business-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Corporate_Business_Customize::get_instance();