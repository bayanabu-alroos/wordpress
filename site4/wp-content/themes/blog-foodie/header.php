<?php

	do_action( 'vivid_blog_doctype' );

?>
<head>
<?php

	do_action( 'vivid_blog_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php

	do_action( 'vivid_blog_page_start_action' ); 

	if ( !empty( get_theme_mod( 'blog_foodie_topbar_number', '' ) ) || get_theme_mod( 'blog_foodie_topbar_email', '' ) || get_theme_mod( 'blog_foodie_topbar_address', '' ) ) {
	
?>
	<div id="top-bar" class="relative">
        <div class="wrapper">
            <button class="top-menu-toggle" aria-controls="secondary-menu" aria-expanded="false">
                <svg viewBox="0 0 40 40" class="icon-menu">
                    <rect y="7" width="40" height="2"></rect>
                    <rect y="19" width="40" height="2"></rect>
                    <rect y="31" width="40" height="2"></rect>
                </svg>

                <svg viewBox="0 0 612 612" class="icon-close">
                    <polygon points="612,36.004 576.521,0.603 306,270.608 35.478,0.603 0,36.004 270.522,306.011 0,575.997 35.478,611.397 
                    306,341.411 576.521,611.397 612,575.997 341.459,306.011"></polygon>
                </svg>
            </button>
            <div class="clear">
                <div class="hentry">
                    <ul class="contact-info clear">
                        <li>
                            <svg viewBox="0 0 512 512" class="icon-envelope">
                                <path d="M256,0C161.896,0,85.333,76.563,85.333,170.667c0,28.25,7.063,56.26,20.49,81.104L246.667,506.5
                                c1.875,3.396,5.448,5.5,9.333,5.5s7.458-2.104,9.333-5.5l140.896-254.813c13.375-24.76,20.438-52.771,20.438-81.021
                                C426.667,76.563,350.104,0,256,0z M256,256c-47.052,0-85.333-38.281-85.333-85.333c0-47.052,38.281-85.333,85.333-85.333
                                s85.333,38.281,85.333,85.333C341.333,217.719,303.052,256,256,256z"></path>
                            </svg>
                            <span><?php echo esc_html( get_theme_mod( 'blog_foodie_topbar_address', '' ) ) ?></span>
                        </li>
                        <li><a href="tel:<?php echo esc_url( get_theme_mod( 'blog_foodie_topbar_number', '' ) ) ?>">
                            <svg viewBox="0 0 480.56 480.56" class="icon-phone">
                                <path d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8
                                c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4
                                c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8
                                c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3
                                c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9
                                c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z"></path>
                                <path d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1
                                c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z"></path>
                                <path d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5
                                l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z"></path>
                            </svg>
                            <span><?php echo esc_html( get_theme_mod( 'blog_foodie_topbar_number', '' ) ) ?></span></a>
                        </li>
                        <li><a href="mailto:<?php echo esc_url( get_theme_mod( 'blog_foodie_topbar_email', '' ) ) ?>">
                            <svg viewBox="0 0 511.626 511.626" class="icon-envelope">
                                <path d="M49.106,178.729c6.472,4.567,25.981,18.131,58.528,40.685c32.548,22.554,57.482,39.92,74.803,52.099
                                c1.903,1.335,5.946,4.237,12.131,8.71c6.186,4.476,11.326,8.093,15.416,10.852c4.093,2.758,9.041,5.852,14.849,9.277
                                c5.806,3.422,11.279,5.996,16.418,7.7c5.14,1.718,9.898,2.569,14.275,2.569h0.287h0.288c4.377,0,9.137-0.852,14.277-2.569
                                c5.137-1.704,10.615-4.281,16.416-7.7c5.804-3.429,10.752-6.52,14.845-9.277c4.093-2.759,9.229-6.376,15.417-10.852
                                c6.184-4.477,10.232-7.375,12.135-8.71c17.508-12.179,62.051-43.11,133.615-92.79c13.894-9.703,25.502-21.411,34.827-35.116
                                c9.332-13.699,13.993-28.07,13.993-43.105c0-12.564-4.523-23.319-13.565-32.264c-9.041-8.947-19.749-13.418-32.117-13.418H45.679
                                c-14.655,0-25.933,4.948-33.832,14.844C3.949,79.562,0,91.934,0,106.779c0,11.991,5.236,24.985,15.703,38.974
                                C26.169,159.743,37.307,170.736,49.106,178.729z"></path>
                                <path d="M483.072,209.275c-62.424,42.251-109.824,75.087-142.177,98.501c-10.849,7.991-19.65,14.229-26.409,18.699
                                c-6.759,4.473-15.748,9.041-26.98,13.702c-11.228,4.668-21.692,6.995-31.401,6.995h-0.291h-0.287
                                c-9.707,0-20.177-2.327-31.405-6.995c-11.228-4.661-20.223-9.229-26.98-13.702c-6.755-4.47-15.559-10.708-26.407-18.699
                                c-25.697-18.842-72.995-51.68-141.896-98.501C17.987,202.047,8.375,193.762,0,184.437v226.685c0,12.57,4.471,23.319,13.418,32.265
                                c8.945,8.949,19.701,13.422,32.264,13.422h420.266c12.56,0,23.315-4.473,32.261-13.422c8.949-8.949,13.418-19.694,13.418-32.265
                                V184.437C503.441,193.569,493.927,201.854,483.072,209.275z"></path>
                            </svg>
                            <span><?php echo esc_html( get_theme_mod( 'blog_foodie_topbar_email', '' ) ) ?></span></a>
                        </li>
                        
                    </ul><!-- .contact-info -->
                </div><!-- .hentry -->
            </div><!-- .col-2 -->
        </div><!-- .wrapper -->
    </div>
<?php
	}

	do_action( 'vivid_blog_header_action' );

	do_action( 'vivid_blog_content_start_action' );

	do_action( 'vivid_blog_header_image_action' );

	if ( vivid_blog_is_frontpage() ) {
    	$options = vivid_blog_get_theme_options();

		$sorted = array( 'slider', 'cta', 'gallery', 'about', 'quote', 'blog' );
	
		foreach ( $sorted as $section ) {
			if ( $section == 'gallery' || $section == 'cta' || $section == 'quote' || $section == 'slider' ) {
				add_action( 'blog_foodie_primary_content', 'blog_foodie_add_'. $section .'_section' );
			}else{
				add_action( 'blog_foodie_primary_content', 'vivid_blog_add_'. $section .'_section' );
			}	
		}

		do_action( 'blog_foodie_primary_content' );
	}
