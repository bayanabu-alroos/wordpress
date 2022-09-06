<?php
/**
 * Range slider control.
 *
 * @package Trendy Blog
 * @since  1.0.0
 */
class Trendy_Blog_Range_Slider_Control extends WP_Customize_Control {
    /**
     * The type of control being rendered
     */
    public $type = 'trendy-blog-range-slider';
    public $unit = '';

    public function __construct($manager, $id, $args = array()) {
        if (isset($args['unit'])) {
            $this->unit = $args['unit'];
        }
        parent::__construct($manager, $id, $args);
    }

    /**
     * Loads the jQuery UI Button script and custom scripts/styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue() {
        wp_enqueue_style(  'trendy-blog-range-slider-style', get_template_directory_uri() . '/inc/customizer/custom-controls/range-slider/range-slider.css', array(), TRENDY_BLOG_VERSION, 'all' );
        wp_enqueue_script( 'trendy-blog-range-slider', get_template_directory_uri() . '/inc/customizer/custom-controls/range-slider/range-slider.js', array( 'jquery', 'jquery-ui-slider' ), TRENDY_BLOG_VERSION, true );
    }

    /**
     * Render the control in the customizer
     */
    public function render_content() {
        ?>
        <span class="customize-control-title">
            <?php echo esc_html($this->label); ?>
            <span class="trendy-blog-slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr($this->value()); ?>"></span>
        </span>

        <div class="trendy-blog-range-slider-control-wrap"> 
            <div class="trendy-blog-range-slider" slider-min-value="<?php echo esc_attr($this->input_attrs['min']); ?>" slider-max-value="<?php echo esc_attr($this->input_attrs['max']); ?>" slider-step-value="<?php echo esc_attr($this->input_attrs['step']); ?>"></div>
            <div class="trendy-blog-range-slider-input">
                <input type="number" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
            </div>
            <?php if ($this->unit) { ?>
                <div class="trendy-blog-range-slider-unit">
                    <?php echo esc_html($this->unit); ?>
                </div>
            <?php } ?>
        </div>
        <?php
    }

}
