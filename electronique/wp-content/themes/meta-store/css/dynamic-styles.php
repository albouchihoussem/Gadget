<?php
/**
 * Dynamic Styles 
 */
function meta_store_dynamic_styles() {

    $custom_css = "";

    $meta_store_display_title = get_theme_mod('meta_store_display_title', true);
    $meta_store_display_tagline = get_theme_mod('meta_store_display_tagline', true);
    if (!$meta_store_display_title) {
        $custom_css .= "
            .ms-site-title {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
            }";
    }

    if (!$meta_store_display_tagline) {
        $custom_css .= "
            .ms-site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
            }";
    }

    $meta_store_title_tagline_color = get_theme_mod('meta_store_title_tagline_color', '#000000');
    $custom_css .= "
            .ms-site-title,
            .ms-site-description {
            color: {$meta_store_title_tagline_color}
            }";

    $meta_store_website_width = get_theme_mod('meta_store_website_width', 1170);
    $meta_store_responsive_width = $meta_store_website_width + 40;
    $custom_css .= "
            .ms-container {
            width: {$meta_store_website_width}px;
            }
            body.ms-boxed #ms-page {
            width: {$meta_store_website_width}px;
            }";

    $meta_store_sidebar_width = get_theme_mod('meta_store_sidebar_width', 30);
    $meta_store_content_width = 100 - $meta_store_sidebar_width;
    $custom_css .= "
            body #ms-secondary {
            width: {$meta_store_sidebar_width}%;
            }
            body.ms-right-sidebar #ms-primary, 
            body.ms-left-sidebar #ms-primary {
            width: {$meta_store_content_width}%;
            }";

    $meta_store_template_color = get_theme_mod('meta_store_template_color', '#FC596B');

    $custom_css .= "
            button,
            input[type='button'],
            input[type='reset'],
            input[type='submit'],
            .ms-top-header,
            .ms-site-header-cart .ms-cart-icon,
            .ms-search-toggle a,
            .ms-toggle-menu-wrap .ms-toggle-label,
            .ms-mobile-search-form-close,
            .ms-contact-no .ms-contact-box > a,
            .ms-header-style3 .ms-header-bar,
            .ms-blog-layout1 .ms-archive-list .ms-archive-meta .ms-post-categories a,
            .error-404 .home-pg-btn,
            #gotop,
            .woocommerce .button,
            .onsale,
            .demo_store,
            .widget_price_filter .ui-slider .ui-slider-handle,
            .widget_price_filter .ui-slider .ui-slider-range,
            .woocommerce-MyAccount-navigation ul li.is-active a,
            .product_list_widget li .remove_from_cart_button{
            background: {$meta_store_template_color};
            }
            
            a:hover,
            a:focus,
            a:active,
            .ms-archive-list h3.ms-archive-title a:hover,
            .ms-archive-list .ms-archive-footer .ms-archive-read-more:hover,
            .ms-blog-layout2 .ms-archive-list .ms-post-categories a:hover,
            .ms-widget-area .widget ul a:hover,
            .wp-calendar-nav a:hover,
            .error-404 .page-title,
            ul.products li.product .button,
            ul.products li.product .added_to_cart,
            .woocommerce-tabs ul.tabs li.active a,
            .star-rating span::before,
            p.stars:hover a::before,
            p.stars.selected a.active::before,
            p.stars.selected a:not(.active)::before{
            color: {$meta_store_template_color};
            }
            
            .pagination a.page-numbers:hover,
            ul.products li.product .button,
            ul.products li.product .added_to_cart,
            .woocommerce-pagination .page-numbers li a:hover{
            border-color: {$meta_store_template_color};
            }
            
            .ms-widget-area .widget,
            .woocommerce-tabs ul.tabs li.active a{
            border-top-color: {$meta_store_template_color};
            }
            
            .comment-body:hover,
            .onsale:after{
            border-left-color: {$meta_store_template_color};
            }
            
            .onsale:after{
            border-right-color: {$meta_store_template_color};
            }
            
            .ms-preloader svg circle,
            .ms-preloader svg line{
                stroke: {$meta_store_template_color};
            }";


    /** Colors */
    $meta_store_content_header_color = get_theme_mod('meta_store_content_header_color', '#000000');
    $meta_store_content_text_color = get_theme_mod('meta_store_content_text_color', '#333333');
    $meta_store_content_link_color = get_theme_mod('meta_store_content_link_color', '#000000');
    $meta_store_content_link_hov_color = get_theme_mod('meta_store_content_link_hov_color', '#FC596B');

    $custom_css .= "
            .ms-content-area h1, .ms-content-area h2, .ms-content-area h3, .ms-content-area h4, .ms-content-area h5, .ms-content-area h6 {
                color: {$meta_store_content_header_color};
            }
            .ms-content-area {
                color: {$meta_store_content_text_color};
            }
            a {
                color: {$meta_store_content_link_color};
            }
            a:hover {
                color: {$meta_store_content_link_hov_color};
            }
        ";

    /** Page Banner Styles */
    $pg_bg = get_theme_mod('meta_store_pg_header_bg_url');
    $pg_bg_repeat = get_theme_mod('meta_store_pg_header_bg_repeat', 'no-repeat');
    $pg_bg_size = get_theme_mod('meta_store_pg_header_bg_size', 'cover');
    $pg_bg_position = get_theme_mod('meta_store_pg_header_bg_position', 'center-center');
    $pg_bg_position = str_replace('-', ' ', $pg_bg_position);
    $pg_bg_attach = get_theme_mod('meta_store_pg_header_bg_attach', 'scroll');
    $pg_overlay = get_theme_mod('meta_store_pg_overlay');
    $pg_bgcolor = get_theme_mod('meta_store_pg_bgcolor', '#FC596B');
    $pg_titlecolor = get_theme_mod('meta_store_pg_titlecolor', '#FFFFFF');

    $breadcrumb_textcolor = get_theme_mod('meta_store_breadcrumb_textcolor', '#FFFFFF');
    $breadcrumb_linkcolor = get_theme_mod('meta_store_breadcrumb_linkcolor', '#FFFFFF');

    $page_banner_pg_padding = get_theme_mod('meta_store_page_banner_padding', 40);

    if ($pg_bg) {
        $custom_css .= "
            .ms-page-banner {
                background-image: url({$pg_bg});
                background-repeat: {$pg_bg_repeat};
                background-size: {$pg_bg_size};
                background-position: {$pg_bg_position};
                background-attachment: {$pg_bg_attach};
            }
        ";
    }

    if ($pg_overlay) {
        $custom_css .= "
            .ms-page-banner:after {
                background: {$pg_overlay};
            }
        ";
    }

    if ($pg_bgcolor) {
        $custom_css .= "
                .ms-page-banner {
                    background-color: {$pg_bgcolor};
                }
            ";
    }

    if ($pg_titlecolor) {
        $custom_css .= "
                .ms-page-banner .ms-page-title {
                    color: {$pg_titlecolor};
                }
            ";
    }

    if ($breadcrumb_textcolor) {
        $custom_css .= "
            .ms-breadcrumb-trail ul li{
                    color: {$breadcrumb_textcolor};
                }
            ";
    }

    if ($breadcrumb_linkcolor) {
        $custom_css .= "
                .ms-breadcrumb-trail ul li a,
                .ms-breadcrumb-trail ul li a:after {
                    color: {$breadcrumb_linkcolor};
                }
            ";
    }

    if ($page_banner_pg_padding) {
        $custom_css .= "
                .ms-page-banner {
                    padding: {$page_banner_pg_padding}px 0;
                }
            ";
    }

    /** Header Styles */
    $meta_store_th_height = get_theme_mod('meta_store_th_height', 42);
    if ($meta_store_th_height) {
        $custom_css .= "
                .ms-top-header .ms-container {
                    height: {$meta_store_th_height}px;
                }
            ";
    }

    $meta_store_th_bg_color = get_theme_mod('meta_store_th_bg_color', '#FC596B');
    if ($meta_store_th_bg_color) {
        $custom_css .= "
                .ms-top-header {
                    background-color: {$meta_store_th_bg_color};
                }
            ";
    }

    $meta_store_th_bottom_border_color = get_theme_mod('meta_store_th_bottom_border_color');
    if ($meta_store_th_bottom_border_color) {
        $custom_css .= "
                .ms-top-header {
                    border-bottom: 1px solid {$meta_store_th_bottom_border_color};
                }
            ";
    }

    $meta_store_th_text_color = get_theme_mod('meta_store_th_text_color', '#ffffff');
    if ($meta_store_th_text_color) {
        $custom_css .= "
                .ms-top-header, .ms-top-header * {
                    color: {$meta_store_th_text_color};
                }
            ";
    }

    $meta_store_th_anchor_color = get_theme_mod('meta_store_th_anchor_color', '#FFFFFF');
    if ($meta_store_th_anchor_color) {
        $custom_css .= "
                .ms-top-header a {
                    color: {$meta_store_th_anchor_color};
                }
            ";
    }

    $meta_store_logo_height = get_theme_mod('meta_store_logo_height', 60);
    if ($meta_store_logo_height) {
        $custom_css .= "
                .ms-site-branding img.custom-logo {
                    height: {$meta_store_logo_height}px;
                }
            ";
    }

    $meta_store_logo_padding = get_theme_mod('meta_store_logo_padding', 15);
    if ($meta_store_logo_padding) {
        $custom_css .= "
                .ms-site-branding {
                    padding-top: {$meta_store_logo_padding}px;
                    padding-bottom: {$meta_store_logo_padding}px;
                }
            ";
    }

    /** Footer Styles */
    $footer_title_color = get_theme_mod('meta_store_footer_title_color', '#c8c8c8');
    $footer_border_color = get_theme_mod('meta_store_footer_border_color', '#444444');
    $footer_text_color = get_theme_mod('meta_store_footer_text_color', '#969696');
    $footer_anchor_color = get_theme_mod('meta_store_footer_anchor_color', '#EEEEEE');

    if ($footer_title_color) {
        $custom_css .= "
            .ms-top-footer-col .widget-title {
                color: {$footer_title_color};
            }
        ";
    }

    if ($footer_border_color) {
        $custom_css .= "
            .ms-bottom-footer {
                border-top-color: {$footer_border_color};
            }
        ";
    }

    if ($footer_text_color) {
        $custom_css .= "
            .ms-site-footer {
                color: {$footer_text_color};
            }
        ";
    }

    if ($footer_anchor_color) {
        $custom_css .= "
            .ms-site-footer a {
                color: {$footer_anchor_color};
            }
        ";
    }

    /** Typographies */
    $typo_keys = meta_store_get_customizer_fonts();

    foreach ($typo_keys as $id => $tag) {
        $font_css = array();
        $font_family = get_theme_mod('meta_store_' . $id . '_font_family', $tag['font_family']);
        $font_size = isset($tag['font_size']) ? get_theme_mod('meta_store_' . $id . '_font_size', $tag['font_size']) : '';
        $font_style = get_theme_mod('meta_store_' . $id . '_font_style', $tag['font_style']);
        $text_decoration = get_theme_mod('meta_store_' . $id . '_text_decoration', $tag['text_decoration']);
        $text_transform = get_theme_mod('meta_store_' . $id . '_text_transform', $tag['text_transform']);
        $line_height = get_theme_mod('meta_store_' . $id . '_line_height', $tag['line_height']);
        $letter_spacing = get_theme_mod('meta_store_' . $id . '_letter_spacing', $tag['letter_spacing']);
        $font_color = isset($tag['color']) ? get_theme_mod('meta_store_' . $id . '_color', $tag['color']) : '';

        if (strpos($font_style, 'italic')) {
            $font_italic = 'italic';
        }

        $font_weight = absint($font_style);

        $font_css[] = !empty($font_family) ? "font-family: '{$font_family}', serif" : NULL;
        $font_css[] = !empty($font_weight) ? "font-weight: {$font_weight}" : NULL;
        $font_css[] = !empty($font_italic) ? "font-style: {$font_italic}" : NULL;
        $font_css[] = !empty($text_transform) ? "text-transform: {$text_transform}" : NULL;
        $font_css[] = !empty($text_decoration) ? "text-decoration: {$text_decoration}" : NULL;
        if ($id != 'h') {
            $font_css[] = !empty($font_size) ? "font-size: {$font_size}px" : NULL;
        }
        $font_css[] = !empty($line_height) ? "line-height: {$line_height}" : NULL;
        $font_css[] = !empty($letter_spacing) ? "letter-spacing: {$letter_spacing}px" : NULL;
        if ($id != 'menu') {
            $font_css[] = !empty($font_color) ? "color: {$font_color}" : NULL;
        }

        $font_css = array_filter($font_css);

        $style = implode(';', $font_css);

        $custom_css .= "{$tag['selector']}{{$style}}";
    }

    $custom_css .= "@media screen and (max-width:{$meta_store_responsive_width}px){
    .ms-container{
        width: 100%;
        padding-left: 40px;
        padding-right: 40px;
    }
    body.ms-boxed #ms-page{
        width: auto;
        margin: 20px;
    }
    }";

    wp_add_inline_style('meta-store-style', meta_store_css_strip_whitespace($custom_css));
}

add_action('wp_enqueue_scripts', 'meta_store_dynamic_styles');
