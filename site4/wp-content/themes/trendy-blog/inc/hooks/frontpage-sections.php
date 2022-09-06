<?php
/**
 * Frontpage sections hooks
 * 
 */
if( ! function_exists( 'trendy_blog_top_full_width_sec' )  ) :
    /**
     * Top Full Width Section
     * 
     */
    function trendy_blog_top_full_width_sec() {
        $frontpage_top_full_width_blocks = get_theme_mod( 'frontpage_top_full_width_blocks', json_encode(array(
                    array(
                        'name'      => 'banner-slider',
                        'option'    => true,
                        'category'  => '',
                        'count'     => 6,
                        'dateOption' => true,
                        'commentOption' => true
                    )
                )
            )
        );
        if( ! $frontpage_top_full_width_blocks ) {
            return;
        }
        $decoded_blocks = json_decode( $frontpage_top_full_width_blocks );
        if( ! in_array( true, array_column( $decoded_blocks, 'option' ) ) ) {
            return;
        }
        echo '<section id="trendy-blog-top-full-width-section" class="trendy-blog-frontpage-section">';
            foreach( $decoded_blocks as $block ) :
                $option = $block->option;
                if( $option ) {
                    $block_name = $block->name;
                    get_template_part( 'template-parts/' .$block_name. '/layout', 'one', $block );
                }
            endforeach;
        echo '</section><!-- #trendy-blog-top-full-width-section -->';
    }
endif;


if( !function_exists( 'trendy_blog_top_about_author__sec' ) ) :
    /**
     * About Author Section
     * 
     */
    function trendy_blog_top_about_author__sec() {
        $about_author_section_option = get_theme_mod( 'about_author_section_option', true );
        if( ! $about_author_section_option ) {
            return;
        }
        $frontpage_about_author_title = get_theme_mod( 'frontpage_about_author_title', esc_html__( 'Behind the blog', 'trendy-blog' ) );
        $frontpage_about_author_signature_image = get_theme_mod( 'frontpage_about_author_signature_image' );
        $frontpage_about_author_image_one = get_theme_mod( 'frontpage_about_author_image_one', esc_url( get_template_directory_uri() . '/assets/images/author-one.jpg' ) );
        $frontpage_about_author_image_two = get_theme_mod( 'frontpage_about_author_image_two', esc_url( get_template_directory_uri() . '/assets/images/author.jpg' ) );
        $frontpage_about_author_image_three = get_theme_mod( 'frontpage_about_author_image_three', esc_url( get_template_directory_uri() . '/assets/images/author-two.jpg' ) );
    ?>
        <section id="trendy-blog-about-author-section" class="trendy-blog-frontpage-section">
            <figure class="author-image-wrap" id="imgstack">
            <?php
                    if( !empty( $frontpage_about_author_image_one ) )
                        echo '<a href="javascript:void(0);"><img src="' .esc_url( $frontpage_about_author_image_one ). '"></a>';
                    
                    if( !empty( $frontpage_about_author_image_two ) )
                        echo '<a href="javascript:void(0);"><img src="' .esc_url( $frontpage_about_author_image_two ). '"></a>';
                    
                    if( !empty( $frontpage_about_author_image_three ) )
                        echo '<a href="javascript:void(0);"><img src="' .esc_url( $frontpage_about_author_image_three ). '"></a>';
                ?>
            </figure>
            <div class="author-content">
                <?php
                    if( !empty( $frontpage_about_author_title ) )
                        echo '<h2 class="author-title">' .esc_html( $frontpage_about_author_title ). '</h2>';

                        if( !empty( $frontpage_about_author_signature_image ) )
                        echo '<img class="author-signature" src="' .esc_url( $frontpage_about_author_signature_image ). '">';
                ?>
            </div>
        </section>
    <?php
    }
endif;

