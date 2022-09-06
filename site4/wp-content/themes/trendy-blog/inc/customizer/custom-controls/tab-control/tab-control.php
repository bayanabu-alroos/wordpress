<?php
/**
 * Tab Control
 * 
 * @package Trendy Blog
 * @since 1.0.0
 */

if( class_exists( 'WP_Customize_Control' ) ) :
    class Trendy_Blog_WP_Tab_Control extends \WP_Customize_Control {
        /**
         * Control type
         * 
         */
        public $type = 'tab-control';

        /**
         * Enqueue scripts/styles.
         *
         * @since 3.4.0
         */
        public function enqueue() {
            wp_enqueue_style( 'trendy-blog-customizer-tab-control', get_template_directory_uri() . '/inc/customizer/custom-controls/tab-control/tab-control.css', array(), TRENDY_BLOG_VERSION, 'all' );
            wp_enqueue_script( 'trendy-blog-customizer-tab-control', get_template_directory_uri() . '/inc/customizer/custom-controls/tab-control/tab-control.js', array('jquery'), TRENDY_BLOG_VERSION, true );
        }

        /**
         * Render the control's content.
         *
         */
        public function render_content() {
            if( $this->label ) :
    ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif; ?>
            <div class="section-tab-wrap">
                <?php
                    foreach( $this->choices as $key => $choice  ) :
                ?>
                        <a href="#" class="tab-item <?php if( $key === 0 ) echo 'isActive' ?>" <?php if( isset( $choice['controls_hide'] ) ) echo 'data-hide=' .esc_attr( json_encode( $choice['controls_hide'] ) ); ?> <?php if( isset( $choice['controls'] ) ) echo 'data-controls=' .esc_attr( json_encode( $choice['controls'] ) ); ?>><?php echo esc_html( $choice['label'] ); ?></a>
                <?php
                    endforeach;
                ?>
            </div>
            <?php
        }
    }
endif;