<?php

/** Dropdown Chooser */
class Meta_Store_Dropdown_Control extends WP_Customize_Control {

    public $type = 'meta-store-dropdown';

    public function render_content() {
        if (empty($this->choices)) {
            return;
        }
        ?>
        <label>
            <span class="customize-control-title">
                <?php echo esc_html($this->label); ?>
            </span>

            <?php if ($this->description) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>

            <select class="ms-chosen-select" <?php $this->link(); ?>>
                <?php
                foreach ($this->choices as $value => $label) {
                    echo '<option value="' . esc_attr($value) . '"' . selected($this->value(), $value, false) . '>' . esc_html($label) . '</option>';
                }
                ?>
            </select>
        </label>
        <?php
    }

}
