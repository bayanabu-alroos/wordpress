<?php
/**
 * VW Portfolio Theme Customizer
 *
 * @package VW Portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_portfolio_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_portfolio_custom_controls' );

function vw_portfolio_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_portfolio_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_portfolio_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWPortfolioParentPanel = new VW_Portfolio_WP_Customize_Panel( $wp_customize, 'vw_portfolio_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-portfolio' ),
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_portfolio_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-portfolio' ),
		'panel' => 'vw_portfolio_panel_id'
	) );

	$wp_customize->add_setting('vw_portfolio_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Portfolio_Image_Radio_Control($wp_customize, 'vw_portfolio_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-portfolio'),
        'description' => __('Here you can change the width layout of Website.','vw-portfolio'),
        'section' => 'vw_portfolio_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_portfolio_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_portfolio_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-portfolio'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-portfolio'),
        'section' => 'vw_portfolio_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-portfolio'),
            'Right Sidebar' => __('Right Sidebar','vw-portfolio'),
            'One Column' => __('One Column','vw-portfolio'),
            'Three Columns' => __('Three Columns','vw-portfolio'),
            'Four Columns' => __('Four Columns','vw-portfolio'),
            'Grid Layout' => __('Grid Layout','vw-portfolio')
        ),
	));

	$wp_customize->add_setting('vw_portfolio_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('vw_portfolio_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-portfolio'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-portfolio'),
        'section' => 'vw_portfolio_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-portfolio'),
            'Right Sidebar' => __('Right Sidebar','vw-portfolio'),
            'One Column' => __('One Column','vw-portfolio')
        ),
	) );

	//Sticky Header
	$wp_customize->add_setting( 'vw_portfolio_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-portfolio' ),
        'section' => 'vw_portfolio_left_right'
    )));

    $wp_customize->add_setting('vw_portfolio_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_left_right',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_left_right',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('vw_portfolio_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-portfolio'),
        'section' => 'vw_portfolio_left_right',
        'choices' => array(
        	'Default' => __('Default','vw-portfolio'),
            'Normal' => __('Normal','vw-portfolio')
        ),
	) );

	//search
	$wp_customize->add_setting( 'vw_portfolio_search_hide_show',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_search_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Search','vw-portfolio' ),
      'section' => 'vw_portfolio_left_right'
    )));

    $wp_customize->add_setting('vw_portfolio_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Portfolio_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_portfolio_search_icon',array(
		'label'	=> __('Add Search Icon','vw-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'vw_portfolio_left_right',
		'setting'	=> 'vw_portfolio_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_portfolio_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Portfolio_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_portfolio_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'vw_portfolio_left_right',
		'setting'	=> 'vw_portfolio_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_portfolio_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_search_font_size',array(
		'label'	=> __('Search Font Size','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_left_right',
		'type'=> 'text'
	));

    //Pre-Loader
	$wp_customize->add_setting( 'vw_portfolio_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-portfolio' ),
        'section' => 'vw_portfolio_left_right'
    )));

    $wp_customize->add_setting('vw_portfolio_preloader_bg_color', array(
		'default'           => '#75caf7',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_portfolio_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-portfolio'),
		'section'  => 'vw_portfolio_left_right',
	)));

	$wp_customize->add_setting('vw_portfolio_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_portfolio_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-portfolio'),
		'section'  => 'vw_portfolio_left_right',
	)));
    
	//Slider
	$wp_customize->add_section( 'vw_portfolio_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-portfolio' ),
		'priority'   => null,
		'panel' => 'vw_portfolio_panel_id'
	) );

	$wp_customize->add_setting( 'vw_portfolio_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-portfolio' ),
      'section' => 'vw_portfolio_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_portfolio_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_portfolio_customize_partial_vw_portfolio_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_portfolio_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_portfolio_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_portfolio_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-portfolio' ),
			'description' => __('Slider image size (1500 x 600)','vw-portfolio'),
			'section'  => 'vw_portfolio_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_portfolio_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_slidersettings',
		'type'=> 'text'
	));

	//content layout
	$wp_customize->add_setting('vw_portfolio_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Portfolio_Image_Radio_Control($wp_customize, 'vw_portfolio_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-portfolio'),
        'section' => 'vw_portfolio_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/slider-content3.png',
    ))));

    //Slider content padding
    $wp_customize->add_setting('vw_portfolio_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-portfolio'),
		'description'	=> __('Enter a value in %. Example:20%','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-portfolio'),
		'description'	=> __('Enter a value in %. Example:20%','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_slidersettings',
		'type'=> 'text'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_portfolio_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-portfolio' ),
		'section'     => 'vw_portfolio_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_portfolio_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_portfolio_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_portfolio_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_portfolio_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-portfolio' ),
	'section'     => 'vw_portfolio_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_portfolio_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-portfolio'),
      '0.1' =>  esc_attr('0.1','vw-portfolio'),
      '0.2' =>  esc_attr('0.2','vw-portfolio'),
      '0.3' =>  esc_attr('0.3','vw-portfolio'),
      '0.4' =>  esc_attr('0.4','vw-portfolio'),
      '0.5' =>  esc_attr('0.5','vw-portfolio'),
      '0.6' =>  esc_attr('0.6','vw-portfolio'),
      '0.7' =>  esc_attr('0.7','vw-portfolio'),
      '0.8' =>  esc_attr('0.8','vw-portfolio'),
      '0.9' =>  esc_attr('0.9','vw-portfolio')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_portfolio_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_slider_height',array(
		'label'	=> __('Slider Height','vw-portfolio'),
		'description'	=> __('Specify the slider height (px).','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_portfolio_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_portfolio_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_portfolio_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-portfolio'),
		'section' => 'vw_portfolio_slidersettings',
		'type'  => 'number',
	) );

	//Awesome Service
	$wp_customize->add_section( 'vw_portfolio_services_section' , array(
    	'title'      => __( 'Awesome Services', 'vw-portfolio' ),
		'priority'   => null,
		'panel' => 'vw_portfolio_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_portfolio_section_title', array( 
		'selector' => '#services h2', 
		'render_callback' => 'vw_portfolio_customize_partial_vw_portfolio_section_title',
	));

	$wp_customize->add_setting('vw_portfolio_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_portfolio_section_title',array(
		'label'	=> __('Section Title','vw-portfolio'),
		'section'=> 'vw_portfolio_services_section',
		'setting'=> 'vw_portfolio_section_title',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$catpst[]='Select';
	foreach($categories as $category){
		if($i==0){
		$default = $category->slug;
		$i++;
		}
		$catpst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_portfolio_awesome_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('vw_portfolio_awesome_services',array(
		'type'    => 'select',
		'choices' => $catpst,
		'label' => __('Select Category to display Services','vw-portfolio'),
		'description' => __('Image size (120 x 120)','vw-portfolio'),
		'section' => 'vw_portfolio_services_section',
	));

	//Services excerpt
	$wp_customize->add_setting( 'vw_portfolio_services_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','vw-portfolio' ),
		'section'     => 'vw_portfolio_services_section',
		'type'        => 'range',
		'settings'    => 'vw_portfolio_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $VWPortfolioParentPanel );

	$BlogPostParentPanel = new VW_Portfolio_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-portfolio' ),
		'panel' => 'vw_portfolio_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_portfolio_post_settings', array(
		'title' => __( 'Post Settings', 'vw-portfolio' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_portfolio_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_portfolio_customize_partial_vw_portfolio_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_portfolio_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-portfolio' ),
        'section' => 'vw_portfolio_post_settings'
    )));

    $wp_customize->add_setting( 'vw_portfolio_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_toggle_author',array(
		'label' => esc_html__( 'Author','vw-portfolio' ),
		'section' => 'vw_portfolio_post_settings'
    )));

    $wp_customize->add_setting( 'vw_portfolio_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-portfolio' ),
		'section' => 'vw_portfolio_post_settings'
    )));

     $wp_customize->add_setting( 'vw_portfolio_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_toggle_time',array(
		'label' => esc_html__( 'Time','vw-portfolio' ),
		'section' => 'vw_portfolio_post_settings'
    )));

    $wp_customize->add_setting( 'vw_portfolio_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_portfolio_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-portfolio' ),
		'section' => 'vw_portfolio_post_settings'
    )));

    $wp_customize->add_setting( 'vw_portfolio_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-portfolio' ),
		'section'     => 'vw_portfolio_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_portfolio_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-portfolio' ),
		'section'     => 'vw_portfolio_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'vw_portfolio_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-portfolio' ),
		'section'     => 'vw_portfolio_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_portfolio_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_portfolio_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-portfolio'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-portfolio'),
		'section'=> 'vw_portfolio_post_settings',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('vw_portfolio_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Portfolio_Image_Radio_Control($wp_customize, 'vw_portfolio_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-portfolio'),
        'section' => 'vw_portfolio_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_portfolio_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('vw_portfolio_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-portfolio'),
        'section' => 'vw_portfolio_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-portfolio'),
            'Excerpt' => __('Excerpt','vw-portfolio'),
            'No Content' => __('No Content','vw-portfolio')
        ),
	) );

	$wp_customize->add_setting('vw_portfolio_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_portfolio_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-portfolio' ),
      'section' => 'vw_portfolio_post_settings'
    )));

	$wp_customize->add_setting( 'vw_portfolio_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_portfolio_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_portfolio_blog_pagination_type', array(
        'section' => 'vw_portfolio_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-portfolio' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-portfolio' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-portfolio' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_portfolio_button_settings', array(
		'title' => __( 'Button Settings', 'vw-portfolio' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_portfolio_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_portfolio_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-portfolio' ),
		'section'     => 'vw_portfolio_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_portfolio_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_portfolio_customize_partial_vw_portfolio_button_text', 
	));

    $wp_customize->add_setting('vw_portfolio_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_button_text',array(
		'label'	=> __('Add Button Text','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_portfolio_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-portfolio' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_portfolio_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_portfolio_customize_partial_vw_portfolio_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_portfolio_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_related_post',array(
		'label' => esc_html__( 'Related Post','vw-portfolio' ),
		'section' => 'vw_portfolio_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_portfolio_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_portfolio_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_portfolio_sanitize_float'
	));
	$wp_customize->add_control('vw_portfolio_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_portfolio_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-portfolio' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_portfolio_single_post_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-portfolio'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-portfolio'),
		'section'=> 'vw_portfolio_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_portfolio_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_portfolio_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-portfolio' ),
		'section' => 'vw_portfolio_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_portfolio_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_portfolio_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-portfolio' ),
		'section' => 'vw_portfolio_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_portfolio_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_portfolio_404_page',array(
		'title'	=> __('404 Page Settings','vw-portfolio'),
		'panel' => 'vw_portfolio_panel_id',
	));	

	$wp_customize->add_setting('vw_portfolio_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_portfolio_404_page_title',array(
		'label'	=> __('Add Title','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_portfolio_404_page_content',array(
		'label'	=> __('Add Text','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_portfolio_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-portfolio'),
		'panel' => 'vw_portfolio_panel_id',
	));	

	$wp_customize->add_setting('vw_portfolio_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_portfolio_no_results_page_title',array(
		'label'	=> __('Add Title','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_portfolio_no_results_page_content',array(
		'label'	=> __('Add Text','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_portfolio_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-portfolio'),
		'panel' => 'vw_portfolio_panel_id',
	));	

	$wp_customize->add_setting('vw_portfolio_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_social_icon_width',array(
		'label'	=> __('Icon Width','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_social_icon_height',array(
		'label'	=> __('Icon Height','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_portfolio_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-portfolio' ),
		'section'     => 'vw_portfolio_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_portfolio_responsive_media',array(
		'title'	=> __('Responsive Media','vw-portfolio'),
		'panel' => 'vw_portfolio_panel_id',
	));

    $wp_customize->add_setting( 'vw_portfolio_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-portfolio' ),
      'section' => 'vw_portfolio_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_portfolio_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-portfolio' ),
      'section' => 'vw_portfolio_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_portfolio_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-portfolio' ),
      'section' => 'vw_portfolio_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_portfolio_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-portfolio' ),
      'section' => 'vw_portfolio_responsive_media'
    )));

    $wp_customize->add_setting('vw_portfolio_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Portfolio_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_portfolio_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'vw_portfolio_responsive_media',
		'setting'	=> 'vw_portfolio_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_portfolio_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Portfolio_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_portfolio_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'vw_portfolio_responsive_media',
		'setting'	=> 'vw_portfolio_res_close_menus_icon',
		'type'		=> 'icon'
	)));
	
	//Footer Text
	$wp_customize->add_section('vw_portfolio_footer',array(
		'title'	=> __('Footer','vw-portfolio'),
		'description'=> __('This section will appear in the footer','vw-portfolio'),
		'panel' => 'vw_portfolio_panel_id',
	));	

	$wp_customize->add_setting('vw_portfolio_footer_background_color', array(
		'default'           => '#1a1a1a',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_portfolio_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-portfolio'),
		'section'  => 'vw_portfolio_footer',
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_portfolio_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_portfolio_customize_partial_vw_portfolio_footer_text', 
	));
	
	$wp_customize->add_setting('vw_portfolio_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_portfolio_footer_text',array(
		'label'	=> __('Copyright Text','vw-portfolio'),
		'section'=> 'vw_portfolio_footer',
		'setting'=> 'vw_portfolio_footer_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Portfolio_Image_Radio_Control($wp_customize, 'vw_portfolio_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-portfolio'),
        'section' => 'vw_portfolio_footer',
        'settings' => 'vw_portfolio_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_portfolio_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-portfolio' ),
      	'section' => 'vw_portfolio_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_portfolio_scroll_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_portfolio_customize_partial_vw_portfolio_scroll_top_icon', 
	));

    $wp_customize->add_setting('vw_portfolio_scroll_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Portfolio_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_portfolio_scroll_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-portfolio'),
		'transport' => 'refresh',
		'section'	=> 'vw_portfolio_footer',
		'setting'	=> 'vw_portfolio_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_portfolio_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-portfolio'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_portfolio_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-portfolio' ),
		'section'     => 'vw_portfolio_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_portfolio_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Portfolio_Image_Radio_Control($wp_customize, 'vw_portfolio_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-portfolio'),
        'section' => 'vw_portfolio_footer',
        'settings' => 'vw_portfolio_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_portfolio_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-portfolio'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_portfolio_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
		'render_callback' => 'vw_portfolio_customize_partial_vw_portfolio_woocommerce_shop_page_sidebar', ) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_portfolio_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-portfolio' ),
		'section' => 'vw_portfolio_woocommerce_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_portfolio_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
		'render_callback' => 'vw_portfolio_customize_partial_vw_portfolio_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_portfolio_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_portfolio_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Portfolio_Toggle_Switch_Custom_Control( $wp_customize, 'vw_portfolio_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-portfolio' ),
		'section' => 'vw_portfolio_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_portfolio_products_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'vw_portfolio_sanitize_float'
	));
	$wp_customize->add_control('vw_portfolio_products_per_page',array(
		'label'	=> __('Products Per Page','vw-portfolio'),
		'description' => __('Display on shop page','vw-portfolio'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_portfolio_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_portfolio_products_per_row',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('vw_portfolio_products_per_row',array(
		'label'	=> __('Products Per Row','vw-portfolio'),
		'description' => __('Display on shop page','vw-portfolio'),
		'choices' => array(
            2 => 2,
			3 => 3,
			4 => 4,
        ),
		'section'=> 'vw_portfolio_woocommerce_section',
		'type'=> 'select',
	));	

	//Products padding
	$wp_customize->add_setting('vw_portfolio_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_portfolio_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-portfolio' ),
		'section'     => 'vw_portfolio_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_portfolio_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-portfolio' ),
		'section'     => 'vw_portfolio_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_portfolio_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_portfolio_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_portfolio_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-portfolio' ),
		'section'     => 'vw_portfolio_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_portfolio_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'
	));
	$wp_customize->add_control('vw_portfolio_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-portfolio'),
        'section' => 'vw_portfolio_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-portfolio'),
            'right' => __('Right','vw-portfolio'),
        ),
	) );

	$wp_customize->add_setting('vw_portfolio_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_portfolio_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-portfolio'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-portfolio'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-portfolio' ),
        ),
		'section'=> 'vw_portfolio_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_portfolio_woocommerce_sale_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_portfolio_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_portfolio_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-portfolio' ),
		'section'     => 'vw_portfolio_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Portfolio_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Portfolio_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_portfolio_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Portfolio_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_portfolio_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Portfolio_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_portfolio_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_portfolio_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_portfolio_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Portfolio_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Portfolio_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Portfolio_Customize_Section_Pro($manager,'vw_portfolio_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Portfolio Pro', 'vw-portfolio' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-portfolio' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-portfolio-theme/'),
		)));

		$manager->add_section(new VW_Portfolio_Customize_Section_Pro($manager,'vw_portfolio_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-portfolio' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-portfolio' ),
			'pro_url'  => admin_url('themes.php?page=vw_portfolio_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-portfolio-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-portfolio-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Portfolio_Customize::get_instance();