<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage Juju Blog
* @since Juju Blog 1.0.0
*/

if ( ! function_exists( 'juju_blog_validate_long_excerpt' ) ) :
  function juju_blog_validate_long_excerpt( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'juju-blog' ) );
	 } elseif ( $value < 5 ) {
		 $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'juju-blog' ) );
	 } elseif ( $value > 100 ) {
		 $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'juju-blog' ) );
	 }
	 return $validity;
  }
endif;