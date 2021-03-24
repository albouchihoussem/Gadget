<?php

/** Checkbox Control */
class Meta_Store_Switch extends WP_Customize_Control {

    /**
     * Control type
     *
     * @var string
     */
    public $type = 'meta-store-switch';

    /**
     * Control method
     *
     * @since 1.0.0
     */
    public function render_content() {
        ?>
        <div class="ms-switch-wrap">
            <div class="ms-switch">
                <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="ms-switch-checkbox" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> <?php checked($this->value()); ?>>
                <label class="ms-switch-label" for="<?php echo esc_attr($this->id); ?>"></label>
            </div>

            <span class="customize-control-title ms-switch-title"><?php echo esc_html($this->label); ?></span>

            <?php if (!empty($this->description)) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>
        </div>
        <?php
    }

}
