jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

        var loader                  = $('#loader');
        var loader_container        = $('#preloader');
        var scroll                  = $(window).scrollTop();  
        var scrollup                = $('.backtotop');
        var primary_menu_toggle     = $('#masthead .menu-toggle');
        var top_menu_toggle         = $('#top_navigation .menu-toggle');
        var dropdown_toggle         = $('button.dropdown-toggle');
        var primary_nav_menu        = $('#masthead .main-navigation');
        var top_nav_menu            = $('#top_navigation .main-navigation');
        var featured_slider         = $('.featured-slider');
        var posts_slider            = $('.posts-slider');
        var recipe_slider           = $('.recipe-slider');

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
            NAVIGATION
------------------------------------------------*/

        primary_menu_toggle.click(function(){
            primary_nav_menu.slideToggle();
            $(this).toggleClass('active');
            $('.menu-overlay').toggleClass('active');
            $('#masthead .main-navigation').toggleClass('menu-open');
        });

        top_menu_toggle.click(function(){
            top_nav_menu.slideToggle();
            $(this).toggleClass('active');
            $('.menu-overlay').toggleClass('active');
            $('#top_navigation .main-navigation').toggleClass('menu-open');
            $('#top_navigation').css({ 'z-index' : '30000' });

            if( $('#masthead .menu-toggle').hasClass('active') ) {
                primary_nav_menu.slideUp();
                $('#masthead .main-navigation').removeClass('menu-open');
                $('#masthead .menu-toggle').removeClass('active');
                $('.menu-overlay').toggleClass('active');
            }
        });

        dropdown_toggle.click(function() {
            $(this).toggleClass('active');
            $(this).parent().find('.sub-menu').first().slideToggle();
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 1) {
                $('.menu-sticky #masthead').addClass('nav-shrink');
            }
            else {
                $('.menu-sticky #masthead').removeClass('nav-shrink');
            }
        });

        $(".search-menu > a").click(function(event){
            event.preventDefault();
            $("#search").slideToggle();
            $('.search-menu').toggleClass("active");
        });

        $(document).click(function (e) {
            var container = $("#masthead, #top_navigation");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                primary_nav_menu.slideUp();
                $(this).removeClass('active');
                $('.menu-overlay').removeClass('active');
                $('#masthead .main-navigation').removeClass('menu-open');
                $('.menu-toggle').removeClass('active');

                top_nav_menu.slideUp();
                $(this).removeClass('active');
                $('.menu-overlay').removeClass('active');
                $('#top_navigation .main-navigation').removeClass('menu-open');
            }
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 1) {
                $('.menu-sticky #masthead').addClass('nav-shrink');
            } 
            else {
                $('.menu-sticky #masthead').removeClass('nav-shrink');
            }
        });


/*------------------------------------------------
            SLICK SLIDER
------------------------------------------------*/
        $('.featured-slider').slick();

        $('.top-destination-slider').slick();

        $('.gallery-content').slick(); 

        $('.trending-topics-slider').slick({
            responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 5,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 3,
            infinite: true,
            dots: true
        }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2
        }
        },
        {
          breakpoint: 567,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
        }
        ]
        });

        $('.gallery-slider').slick({
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1
                }
            }]
        });

        $('#juju_blog_testimonial_section .slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            asNavFor: '.slider-nav'
        });

        $('#juju_blog_testimonial_section .slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            focusOnSelect: true,
            centerMode: true,
            asNavFor: '.slider-for',
            responsive: [
            {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 1
                }
            }
            ]
        });;

/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
        $(window).resize(function() {
            if( $(window).width() < 1024 ) {
                $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
                    if( e.which === 9 ) {
                        e.preventDefault();
                        $('#masthead').find('.menu-toggle').focus();
                    }
                });

                $('#secondary-menu').find("li").last().bind( 'keydown', function(e) {
                    if( e.which === 9 ) {
                        e.preventDefault();
                        $('#top_navigation').find('.menu-toggle').focus();
                    }
                });

                $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
                    if( e.which === 9 ) {
                        e.preventDefault();
                        $('#masthead').find('.menu-toggle').focus();
                    }
                });

                $('#secondary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
                    if( e.which === 9 ) {
                        e.preventDefault();
                        $('#top_navigation').find('.menu-toggle').focus();
                    }
                });

                $('#search').find("button").unbind('keydown');

            }
            else {
                $('#primary-menu').find("li").unbind('keydown');
                $('#secondary-menu').find("li").unbind('keydown');

                $('#search').find("button").bind( 'keydown', function(e) {
                    var tabKey              = e.keyCode === 9;
                    var shiftKey            = e.shiftKey;

                    if( tabKey ) {
                        e.preventDefault();
                        $('#search').hide();
                        $('.search-menu > a').removeClass('search-active').focus();
                    }

                    if( shiftKey && tabKey ) {
                        e.preventDefault();
                        $('#search').show();
                        $('.search-field').focus();
                        $('.search-menu > a').addClass('search-active');
                    }
                });

                $('.search-menu > a').on('keydown', function (e) {
                    var tabKey              = e.keyCode === 9;
                    var shiftKey            = e.shiftKey;

                    if( $('.search-menu > a').hasClass('search-active') ) {
                        if ( shiftKey && tabKey ) {
                            e.preventDefault();
                            $('#search').hide();
                            $('.search-menu > a').removeClass('search-active').focus();
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
                TABS
------------------------------------------------*/

        $('ul.tabs li a').click(function(event) {
            event.preventDefault();

            var tab_id = $(this).attr('data-tab');

            $('ul.tabs li a').removeClass('active');
            $(this).addClass('active');

            $('.tab-content').removeClass('active');
            $('.tab-content').hide();

            $("#"+tab_id).show();

        });

/*------------------------------------------------
            Tab Filter
------------------------------------------------*/

        $('.widget_posts_filter .widget-title span').click(function(){
            var tab_id = $(this).attr('data-tab');

            $('.widget_posts_filter .widget-title span').removeClass('active');           
            $(this).addClass('active');

            $('.tab-content').hide();
            $( "#"+tab_id ).fadeIn('slow');
        });





/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});