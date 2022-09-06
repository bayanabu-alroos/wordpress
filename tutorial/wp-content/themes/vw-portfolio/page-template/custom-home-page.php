<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_portfolio_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_portfolio_slider_hide_show', false) != '' || get_theme_mod( 'vw_portfolio_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_portfolio_slider_speed',4000)) ?>">
        <?php $vw_portfolio_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_portfolio_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_portfolio_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_portfolio_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_portfolio_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1 class="wow rollIn" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="wow rollIn" data-wow-duration="2s"><?php $excerpt = get_the_excerpt(); echo esc_html( vw_portfolio_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_portfolio_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_portfolio_slider_button_text','Read More') != ''){ ?>
                    <div class="more-btn wow rollIn" data-wow-duration="2s">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_portfolio_slider_button_text',__('Read More','vw-portfolio')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_portfolio_slider_button_text',__('Read More','vw-portfolio')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-portfolio' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-portfolio' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section> 
  <?php }?>

  <?php do_action( 'vw_portfolio_after_slider' ); ?>

  <?php if( get_theme_mod('vw_portfolio_section_title') != '' || get_theme_mod('vw_portfolio_awesome_services') != ''){ ?>
    <section id="services" class="wow zoomInDown delay-1000" data-wow-duration="2s">
      <div class="container">
        <div class="services-title">
          <?php if( get_theme_mod('vw_portfolio_section_title') != ''){ ?>
            <h2><?php echo esc_html(get_theme_mod('vw_portfolio_section_title','')); ?></h2>
          <?php }?>
        </div>
        <div class="row">
          <?php
            $vw_portfolio_catData1=  get_theme_mod('vw_portfolio_awesome_services');
            if($vw_portfolio_catData1){
            $page_query = new WP_Query(array( 'category_name' => esc_html($vw_portfolio_catData1 ,'vw-portfolio')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-3 col-md-6">
                  <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                  <div class="overlay-box">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_portfolio_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_portfolio_services_excerpt_number','30')))); ?></p>
                  </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
          }
          ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'vw_portfolio_after_services' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>