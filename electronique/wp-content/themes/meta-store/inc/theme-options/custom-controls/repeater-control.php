<?php

/** Repeater Control */
class Meta_Store_Repeater extends WP_Customize_Control {

    /**
     * The control type.
     *
     * @access public
     * @var string
     */
    public $type = 'meta-store-repeater';
    public $box_label = '';
    public $add_label = '';
    private $cats = '';

    /**
     * The fields that each container row will contain.
     *
     * @access public
     * @var array
     */
    public $fields = array();

    /**
     * Repeater drag and drop controller
     *
     * @since  1.0.0
     */
    public function __construct($manager, $id, $args = array(), $fields = array()) {
        $this->fields = $fields;
        $this->box_label = isset($args['box_label']) ? $args['box_label'] : '';
        $this->add_label = isset($args['add_label']) ? $args['add_label'] : '';
        $this->cats = get_categories(array('hide_empty' => false));
        parent::__construct($manager, $id, $args);
    }

    public function render_content() {
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>

        <?php if ($this->description) { ?>
            <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
            </span>
        <?php } ?>

        <ul class="meta-store-repeater-field-control-wrap">
            <?php
            $this->meta_store_get_fields();
            ?>
        </ul>

        <input type="hidden" <?php esc_attr($this->link()); ?> class="meta-store-repeater-collector" value="<?php echo esc_attr($this->value()); ?>" />
        <button type="button" class="button meta-store-add-control-field"><?php echo esc_html($this->add_label); ?></button>
        <?php
    }

