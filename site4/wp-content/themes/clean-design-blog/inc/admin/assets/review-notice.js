/**
 * Theme Info
 * 
 * @package Clean Design Blog
 * @since 1.7.0
 */
 jQuery(document).ready(function($) {
    var ajaxUrl = cleanDesignBlogThemeInfoObject.ajaxUrl, _wpnonce = cleanDesignBlogThemeInfoObject._wpnonce, container = $( ".clean-design-blog-review-notice" )
    if( container.length ) {
        container.on( "click", ".notice-actions .button", function(e) {
            e.preventDefault();
            var _this = $(this), redirect = _this.data("redirect")
            $.ajax({
                url: ajaxUrl,
                type: 'post',
                data: {
                    "action": "clean_design_blog_set_ajax_transient",
                    "_wpnonce": _wpnonce
                },
                success: function(res) {
                    var notice = JSON.parse(res);
                    if( notice.status ) {
                        container.fadeOut();
                    }
                },
                complete: function() {
                    if( redirect ) {
                        window.open( redirect, "_blank" )
                    }
                }
            })
        })
    }
 })