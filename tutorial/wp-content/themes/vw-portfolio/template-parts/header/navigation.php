<?php
/**
 * The template part for header
 *
 * @package VW Portfolio 
 * @subpackage vw_portfolio
 * @since VW Portfolio 1.0
 */
?>
<?php
  $vw_portfolio_search_hide_show = get_theme_mod( 'vw_portfolio_search_hide_show' );
  if ( 'Disable' == $vw_portfolio_search_hide_show ) {
    $colmd = 'col-lg-9 col-md-9';
  } else { 
    $colmd = 'col-lg-8 col-md-5 col-6';
  }
?>
<div id="header" class="menubar <?php if( get_theme_mod( 'vw_portfolio_sticky_header', false) != '' || get_theme_mod( 'vw_portfolio_stickyheader_hide_show', false) != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
  <div class="container">
    <div class="row bg-home">
      <div class="logo col-lg-3 col-md-5 align-self-center">
        <?php if ( has_custom_logo() ) : ?>
          <div class="site-logo"><?php the_custom_logo(); ?></div>
        <?php endif; ?>
        <?php $blog_info = get_bloginfo( 'name' ); ?>
          <?php if ( ! empty( $blog_info ) ) : ?>
            <?php if ( is_front_page() && is_home() ) : ?>
              <?php if( get_theme_mod('vw_portfolio_logo_title_hide_show',true) != ''){ ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php } ?>
            <?php else : ?>
              <?php if( get_theme_mod('vw_portfolio_logo_title_hide_show',true) != ''){ ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
              <?php } ?>
            <?php endif; ?>
          <?php endif; ?>
          <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :
          ?>
          <?php if( get_theme_mod('vw_portfolio_tagline_hide_show',true) != ''){ ?>
            <p class="site-description">
              <?php echo esc_html($description); ?>
            </p>
          <?php } ?>
        <?php endif; ?>
      </div>
      <div class="<?php echo esc_html( $colmd ); ?> align-self-center">
        <?php if(has_nav_menu('primary')){ ?>
          <div class="toggle-nav mobile-menu">
            <button onclick="vw_portfolio_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('vw_portfolio_scroll_to_top_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-portfolio'); ?></span></button>
          </div>
        <?php } ?>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-portfolio' ); ?>">
            <?php 
              if(has_nav_menu('primary')){
                wp_nav_menu( array( 
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu clearfix' ,
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ) ); 
              }
            ?>
            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_portfolio_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_portfolio_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-portfolio'); ?></span></a>
          </nav>
        </div>
      </div>
      <?php if ( 'Disable' != $vw_portfolio_search_hide_show ) {?>
        <div class="search-box col-lg-1 col-md-1 col-6 align-self-center">
          <span><a href="#"><i class="<?php echo esc_attr(get_theme_mod('vw_portfolio_search_icon','fas fa-search')); ?>"></i></a></span>
        </div>
      <?php } ?>
    </div>
    <div class="serach_outer">
      <div class="closepop"><a href="#maincontent"><i class="<?php echo esc_attr(get_theme_mod('vw_portfolio_search_close_icon','fa fa-window-close')); ?>"></i></a></div>
      <div class="serach_inner">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>