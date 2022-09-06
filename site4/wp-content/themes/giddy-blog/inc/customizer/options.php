<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function giddy_blog_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'giddy-blog' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'giddy_blog_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function giddy_blog_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'giddy-blog' ),
            'off'       => esc_html__( 'Disable', 'giddy-blog' )
        );
        return apply_filters( 'giddy_blog_switch_options', $arr );
    }
endif;


 /**
 * Get an array of google fonts.
 * 
 */
function giddy_blog_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'giddy-blog' );

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

    return apply_filters( 'giddy_blog_font_choices', $font_family_arr );
}

if ( ! function_exists( 'giddy_blog_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function giddy_blog_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'giddy-blog' ),
            'header-font-1'   => esc_html__( 'Raleway', 'giddy-blog' ),
            'header-font-2'   => esc_html__( 'Poppins', 'giddy-blog' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'giddy-blog' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'giddy-blog' ),
            'header-font-5'   => esc_html__( 'Lato', 'giddy-blog' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'giddy-blog' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'giddy-blog' ),
            'header-font-8'   => esc_html__( 'Lora', 'giddy-blog' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'giddy-blog' ),
            'header-font-10'   => esc_html__( 'Muli', 'giddy-blog' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'giddy-blog' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'giddy-blog' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'giddy-blog' ),
            'header-font-14'   => esc_html__( 'Cairo', 'giddy-blog' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'giddy-blog' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'giddy-blog' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'giddy-blog' ),
            'header-font-18'   => esc_html__( 'Fredericka', 'giddy-blog' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'giddy-blog' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'giddy-blog' ),
        );

        $output = apply_filters( 'giddy_blog_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'giddy_blog_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function giddy_blog_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'giddy-blog' ),
            'body-font-1'     => esc_html__( 'Raleway', 'giddy-blog' ),
            'body-font-2'     => esc_html__( 'Poppins', 'giddy-blog' ),
            'body-font-3'     => esc_html__( 'Roboto', 'giddy-blog' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'giddy-blog' ),
            'body-font-5'     => esc_html__( 'Lato', 'giddy-blog' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'giddy-blog' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'giddy-blog' ),
            'body-font-8'   => esc_html__( 'Lora', 'giddy-blog' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'giddy-blog' ),
            'body-font-10'   => esc_html__( 'Muli', 'giddy-blog' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'giddy-blog' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'giddy-blog' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'giddy-blog' ),
            'body-font-14'   => esc_html__( 'Cairo', 'giddy-blog' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'giddy-blog' ),
        );

        $output = apply_filters( 'giddy_blog_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

 ?>