    private function meta_store_get_fields() {
        $fields = $this->fields;
        $values = json_decode($this->value());

        if (is_array($values)) {
            foreach ($values as $value) {
                ?>
                <li class="meta-store-repeater-field-control">
                    <h3 class="meta-store-repeater-field-title"><?php echo esc_html($this->box_label); ?></h3>

                    <div class="meta-store-repeater-fields">
                        <?php
                        foreach ($fields as $key => $field) {
                            $class = isset($field['class']) ? $field['class'] : '';
                            ?>
                            <div class="meta-store-fields meta-store-type-<?php echo esc_attr($field['type']) . ' ' . esc_attr($class); ?>">

                                <?php
                                $label = isset($field['label']) ? $field['label'] : '';
                                $description = isset($field['description']) ? $field['description'] : '';
                                if ($field['type'] != 'checkbox') {
                                    ?>
                                    <span class="customize-control-repeater-title"><?php echo esc_html($label); ?></span>
                                    <span class="description customize-control-description"><?php echo esc_html($description); ?></span>
                                    <?php
                                }

                                $new_value = isset($value->$key) ? $value->$key : '';
                                $default = isset($field['default']) ? $field['default'] : '';

                                switch ($field['type']) {
                                    case 'text':
                                        echo '<input data-default="' . esc_attr($default) . '" data-name="' . esc_attr($key) . '" type="text" value="' . esc_attr($new_value) . '"/>';
                                        break;

                                    case 'textarea':
                                        echo '<textarea data-default="' . esc_attr($default) . '"  data-name="' . esc_attr($key) . '">' . esc_textarea($new_value) . '</textarea>';
                                        break;

                                    case 'upload':
                                        $image = $image_class = "";
                                        if ($new_value) {
                                            $image = '<img src="' . esc_url($new_value) . '" style="max-width:100%;"/>';
                                            $image_class = ' hidden';
                                        }
                                        echo '<div class="meta-store-fields-wrap">';
                                        echo '<div class="attachment-media-view">';
                                        echo '<div class="placeholder' . esc_attr($image_class) . '">';
                                        esc_html_e('No image selected', 'meta-store');
                                        echo '</div>';
                                        echo '<div class="thumbnail thumbnail-image">';
                                        echo wp_kses( $image, array( 'src' => array(), 'style' => array() ) );
                                        echo '</div>';
                                        echo '<div class="actions clearfix">';
                                        echo '<button type="button" class="button meta-store-delete-button align-left">' . esc_html__('Remove', 'meta-store') . '</button>';
                                        echo '<button type="button" class="button meta-store-upload-button alignright">' . esc_html__('Select Image', 'meta-store') . '</button>';
                                        echo '<input data-default="' . esc_attr($default) . '" class="upload-id" data-name="' . esc_attr($key) . '" type="hidden" value="' . esc_attr($new_value) . '"/>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        break;

                                    case 'category':
                                        echo '<select data-default="' . esc_attr($default) . '"  data-name="' . esc_attr($key) . '">';
                                        echo '<option value="-1" ' . selected($new_value, '-1', false) . '>' . esc_html__('Latest Posts', 'meta-store') . '</option>';
                                        foreach ($this->cats as $cat) {
                                            printf('<option value="%1$s" %2$s>%3$s</option>', esc_attr($cat->term_id), selected($new_value, $cat->term_id, false), esc_html($cat->name));
                                        }
                                        echo '</select>';
                                        break;

                                    case 'select':
                                        $options = $field['options'];
                                        echo '<select  data-default="' . esc_attr($default) . '"  data-name="' . esc_attr($key) . '">';
                                        foreach ($options as $option => $val) {
                                            printf('<option value="%1$s" %2$s>%3$s</option>', esc_attr($option), selected($new_value, $option, false), esc_html($val));
                                        }
                                        echo '</select>';
                                        break;

                                    case 'checkbox':
                                        $checkbox_class = ($new_value == 'yes') ? 'checkbox-on' : '';
                                        echo '<div class="ms-switch">';
                                        echo '<label class="ms-switch-label ' . esc_attr($checkbox_class) . '">';
                                        echo '<input class="ms-switch-checkbox" data-default="' . esc_attr($default) . '" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '" type="checkbox" ' . checked($new_value, 'yes', false) . '/>';
                                        echo '</label>';
                                        echo '</div>';
                                        if (!empty($label)) {
                                            echo '<span class="customize-control-title ms-switch-title">' . esc_html($label) . '</span>';
                                        }
                                        if (!empty($description)) {
                                            echo '<span class="description customize-control-description">' . esc_html($description) . '</span>';
                                        }
                                        break;

                                    case 'colorpicker':
                                        echo '<input data-default="' . esc_attr($default) . '" class="meta-store-color-picker" data-alpha="true" data-name="' . esc_attr($key) . '" type="text" value="' . esc_attr($new_value) . '"/>';
                                        break;

                                    case 'selector':
                                        $options = $field['options'];
                                        echo '<div class="ms-image-selector">';
                                        foreach ($options as $option => $val) {
                                            $class = ( $new_value == $option ) ? 'selector-selected' : '';
                                            echo '<label class="' . esc_attr($class) . '" data-val="' . esc_attr($option) . '">';
                                            echo '<img src="' . esc_url($val) . '"/>';
                                            echo '</label>';
                                        }
                                        echo '</div>';
                                        echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
                                        break;

                                    case 'radio':
                                        $options = $field['options'];
                                        echo '<div class="ms-radio-labels">';
                                        foreach ($options as $option => $val) {
                                            echo '<label>';
                                            echo '<input value="' . esc_attr($option) . '" type="radio" ' . checked($new_value, $option, false) . '/>';
                                            echo esc_html($val);
                                            echo '</label>';
                                        }
                                        echo '</div>';
                                        echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
                                        break;

                                    case 'switch':
                                        $switch = $field['switch'];
                                        $switch_class = ($new_value == 'on') ? 'ms-switch-on' : '';
                                        echo '<div class="ms-onoffswitch ' . esc_attr($switch_class) . '">';
                                        echo '<div class="ms-onoffswitch-inner">';
                                        echo '<div class="ms-onoffswitch-active">';
                                        echo '<div class="ms-onoffswitch-label">' . esc_html($switch["on"]) . '</div>';
                                        echo '</div>';
                                        echo '<div class="ms-onoffswitch-inactive">';
                                        echo '<div class="ms-onoffswitch-label">' . esc_html($switch["off"]) . '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
                                        break;

                                    case 'range':
                                        $options = $field['options'];
                                        $new_value = $new_value ? $new_value : $options['val'];
                                        echo '<div class="meta-store-responsive-range-slider" >';
                                        echo '<div class="range-input" data-defaultvalue="' . esc_attr($options['val']) . '" data-value="' . esc_attr($new_value) . '" data-min="' . esc_attr($options['min']) . '" data-max="' . esc_attr($options['max']) . '" data-step="' . esc_attr($options['step']) . '"></div>';
                                        echo '<input  class="range-input-selector" type="text" disabled="disabled" value="' . esc_attr($new_value) . '"  data-name="' . esc_attr($key) . '"/>';
                                        echo '<span class="unit">' . esc_html($options['unit']) . '</span>';
                                        echo '</div>';
                                        break;

                                    case 'icon':
                                        echo '<div class="meta-store-customizer-icon-box">';
                                        echo '<div class="meta-store-selected-icon">';
                                        echo '<i class="' . esc_attr($new_value) . '"></i>';
                                        echo '<span><i class="icofont-simple-down"></i></span>';
                                        echo '</div>';
                                        echo '<div class="meta-store-icon-box">';
                                        echo '<div class="meta-store-icon-search">';
                                        echo '<select>';

                                        if (apply_filters('meta_store_show_ico_font', true)) {
                                            echo '<option value="icofont-list">' . esc_html__('Ico Font', 'meta-store') . '</option>';
                                        }

                                        if (apply_filters('meta_store_show_material_icon', true)) {
                                            echo '<option value="material-icon-list">' . esc_html__('Material Icon', 'meta-store') . '</option>';
                                        }

                                        if (apply_filters('meta_store_show_elegant_icon', true)) {
                                            echo '<option value="elegant-icon-list">' . esc_html__('Elegant Icon', 'meta-store') . '</option>';
                                        }

                                        echo '</select>';
                                        echo '<input type="text" class="meta-store-icon-search-input" placeholder="' . esc_html__('Type to filter', 'meta-store') . '" />';
                                        echo '</div>';

                                        if (apply_filters('meta_store_show_ico_font', true)) {
                                            echo '<ul class="meta-store-icon-list icofont-list clearfix active">';
                                            $meta_store_icofont_icon_array = meta_store_icofont_icon_array();
                                            foreach ($meta_store_icofont_icon_array as $meta_store_icofont_icon) {
                                                $icon_class = $new_value == $meta_store_icofont_icon ? 'icon-active' : '';
                                                echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($meta_store_icofont_icon) . '"></i></li>';
                                            }
                                            echo '</ul>';
                                        }

                                        if (apply_filters('meta_store_show_material_icon', true)) {
                                            echo '<ul class="meta-store-icon-list material-icon-list clearfix">';
                                            $meta_store_materialdesignicons_icon_array = meta_store_materialdesignicons_array();
                                            foreach ($meta_store_materialdesignicons_icon_array as $meta_store_materialdesignicons_icon) {
                                                $icon_class = $new_value == $meta_store_materialdesignicons_icon ? 'icon-active' : '';
                                                echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($meta_store_materialdesignicons_icon) . '"></i></li>';
                                            }
                                            echo '</ul>';
                                        }

                                        if (apply_filters('meta_store_show_elegant_icon', true)) {
                                            echo '<ul class="meta-store-icon-list elegant-icon-list clearfix">';
                                            $meta_store_eleganticons_icon_array = meta_store_eleganticons_array();
                                            foreach ($meta_store_eleganticons_icon_array as $meta_store_eleganticons_icon) {
                                                $icon_class = $new_value == $meta_store_eleganticons_icon ? 'icon-active' : '';
                                                echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($meta_store_eleganticons_icon) . '"></i></li>';
                                            }
                                            echo '</ul>';
                                        }

                                        echo '</div>';
                                        echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
                                        echo '</div>';
                                        break;

                                    case 'multicategory':
                                        $new_value_array = !is_array($new_value) ? explode(',', $new_value) : $new_value;
                                        echo '<ul class="meta-store-multi-category-list">';
                                        foreach ($this->cats as $cat) {
                                            $checked = in_array($cat->term_id, $new_value_array) ? 'checked="checked"' : '';
                                            echo '<li>';
                                            echo '<label>';
                                            echo '<input type="checkbox" value="' . esc_attr($cat->term_id) . '" ' . wp_kses_post($checked) . '/>';
                                            echo esc_html($cat->name);
                                            echo '</label>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                        echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr(implode(',', $new_value_array)) . '" data-name="' . esc_attr($key) . '"/>';
                                        break;

                                    default:
                                        break;
                                }
                                ?>
                            </div>
                        <?php }
                        ?>

                        <div class="meta-store-repeater-footer clearfix">
                            <div class="alignright">
                                <a class="meta-store-repeater-field-remove" href="#remove"><?php esc_html_e('Delete', 'meta-store') ?></a> |
                                <a class="meta-store-repeater-field-close" href="#close"><?php esc_html_e('Close', 'meta-store') ?></a>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
        }
    }

}
