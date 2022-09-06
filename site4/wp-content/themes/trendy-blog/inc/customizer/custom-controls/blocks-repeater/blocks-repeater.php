<?php
/**
 * Blocks Repeater Control
 * 
 * @package Trendy Blog
 * @since 1.0.0
 */
if( class_exists( 'WP_Customize_Control' ) ) :
    class Trendy_Blog_WP_Blocks_Repeater_Control extends WP_Customize_Control {
        /**
         * Action buttons trigger variable
         * 
         */
        protected $repeat = true;

        /**
         * constructor
         * 
         */
        public function __construct( $manager, $id, $args ) {
            if( isset( $args['repeat'] ) ) $this->repeat = $args['repeat'];
            parent::__construct( $manager, $id, $args );
        }
        
        /**
         * Enqueue scripts and styles
         * 
         */
        public function enqueue() {
            wp_enqueue_style( 'trendy-blog-blocks-repeater', get_template_directory_uri() . '/inc/customizer/custom-controls/blocks-repeater/control.css', array(), TRENDY_BLOG_VERSION );
            wp_enqueue_script( 'trendy-blog-blocks-repeater', get_template_directory_uri() . '/inc/customizer/custom-controls/blocks-repeater/control.js', array( 'jquery' ), TRENDY_BLOG_VERSION, true );
        }
        
        /**
         * Render content
         * 
         */
        public function render_content() {
            $defaults = json_decode( $this->setting->default ); // defaults
            $values = json_decode( $this->value() ); // values
    ?>
            <div class="blocks-repeater-control-wrap">
                <?php
                    $open = true;
                    $block_categories = get_categories();
                    foreach( $values as $control_key => $control ) :
                        switch( $control->name ) {
                            case 'woo-products' : 
                                                if( class_exists( 'WooCommerce' ) ) :
                            ?>
                                                    <div class="trendy-blog-block woo-products-block-wrap<?php if( isset( $open ) ) echo ' open'; ?>" block-name="woo-products">
                                                        <div class="block-header content-trigger">
                                                            <h2 class="block-header-title"><?php esc_html_e( 'Woo Products', 'trendy-blog' ); ?></h2>
                                                            <span class="block-header-icon"><i class="fas fa-chevron-<?php if( isset( $open ) ) { echo 'up'; } else {  echo 'down'; } ?>"></i></span>
                                                        </div>
                                                        <div class="block-content-wrap">
                                                            <div class="customize-text-field">
                                                                <label><?php esc_html_e( 'Block Title', 'trendy-blog' ) ?></label>
                                                                <p class="description"><?php esc_html_e( 'Leave blank to hide title', 'trendy-blog' ) ?></p>
                                                                <input type="text" class="block-repeater-control-field" data-name="blockTitle" value="<?php echo esc_html( $control->blockTitle ); ?>"/>
                                                            </div>
                                                            <div class="customize-select-field">
                                                                <label><?php esc_html_e( 'Product Type', 'trendy-blog' ) ?></label>
                                                                <select class="block-repeater-control-field" data-name="productType">
                                                                    <option value="latest" <?php if( $control->productType === 'latest' ) echo 'selected'; ?>><?php echo esc_html__( 'Latest Products', 'trendy-blog' ); ?></option>
                                                                    <option value="featured" <?php if( $control->productType === 'featured' ) echo 'selected'; ?>><?php echo esc_html__( 'Featured Products', 'trendy-blog' ); ?></option>
                                                                </select>
                                                            </div>
                                                            <div class="customize-multicheckbox-field">
                                                                <label><?php esc_html_e( 'Posts Categories', 'trendy-blog' ) ?></label>
                                                                <div class="multicheckbox-content">
                                                                    <?php
                                                                        $control_value = json_decode( $control->categories, true );
                                                                        $product_categories = get_terms( 'product_cat' );
                                                                        foreach( $product_categories as $product_cat ) :
                                                                    ?>
                                                                            <div class="multicheckbox-single-item">
                                                                                <label>
                                                                                    <input type="checkbox" value="<?php echo esc_attr( $product_cat->slug ); ?>" <?php if( is_array( $control_value ) ) if( in_array( $product_cat->slug, $control_value ) ) echo 'checked'; ?>><?php echo esc_html( $product_cat->name ) . ' (' .absint($product_cat->count). ')'; ?></label>
                                                                            </div>
                                                                    <?php
                                                                        endforeach;
                                                                    ?>
                                                                </div>
                                                                <input class="block-repeater-control-field" data-name="categories" type="hidden" value=<?php echo json_encode( $control_value ); ?> />
                                                            </div>
                                                            <div class="customize-number-field">
                                                                <label><?php esc_html_e( 'Number of products', 'trendy-blog' ) ?></label>
                                                                <input type="number" min="-1" step="1" class="block-repeater-control-field" data-name="count" value="<?php echo esc_attr( $control->count ); ?>"/>
                                                            </div>
                                                            <div class="customize-toggle-field <?php if( $control->option ) echo 'checked-toggle-control'; ?>">
                                                                <label><?php esc_html_e( 'Enable or Disable', 'trendy-blog' ) ?></label>
                                                                <div class="toggle-button">
                                                                    <span class="on_off_txt_wrap">
                                                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                    </span>
                                                                </div>
                                                                <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                                            </div>
                                                            <div class="action-buttons">
                                                                <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                                                <div class="red-button remove-block" <?php if( isset( $open ) ) echo 'style="display:none"';?>><?php esc_html_e( 'Remove', 'trendy-blog' ); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                else :
                                                    echo '<p class="not-found-blocks-message">' .esc_html__( 'Woocommerce Plugin not activated', 'trendy-blog' ). '</p>';
                                                endif;
                                                    break;
                            case 'banner-slider' : ?>
                                                    <div class="trendy-blog-block banner-slider-block-wrap<?php if( isset( $open ) ) echo ' open'; ?>" block-name="banner-slider">
                                                        <div class="block-header content-trigger">
                                                            <h2 class="block-header-title"><?php esc_html_e( 'Banner Slider', 'trendy-blog' ); ?></h2>
                                                            <span class="block-header-icon"><i class="fas fa-chevron-<?php if( isset( $open ) ) { echo 'up'; } else {  echo 'down'; } ?>"></i></span>
                                                        </div>
                                                        <div class="block-content-wrap">
                                                            <div class="customize-select-field">
                                                                <label><?php esc_html_e( 'Category', 'trendy-blog' ) ?></label>
                                                                <select class="block-repeater-control-field" data-name="category">
                                                                    <option value="" <?php if( empty( $control->category ) ) echo 'selected'; ?>><?php esc_html_e( 'Select Category', 'trendy-blog' ); ?></option>
                                                                    <?php
                                                                        foreach( $block_categories as $cat ) {
                                                                    ?>
                                                                            <option value="<?php echo esc_attr( $cat->slug ); ?>" <?php if( $control->category === $cat->slug ) echo 'selected'; ?>><?php echo esc_html( $cat->name ) .' (' .absint( $cat->count ). ')'; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="customize-number-field">
                                                                <label><?php esc_html_e( 'Number of posts', 'trendy-blog' ) ?></label>
                                                                <input type="number" min="-1" step="1" class="block-repeater-control-field" data-name="count" value="<?php echo esc_attr( $control->count ); ?>"/>
                                                            </div>
                                                            <div class="customize-toggle-field <?php if( $control->dateOption ) echo 'checked-toggle-control'; ?>">
                                                                <label><?php esc_html_e( 'Show post date', 'trendy-blog' ) ?></label>
                                                                <div class="toggle-button">
                                                                    <span class="on_off_txt_wrap">
                                                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                    </span>
                                                                </div>
                                                                <input type="checkbox" class="block-repeater-control-field" data-name="dateOption" <?php echo checked( $control->dateOption, true ); ?>/>
                                                            </div>
                                                            <div class="customize-toggle-field <?php if( $control->commentOption ) echo 'checked-toggle-control'; ?>">
                                                                <label><?php esc_html_e( 'Show comments number', 'trendy-blog' ) ?></label>
                                                                <div class="toggle-button">
                                                                    <span class="on_off_txt_wrap">
                                                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                    </span>
                                                                </div>
                                                                <input type="checkbox" class="block-repeater-control-field" data-name="commentOption" <?php echo checked( $control->commentOption, true ); ?>/>
                                                            </div>
                                                            <div class="customize-toggle-field <?php if( $control->option ) echo 'checked-toggle-control'; ?>">
                                                                <label><?php esc_html_e( 'Enable or Disable', 'trendy-blog' ) ?></label>
                                                                <div class="toggle-button">
                                                                    <span class="on_off_txt_wrap">
                                                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                    </span>
                                                                </div>
                                                                <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                                            </div>
                                                            <div class="action-buttons">
                                                                <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                                                <div class="red-button remove-block" <?php if( isset( $open ) ) echo 'style="display:none"';?>><?php esc_html_e( 'Remove', 'trendy-blog' ); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                            case 'categories-collection' : ?>
                                                    <div class="trendy-blog-block categories-collection-block-wrap<?php if( isset( $open ) ) echo ' open'; ?>" block-name="categories-collection">
                                                        <div class="block-header content-trigger">
                                                            <h2 class="block-header-title"><?php esc_html_e( 'Categories Collection', 'trendy-blog' ); ?></h2>
                                                            <span class="block-header-icon"><i class="fas fa-chevron-<?php if( isset( $open ) ) { echo 'up'; } else {  echo 'down'; } ?>"></i></span>
                                                        </div>
                                                        <div class="block-content-wrap">
                                                            <div class="customize-text-field">
                                                                <label><?php esc_html_e( 'Block Title', 'trendy-blog' ) ?></label>
                                                                <p class="description"><?php esc_html_e( 'Leave blank to hide title', 'trendy-blog' ) ?></p>
                                                                <input type="text" class="block-repeater-control-field" data-name="blockTitle" value="<?php echo esc_html( $control->blockTitle ); ?>"/>
                                                            </div>
                                                            <div class="customize-multicheckbox-field">
                                                                <label><?php esc_html_e( 'Posts Categories', 'trendy-blog' ) ?></label>
                                                                <div class="multicheckbox-content">
                                                                    <?php
                                                                        $control_value = json_decode( $control->categories, true );
                                                                        foreach( $block_categories as $cat ) :
                                                                    ?>
                                                                            <div class="multicheckbox-single-item">
                                                                                <label>
                                                                                    <input type="checkbox" value="<?php echo esc_attr( $cat->slug ); ?>" <?php if( is_array( $control_value ) ) if( in_array( $cat->slug, $control_value ) ) echo 'checked'; ?>><?php echo esc_html( $cat->name ) . ' (' .absint($cat->count). ')'; ?></label>
                                                                            </div>
                                                                    <?php
                                                                        endforeach;
                                                                    ?>
                                                                </div>
                                                                <input class="block-repeater-control-field" data-name="categories" type="hidden" value=<?php echo json_encode( $control_value ); ?> />
                                                            </div>
                                                            <div class="customize-toggle-field <?php if( $control->titleOption ) echo 'checked-toggle-control'; ?>">
                                                                <label><?php esc_html_e( 'Show categories title', 'trendy-blog' ) ?></label>
                                                                <div class="toggle-button">
                                                                    <span class="on_off_txt_wrap">
                                                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                    </span>
                                                                </div>
                                                                <input type="checkbox" class="block-repeater-control-field" data-name="titleOption" <?php echo checked( $control->titleOption, true ); ?>/>
                                                            </div>
                                                            <div class="customize-toggle-field <?php if( $control->countOption ) echo 'checked-toggle-control'; ?>">
                                                                <label><?php esc_html_e( 'Show categories count', 'trendy-blog' ) ?></label>
                                                                <div class="toggle-button">
                                                                    <span class="on_off_txt_wrap">
                                                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                    </span>
                                                                </div>
                                                                <input type="checkbox" class="block-repeater-control-field" data-name="countOption" <?php echo checked( $control->countOption, true ); ?>/>
                                                            </div>
                                                            <div class="customize-toggle-field <?php if( $control->option ) echo 'checked-toggle-control'; ?>">
                                                                <label><?php esc_html_e( 'Section show/hide', 'trendy-blog' ) ?></label>
                                                            
                                                                <div class="toggle-button">
                                                                    <span class="on_off_txt_wrap">
                                                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                    </span>
                                                                </div>
                                                                <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                                            </div>
                                                            <div class="action-buttons">
                                                                <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                                                <div class="red-button remove-block" <?php if( isset( $open ) ) echo 'style="display:none"';?>><?php esc_html_e( 'Remove', 'trendy-blog' ); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            break;
                            case 'posts-grid' : ?>
                                                <div class="trendy-blog-block posts-grid-block-wrap<?php if( isset( $open ) ) echo ' open'; ?>" block-name="posts-grid">
                                                    <div class="block-header content-trigger">
                                                        <h2 class="block-header-title"><?php esc_html_e( 'Posts Grid', 'trendy-blog' ); ?></h2>
                                                        <span class="block-header-icon"><i class="fas fa-chevron-<?php if( isset( $open ) ) { echo 'up'; } else {  echo 'down'; } ?>"></i></span>
                                                    </div>
                                                    <div class="block-content-wrap">
                                                        <div class="customize-text-field">
                                                            <label><?php esc_html_e( 'Block Title', 'trendy-blog' ) ?></label>
                                                            <p class="description"><?php esc_html_e( 'Leave blank to hide title', 'trendy-blog' ) ?></p>
                                                            <input type="text" class="block-repeater-control-field" data-name="blockTitle" value="<?php echo esc_html( $control->blockTitle ); ?>"/>
                                                        </div>
                                                        <div class="customize-select-field">
                                                            <label><?php esc_html_e( 'Category', 'trendy-blog' ) ?></label>
                                                            <select class="block-repeater-control-field" data-name="category">
                                                                <option value="" <?php if( empty( $control->category ) ) echo 'selected'; ?>><?php esc_html_e( 'Select Category', 'trendy-blog' ); ?></option>
                                                                <?php
                                                                    foreach( $block_categories as $cat ) {
                                                                ?>
                                                                        <option value="<?php echo esc_attr( $cat->slug ); ?>" <?php if( $control->category === $cat->slug ) echo 'selected'; ?>><?php echo esc_html( $cat->name ) .' (' .absint( $cat->count ). ')'; ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="customize-number-field">
                                                            <label><?php esc_html_e( 'Number of posts', 'trendy-blog' ) ?></label>
                                                            <input type="number" min="-1" step="1" class="block-repeater-control-field" data-name="count" value="<?php echo esc_attr( $control->count ); ?>"/>
                                                        </div>
                                                        <div class="customize-toggle-field <?php if( $control->excerptOption ) echo 'checked-toggle-control'; ?>">
                                                            <label><?php esc_html_e( 'Show post excerpt', 'trendy-blog' ) ?></label>
                                                            <div class="toggle-button">
                                                                <span class="on_off_txt_wrap">
                                                                    <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                    <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                </span>
                                                            </div>
                                                            <input type="checkbox" class="block-repeater-control-field" data-name="excerptOption" <?php echo checked( $control->excerptOption, true ); ?>/>
                                                        </div>
                                                        <div class="customize-toggle-field <?php if( $control->dateOption ) echo 'checked-toggle-control'; ?>">
                                                            <label><?php esc_html_e( 'Show date', 'trendy-blog' ) ?></label>
                                                            <div class="toggle-button">
                                                                <span class="on_off_txt_wrap">
                                                                    <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                    <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                </span>
                                                            </div>
                                                            <input type="checkbox" class="block-repeater-control-field" data-name="dateOption" <?php echo checked( $control->dateOption, true ); ?>/>
                                                        </div>
                                                        <div class="customize-toggle-field <?php if( $control->commentOption ) echo 'checked-toggle-control'; ?>">
                                                            <label><?php esc_html_e( 'Show comment', 'trendy-blog' ) ?></label>
                                                            <div class="toggle-button">
                                                                <span class="on_off_txt_wrap">
                                                                    <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                    <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                </span>
                                                            </div>
                                                            <input type="checkbox" class="block-repeater-control-field" data-name="commentOption" <?php echo checked( $control->commentOption, true ); ?>/>
                                                        </div>
                                                        <div class="customize-toggle-field <?php if( $control->buttonOption ) echo 'checked-toggle-control'; ?>">
                                                            <label><?php esc_html_e( 'Show button', 'trendy-blog' ) ?></label>
                                                            <div class="toggle-button">
                                                                <span class="on_off_txt_wrap">
                                                                    <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                    <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                </span>
                                                            </div>
                                                            <input type="checkbox" class="block-repeater-control-field" data-name="buttonOption" <?php echo checked( $control->buttonOption, true ); ?>/>
                                                        </div>
                                                        <div class="customize-toggle-field <?php if( $control->option ) echo 'checked-toggle-control'; ?>">
                                                            <label><?php esc_html_e( 'Enable or Disable', 'trendy-blog' ) ?></label>
                                                            <div class="toggle-button">
                                                                <span class="on_off_txt_wrap">
                                                                    <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                    <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                </span>
                                                            </div>
                                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                                        </div>
                                                        <div class="action-buttons">
                                                            <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                                            <div class="red-button remove-block" <?php if( isset( $open ) ) echo 'style="display:none"';?>><?php esc_html_e( 'Remove', 'trendy-blog' ); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                break;
                            case 'posts-list' : ?>
                                                <div class="trendy-blog-block posts-list-block-wrap<?php if( isset( $open ) ) echo ' open'; ?>" block-name="posts-list">
                                                    <div class="block-header content-trigger">
                                                        <h2 class="block-header-title"><?php esc_html_e( 'Posts List', 'trendy-blog' ); ?></h2>
                                                        <span class="block-header-icon"><i class="fas fa-chevron-<?php if( isset( $open ) ) { echo 'up'; } else {  echo 'down'; } ?>"></i></span>
                                                    </div>
                                                    <div class="block-content-wrap">
                                                        <div class="customize-text-field">
                                                            <label><?php esc_html_e( 'Block Title', 'trendy-blog' ) ?></label>
                                                            <p class="description"><?php esc_html_e( 'Leave blank to hide title', 'trendy-blog' ) ?></p>
                                                            <input type="text" class="block-repeater-control-field" data-name="blockTitle" value="<?php echo esc_html( $control->blockTitle ); ?>"/>
                                                        </div>
                                                        <div class="customize-select-field">
                                                            <label><?php esc_html_e( 'Category', 'trendy-blog' ) ?></label>
                                                            <select class="block-repeater-control-field" data-name="category">
                                                                <option value="" <?php if( empty( $control->category ) ) echo 'selected'; ?>><?php esc_html_e( 'Select Category', 'trendy-blog' ); ?></option>
                                                                <?php
                                                                    foreach( $block_categories as $cat ) {
                                                                ?>
                                                                        <option value="<?php echo esc_attr( $cat->slug ); ?>" <?php if( $control->category === $cat->slug ) echo 'selected'; ?>><?php echo esc_html( $cat->name ) .' (' .absint( $cat->count ). ')'; ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="customize-number-field">
                                                            <label><?php esc_html_e( 'Number of posts', 'trendy-blog' ) ?></label>
                                                            <input type="number" min="-1" step="1" class="block-repeater-control-field" data-name="count" value="<?php echo esc_attr( $control->count ); ?>"/>
                                                        </div>
                                                        <div class="customize-toggle-field <?php if( $control->excerptOption ) echo 'checked-toggle-control'; ?>">
                                                            <label><?php esc_html_e( 'Show post excerpt', 'trendy-blog' ) ?></label>
                                                            <div class="toggle-button">
                                                                <span class="on_off_txt_wrap">
                                                                    <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                    <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                </span>
                                                            </div>
                                                            <input type="checkbox" class="block-repeater-control-field" data-name="excerptOption" <?php echo checked( $control->excerptOption, true ); ?>/>
                                                        </div>
                                                        <div class="customize-toggle-field <?php if( $control->dateOption ) echo 'checked-toggle-control'; ?>">
                                                            <label><?php esc_html_e( 'Show date', 'trendy-blog' ) ?></label>
                                                            <div class="toggle-button">
                                                                <span class="on_off_txt_wrap">
                                                                    <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                    <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                </span>
                                                            </div>
                                                            <input type="checkbox" class="block-repeater-control-field" data-name="dateOption" <?php echo checked( $control->dateOption, true ); ?>/>
                                                        </div>
                                                        <div class="customize-toggle-field <?php if( $control->commentOption ) echo 'checked-toggle-control'; ?>">
                                                            <label><?php esc_html_e( 'Show comment', 'trendy-blog' ) ?></label>
                                                            <div class="toggle-button">
                                                                <span class="on_off_txt_wrap">
                                                                    <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                    <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                </span>
                                                            </div>
                                                            <input type="checkbox" class="block-repeater-control-field" data-name="commentOption" <?php echo checked( $control->commentOption, true ); ?>/>
                                                        </div>
                                                        <div class="customize-toggle-field <?php if( $control->buttonOption ) echo 'checked-toggle-control'; ?>">
                                                            <label><?php esc_html_e( 'Show button', 'trendy-blog' ) ?></label>
                                                            <div class="toggle-button">
                                                                <span class="on_off_txt_wrap">
                                                                    <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                    <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                </span>
                                                            </div>
                                                            <input type="checkbox" class="block-repeater-control-field" data-name="buttonOption" <?php echo checked( $control->buttonOption, true ); ?>/>
                                                        </div>
                                                        <div class="customize-toggle-field <?php if( $control->option ) echo 'checked-toggle-control'; ?>">
                                                            <label><?php esc_html_e( 'Enable or Disable', 'trendy-blog' ) ?></label>
                                                            <div class="toggle-button">
                                                                <span class="on_off_txt_wrap">
                                                                    <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                    <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                </span>
                                                            </div>
                                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                                        </div>
                                                        <div class="action-buttons">
                                                            <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                                            <div class="red-button remove-block" <?php if( isset( $open ) ) echo 'style="display:none"';?>><?php esc_html_e( 'Remove', 'trendy-blog' ); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                break;
                            case 'posts-column' : ?>
                                                    <div class="trendy-blog-block posts-column-block-wrap<?php if( isset( $open ) ) echo ' open'; ?>" block-name="posts-column">
                                                        <div class="block-header content-trigger">
                                                            <h2 class="block-header-title"><?php echo esc_html( $control->label ); ?></h2>
                                                            <span class="block-header-icon"><i class="fas fa-chevron-<?php if( isset( $open ) ) { echo 'up'; } else {  echo 'down'; } ?>"></i></span>
                                                        </div>
                                                        <div class="block-content-wrap">
                                                            <div class="customize-select-field">
                                                                <label><?php esc_html_e( 'Category', 'trendy-blog' ) ?></label>
                                                                <select class="block-repeater-control-field" data-name="category">
                                                                    <option value="" <?php if( empty( $control->category ) ) echo 'selected'; ?>><?php esc_html_e( 'Select Category', 'trendy-blog' ); ?></option>
                                                                    <?php
                                                                        foreach( $block_categories as $cat ) {
                                                                    ?>
                                                                            <option value="<?php echo esc_attr( $cat->slug ); ?>" <?php if( $control->category === $cat->slug ) echo 'selected'; ?>><?php echo esc_html( $cat->name ) .' (' .absint( $cat->count ). ')'; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="customize-toggle-field <?php if( $control->dateOption ) echo 'checked-toggle-control'; ?>">
                                                                <label><?php esc_html_e( 'Show post date', 'trendy-blog' ) ?></label>
                                                                <div class="toggle-button">
                                                                    <span class="on_off_txt_wrap">
                                                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                                                    </span>
                                                                </div>
                                                                <input type="checkbox" class="block-repeater-control-field" data-name="dateOption" <?php echo checked( $control->dateOption, true ); ?>/>
                                                            </div>
                                                            <input type="hidden" class="block-repeater-control-field" data-name="label" value="<?php echo esc_attr( $control->label ); ?>"/>
                                                            <input type="hidden" class="block-repeater-control-field" data-name="layout" value="<?php echo esc_attr( $control->layout ); ?>"/>
                                                            <div class="action-buttons">
                                                                <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                            default : echo '<p class="not-found-blocks-message">' .esc_html__( 'No blocks defined ', 'trendy-blog' ). '</p>';
                        }
                        unset($open);
                    endforeach;
                    if( $this->repeat ) {
                ?>
                        <div class="button clone-block"><?php esc_html_e( 'Clone Block', 'trendy-blog' ); ?></div>
                        <div class="button add-new-block"><span><span class="dashicons dashicons-plus"></span><?php esc_html_e( 'New Block', 'trendy-blog' ); ?></span><span style="display:none"><span class="dashicons dashicons-no"></span><?php esc_html_e( 'Close', 'trendy-blog' ); ?></span></div>
                <?php } ?>
                <ul class="block-name-list">
                    <?php
                        if( class_exists( 'WooCommerce' ) ) :
                            ?>
                            <li class="woo-products"><?php esc_html_e( 'Woo Products', 'trendy-blog' ); ?></li>
                            <div class="trendy-blog-block woo-products-block-wrap open" block-name="woo-products">
                                <div class="block-header content-trigger">
                                    <h2 class="block-header-title"><?php esc_html_e( 'Woo Products', 'trendy-blog' ); ?></h2>
                                    <span class="block-header-icon"><i class="fas fa-chevron-up"></i></span>
                                </div>
                                <div class="block-content-wrap">
                                    <div class="customize-text-field">
                                        <label><?php esc_html_e( 'Block Title', 'trendy-blog' ) ?></label>
                                        <p class="description"><?php esc_html_e( 'Leave blank to hide title', 'trendy-blog' ) ?></p>
                                        <input type="text" class="block-repeater-control-field" data-name="blockTitle" value="<?php echo esc_attr__( 'Latest Products', 'trendy-blog' ); ?>"/>
                                    </div>
                                    <div class="customize-select-field">
                                        <label><?php esc_html_e( 'Product Type', 'trendy-blog' ) ?></label>
                                        <select class="block-repeater-control-field" data-name="productType">
                                            <option value="latest"><?php echo esc_html__( 'Latest Products', 'trendy-blog' ); ?></option>
                                            <option value="featured"><?php echo esc_html__( 'Featured Products', 'trendy-blog' ); ?></option>
                                        </select>
                                    </div>
                                    <div class="customize-multicheckbox-field">
                                        <label><?php esc_html_e( 'Posts Categories', 'trendy-blog' ) ?></label>
                                        <div class="multicheckbox-content">
                                            <?php
                                                $product_categories = get_terms( 'product_cat' );
                                                foreach( $product_categories as $product_cat ) :
                                            ?>
                                                    <div class="multicheckbox-single-item">
                                                        <label>
                                                            <input type="checkbox" value="<?php echo esc_attr( $product_cat->slug ); ?>"><?php echo esc_html( $product_cat->name ) . ' (' .absint($product_cat->count). ')'; ?></label>
                                                    </div>
                                            <?php
                                                endforeach;
                                            ?>
                                        </div>
                                        <input class="block-repeater-control-field" data-name="categories" type="hidden" value="[]" />
                                    </div>
                                    <div class="customize-number-field">
                                        <label><?php esc_html_e( 'Number of products', 'trendy-blog' ) ?></label>
                                        <input type="number" min="-1" step="1" class="block-repeater-control-field" data-name="count" value="5"/>
                                    </div>
                                    <div class="customize-toggle-field checked-toggle-control">
                                        <label><?php esc_html_e( 'Enable or Disable', 'trendy-blog' ) ?></label>
                                        <div class="toggle-button">
                                            <span class="on_off_txt_wrap">
                                                <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                                <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                            </span>
                                        </div>
                                        <input type="checkbox" class="block-repeater-control-field" data-name="option" checked/>
                                    </div>
                                    <div class="action-buttons">
                                        <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                        <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'trendy-blog' ); ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <li class="banner-slider"><?php esc_html_e( 'Banner Slider', 'trendy-blog' ); ?></li>
                    <div class="trendy-blog-block banner-slider-block-wrap open" block-name="banner-slider">
                        <div class="block-header content-trigger">
                            <h2 class="block-header-title"><?php esc_html_e( 'Banner Slider', 'trendy-blog' ); ?></h2>
                            <span class="block-header-icon"><i class="fas fa-chevron-up"></i></span>
                        </div>
                        <div class="block-content-wrap">
                            <div class="customize-select-field">
                                <label><?php esc_html_e( 'Category', 'trendy-blog' ) ?></label>
                                <select class="block-repeater-control-field" data-name="category">
                                    <option value="" selected><?php esc_html_e( 'Select Category', 'trendy-blog' ); ?></option>
                                    <?php
                                        foreach( $block_categories as $cat ) {
                                    ?>
                                            <option value="<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_html( $cat->name ) .' (' .absint( $cat->count ). ')'; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="customize-number-field">
                                <label><?php esc_html_e( 'Number of posts', 'trendy-blog' ) ?></label>
                                <input type="number" min="-1" step="1" class="block-repeater-control-field" data-name="count" value="3"/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Show date', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="dateOption" checked/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Show comment', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="commentOption" checked/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Enable or Disable', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="option" checked/>
                            </div>
                            <div class="action-buttons">
                                <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'trendy-blog' ); ?></div>
                            </div>
                        </div>
                    </div>
                    <li class="posts-grid"><?php esc_html_e( 'Posts Grid', 'trendy-blog' ); ?></li>
                    <div class="trendy-blog-block posts-grid-block-wrap open" block-name="posts-grid">
                        <div class="block-header content-trigger">
                            <h2 class="block-header-title"><?php esc_html_e( 'Posts Grid', 'trendy-blog' ); ?></h2>
                            <span class="block-header-icon"><i class="fas fa-chevron-up"></i></span>
                        </div>
                        <div class="block-content-wrap">
                            <div class="customize-text-field">
                                <label><?php esc_html_e( 'Block Title', 'trendy-blog' ) ?></label>
                                <p class="description"><?php esc_html_e( 'Leave blank to hide title', 'trendy-blog' ) ?></p>
                                <input type="text" class="block-repeater-control-field" data-name="blockTitle" value="<?php echo esc_attr__( 'Posts Grid', 'trendy-blog' ); ?>"/>
                            </div>
                            <div class="customize-select-field">
                                <label><?php esc_html_e( 'Category', 'trendy-blog' ) ?></label>
                                <select class="block-repeater-control-field" data-name="category">
                                    <option value="" selected><?php esc_html_e( 'Select Category', 'trendy-blog' ); ?></option>
                                    <?php
                                        foreach( $block_categories as $cat ) {
                                    ?>
                                            <option value="<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_html( $cat->name ) .' (' .absint( $cat->count ). ')'; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="customize-number-field">
                                <label><?php esc_html_e( 'Number of posts', 'trendy-blog' ) ?></label>
                                <input type="number" min="-1" step="1" class="block-repeater-control-field" data-name="count" value="3"/>
                            </div>
                            <div class="customize-toggle-field">
                                <label><?php esc_html_e( 'Show post excerpt', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="excerptOption"/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Show date', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="dateOption" checked/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Show comment', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="commentOption" checked/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Show button', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="buttonOption" checked/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Enable or Disable', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="option" checked/>
                            </div>
                            <div class="action-buttons">
                                <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'trendy-blog' ); ?></div>
                            </div>
                        </div>
                    </div>
                    <li class="posts-list"><?php esc_html_e( 'Posts List', 'trendy-blog' ); ?></li>
                    <div class="trendy-blog-block posts-list-block-wrap open" block-name="posts-list">
                        <div class="block-header content-trigger">
                            <h2 class="block-header-title"><?php esc_html_e( 'Posts List', 'trendy-blog' ); ?></h2>
                            <span class="block-header-icon"><i class="fas fa-chevron-up"></i></span>
                        </div>
                        <div class="block-content-wrap">
                            <div class="customize-text-field">
                                <label><?php esc_html_e( 'Block Title', 'trendy-blog' ) ?></label>
                                <p class="description"><?php esc_html_e( 'Leave blank to hide title', 'trendy-blog' ) ?></p>
                                <input type="text" class="block-repeater-control-field" data-name="blockTitle" value="<?php echo esc_attr__( 'Posts List', 'trendy-blog' ); ?>"/>
                            </div>
                            <div class="customize-select-field">
                                <label><?php esc_html_e( 'Category', 'trendy-blog' ) ?></label>
                                <select class="block-repeater-control-field" data-name="category">
                                    <option value="" selected><?php esc_html_e( 'Select Category', 'trendy-blog' ); ?></option>
                                    <?php
                                        foreach( $block_categories as $cat ) {
                                    ?>
                                            <option value="<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_html( $cat->name ) .' (' .absint( $cat->count ). ')'; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="customize-number-field">
                                <label><?php esc_html_e( 'Number of posts', 'trendy-blog' ) ?></label>
                                <input type="number" min="-1" step="1" class="block-repeater-control-field" data-name="count" value="3"/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Show post excerpt', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="excerptOption" checked/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Show date', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="dateOption" checked/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Show comment', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="commentOption" checked/>
                            </div>
                            <div class="customize-toggle-field">
                                <label><?php esc_html_e( 'Show button', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="buttonOption"/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Enable or Disable', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="option" checked/>
                            </div>
                            <div class="action-buttons">
                                <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'trendy-blog' ); ?></div>
                            </div>
                        </div>
                    </div>
                    <li class="categories-collection"><?php esc_html_e( 'Categories Collection', 'trendy-blog' ); ?></li>
                    <div class="trendy-blog-block categories-collection-block-wrap open" block-name="categories-collection">
                        <div class="block-header content-trigger">
                            <h2 class="block-header-title"><?php esc_html_e( 'Categories Collection', 'trendy-blog' ); ?></h2>
                            <span class="block-header-icon"><i class="fas fa-chevron-up"></i></span>
                        </div>
                        <div class="block-content-wrap">
                            <div class="customize-text-field">
                                <label><?php esc_html_e( 'Block Title', 'trendy-blog' ) ?></label>
                                <p class="description"><?php esc_html_e( 'Leave blank to hide title', 'trendy-blog' ) ?></p>
                                <input type="text" class="block-repeater-control-field" data-name="blockTitle" value="<?php esc_attr_e( 'Categories Collection', 'trendy-blog' ); ?>"/>
                            </div>
                            <div class="customize-multicheckbox-field">
                                <label><?php esc_html_e( 'Posts Categories', 'trendy-blog' ) ?></label>
                                <div class="multicheckbox-content">
                                    <?php
                                        foreach( $block_categories as $cat ) :
                                    ?>
                                            <div class="multicheckbox-single-item">
                                                <label>
                                                    <input type="checkbox" value="<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_html( $cat->name ) . ' (' .absint($cat->count). ')'; ?></label>
                                            </div>
                                    <?php
                                        endforeach;
                                    ?>
                                </div>
                                <input class="block-repeater-control-field" data-name="categories" type="hidden" value="[]"/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Show categories title', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="titleOption" checked/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Show categories count', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="countOption" checked/>
                            </div>
                            <div class="customize-toggle-field checked-toggle-control">
                                <label><?php esc_html_e( 'Section show/hide', 'trendy-blog' ) ?></label>
                                <div class="toggle-button">
                                    <span class="on_off_txt_wrap">
                                        <span class="on"><?php echo esc_html( 'ON', 'trendy-blog' ); ?></span>
                                        <span class="off"><?php echo esc_html( 'OFF', 'trendy-blog' ); ?></span>
                                    </span>
                                </div>
                                <input type="checkbox" class="block-repeater-control-field" data-name="option" checked/>
                            </div>
                            <div class="action-buttons">
                                <div class="close-block"><?php esc_html_e( 'Close', 'trendy-blog' ); ?></div>
                                <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'trendy-blog' ); ?></div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div><!-- .blocks-repeater-control-wrap -->
            <input type="hidden" <?php esc_attr($this->link()); ?> class="blocks-repeater-control" value="<?php echo esc_attr($this->value()); ?>" />
    <?php
        }
    }
endif;