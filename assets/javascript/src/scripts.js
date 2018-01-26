/*
 * italplant Script file
 * Author: Domenico Catelli
 */

jQuery(document).ready(function($) {

    $('.js-menu-toggle').on('click', function(){
        $('body').toggleClass('is-menu-on');
    });

    $( function() {

          var $gallery = $('.slider-content').flickity({
              pageDots: false,
              wrapAround: true,
              autoPlay: 4000
          });

          var flickity = $gallery.data('flickity');

          var $galleryNav = $('.app-slider-nav');
          var $galleryNavItems = $galleryNav.find('li');

          $gallery.on( 'select.flickity', function() {
              $galleryNav.find('.is-selected').removeClass('is-selected');
              $galleryNavItems.eq( flickity.selectedIndex ).addClass('is-selected');
          });

          $galleryNav.on( 'click', 'li', function() {
              var index = $(this).index();
              $gallery.flickity( 'select', index );
          });

      });

});
