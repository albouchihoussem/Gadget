<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Meta Store
 */
if (!function_exists('meta_store_get_customizer_fonts')) {

    function meta_store_get_customizer_fonts() {
        $fonts = array(
            'body' => array(
                'selector' => 'body',
                'font_family' => 'Varela Round',
                'font_size' => 16,
                'line_height' => 1.6,
                'font_style' => 400,
                'text_decoration' => 'none',
                'text_transform' => 'none',
                'letter_spacing' => 0,
                'color' => '#333333'
            ),
            'menu' => array(
                'selector' => 'ul.ms-main-menu > li > a, .ms-main-navigation',
                'font_family' => 'Varela Round',
                'font_size' => 14,
                'line_height' => 2,
                'font_style' => 700,
                'text_decoration' => 'none',
                'text_transform' => 'uppercase',
                'letter_spacing' => 0
            ),
            'h' => array(
                'selector' => 'h1, h2, h3, h4, h5, h6',
                'font_family' => 'Cardo',
                'line_height' => 1.3,
                'font_style' => 700,
                'text_decoration' => 'none',
                'text_transform' => 'none',
                'letter_spacing' => 0,
                'color' => '#000000'
            )
        );

        return apply_filters('meta_store_fonts', $fonts);
    }

}
if (!function_exists('meta_store_css_strip_whitespace')) {

    function meta_store_css_strip_whitespace($css) {
        $replace = array(
            "#/\*.*?\*/#s" => "", // Strip C style comments.
            "#\s\s+#" => " ", // Strip excess whitespace.
        );
        $search = array_keys($replace);
        $css = preg_replace($search, $replace, $css);

        $replace = array(
            ": " => ":",
            "; " => ";",
            " {" => "{",
            " }" => "}",
            ", " => ",",
            "{ " => "{",
            ";}" => "}", // Strip optional semicolons.
            ",\n" => ",", // Don't wrap multiple selectors.
            "\n}" => "}", // Don't wrap closing braces.
            "} " => "}", // Put each rule on it's own line.
        );
        $search = array_keys($replace);
        $css = str_replace($search, $replace, $css);

        return trim($css);
    }

}


/** Product Category Toggle */
if (!function_exists('meta_store_toggle_menu_cb')) {

    function meta_store_toggle_menu_cb() {
        $menu_label = get_theme_mod('meta_store_toggle_menu_label', esc_html__('Categories', 'meta-store'));
        $menu = get_theme_mod('meta_store_toggle_menu', 'none');
        $show_on = get_theme_mod('meta_store_show_menu_on', 'click');

        $event_class = ( $show_on == 'click' ) ? 'ms-click-open' : 'ms-hover-open';

        if ($menu_label && $menu && $menu != 'none') {
            ?>
            <div class="ms-toggle-menu-wrap <?php echo esc_attr($event_class); ?>">
                <button class="ms-toggle-label" role="navigation"><i class="icon_ul"></i><?php echo esc_html($menu_label); ?></button>
                <div class="ms-toggle-menu">
                    <?php
                    wp_nav_menu(array(
                        'menu' => $menu,
                        'fallback_cb' => false,
                        'container' => false,
                        'menu_class' => 'ms-product-menu',
                        'theme_location' => '',
                    ));
                    ?>
                </div>
            </div>
            <?php
        }
    }

}


/** Top Header Widget */
if (!function_exists('meta_store_top_widget')) {

    function meta_store_top_widget() {
        $widget = get_theme_mod('meta_store_th_widget', 'none');

        if ($widget == 'none') {
            return;
        }

        if (!is_active_sidebar($widget)) {
            return;
        }

        dynamic_sidebar($widget);
    }

}

/** Top Header Text Block */
if (!function_exists('meta_store_top_txtblock')) {

    function meta_store_top_txtblock() {
        $txtblock = get_theme_mod('meta_store_th_text', '');
        if (!$txtblock) {
            return;
        }
        ?>
        <div class="ms-top-txtblock">
            <?php echo wp_kses_post($txtblock); ?>
        </div>
        <?php
    }

}

/** Top Header Date */
if (!function_exists('meta_store_top_date')) {

    function meta_store_top_date() {
        ?>
        <div class="ms-top-date"><?php echo esc_html(date('l jS F Y')); ?></div>
        <?php
    }

}

/** Menu */
if (!function_exists('meta_store_menu')) {

    function meta_store_menu() {
        $menu = get_theme_mod('meta_store_th_menu');

        if (!empty($menu)) {
            echo '<a href="#" class="ms-top-menu-toggle">' . esc_html__('Menu', 'meta-store') . '<span class="arrow_carrot-down"><span></a>';
            wp_nav_menu(array(
                'menu' => $menu,
                'menu_class' => 'ms-top-header-menu',
                'fallback_cb' => false,
                'depth' => -1,
                'container' => false,
                'theme_location' => ''
            ));
        }
    }

}

/** Social Icons */
if (!function_exists('meta_store_socialicons')) {

    function meta_store_socialicons() {

        $social_icons = get_theme_mod('meta_store_social_icons', '[{"icon":"icofont-facebook","link":"#","enable":"on"},{"icon":"icofont-twitter","link":"#","enable":"on"},{"icon":"icofont-instagram","link":"#","enable":"on"},{"icon":"icofont-youtube","link":"#","enable":"on"}]');
        if ($social_icons == '') {
            return;
        }

        $social_icon_lists = json_decode($social_icons, true);

        if (!empty($social_icon_lists)) {
            ?>
            <ul class="ms-top-social-icons">
                <?php
                foreach ($social_icon_lists as $social_icon) {
                    if ($social_icon['enable']) {
                        ?>
                        <li><a href="<?php echo esc_url($social_icon['link']); ?>"><span class="<?php echo esc_attr($social_icon['icon']); ?>"></span></a></li>
                        <?php
                    }
                }
                ?>
            </ul>
            <?php
        }
    }

}