/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	const juju_blog_section_lists = ['featured_slider_section','trending_topics_section','about_section','most_recent_posts_section','most_read_posts_section'];
    juju_blog_section_lists.forEach( juju_blog_homepage_scroll_preview );

    function juju_blog_homepage_scroll_preview(item, index) {
    	// Collect information from customize-controls.js about which panels are opening.
		wp.customize.bind( 'preview-ready', function() {
			
			// Initially hide the theme option placeholders on load.
			$( '.panel-placeholder' ).hide();
			//console.log('working');
			wp.customize.preview.bind( item, function( data ) {
				// Only on the front page.
				if ( ! $( 'body' ).hasClass( 'home' ) ) {
					return;
				}

				// When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
				if ( true === data.expanded ) {
					$('html, body').animate({
				        'scrollTop' : $('#juju_blog_'+item).position().top
				    });
				} 
			});

		});
 	}

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header title color.
	wp.customize( 'juju_blog_theme_options[header_title_color]', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header tagline color.
	wp.customize( 'juju_blog_theme_options[header_tagline_color]', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	//Real Time Partial Refresh
	
	wp.customize( 'juju_blog_theme_options[top_bar_notice]', function( value ) {
		value.bind( function( to ) {
			$( '#top_navigation .top-navigation-content p' ).text( to );
		} );
	} );
	
	wp.customize( 'juju_blog_theme_options[top_bar_email]', function( value ) {
		value.bind( function( to ) {
			$( '#top_navigation .contact-information a' ).text( to );
		} );
	} );
	
	wp.customize( 'juju_blog_theme_options[topics_title]', function( value ) {
		value.bind( function( to ) {
			$( '#juju_blog_trending_topics_section .section-title' ).text( to );
		} );
	} );
	
	wp.customize( 'juju_blog_theme_options[about_btn_text]', function( value ) {
		value.bind( function( to ) {
			$( '#juju_blog_about_section .view-more a' ).text( to );
		} );
	} );
	
	wp.customize( 'juju_blog_theme_options[recent_posts_title]', function( value ) {
		value.bind( function( to ) {
			$( '#juju_blog_most_recent_posts_section .section-title' ).text( to );
		} );
	} );
	
	wp.customize( 'juju_blog_theme_options[most_read_title]', function( value ) {
		value.bind( function( to ) {
			$( '#juju_blog_most_read_posts_section h2.section-title' ).text( to );
		} );
	} );
	
	wp.customize( 'juju_blog_theme_options[copyright_text]', function( value ) {
		value.bind( function( to ) {
			$( '#colophon .site-info span.copyright' ).text( to );
		} );
	} );


} )( jQuery );