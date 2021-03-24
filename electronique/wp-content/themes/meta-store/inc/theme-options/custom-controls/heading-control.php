<?php

/** Heading Control */
class Meta_Store_Heading_Control extends WP_Customize_Control {

    public $type = 'meta-store-heading';

    public function render_content() {
        if (!empty($this->label)) :
            ?>
            <h3><?php echo esc_html($this->label); ?></h3>
            <?php
        endif;

        if ($this->description) {
            ?>
            <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
            </span>
            <?php
        }
    }

}
