<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function blogmelody_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogmelody' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'blogmelody_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blogmelody_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'blogmelody' ),
            'off'       => esc_html__( 'Disable', 'blogmelody' )
        );
        return apply_filters( 'blogmelody_switch_options', $arr );
    }
endif;


 /**
 * Get an array of google fonts.
 * 
 */
function blogmelody_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'blogmelody' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/fonts/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '-', array_map( 'strtolower', $family_str_arr ) );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return apply_filters( 'blogmelody_font_choices', $font_family_arr );
}

if ( ! function_exists( 'blogmelody_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function blogmelody_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'blogmelody' ),
            'header-font-1'   => esc_html__( 'Raleway', 'blogmelody' ),
            'header-font-2'   => esc_html__( 'Poppins', 'blogmelody' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'blogmelody' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'blogmelody' ),
            'header-font-5'   => esc_html__( 'Lato', 'blogmelody' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'blogmelody' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'blogmelody' ),
            'header-font-8'   => esc_html__( 'Lora', 'blogmelody' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'blogmelody' ),
            'header-font-10'   => esc_html__( 'Muli', 'blogmelody' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'blogmelody' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'blogmelody' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'blogmelody' ),
            'header-font-14'   => esc_html__( 'Cairo', 'blogmelody' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'blogmelody' ),
        );

        $output = apply_filters( 'blogmelody_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'blogmelody_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function blogmelody_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'blogmelody' ),
            'body-font-1'     => esc_html__( 'Raleway', 'blogmelody' ),
            'body-font-2'     => esc_html__( 'Poppins', 'blogmelody' ),
            'body-font-3'     => esc_html__( 'Roboto', 'blogmelody' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'blogmelody' ),
            'body-font-5'     => esc_html__( 'Lato', 'blogmelody' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'blogmelody' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'blogmelody' ),
            'body-font-8'   => esc_html__( 'Lora', 'blogmelody' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'blogmelody' ),
            'body-font-10'   => esc_html__( 'Muli', 'blogmelody' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'blogmelody' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'blogmelody' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'blogmelody' ),
            'body-font-14'   => esc_html__( 'Cairo', 'blogmelody' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'blogmelody' ),
        );

        $output = apply_filters( 'blogmelody_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

 ?>