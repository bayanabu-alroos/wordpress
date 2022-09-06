<?php
/**
 * Subtitle metabox file.
 *
 * @package BlogMelody
 * @since Giddy Blog 1.0
 */

if ( ! function_exists( 'giddy_blog_video_url_callback' ) ) :
    /** 
     * Outputs the content of the Video Url
     */
    function giddy_blog_video_url_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'giddy_blog_nonce' );
        $video_url = get_post_meta( $post->ID, 'giddy-blog-video-url', true );
        ?>
        <p>
         <label for="giddy-blog-video-url" class="giddy-blog-row-title"><?php esc_html_e( 'Video Url', 'giddy-blog' )?></label>
         <input class="widefat" type="url" name="giddy-blog-video-url" id="giddy-blog-video-url" value="<?php echo esc_url( $video_url ); ?>"/>     
        </p>

        <?php
    }
endif;

if ( ! function_exists( 'giddy_blog_video_url_save' ) ) :
    /**
     * Saves the Video Url input
     */
    function giddy_blog_video_url_save( $post_id ) {
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'giddy_blog_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'giddy_blog_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }

        // Checks for input and sanitizes/saves if needed
        if( isset( $_POST[ 'giddy-blog-video-url' ] ) ) {
            update_post_meta( $post_id, 'giddy-blog-video-url', sanitize_text_field( wp_unslash( $_POST[ 'giddy-blog-video-url' ] ) ) );
        }

    }
endif;
add_action( 'save_post', 'giddy_blog_video_url_save' );

