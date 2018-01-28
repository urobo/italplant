/*
* italplant Script file
* Author: Domenico Catelli
*/

jQuery(document).ready(function($) {

    $('.js-menu-toggle').on('click', function(){
        $('body').toggleClass('is-menu-on');
    });


    // Hashtag Nav
    $('a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {

        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

            if (target.length) {

                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function() {

                    var $target = $(target);
                    $target.focus();

                    if ($target.is(":focus")) {
                        return false;
                    } else {
                        $target.attr('tabindex','-1');
                        $target.focus();
                    };
                });
            }
        }
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

});
