jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader              = $('#loader');
    var loader_container    = $('#preloader');
    var scroll              = $(window).scrollTop();  
    var scrollup            = $('.backtotop');
    var primary_menu_toggle         = $('#masthead .menu-toggle');
    var dropdown_toggle     = $('button.dropdown-toggle');
    var primary_nav_menu    = $('.main-navigation');
    var featured_slider     = $('#featured-slider');
    var gallery_slider      = $('.gallery-slider');
    var client_slider       = $('.client-slider');
    var food_tips_slider    = $('.food-tips-slider');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    primary_menu_toggle.click(function(){
        primary_nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('.main-navigation').toggleClass('menu-open');
        $('body').toggleClass('main-navigation-active');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
       $('#primary-menu > li:last-child button.active').unbind('keydown');
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            primary_nav_menu.slideUp();
            menu_toggle.removeClass('active');
            $('.menu-overlay').removeClass('active');
            $('.main-navigation').removeClass('menu-open');
            $('body').removeClass('main-navigation-active');      
        }
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-open');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.main-navigation li.search-menu a').removeClass('search-open');
            $('.main-navigation #search').hide();
        }
    });

    $(document).click(function (e) {
      var container = $("#masthead");
       if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.main-navigation li.search-menu a').removeClass('search-open');
            $('.main-navigation #search').hide();
        }
    });

    if ($(window).width() < 1024) {
        $( ".nav-menu ul.sub-menu li:last-child" ).focusout(function() {
            dropdown_toggle.removeClass('active');
            $('.main-navigation .sub-menu').slideUp();
        });
    }  




/*------------------------------------------------
            Sliders
------------------------------------------------*/

featured_slider.slick({
    responsive: [
    {
    breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            arrows: false
        }
    },
    {
        breakpoint: 767,
            settings: {
            slidesToShow: 2,
            arrows: false
        }
    },
    {
        breakpoint: 567,
            settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
});

gallery_slider.slick({
    responsive: [
    {
    breakpoint: 767,
        settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
});

client_slider.slick();


food_tips_slider.slick({
    responsive: [
    {
    breakpoint: 767,
        settings: {
            slidesToShow: 1,
            centerMode: false,
            arrows: false
        }
    }
    ]
});

$('#featured-slider article').hover(function() {
    var image_url = $(this).data('thumb');
    $('#featured-slider').css('background-image', image_url );
});


/*------------------------------------------------
            Match Height
------------------------------------------------*/

$('.testimonial-posts-wrapper article .entry-container').matchHeight();
$('.food-tips-slider article').matchHeight();



/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });
    $('#search').find("button").unbind('keydown');
}
else {
    $('#primary-menu').find("li").unbind('keydown');

    $('#search').find("button").bind( 'keydown', function(e) {
        var tabKey              = e.keyCode === 9;
        var shiftKey            = e.shiftKey;

        if( tabKey ) {
            e.preventDefault();
            $('#search').hide();
            $('.search-menu > a').removeClass('search-open').focus();
        }

        if( shiftKey && tabKey ) {
            e.preventDefault();
            $('#search').show();
            $('.main-navigation .search-field').focus();
            $('.search-menu > a').addClass('search-open');
        }
    });

    $('.search-menu > a').on('keydown', function (e) {
        var tabKey              = e.keyCode === 9;
        var shiftKey            = e.shiftKey;
        
        if( $('.search-menu > a').hasClass('search-open') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                $('#search').hide();
                $('.search-menu > a').removeClass('search-open').focus();
            }
        }
    });
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#search').find("button").unbind('keydown');
    }
    else {
        $('#primary-menu').find("li").unbind('keydown');

          $('#search').find("button").bind( 'keydown', function(e) {
          var tabKey              = e.keyCode === 9;
          var shiftKey            = e.shiftKey;

          if( tabKey ) {
              e.preventDefault();
              $('#search').hide();
              $('.search-menu > a').removeClass('search-open').focus();
          }

          if( shiftKey && tabKey ) {
              e.preventDefault();
              $('#search').show();
              $('.main-navigation .search-field').focus();
              $('.search-menu > a').addClass('search-open');
          }
      });

      $('.search-menu > a').on('keydown', function (e) {
          var tabKey              = e.keyCode === 9;
          var shiftKey            = e.shiftKey;
          
          if( $('.search-menu > a').hasClass('search-open') ) {
              if ( shiftKey && tabKey ) {
                  e.preventDefault();
                  $('#search').hide();
                  $('.search-menu > a').removeClass('search-open').focus();
              }
          }
      });
    }
});

primary_menu_toggle.on('keydown', function (e) {
    var tabKey    = e.keyCode === 9;
    var shiftKey  = e.shiftKey;

    if( primary_menu_toggle.hasClass('active') ) {
        if ( shiftKey && tabKey ) {
            e.preventDefault();
            primary_nav_menu.slideUp();
            $('.main-navigation').removeClass('menu-open');
            $('.menu-overlay').removeClass('active');
            primary_menu_toggle.removeClass('active');
        };
    }
});


/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});