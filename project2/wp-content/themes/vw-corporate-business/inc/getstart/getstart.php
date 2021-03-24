<?php
//about theme info
add_action( 'admin_menu', 'vw_corporate_business_gettingstarted' );
function vw_corporate_business_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Corporate Business', 'vw-corporate-business'), esc_html__('About VW Corporate Business', 'vw-corporate-business'), 'edit_theme_options', 'vw_corporate_business_guide', 'vw_corporate_business_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_corporate_business_admin_theme_style() {
   wp_enqueue_style('vw-corporate-business-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-corporate-business-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_corporate_business_admin_theme_style');

//guidline for about theme
function vw_corporate_business_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-corporate-business' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Corporate Business Theme', 'vw-corporate-business' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-corporate-business'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Corporate Business at 20% Discount','vw-corporate-business'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-corporate-business'); ?> ( <span><?php esc_html_e('vwpro20','vw-corporate-business'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-corporate-business' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_corporate_business_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-corporate-business' ); ?></button>
			<button class="tablinks" onclick="vw_corporate_business_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-corporate-business' ); ?></button>
		  	<button class="tablinks" onclick="vw_corporate_business_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-corporate-business' ); ?></button>		  
		  	<button class="tablinks" onclick="vw_corporate_business_open_tab(event, 'business_pro')"><?php esc_html_e( 'Get Premium', 'vw-corporate-business' ); ?></button>
		  	<button class="tablinks" onclick="vw_corporate_business_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-corporate-business' ); ?></button>
		</div>

		<?php
			$vw_corporate_business_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_corporate_business_plugin_custom_css ='display: block';
			}
		?>
		<div id="gutenberg_editor" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Corporate_Business_Plugin_Activation_Settings::get_instance();
			$vw_corporate_business_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-corporate-business-recommended-plugins">
				    <div class="vw-corporate-business-action-list">
				    	<div class="vw-corporate-business-activation-note">
							<?php esc_html_e('Your filesystem not have write permission, please give writable access to your filesystem','vw-corporate-business'); ?>
						</div>
				        <?php if ($vw_corporate_business_actions): foreach ($vw_corporate_business_actions as $key => $vw_corporate_business_actionValue): ?>
				                <div class="vw-corporate-business-action" id="<?php echo esc_attr($vw_corporate_business_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_corporate_business_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_corporate_business_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_corporate_business_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-corporate-business' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-corporate-business-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-corporate-business'); ?></a>
			    </div>
			<?php } ?>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Corporate_Business_Plugin_Activation_Settings::get_instance();
				$vw_corporate_business_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-corporate-business-recommended-plugins">
				    <div class="vw-corporate-business-action-list">
				    	<div class="vw-corporate-business-activation-note">
							<?php esc_html_e('Your filesystem not have write permission, please give writable access to your filesystem','vw-corporate-business'); ?>
						</div>
				        <?php if ($vw_corporate_business_actions): foreach ($vw_corporate_business_actions as $key => $vw_corporate_business_actionValue): ?>
				                <div class="vw-corporate-business-action" id="<?php echo esc_attr($vw_corporate_business_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_corporate_business_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_corporate_business_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_corporate_business_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-corporate-business'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_corporate_business_plugin_custom_css); ?>">
			  	<h3><?php esc_html_e( 'Block Patterns', 'vw-corporate-business' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-corporate-business'); ?></p>
              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-corporate-business'); ?></span></b></p>
              	<div class="vw-corporate-business-pattern-page">
			    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-corporate-business'); ?></a>
			    </div>
              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />				
	        </div>
		</div>
		
		<div id="lite_theme" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Corporate_Business_Plugin_Activation_Settings::get_instance();
				$vw_corporate_business_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-corporate-business-recommended-plugins">
				    <div class="vw-corporate-business-action-list">
				    	<div class="vw-corporate-business-activation-note">
							<?php esc_html_e('Your filesystem not have write permission, please give writable access to your filesystem','vw-corporate-business'); ?>
						</div>
				        <?php if ($vw_corporate_business_actions): foreach ($vw_corporate_business_actions as $key => $vw_corporate_business_actionValue): ?>
				                <div class="vw-corporate-business-action" id="<?php echo esc_attr($vw_corporate_business_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_corporate_business_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_corporate_business_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_corporate_business_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-corporate-business'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_corporate_business_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-corporate-business' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e(' VW Business theme is known for its uniqueness. It can be an excellent selection for the startups and the medium sized companies. Being a suitable theme for the marketing as well as promotion of business online, it is totally conceptualised and has the professional design that will the cause of envy for many rivals. Suitable for the corporate business as well as the business websites, this theme covers various business verticals like architecture, health, design, art, aviation, ecommerce and much more. Apart from this, this advanced theme VW business is very much suitable for the bloggers, travellers and the shop owners. Since it is SEO friendly as well as mobile friendly, it is a high suitability for the business enterprises as well as business portfolios. Because of its compatibility with the different browsers and the user friendly characteristics, it is very much suitable for the corporate businesses, digital agencies and a top priority for consultants as well. One of the specialities about VW business is the elegant and sophisticated testimonial section. Besides this, it is SEO roundly as well. Since it is based on Bootstrap, you have the stunning websites and the compatibility factor is simply amazing. It has compatibility with the WooCommerce. The CTA [call to action button] will give directions to go to other page. Since VW business is translation ready with a secure and clean code, your business website can make it big easily on a global platform.','vw-corporate-business'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-corporate-business' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-corporate-business' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-corporate-business' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-corporate-business'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-corporate-business'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-corporate-business'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-corporate-business'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-corporate-business'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-corporate-business'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-corporate-business'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-corporate-business'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-corporate-business'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-corporate-business' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-image"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-corporate-business'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_corporate_business_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-corporate-business'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_corporate_business_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Section','vw-corporate-business'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_corporate_business_about_section') ); ?>" target="_blank"><?php esc_html_e('About Section','vw-corporate-business'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-editor-aligncenter"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-corporate-business'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-corporate-business'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_corporate_business_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-corporate-business'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_corporate_business_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-corporate-business'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_corporate_business_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-corporate-business'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_corporate_business_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-corporate-business'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-corporate-business'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-corporate-business'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-corporate-business'); ?></span><?php esc_html_e(' Go to ','vw-corporate-business'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-corporate-business'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-corporate-business'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-corporate-business'); ?></span><?php esc_html_e(' Go to ','vw-corporate-business'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-corporate-business'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-corporate-business'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-corporate-business'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-corporate-business/" target="_blank"><?php esc_html_e('Documentation','vw-corporate-business'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>	

		<div id="business_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-corporate-business' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('WordPress themes for business do have enormous features that are very important for the online business needs. You can also call them as the cutting edge masterpieces of WordPress development. The successful business is the one that adapts to the market and such themes are helpful in fulfilling this condition. One of the special features is the crisp typography making them perfect option for the full screen image sliders as well as the white space. With themes of such category, you have the drag and drop massive builder. With this, you can create the layouts. Another characteristic is the flexibility enabling endless header and page design. These themes of premium level come with the innumerable shortcodes and this is to help in the website design. With some of such themes, you have many layout options and can approach all from theme customization panel. WordPress themes for business are beneficial for your online business growth and development.','vw-corporate-business'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-corporate-business'); ?></a>
					<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'vw-corporate-business'); ?></a>
					<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-corporate-business'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-corporate-business' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-corporate-business'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-corporate-business'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-corporate-business'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-corporate-business'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-corporate-business'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-corporate-business'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-corporate-business'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-corporate-business'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-corporate-business'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-corporate-business'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-corporate-business'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-corporate-business'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-corporate-business'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'vw-corporate-business'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-corporate-business'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-corporate-business'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-corporate-business'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-corporate-business'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-corporate-business'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-corporate-business'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-corporate-business'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-corporate-business'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-corporate-business'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-corporate-business'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-corporate-business'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-corporate-business'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-corporate-business'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-corporate-business'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-corporate-business'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-corporate-business'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-corporate-business'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-corporate-business'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-corporate-business'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-corporate-business'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-corporate-business'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-corporate-business'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CORPORATE_BUSINESS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-corporate-business'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>