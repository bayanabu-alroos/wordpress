<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Portfolio_Control_Typography extends WP_Customize_Control {

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
				'color'       => esc_html__( 'Font Color', 'vw-portfolio' ),
				'family'      => esc_html__( 'Font Family', 'vw-portfolio' ),
				'size'        => esc_html__( 'Font Size',   'vw-portfolio' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-portfolio' ),
				'style'       => esc_html__( 'Font Style',  'vw-portfolio' ),
				'line_height' => esc_html__( 'Line Height', 'vw-portfolio' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-portfolio' ),
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
		wp_enqueue_script( 'vw-portfolio-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-portfolio-ctypo-customize-controls' );
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
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
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

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
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

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

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

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-portfolio' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-portfolio' ),
        'Acme' => __( 'Acme', 'vw-portfolio' ),
        'Anton' => __( 'Anton', 'vw-portfolio' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-portfolio' ),
        'Arimo' => __( 'Arimo', 'vw-portfolio' ),
        'Arsenal' => __( 'Arsenal', 'vw-portfolio' ),
        'Arvo' => __( 'Arvo', 'vw-portfolio' ),
        'Alegreya' => __( 'Alegreya', 'vw-portfolio' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-portfolio' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-portfolio' ),
        'Bangers' => __( 'Bangers', 'vw-portfolio' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-portfolio' ),
        'Bad Script' => __( 'Bad Script', 'vw-portfolio' ),
        'Bitter' => __( 'Bitter', 'vw-portfolio' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-portfolio' ),
        'BenchNine' => __( 'BenchNine', 'vw-portfolio' ),
        'Cabin' => __( 'Cabin', 'vw-portfolio' ),
        'Cardo' => __( 'Cardo', 'vw-portfolio' ),
        'Courgette' => __( 'Courgette', 'vw-portfolio' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-portfolio' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-portfolio' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-portfolio' ),
        'Cuprum' => __( 'Cuprum', 'vw-portfolio' ),
        'Cookie' => __( 'Cookie', 'vw-portfolio' ),
        'Chewy' => __( 'Chewy', 'vw-portfolio' ),
        'Days One' => __( 'Days One', 'vw-portfolio' ),
        'Dosis' => __( 'Dosis', 'vw-portfolio' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-portfolio' ),
        'Economica' => __( 'Economica', 'vw-portfolio' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-portfolio' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-portfolio' ),
        'Francois One' => __( 'Francois One', 'vw-portfolio' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-portfolio' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-portfolio' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-portfolio' ),
        'Handlee' => __( 'Handlee', 'vw-portfolio' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-portfolio' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-portfolio' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-portfolio' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-portfolio' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-portfolio' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-portfolio' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-portfolio' ),
        'Kanit' => __( 'Kanit', 'vw-portfolio' ),
        'Lobster' => __( 'Lobster', 'vw-portfolio' ),
        'Lato' => __( 'Lato', 'vw-portfolio' ),
        'Lora' => __( 'Lora', 'vw-portfolio' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-portfolio' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-portfolio' ),
        'Merriweather' => __( 'Merriweather', 'vw-portfolio' ),
        'Monda' => __( 'Monda', 'vw-portfolio' ),
        'Montserrat' => __( 'Montserrat', 'vw-portfolio' ),
        'Muli' => __( 'Muli', 'vw-portfolio' ),
        'Marck Script' => __( 'Marck Script', 'vw-portfolio' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-portfolio' ),
        'Open Sans' => __( 'Open Sans', 'vw-portfolio' ),
        'Overpass' => __( 'Overpass', 'vw-portfolio' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-portfolio' ),
        'Oxygen' => __( 'Oxygen', 'vw-portfolio' ),
        'Orbitron' => __( 'Orbitron', 'vw-portfolio' ),
        'Patua One' => __( 'Patua One', 'vw-portfolio' ),
        'Pacifico' => __( 'Pacifico', 'vw-portfolio' ),
        'Padauk' => __( 'Padauk', 'vw-portfolio' ),
        'Playball' => __( 'Playball', 'vw-portfolio' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-portfolio' ),
        'PT Sans' => __( 'PT Sans', 'vw-portfolio' ),
        'Philosopher' => __( 'Philosopher', 'vw-portfolio' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-portfolio' ),
        'Poiret One' => __( 'Poiret One', 'vw-portfolio' ),
        'Quicksand' => __( 'Quicksand', 'vw-portfolio' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-portfolio' ),
        'Raleway' => __( 'Raleway', 'vw-portfolio' ),
        'Rubik' => __( 'Rubik', 'vw-portfolio' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-portfolio' ),
        'Russo One' => __( 'Russo One', 'vw-portfolio' ),
        'Righteous' => __( 'Righteous', 'vw-portfolio' ),
        'Slabo' => __( 'Slabo', 'vw-portfolio' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-portfolio' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-portfolio'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-portfolio' ),
        'Sacramento' => __( 'Sacramento', 'vw-portfolio' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-portfolio' ),
        'Tangerine' => __( 'Tangerine', 'vw-portfolio' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-portfolio' ),
        'VT323' => __( 'VT323', 'vw-portfolio' ),
        'Varela Round' => __( 'Varela Round', 'vw-portfolio' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-portfolio' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-portfolio' ),
        'Volkhov' => __( 'Volkhov', 'vw-portfolio' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-portfolio' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-portfolio' ),
			'100' => esc_html__( 'Thin',       'vw-portfolio' ),
			'300' => esc_html__( 'Light',      'vw-portfolio' ),
			'400' => esc_html__( 'Normal',     'vw-portfolio' ),
			'500' => esc_html__( 'Medium',     'vw-portfolio' ),
			'700' => esc_html__( 'Bold',       'vw-portfolio' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-portfolio' ),
		);
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
			'normal'  => esc_html__( 'Normal', 'vw-portfolio' ),
			'italic'  => esc_html__( 'Italic', 'vw-portfolio' ),
			'oblique' => esc_html__( 'Oblique', 'vw-portfolio' )
		);
	}
}
