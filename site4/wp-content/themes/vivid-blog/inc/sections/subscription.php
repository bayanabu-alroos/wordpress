<?php
/**
 * Subscription section
 *
 * This is the template for the content of subscription section
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */
if ( ! function_exists( 'vivid_blog_add_subscription_section' ) ) :
    /**
    * Add subscription section
    *
    *@since Vivid Blog 1.0.0
    */
    function vivid_blog_add_subscription_section() {
    	$options = vivid_blog_get_theme_options();
        // Check if subscription is enabled on frontpage
        $subscription_enable = apply_filters( 'vivid_blog_section_status', true, 'subscription_section_enable' );

        if ( true !== $subscription_enable ) {
            return false;
        }

        // Render subscription section now.
        vivid_blog_render_subscription_section();
    }
endif;

if ( ! function_exists( 'vivid_blog_render_subscription_section' ) ) :
  /**
   * Start subscription section
   *
   * @return string subscription content
   * @since Vivid Blog 1.0.0
   *
   */
   function vivid_blog_render_subscription_section() {
        if ( ! class_exists( 'Jetpack' ) ) {
            return;
        } elseif ( class_exists( 'Jetpack' ) ) {
            if ( ! Jetpack::is_module_active( 'subscriptions' ) )
                return;
        }

        $options = vivid_blog_get_theme_options();
        $btn_label = ! empty( $options['subscription_btn_title'] ) ? $options['subscription_btn_title'] : esc_html__( 'Subscribe Now', 'vivid-blog' );
        $background = ! empty( $options['subscription_image'] ) ? $options['subscription_image'] : get_template_directory_uri() . '/assets/uploads/subscribe.jpg';

        ?>

        <div id="subscribe-now" class="relative page-section" style="background-image: url('<?php echo esc_url( $background ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <?php if ( ! empty( $options['subscription_title'] ) ) : ?>
                    <div class="section-header">
                        <?php if ( ! empty( $options['subscription_title'] ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $options['subscription_title'] ); ?></h2>
                        <?php endif; ?>
                    </div><!-- .section-header -->
                <?php endif;

                $subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="" subscribe_button="' . esc_html( $btn_label ) . '" show_subscribers_total="0"]';
                echo do_shortcode( wp_kses_post( $subscription_shortcode ) ); 
                ?>
            </div><!-- .wrapper -->
        </div><!-- #subscribe-now -->

    <?php }
endif;