if( ! function_exists( 'trendy_blog_middle_left_content_sec' )  ) :
    /**
     * Middle Left Content Section
     * 
     */
    function trendy_blog_middle_left_content_sec() {
        $frontpage_middle_left_content_blocks = get_theme_mod( 'frontpage_middle_left_content_blocks', json_encode(array(
                    array(
                        'name'      => 'posts-grid',
                        'option'    => true,
                        'blockTitle'=> esc_html__( 'Posts Grid', 'trendy-blog' ),
                        'category'  => '',
                        'count'     => 4,
                        'excerptOption'=> true,
                        'dateOption' => true,
                        'commentOption' => true,
                        'buttonOption'  => true
                    ),
                    array(
                        'name'      => 'categories-collection',
                        'option'    => true,
                        'blockTitle'=> esc_html__( 'Categories Collection', 'trendy-blog' ),
                        'categories'  => '[]',
                        'count'     => 4,
                        'countOption'   => true,
                        'titleOption'   => true
                    )
                )
            )
        );
        if( ! $frontpage_middle_left_content_blocks ) {
            return;
        }
        $decoded_blocks = json_decode( $frontpage_middle_left_content_blocks );
        if( ! in_array( true, array_column( $decoded_blocks, 'option' ) ) ) {
            return;
        }
        echo '<section id="trendy-blog-middle-left-content-section" class="trendy-blog-frontpage-section">';
            echo '<div class="row">';
                echo '<div class="primary-section col-md-8">';
                    foreach( $decoded_blocks as $block ) :
                        $option = $block->option;
                        if( $option ) {
                            $block_name = $block->name;
                            get_template_part( 'template-parts/' .$block_name. '/layout', 'one', $block );
                        }
                    endforeach;
                echo '</div><!-- .primary-section -->';

                echo '<div class="secondary-section col-md-4">';
                    if( is_active_sidebar( 'frontpage-middle-right-sidebar' ) ) :
                        dynamic_sidebar( 'frontpage-middle-right-sidebar' );
                    else :
                        the_widget( 'WP_Widget_Recent_Posts' );
                    ?>
                        <div class="widget widget_categories">
                            <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'trendy-blog' ); ?></h2>
                            <ul>
                                <?php
                                    wp_list_categories(
                                        array(
                                            'orderby'    => 'count',
                                            'order'      => 'DESC',
                                            'title_li'   => '',
                                            'number'     => 6,
                                        )
                                    );
                                ?>
                            </ul>
                        </div><!-- .widget -->
                        
                    <?php
                    endif;
                echo '</div>';
            echo '</row>'; // row end
        echo '</section><!-- #trendy-blog-middle-left-content-section -->';
    }
endif;

if( ! function_exists( 'trendy_blog_middle_right_content_sec' )  ) :
    /**
     * Middle Right Content Section
     * 
     */
    function trendy_blog_middle_right_content_sec() {
        $frontpage_middle_right_content_blocks = get_theme_mod( 'frontpage_middle_right_content_blocks', json_encode(array(
                    array(
                        'name'      => 'posts-list',
                        'option'    => false,
                        'blockTitle'=> esc_html__( 'Posts List', 'trendy-blog' ),
                        'category'  => '',
                        'count'     => 4,
                        'excerptOption'=> true,
                        'dateOption' => true,
                        'commentOption' => true,
                        'buttonOption'  => false
                    ),
                    array(
                        'name'      => 'categories-collection',
                        'option'    => false,
                        'blockTitle'=> esc_html__( 'Categories Collection', 'trendy-blog' ),
                        'categories'  => '[]',
                        'count'     => 4,
                        'countOption'   => true,
                        'titleOption'   => true
                    )
                )
            )
        );
        if( ! $frontpage_middle_right_content_blocks ) {
            return;
        }
        $decoded_blocks = json_decode( $frontpage_middle_right_content_blocks );
        if( ! in_array( true, array_column( $decoded_blocks, 'option' ) ) ) {
            return;
        }
        echo '<section id="trendy-blog-middle-right-content-section" class="trendy-blog-frontpage-section">';
            echo '<div class="row">';
                echo '<div class="primary-section col-md-8">';
                    foreach( $decoded_blocks as $block ) :
                        $option = $block->option;
                        if( $option ) {
                            $block_name = $block->name;
                            get_template_part( 'template-parts/' .$block_name. '/layout', 'one', $block );
                        }
                    endforeach;
                echo '</div>';

                echo '<div class="secondary-section col-md-4 order-md-first">';
                    if( is_active_sidebar( 'frontpage-middle-left-sidebar' ) ) :
                        dynamic_sidebar( 'frontpage-middle-left-sidebar' );
                    else :
                        the_widget( 'WP_Widget_Recent_Posts' );
                    ?>
                        <div class="widget widget_categories">
                            <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'trendy-blog' ); ?></h2>
                            <ul>
                                <?php
                                    wp_list_categories(
                                        array(
                                            'orderby'    => 'count',
                                            'order'      => 'DESC',
                                            'title_li'   => '',
                                            'number'     => 6,
                                        )
                                    );
                                ?>
                            </ul>
                        </div><!-- .widget -->
                    <?php
                    endif;
                echo '</div>';
            echo '</div>';
        echo '</section><!-- #trendy-blog-middle-right-content-section -->';
    }
endif;

if( ! function_exists( 'trendy_blog_bottom_full_width_sec' )  ) :
    /**
     * Bottom Full Width Section
     * 
     */
    function trendy_blog_bottom_full_width_sec() {
        $frontpage_bottom_full_width_blocks = get_theme_mod( 'frontpage_bottom_full_width_blocks', json_encode(array(
                    array(
                        'name'      => 'posts-list',
                        'option'    => false,
                        'blockTitle'=> esc_html__( 'Posts List', 'trendy-blog' ),
                        'category'  => '',
                        'count'     => 4,
                        'excerptOption'=> true,
                        'dateOption' => true,
                        'commentOption' => true,
                        'buttonOption'  => false
                    ),
                    array(
                        'name'      => 'posts-grid',
                        'option'    => true,
                        'blockTitle'=> esc_html__( 'Posts Grid', 'trendy-blog' ),
                        'category'  => '',
                        'count'     => 4,
                        'excerptOption'=> true,
                        'dateOption' => true,
                        'commentOption' => true,
                        'buttonOption'  => true
                    )
                )
            )
        );
        if( ! $frontpage_bottom_full_width_blocks ) {
            return;
        }
        $decoded_blocks = json_decode( $frontpage_bottom_full_width_blocks );
        if( ! in_array( true, array_column( $decoded_blocks, 'option' ) ) ) {
            return;
        }
        echo '<section id="trendy-blog-bottom-full-width-section" class="trendy-blog-frontpage-section">';
            foreach( $decoded_blocks as $block ) :
                $option = $block->option;
                if( $option ) {
                    $block_name = $block->name;
                    get_template_part( 'template-parts/' .$block_name. '/layout', 'one', $block );
                }
            endforeach;
        echo '</section><!-- #trendy-blog-bottom-full-width-section -->';
    }
