<?php
/** Starting Page Wrapper */
add_action('meta_store_container_start', 'meta_store_container_start_cb');

/** Ending Page Wrapper */
add_action('meta_store_container_end', 'meta_store_container_end_cb');

function meta_store_container_start_cb() {
    echo '<div class="ms-container">';
    echo '<div class="ms-content-wrap">';
}

function meta_store_container_end_cb() {
    echo '</div>';
    echo '</div>';
}

/** Displays Preloader */
add_action('meta_store_extra_elements', 'meta_store_preloader_cb', 10);
if (!function_exists('meta_store_preloader_cb')) {

    function meta_store_preloader_cb() {
        $enable_preloader = get_theme_mod('meta_store_enable_preloader', 1);
        if ($enable_preloader) {
            ?>
            <div class="ms-preloader">
                <svg version="1.1" id="L2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                    <circle fill="none" stroke="#fff" stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="48"/>
                    <line fill="none" stroke-linecap="round" stroke="#fff" stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="85" y2="50.5">
                        <animateTransform 
                            attributeName="transform" 
                            dur="2s"
                            type="rotate"
                            from="0 50 50"
                            to="360 50 50"
                            repeatCount="indefinite" />
                    </line>
                    <line fill="none" stroke-linecap="round" stroke="#fff" stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="49.5" y2="74">
                        <animateTransform 
                            attributeName="transform" 
                            dur="15s"
                            type="rotate"
                            from="0 50 50"
                            to="360 50 50"
                            repeatCount="indefinite" />
                    </line>
                </svg>
            </div>
            <?php
        }
    }

}

/** Displays go to Top */
add_action('meta_store_extra_elements', 'meta_store_gotop_cb', 20);
if (!function_exists('meta_store_gotop_cb')) {

    function meta_store_gotop_cb() {
        $enable_gotop = get_theme_mod('meta_store_backtotop', 1);

        if ($enable_gotop) {
            ?>
            <a href="#" id="gotop"><i class="arrow_carrot-up"></i></a>
            <?php
        }
    }

}

/** Displays Sidebar */
add_action('meta_store_display_sidebar', 'meta_store_display_sidebar_cb');
if (!function_exists('meta_store_display_sidebar_cb')) {

    function meta_store_display_sidebar_cb() {
        if (!is_active_sidebar('meta-store-sidebar')) {
            return;
        }

        $page_layout = 'right-sidebar';

        if (is_page()) {
            global $post;
            $sidebar_layout = get_post_meta($post->ID, 'meta_store_sidebar_layout', true);
            $page_layout = ($sidebar_layout == 'default' || $sidebar_layout == '') ? $page_layout = get_theme_mod('meta_store_page_layout', 'right-sidebar') : $sidebar_layout;
        } elseif (is_singular('post')) {
            global $post;
            $sidebar_layout = get_post_meta($post->ID, 'meta_store_sidebar_layout', true);
            $page_layout = ($sidebar_layout == 'default' || $sidebar_layout == '') ? $page_layout = get_theme_mod('meta_store_post_layout', 'right-sidebar') : $sidebar_layout;
        } elseif (class_exists('woocommerce') && is_woocommerce()) {
            $page_layout = get_theme_mod('meta_store_shop_layout', 'right-sidebar');
        } elseif (is_archive()) {
            $page_layout = get_theme_mod('meta_store_archive_layout', 'right-sidebar');
        } elseif (is_home()) {
            $page_layout = get_theme_mod('meta_store_home_blog_layout', 'right-sidebar');
        } elseif (is_search()) {
            $page_layout = get_theme_mod('meta_store_search_layout', 'right-sidebar');
        }
        

        if ($page_layout == 'no-sidebar-narrow' || $page_layout == 'no-sidebar') {
            return;
        }
        ?>
        <aside id="ms-secondary" class="ms-widget-area">
            <?php dynamic_sidebar('meta-store-sidebar'); ?>
        </aside>
        <?php
    }

}