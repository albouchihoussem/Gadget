<?php
/**
 *
 * @package Meta Store
 */
if (class_exists('WP_Customize_Control')) {
    require META_STORE_OPT_DIR . 'custom-controls/repeater-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/heading-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/dropdown-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/multiple-checkbox-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/alpha-color-picker-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/image-chooser-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/separator-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/switch-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/background-image-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/image-select-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/mini-editor-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/info-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/color-tabs-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/tab-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/range-slider-control.php';

    /** Register Control Type */
    $wp_customize->register_control_type('Meta_Store_Background_Image');
    $wp_customize->register_control_type('Meta_Store_Tab');
    $wp_customize->register_control_type('Meta_Store_Color_Tabs');
    $wp_customize->register_section_type('Meta_Store_Toggle_Section');
}

if (class_exists('WP_Customize_Section')) {

    /**
     * Class Meta_Store_Toggle_Section
     *
     * @access public
     */
    class Meta_Store_Toggle_Section extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @access public
         * @var    string
         */
        public $type = 'meta-store-toggle-section';

        /**
         * Flag to display icon when entering in customizer
         *
         * @access public
         * @var bool
         */
        public $hide;

        /**
         * Name of customizer hiding control.
         *
         * @access public
         * @var bool
         */
        public $hiding_control;

        /**
         * Meta_Store_Toggle_Section constructor.
         *
         * @param WP_Customize_Manager $manager Customizer Manager.
         * @param string               $id Control id.
         * @param array                $args Arguments.
         */
        public function __construct(WP_Customize_Manager $manager, $id, array $args = array()) {
            parent::__construct($manager, $id, $args);

            if (isset($args['hiding_control'])) {
                $this->hide = get_theme_mod($args['hiding_control'], 'off');
            }

            add_action('customize_controls_init', array($this, 'enqueue'));
        }

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @access public
         */
        public function json() {
            $json = parent::json();
            $json['hide'] = $this->hide;
            $json['hiding_control'] = $this->hiding_control;
            return $json;
        }

        /**
         * Enqueue function.
         *
         * @access public
         * @return void
         */
        public function enqueue() {
            wp_enqueue_script('meta-store-toggle-section', get_template_directory_uri() . '/inc/customizer/js/toggle-section.js', array('jquery'), '1.0', true);
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @access public
         * @return void
         */
        protected function render_template() {
            ?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }}">
                <h3 class="accordion-section-title <# if ( data.hide != 'on' ) { #> meta-store-section-visible <# } else { #> meta-store-section-hidden <# }#>" tabindex="0">
                    {{ data.title }}
                    <# if ( data.hide != 'on' ) { #>
                    <a data-control="{{ data.hiding_control }}" class="meta-store-toggle-section" href="#"><span class="dashicons dashicons-visibility"></span></a>
                    <# } else { #>
                    <a data-control="{{ data.hiding_control }}" class="meta-store-toggle-section" href="#"><span class="dashicons dashicons-hidden"></span></a>
                    <# } #>
                </h3>
                <ul class="accordion-section-content">
                    <li class="customize-section-description-container section-meta <# if ( data.description_hidden ) { #>customize-info<# } #>">
                        <div class="customize-section-title">
                            <button class="customize-section-back" tabindex="-1">
                            </button>
                            <h3>
                                <span class="customize-action">
                                    {{{ data.customizeAction }}}
                                </span>
                                {{ data.title }}
                            </h3>
                            <# if ( data.description && data.description_hidden ) { #>
                            <button type="button" class="customize-help-toggle dashicons dashicons-editor-help" aria-expanded="false"></button>
                            <div class="description customize-section-description">
                                {{{ data.description }}}
                            </div>
                            <# } #>
                        </div>

                        <# if ( data.description && ! data.description_hidden ) { #>
                        <div class="description customize-section-description">
                            {{{ data.description }}}
                        </div>
                        <# } #>
                    </li>
                </ul>
            </li>
            <?php
        }

    }

}