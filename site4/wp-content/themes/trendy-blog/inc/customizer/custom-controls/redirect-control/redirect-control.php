<?php
/**
 * Redirect Link Control
 * 
 * @package Trendy Blog
 * @since 1.0.0
 */

if( class_exists( 'WP_Customize_Control' ) ) :
    class Trendy_Blog_WP_Redirect_Control extends \WP_Customize_Control {
        /**
         * Control type
         * 
         */
        public $type = 'redirect-link';

        /**
         * Enqueue scripts/styles.
         *
         * @since 3.4.0
         */
        public function enqueue() {
            wp_enqueue_style( 'trendy-blog-customizer-redirect-control', get_template_directory_uri() . '/inc/customizer/custom-controls/redirect-control/redirect-control.css', array(), TRENDY_BLOG_VERSION, 'all' );
            wp_enqueue_script( 'trendy-blog-customizer-redirect-control', get_template_directory_uri() . '/inc/customizer/custom-controls/redirect-control/redirect-control.js', array('jquery'), TRENDY_BLOG_VERSION, true );
        }

        /**
         * Render the control's content.
         *
         */
        public function render_content() {
    ?>
            <div class="section-content-wrap">
                <?php
                    foreach( $this->choices as $key => $choice  ) :
                ?>
                        <a href="#" class="link-item" data-type="<?php echo esc_attr( $choice['type'] ); ?>" data-id="<?php echo esc_attr( $choice['id'] ); ?>"><?php echo esc_html( $choice['label'] ); ?><span class="dashicons dashicons-arrow-right-alt2"></span></a>
                <?php
                    endforeach;
                ?>
            </div>
            <?php
        }
    }
endif;