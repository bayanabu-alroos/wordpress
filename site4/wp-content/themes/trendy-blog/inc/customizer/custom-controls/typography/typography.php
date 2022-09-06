<?php
/**
 * WP Trendy Blog Typography class
 * 
 * @package Trendy Blog
 * @since 1.0.0
 */
class Trendy_Blog_WP_Typography_Control extends WP_Customize_Control {
	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Boolean
	 * 
	 */
	public $initial = false;

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {
		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );
		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'family'      => esc_html__( 'Font Family', 'trendy-blog' ),
				'size'        => esc_html__( 'Font Size',   'trendy-blog' ),
				'weight'      => esc_html__( 'Font Weight', 'trendy-blog' ),
				'color'       => esc_html__( 'Font Color', 'trendy-blog' ),
				'style'       => esc_html__( 'Font Style',  'trendy-blog' ),
				'line_height' => esc_html__( 'Line Height', 'trendy-blog' ),
				'inherit' => esc_html__( 'Click on custom to see changes you made here. Theme default will revert typography to the default values generated by theme', 'trendy-blog' )
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'typography-customizer-controls', get_template_directory_uri() . '/inc/customizer/custom-controls/typography/typography.css', array(), TRENDY_BLOG_VERSION, 'all' );
        wp_enqueue_script( 'typography-customizer-controls', get_template_directory_uri() . '/inc/customizer/custom-controls/typography/typography.js', array( 'jquery', 'wp-color-picker' ), TRENDY_BLOG_VERSION, true );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {
			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'defaultValue' => $setting_id->default,
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);
			$this->json['initial'] = $this->initial;
			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();
			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();
			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
			elseif ( 'inherit' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_inherit_choices();
		}
	}
	
	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>
		<# if( ! data.initial ) { #>
			<# if ( data.label ) { #>
				<div class="heading-wrap">
					<span class="customize-control-title">{{ data.label }}</span>
					<span class="popup-trigger dashicons dashicons-edit close"></span>
				</div>
			<# } #>

			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
		<# } #>

		<# if( data.initial ) { #>
			<ul class="content-wrap show open">
		<# } else { #>
			<ul class="content-wrap close">
		<# } #>
			<# if ( data.inherit && data.inherit.choices ) { #>
                <li class="typography-inherit-tab">
					<div class="tab-content">
						<# _.each( data.inherit.choices, function( label, choice ) { #>
							<span class="tab-item <# if ( choice === data.inherit.value ) { #> isActive <# } #>" data-value="{{ choice }}">{{ label }}</span>
						<# } ) #>
						<input {{{ data.inherit.link }}} type="hidden" value={{data.inherit.value}}/>
					</div>
					<# if ( data.inherit.label ) { #>
                        <span class="tab-title">{{ data.inherit.label }}</span>
                    <# } #>
                </li>
            <# } #>
            <# if ( data.family && data.family.choices ) { #>
                <li class="typography-font-family">
                    <# if ( data.family.label ) { #>
                        <span class="customize-control-title">{{ data.family.label }}</span>
                    <# } #>

                    <select {{{ data.family.link }}}>
                        <# _.each( data.family.choices, function( label, choice ) { #>
                            <option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ choice }}</option>
                        <# } ) #>
                    </select>
                </li>
            <# } #>

            <# if ( data.weight && data.weight.choices ) { #>
                <li class="typography-font-weight">
                    <# if ( data.weight.label ) { #>
                        <span class="customize-control-title">{{ data.weight.label }}</span>
                    <# } #>

                    <select {{{ data.weight.link }}}>
                        <# _.each( data.weight.choices, function( label, choice ) { #>
                            <option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ choice }}</option>
                        <# } ) #>
                    </select>
                </li>
            <# } #>

            <# if ( data.style && data.style.choices ) { #>

                <li class="typography-font-style">
                    <# if ( data.style.label ) { #>
                        <span class="customize-control-title">{{ data.style.label }}</span>
                    <# } #>

                    <select {{{ data.style.link }}}>
                        <# _.each( data.style.choices, function( label, choice ) { #>
                            <option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                        <# } ) #>
                    </select>
                </li>
            <# } #>

            <# if ( data.color ) { #>
                <li class="typography-font-color">
                    <# if ( data.color.label ) { #>
                        <span class="customize-control-title">{{ data.color.label }}</span>
                    <# } #>
					<input type="text" {{{ data.color.link }}} value="{{ data.color.value }}" class="trendy-blog-color-field" data-default-color="{{ data.color.defaultValue }}"/>
                </li>
            <# } #>

			<# if ( data.size ) { #>
				<li class="typography-font-size">
					<# if ( data.size.label ) { #>
						<span class="customize-control-title">{{ data.size.label }} (px)</span>
					<# } #>
					<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />
				</li>
			<# } #>

            <# if ( data.line_height ) { #>

                <li class="typography-line-height">

                    <# if ( data.line_height.label ) { #>
                        <span class="customize-control-title">{{ data.line_height.label }} (px)</span>
                    <# } #>

                    <input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

                </li>
            <# } #>
        </ul>
	<?php
    }
	
	/**
	 * Returns the available font families.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {
		$google_fonts_file = get_template_directory() . '/assets/lib/googleFonts.json';
		$google_fonts = array();
		if ( file_exists( $google_fonts_file ) ) {
			$google_fonts   = json_decode( file_get_contents( $google_fonts_file ), true );
		}
		return $google_fonts;
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {
		$google_fonts_file = get_template_directory() . '/assets/lib/googleFonts.json';
		$google_fonts = array();
		if ( file_exists( $google_fonts_file ) ) {
			$google_fonts   = json_decode( file_get_contents( $google_fonts_file ), true );
		}
		$default = $this->settings['family']->default;
		$font_family = get_theme_mod( $this->settings['family']->id, $default );
		return $google_fonts[$font_family]['variants']['normal'];
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {
		return array(
			'normal'  => esc_html__( 'Normal', 'trendy-blog' ),
			'italic'  => esc_html__( 'Italic', 'trendy-blog' ),
			'oblique' => esc_html__( 'Oblique', 'trendy-blog' )
		);
	}

	/**
	 * Returns the inherit field choices.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_inherit_choices() {
		return array(
			'theme-default'  => esc_html__( 'Theme Default', 'trendy-blog' ),
			'custom'  => esc_html__( 'Custom', 'trendy-blog' )
		);
	}
}