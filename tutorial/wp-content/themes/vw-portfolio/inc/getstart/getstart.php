<?php
//about theme info
add_action( 'admin_menu', 'vw_portfolio_gettingstarted' );
function vw_portfolio_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Portfolio', 'vw-portfolio'), esc_html__('About VW Portfolio', 'vw-portfolio'), 'edit_theme_options', 'vw_portfolio_guide', 'vw_portfolio_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_portfolio_admin_theme_style() {
   wp_enqueue_style('vw-portfolio-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-portfolio-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_portfolio_admin_theme_style');

//guidline for about theme
function vw_portfolio_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-portfolio' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Portfolio Theme', 'vw-portfolio' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-portfolio'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Portfolio at 20% Discount','vw-portfolio'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-portfolio'); ?> ( <span><?php esc_html_e('vwpro20','vw-portfolio'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( VW_PORTFOLIO_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-portfolio' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_portfolio_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-portfolio' ); ?></button>	
			<button class="tablinks" onclick="vw_portfolio_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-portfolio' ); ?></button>
			<button class="tablinks" onclick="vw_portfolio_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-portfolio' ); ?></button>	
			<button class="tablinks" onclick="vw_portfolio_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-portfolio' ); ?></button>
		 	<button class="tablinks" onclick="vw_portfolio_open_tab(event, 'portfolio_pro')"><?php esc_html_e( 'Get Premium', 'vw-portfolio' ); ?></button>
		 	<button class="tablinks" onclick="vw_portfolio_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-portfolio' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$vw_portfolio_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_portfolio_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Portfolio_Plugin_Activation_Settings::get_instance();
				$vw_portfolio_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-portfolio-recommended-plugins">
				    <div class="vw-portfolio-action-list">
				        <?php if ($vw_portfolio_actions): foreach ($vw_portfolio_actions as $key => $vw_portfolio_actionValue): ?>
				                <div class="vw-portfolio-action" id="<?php echo esc_attr($vw_portfolio_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_portfolio_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_portfolio_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_portfolio_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-portfolio'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_portfolio_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-portfolio' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e(' VW Portfolio is a stylish, modern and attractive WordPress portfolio theme for artists and designers who want the medium to showcase their work to be as unique as their work itself. The theme is built for designing creative portfolios, photography sites, graphic designers, painters, artists, web designers, design studios, decorators, and digital agencies. It can also be used for blogging. Its beautifully designed layout has well-arranged sections to accommodate your content in the most professional way without complicating the site design. It is fully responsive, cross-browser compatible, SEO-friendly and translation ready. The use of banner and life-size sliders leave a lasting impression on visitors. Built on Bootstrap framework, it is very easy to use for novice as well we webmasters. Customization through theme customizer is the most effective way to get the desired look for your website. As it is a portfolio theme, ample space is given to fit myriad of images.','vw-portfolio'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-portfolio' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-portfolio' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_PORTFOLIO_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-portfolio' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-portfolio'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-portfolio'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-portfolio'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-portfolio'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-portfolio'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_PORTFOLIO_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-portfolio'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-portfolio'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-portfolio'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_PORTFOLIO_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-portfolio'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-portfolio' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-portfolio'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-portfolio'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_services_section') ); ?>" target="_blank"><?php esc_html_e('Awesome Services','vw-portfolio'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=vw_portfolio_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-portfolio'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-portfolio'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-portfolio'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-portfolio'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-portfolio'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-portfolio'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-portfolio'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-portfolio'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-portfolio'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-portfolio'); ?></span><?php esc_html_e(' Go to ','vw-portfolio'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-portfolio'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-portfolio'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-portfolio'); ?></span><?php esc_html_e(' Go to ','vw-portfolio'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-portfolio'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-portfolio'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-portfolio'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-portfolio/" target="_blank"><?php esc_html_e('Documentation','vw-portfolio'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Portfolio_Plugin_Activation_Settings::get_instance();
			$vw_portfolio_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-portfolio-recommended-plugins">
				    <div class="vw-portfolio-action-list">
				        <?php if ($vw_portfolio_actions): foreach ($vw_portfolio_actions as $key => $vw_portfolio_actionValue): ?>
				                <div class="vw-portfolio-action" id="<?php echo esc_attr($vw_portfolio_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_portfolio_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_portfolio_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_portfolio_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-portfolio'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_portfolio_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-portfolio' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-portfolio'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-portfolio'); ?></span></b></p>
	              	<div class="vw-portfolio-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-portfolio'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />		
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-portfolio' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-portfolio'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-portfolio'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-portfolio'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-portfolio'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-portfolio'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-portfolio'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-portfolio'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-portfolio'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>			
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Portfolio_Plugin_Activation_Settings::get_instance();
			$vw_portfolio_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-portfolio-recommended-plugins">
				    <div class="vw-portfolio-action-list">
				        <?php if ($vw_portfolio_actions): foreach ($vw_portfolio_actions as $key => $vw_portfolio_actionValue): ?>
				                <div class="vw-portfolio-action" id="<?php echo esc_attr($vw_portfolio_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_portfolio_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_portfolio_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_portfolio_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-portfolio' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-portfolio-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-portfolio'); ?></a>
			    </div>

			     <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-portfolio' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-portfolio'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-portfolio'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-portfolio'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-portfolio'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-portfolio'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-portfolio'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_portfolio_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-portfolio'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-portfolio'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Portfolio_Plugin_Activation_Woo_Products::get_instance();
				$vw_portfolio_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-portfolio-recommended-plugins">
					    <div class="vw-portfolio-action-list">
					        <?php if ($vw_portfolio_actions): foreach ($vw_portfolio_actions as $key => $vw_portfolio_actionValue): ?>
					                <div class="vw-portfolio-action" id="<?php echo esc_attr($vw_portfolio_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_portfolio_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_portfolio_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_portfolio_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-portfolio' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-portfolio-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-portfolio'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-portfolio'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-portfolio'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-portfolio'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-portfolio'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-portfolio'); ?></span></b></p>
	              	<div class="vw-portfolio-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-portfolio'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-portfolio'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="portfolio_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-portfolio' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('The WordPress portfolio theme is the most stylish, attractive, modern and aesthetically designed theme for all the artists and designers who strive to showcase their art in a unique way. It is specially built for portfolio creation, photography websites, artists, graphic designers, painters, decorators, web designers, design studios, digital agencies, blogs and other designing websites. Its mesmerising design will compel viewers to take a look at your work at least once. Large size sliders and banners are used to grab viewers attention. This premium theme has 100% fluid layout making it fully responsive. It is made cross-browser compatible and translation ready. The theme is optimized for search engines to boost your site rank. It is linked with social media icons to make your art shareable on these platforms to get the much needed exposure. Though it comes with some premium plugins but it is light in weight to ensure speedy loading of your site.','vw-portfolio'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_PORTFOLIO_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-portfolio'); ?></a>
					<a href="<?php echo esc_url( VW_PORTFOLIO_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-portfolio'); ?></a>
					<a href="<?php echo esc_url( VW_PORTFOLIO_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-portfolio'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-portfolio' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-portfolio'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-portfolio'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-portfolio'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-portfolio'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-portfolio'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-portfolio'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-portfolio'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-portfolio'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-portfolio'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-portfolio'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-portfolio'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-portfolio'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-portfolio'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'vw-portfolio'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-portfolio'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-portfolio'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-portfolio'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-portfolio'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-portfolio'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-portfolio'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-portfolio'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_PORTFOLIO_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-portfolio'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-portfolio'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-portfolio'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PORTFOLIO_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-portfolio'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-portfolio'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-portfolio'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PORTFOLIO_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-portfolio'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-portfolio'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-portfolio'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PORTFOLIO_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-portfolio'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-portfolio'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-portfolio'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PORTFOLIO_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-portfolio'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-portfolio'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-portfolio'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PORTFOLIO_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-portfolio'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>