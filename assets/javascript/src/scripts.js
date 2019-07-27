/*
* italplant Script file
* Author: Domenico Catelli
*/

jQuery(document).ready(function($) {

    $('.js-menu-toggle').on('click', function(){
        $('body').toggleClass('is-menu-on');

        if ( $('#site-header').hasClass('transparent-navbar') ){

            if ($(window).scrollTop()<20 ) {

                    $('#site-header').toggleClass('dark');

            }

        }

        return;

    });


    // Hashtag Nav
    $(function() {
      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top-80
            }, 700);
            return false;
          }
        }
      });
    });

    // Initialise overlay slider
    $( function() {

        var gallery = $('.slider-content').flickity({
            pageDots: false,
            wrapAround: false,
            autoPlay: false,
            arrowShape: 'M62.5 0l3.6 2.1L38.7 50l27.4 47.9-3.6 2.1-28.6-50L62.5 0z'
        });
        var flickity = gallery.data('flickity');


        // Target specific slide when opening the overlay from the areas links
        $('.h-area-flex-wrap').on( 'click', '.h-area-single', function() {
            var selector = $(this).attr('data-selector');
            gallery.flickity( 'selectCell', selector );
        });

    });


    if($('.a-projects-content')){
        $('.a-projects-content').css('height', $('.a-projects-flex-wrap').height() );
        $(window).on('resize', function(){
            $('.a-projects-content').css('height', $('.a-projects-flex-wrap').height() );
        });
    }

    if($('.s-projects-content')){
        $('.s-projects-content').css('height', $('.project-single-wrapper').height()  + $(window).height() * 0.6  );
        $(window).on('resize', function(){
            $('.s-projects-content').css('height', $('.project-single-wrapper').height() );
        });
    }

});
