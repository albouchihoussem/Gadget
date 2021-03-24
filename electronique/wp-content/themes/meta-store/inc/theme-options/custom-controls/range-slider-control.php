<?php

/** Range Control */
class Meta_Store_Range_Slider extends WP_Customize_Control {

    /**
     * The type of control being rendered
     */
    public $type = 'meta-store-range-slider';

    /**
     * Render the control in the customizer
     */
    public function render_content() {
        ?>
        <span class="customize-control-title">
            <?php echo esc_html($this->label); ?>
            <span class="meta-store-slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr($this->value()); ?>"></span>
        </span>

        <div class="control-wrap"> 
            <div class="meta-store-slider" slider-min-value="<?php echo esc_attr($this->input_attrs['min']); ?>" slider-max-value="<?php echo esc_attr($this->input_attrs['max']); ?>" slider-step-value="<?php echo esc_attr($this->input_attrs['step']); ?>"></div>
            <div class="meta-store-slider-input">
                <input type="number" value="<?php echo esc_attr($this->value()); ?>" class="slider-input" <?php $this->link(); ?> />
            </div>
        </div>

        <?php
        if ($this->description) {
            ?>
            <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
            </span>
            <?php
        }
    }

}