endif;

if( ! function_exists( 'trendy_blog_bottom_full_width_woocommerce_sec' )  ) :
    /**
     * Bottom Full Width Woocommerce Section
     * 
     */
    function trendy_blog_bottom_full_width_woocommerce_sec() {
        if( ! class_exists( 'WooCommerce' ) ) return;
        $frontpage_bottom_full_width_woocommerce_blocks = get_theme_mod( 'frontpage_bottom_full_width_woocommerce_blocks', json_encode(array(
                    array(
                        'name'      => 'woo-products',
                        'option'    => true,
                        'blockTitle'=> esc_html__( 'Latest Products', 'trendy-blog' ),
                        'productType' => 'latest',
                        'categories'  => '[]',
                        'count'     => 4
                    )
                )
            )
        );
        if( ! $frontpage_bottom_full_width_woocommerce_blocks ) {
            return;
        }
        $decoded_blocks = json_decode( $frontpage_bottom_full_width_woocommerce_blocks );
        if( ! in_array( true, array_column( $decoded_blocks, 'option' ) ) ) {
            return;
        }
        echo '<section id="trendy-blog-bottom-full-width-woocommerce-section" class="trendy-blog-frontpage-section">';
            foreach( $decoded_blocks as $block ) :
                $option = $block->option;
                if( $option ) {
                    $block_name = $block->name;
                    get_template_part( 'template-parts/' .$block_name. '/layout', 'one', $block );
                }
            endforeach;
        echo '</section><!-- #trendy-blog-bottom-full-width-woocommerce-section -->';
    }
endif;

add_action( 'trendy_blog_frontpage_section_hook', 'trendy_blog_top_full_width_sec', 10 );
add_action( 'trendy_blog_frontpage_section_hook', 'trendy_blog_top_about_author__sec', 10 );
add_action( 'trendy_blog_frontpage_section_hook', 'trendy_blog_middle_left_content_sec', 20 );
add_action( 'trendy_blog_frontpage_section_hook', 'trendy_blog_middle_right_content_sec', 30 );
add_action( 'trendy_blog_frontpage_section_hook', 'trendy_blog_bottom_full_width_woocommerce_sec', 40 );
add_action( 'trendy_blog_frontpage_section_hook', 'trendy_blog_bottom_full_width_sec', 50 );

if( ! function_exists( 'trendy_blog_footer_three_column_sec' ) ) :
    /**
     * Footer three column section fnc
     * 
     */
    function trendy_blog_footer_three_column_sec() {
        if( ! is_front_page() ) {
            return;
        }
        $footer_three_column_blocks = get_theme_mod(  'footer_three_column_blocks', json_encode(array(
                    array(
                        'label'=> esc_html__( 'Column One', 'trendy-blog' ),
                        'name'      => 'posts-column',
                        'category'  => '',
                        'dateOption' => true,
                        'layout'    => 'one'
                    ),
                    array(
                        'label'=> esc_html__( 'Column Two', 'trendy-blog' ),
                        'name'      => 'posts-column',
                        'category'  => '',
                        'dateOption' => true,
                        'layout'    => 'two'
                    ),
                    array(
                        'label'=> esc_html__( 'Column Three', 'trendy-blog' ),
                        'name'      => 'posts-column',
                        'category'  => '',
                        'dateOption' => true,
                        'layout'    => 'three'
                    )
                )
            )
        );
        if( ! $footer_three_column_blocks ) {
            return;
        }
        echo '<section id="trendy-blog-footer-three-column-section">';
            echo '<div class="container">';
                echo '<div class="row">';
                    $decoded_blocks = json_decode( $footer_three_column_blocks );
                    foreach( $decoded_blocks as $block ) :
                        $block_name = $block->name;
                        $layout = $block->layout;
                        get_template_part( 'template-parts/' .$block_name. '/layout', esc_html( $layout ), $block );
                    endforeach;
                echo '</div>';
            echo '</div>';
        echo '</section><!-- #trendy-blog-footer-three-column-section -->';
    }
endif;
add_action( 'trendy_blog_before_footer_hook', 'trendy_blog_footer_three_column_sec', 40 );