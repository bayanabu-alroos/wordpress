<?php

function blog_foodie_customize_register( $wp_customize ) {

	Class Blog_Foodie_Switch_Control extends WP_Customize_Control{

		public $type = 'switch';

		public $on_off_label = array();

		public function __construct( $manager, $id, $args = array() ){
	        $this->on_off_label = $args['on_off_label'];
	        parent::__construct( $manager, $id, $args );
	    }

		public function render_content(){
	    ?>
		    <span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
			</span>

			<?php if( $this->description ){ ?>
				<span class="description customize-control-description">
				<?php echo wp_kses_post( $this->description ); ?>
				</span>
			<?php } ?>

			<?php
				$switch_class = ( $this->value() == 'true' ) ? 'switch-on' : '';
				$on_off_label = $this->on_off_label;
			?>
			<div class="onoffswitch <?php echo esc_attr( $switch_class ); ?>">
				<div class="onoffswitch-inner">
					<div class="onoffswitch-active">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['on'] ) ?></div>
					</div>

					<div class="onoffswitch-inactive">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['off'] ) ?></div>
					</div>
				</div>	
			</div>
			<input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr( $this->value() ); ?>"/>
			<?php
	    }
	}

	Class Blog_Foodie_Dropdown_Chooser extends WP_Customize_Control{

		public $type = 'dropdown_chooser';

		public function render_content(){
			if ( empty( $this->choices ) )
	                return;
			?>
	            <label>
	                <span class="customize-control-title">
	                	<?php echo esc_html( $this->label ); ?>
	                </span>

	                <?php if($this->description){ ?>
		            <span class="description customize-control-description">
		            	<?php echo wp_kses_post($this->description); ?>
		            </span>
		            <?php } ?>

	                <select class="blog-foodie-chosen-select" <?php $this->link(); ?>>
	                    <?php
	                    foreach ( $this->choices as $value => $label )
	                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
	                    ?>
	                </select>
	            </label>
			<?php
		}
	}

	Class Blog_Foodie_Dropdown_Taxonomies_Control extends WP_Customize_Control {

		public $type = 'dropdown-taxonomies';

		public $taxonomy = '';

		public function __construct( $manager, $id, $args = array() ) {

			$taxonomy = 'category';
			if ( isset( $args['taxonomy'] ) ) {
				$taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
				if ( true === $taxonomy_exist ) {
					$taxonomy = esc_attr( $args['taxonomy'] );
				}
			}
			$args['taxonomy'] = $taxonomy;
			$this->taxonomy = esc_attr( $taxonomy );

			parent::__construct( $manager, $id, $args );
		}

		public function render_content() {

			$tax_args = array(
				'hierarchical' => 0,
				'taxonomy'     => $this->taxonomy,
			);
			$taxonomies = get_categories( $tax_args );

		?>
	    <label>
	      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	      <?php if ( ! empty( $this->description ) ) : ?>
	      	<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
	      <?php endif; ?>
	       <select <?php $this->link(); ?>>
				<?php
				printf( '<option value="%s" %s>%s</option>', '', selected( $this->value(), '', false ), esc_html__( '--None--', 'blog-foodie') );
				?>
				<?php if ( ! empty( $taxonomies ) ) :  ?>
	            <?php foreach ( $taxonomies as $key => $tax ) :  ?>
					<?php
					printf( '<option value="%s" %s>%s</option>', esc_attr( $tax->term_id ), selected( $this->value(), $tax->term_id, false ), esc_html( $tax->name ) );
					?>
	            <?php endforeach ?>
				<?php endif ?>
	       </select>
	    </label>
	    <?php
		}
	}


	$wp_customize->remove_section( 'colors' );

	$wp_customize->add_setting( 'blog_foodie_topbar_number', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'blog_foodie_topbar_number', array(
		'label'           	=> esc_html__( 'Phone Number', 'blog-foodie' ),
		'section'        	=> 'vivid_blog_topbar_section',
		'type'				=> 'text',
	) );

	$wp_customize->add_setting( 'blog_foodie_topbar_email', array(
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'blog_foodie_topbar_email', array(
		'label'           	=> esc_html__( 'Email', 'blog-foodie' ),
		'section'        	=> 'vivid_blog_topbar_section',
		'type'				=> 'email',
	) );

	$wp_customize->add_setting( 'blog_foodie_topbar_address', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'blog_foodie_topbar_address', array(
		'label'           	=> esc_html__( 'Address', 'blog-foodie' ),
		'section'        	=> 'vivid_blog_topbar_section',
		'type'				=> 'text',
	) );

	// Add gallery section
	$wp_customize->add_section( 'vivid_blog_gallery_section', array(
		'title'             => esc_html__( 'Gallery','blog-foodie' ),
		'description'       => esc_html__( 'Gallery Section options.', 'blog-foodie' ),
		'panel'             => 'vivid_blog_front_page_panel',
		'priority' => 22,
	) );

	// gallery content enable control and setting
	$wp_customize->add_setting( 'blog_foodie_gallery_section_enable', array(
		'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
	) );

	$wp_customize->add_control( new Blog_Foodie_Switch_Control( $wp_customize, 'blog_foodie_gallery_section_enable', array(
		'label'             => esc_html__( 'Gallery Enable', 'blog-foodie' ),
		'section'           => 'vivid_blog_gallery_section',
		'on_off_label' 		=> vivid_blog_switch_options(),
	) ) );


	$wp_customize->add_setting(  'blog_foodie_gallery_section_category', array(
		'sanitize_callback' => 'vivid_blog_sanitize_single_category',
	) ) ;

	$wp_customize->add_control( new Blog_Foodie_Dropdown_Taxonomies_Control( $wp_customize,'blog_foodie_gallery_section_category', array(
		'label'             => esc_html__( 'Select Category', 'blog-foodie' ),
		'description'      	=> esc_html__( 'Note: Latest six posts will be shown from selected category', 'blog-foodie' ),
		'section'           => 'vivid_blog_gallery_section',
		'type'              => 'dropdown-taxonomies',
		'active_callback'	=> 'blog_foodie_is_gallery_section_enable'
	) ) );

	// Add cta section
	$wp_customize->add_section( 'vivid_blog_cta_section', array(
		'title'             => esc_html__( 'Cta','blog-foodie' ),
		'description'       => esc_html__( 'Cta Section options.', 'blog-foodie' ),
		'panel'             => 'vivid_blog_front_page_panel',
		'priority' => 21,
	) );

	// cta content enable control and setting
	$wp_customize->add_setting( 'blog_foodie_cta_section_enable', array(
		'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
	) );

	$wp_customize->add_control( new Blog_Foodie_Switch_Control( $wp_customize, 'blog_foodie_cta_section_enable', array(
		'label'             => esc_html__( 'Cta Enable', 'blog-foodie' ),
		'section'           => 'vivid_blog_cta_section',
		'on_off_label' 		=> vivid_blog_switch_options(),
	) ) );

	
	// cta sub_title setting and control
	$wp_customize->add_setting( 'blog_foodie_cta_section_sub_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'blog_foodie_cta_section_sub_title', array(
		'label'           	=> esc_html__( 'Section Sub Title ', 'blog-foodie' ),
		'section'        	=> 'vivid_blog_cta_section',
		'active_callback' 	=> 'blog_foodie_is_cta_section_enable',
		'type'				=> 'text',
	) );

	$wp_customize->add_setting( 'blog_foodie_cta_section_show_more_label', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'blog_foodie_cta_section_show_more_label', array(
		'label'           	=> esc_html__( 'Section Show More Label', 'blog-foodie' ),
		'section'        	=> 'vivid_blog_cta_section',
		'active_callback' 	=> 'blog_foodie_is_cta_section_enable',
		'type'				=> 'text',
	) );

	$wp_customize->add_setting( 'blog_foodie_cta_content_page', array(
		'sanitize_callback' => 'vivid_blog_sanitize_page',
	) );

	$wp_customize->add_control( new Blog_Foodie_Dropdown_Chooser( $wp_customize, 'blog_foodie_cta_content_page', array(
		'label'             => esc_html__( 'Select Page', 'blog-foodie' ),
		'section'           => 'vivid_blog_cta_section',
		'choices'			=> vivid_blog_page_choices(),
		'active_callback'	=> 'blog_foodie_is_cta_section_enable',
	) ) );


	// Add quote section
	$wp_customize->add_section( 'vivid_blog_quote_section', array(
		'title'             => esc_html__( 'Quote','blog-foodie' ),
		'description'       => esc_html__( 'Quote Section options.', 'blog-foodie' ),
		'panel'             => 'vivid_blog_front_page_panel',
		'priority' => 35,
	) );

	// quote content enable control and setting
	$wp_customize->add_setting( 'blog_foodie_quote_section_enable', array(
		'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
	) );

	$wp_customize->add_control( new Blog_Foodie_Switch_Control( $wp_customize, 'blog_foodie_quote_section_enable', array(
		'label'             => esc_html__( 'Quote Enable', 'blog-foodie' ),
		'section'           => 'vivid_blog_quote_section',
		'on_off_label' 		=> vivid_blog_switch_options(),
	) ) );

	
	// quote sub_title setting and control
	$wp_customize->add_setting( 'blog_foodie_quote_section_sub_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'blog_foodie_quote_section_sub_title', array(
		'label'           	=> esc_html__( 'Section Sub Title ', 'blog-foodie' ),
		'section'        	=> 'vivid_blog_quote_section',
		'active_callback' 	=> 'blog_foodie_is_quote_section_enable',
		'type'				=> 'text',
	) );

	$wp_customize->add_setting( 'blog_foodie_quote_bg_image', array(
		'sanitize_callback' => 'vivid_blog_sanitize_image'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_foodie_quote_bg_image',
			array(
			'label'       		=> esc_html__( 'BG Image', 'blog-foodie' ),
			'active_callback' 	=> 'blog_foodie_is_quote_section_enable',
			'section'     		=> 'vivid_blog_quote_section',
	) ) );


	$wp_customize->add_setting( 'blog_foodie_quote_content_page', array(
		'sanitize_callback' => 'vivid_blog_sanitize_page',
	) );

	$wp_customize->add_control( new Blog_Foodie_Dropdown_Chooser( $wp_customize, 'blog_foodie_quote_content_page', array(
		'label'             => esc_html__( 'Select Page', 'blog-foodie' ),
		'section'           => 'vivid_blog_quote_section',
		'choices'			=> vivid_blog_page_choices(),
		'active_callback'	=> 'blog_foodie_is_quote_section_enable',
	) ) );

}
add_action( 'customize_register', 'blog_foodie_customize_register' );


function blog_foodie_is_gallery_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blog_foodie_gallery_section_enable' )->value() );
}

function blog_foodie_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blog_foodie_cta_section_enable' )->value() );
}

function blog_foodie_is_quote_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blog_foodie_quote_section_enable' )->value() );
}
