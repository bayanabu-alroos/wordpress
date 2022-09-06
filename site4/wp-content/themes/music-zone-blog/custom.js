jQuery(document).ready(function($) {


$('#social-navigation ul li.search-menu a').click(function(event) {
    event.preventDefault();
    $(this).toggleClass('search-active');
    $('#social-navigation #search').fadeToggle();
    $('#social-navigation .search-field').focus();
});
  
$('.popup-video').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    preloader: true,
});



/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});