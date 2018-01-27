/*
 * italplant Script file
 * Author: Domenico Catelli
 */

jQuery(document).ready(function($) {

    $('.js-menu-toggle').on('click', function(){
        $('body').toggleClass('is-menu-on');
    });

    $( function() {

          var gallery = $('.slider-content').flickity({
              pageDots: false,
              wrapAround: false,
              autoPlay: false
          });

          var flickity = gallery.data('flickity');



          $('.h-area-flex-wrap').on( 'click', '.h-area-single', function() {
              var selector = $(this).attr('data-selector');
              gallery.flickity( 'selectCell', selector );
          });


      });

});
