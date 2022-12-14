<?php
/**
 * Radio tab control.
 *
 * @package Trendy Blog
 * @since 1.1.0
 */
class Trendy_Blog_Upsell_Info_Control extends WP_Customize_Control {
    /**
     * The type of customize control being rendered.
     *
     * @since 1.1.0
     * @access public
     * @var    string
     */
    public $type = 'trendy-blog-upsell-info';

    public function render_content() {
        ?>
        <label>
            <span class="dashicons dashicons-info"></span>
            <?php if ($this->label) { ?>
                <span>
                    <?php echo wp_kses_post($this->label); ?>
                </span>
            <?php } ?>
            <a href="<?php echo esc_url('https://blazethemes.com/theme/trendy-blog-pro/'); ?>" target="_blank"> <strong><?php echo esc_html__( 'Upgrade to PRO', 'trendy-blog' ); ?></strong></a>
        </label>
        <?php if ($this->description) { ?>
            <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
            </span>
            <?php
        }

        $choices = $this->choices;
        if ($choices) {
            echo '<ul>';
            foreach ($choices as $choice) {
                echo '<li>' . esc_html($choice) . '</li>';
            }
            echo '</ul>';
        }
    ?>
        <a class="comparison-button button button-primary" href="<?php echo esc_url('https://blazethemes.com/theme/trendy-blog-pro?section=themesingle_free_pro_wrap'); ?>" target="_blank"> <strong><?php echo esc_html__( 'Free vs PRO', 'trendy-blog' ); ?></strong></a>
    <?php
    }
}
