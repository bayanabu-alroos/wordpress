<?php
/**
 * The template for displaying home page.
 * @package BlogMelody
 */

if ( 'posts' == get_option( 'show_on_front' )  || 'posts' != get_option( 'show_on_front' )){ 
    get_header(); ?>
    <?php $enabled_sections = blogmelody_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $disable_featured_slider = blogmelody_get_option( 'disable_featured-slider_section' );
                if( true == $disable_featured_slider): ?>
                    
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'about' ) { ?>
                <?php $disable_about_section = blogmelody_get_option( 'disable_about_section' );
                if( true ==$disable_about_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                    
            <?php endif; ?>   

            <?php } elseif( $section['id'] == 'message' ) { ?>
                <?php $disable_message_section = blogmelody_get_option( 'disable_message_section' );
                if( true ==$disable_message_section): ?>
                    <div id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">
                        
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>

                    </div>
            <?php endif; ?>
            <?php } elseif( $section['id'] == 'popular' ) { ?>
                <?php $disable_popular_section = blogmelody_get_option( 'disable_popular_section' );
                 if( true ==$disable_popular_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section blog-posts">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

           <?php
            }
        }
    }
    $disable_homepage_content_section = blogmelody_get_option( 'disable_homepage_content_section' );
    if('posts' == get_option( 'show_on_front' )){
        include( get_home_template() );
    } elseif(($disable_homepage_content_section == true ) && ('posts' != get_option( 'show_on_front' ))) {
            include( get_page_template() );
        }

    get_footer();
} 
else{
    include( get_page_template() );
}