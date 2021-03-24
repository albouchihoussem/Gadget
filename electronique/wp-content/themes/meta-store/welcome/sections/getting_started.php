<div class="lets-start">
    <h2><?php esc_html_e( "Let's Get Started", "meta-store" ); ?></h2>
    <p><?php esc_html_e( "Getting use to site building using the theme can be pretty daunting task especially if you are new to the WordPress. Here we have provide you a couple of ways to may familiarize you with the theme.", "meta-store" ) ?></p>
</div>

<div class="welcome-getting-started">
    <div class="welcome-manual-setup">
        <div class="welcome-manual-setupin">
            <h3><?php echo esc_html__('Manual Setup from Customizer Panel', 'meta-store'); ?></h3>
            <div class="welcome-theme-thumb">
                <img src="http://mysticalthemes.com/resources/customizer-settings.gif" alt="<?php echo esc_attr__('Resoto Demo', 'meta-store'); ?>">
            </div>

            <ol>
                <li><?php echo esc_html__('Go to Appearance > Customize', 'meta-store'); ?></li>
                <li><?php echo esc_html__('Click on any of the setting panels & sections.', 'meta-store'); ?> </li>
                <li><?php echo esc_html__('Change the settings and options with the guidance of the documentation.', 'meta-store'); ?> </li>
            </ol>
            <a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'meta-store'); ?></a>
        </div>
    </div>

    <div class="welcome-demo-import">
        <div class="welcome-demo-importin">
            <h3><?php echo esc_html__('Import Pre-Made Demos', 'meta-store'); ?></h3>
            <div class="welcome-theme-thumb">
                <img src="http://mysticalthemes.com/resources/demo-import.gif" alt="<?php printf(esc_html__('%s Demo', 'meta-store'), $this->theme_name); ?>">
            </div>

            <div class="welcome-demo-import-text">
                <ol>
                    <li><?php echo esc_html__('Install & Activate \'Swift Demo Import\' plugin.', 'meta-store'); ?></li>
                    <li><?php echo esc_html__('Go to Dashboard > Appearanse > Swift Demo Import.', 'meta-store'); ?> </li>
                    <li><?php echo esc_html__('You will find the list of the demos available for you to install. Now Install the demo of your choice.', 'meta-store'); ?></li>
                </ol>
                <a class="button button-primary" href="https://demo.mysticalthemes.com/meta-store/"><?php echo esc_html__('View Available Demos', 'meta-store'); ?></a>
            </div>
        </div>
    </div>
</div>