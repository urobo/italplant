<?php
/*
 Template Name: About Page
*/
?>

<?php get_header(); ?>

<div id="top" class="about-hero">
    <?php

    $column_left = get_field('column_left');
    $column_right = get_field('column_right');
    $reach_title = get_field('how_to_reach_us_title');
    $reach_content = get_field('how_to_reach_us');
    $form_title = get_field('contact_form_title');
    $contact_form = get_field('contact_form');

    if (has_post_thumbnail( $post->ID ) ): $about_single_bg = get_post_thumbnail_id($post->ID); endif;
	$about_bg_small = (array) get_size($about_single_bg, 1242 );
	$about_bg_medium = (array) get_size($about_single_bg, 1600 );
	$about_bg_large = (array) get_size($about_single_bg, 2400);

    ?>
    <style media="screen">
    			.about-hero{
    					background-image: url('<?php echo $about_bg_small['url'] ?>');
    			}
    			@media (min-width: 767px) {
    					.about-hero{
    							background-image: url('<?php echo $about_bg_medium['url'] ?>');
    					}
    			}
    			@media (min-width: 1023px) {
    					.about-hero{
    							background-image: url('<?php echo $about_bg_large['url'] ?>');
    					}
    			}
    </style>
</div>


<div class="l-container">
    <div class="italplant-logo site-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Logo"/>
    </div>
    <div class="about-content">
        <div class="l-col-5 l-col-push-1">
            <?php echo $column_left ?>
        </div>
        <div class="l-col-5">
            <?php echo $column_right ?>
        </div>
    </div>
</div>

<div class="l-container">
    <div id="about-map" class="about-map-size l-col-10 l-col-push-1"></div>
</div>

<div id="contact-form" class="l-container about-contact-submap">
    <div class="l-col-4 l-col-push-1">
        <h3><?php echo $reach_title ?></h3>
        <div>
            <?php echo $reach_content ?>
        </div>
    </div>
    <div class="l-col-5 l-col-push-1">
        <h3><?php echo $form_title ?></h3>
        <div>
            <?php echo $contact_form ?>
        </div>
    </div>
</div>

<script>
  function initMap() {
    var italplant = {lat: 45.53350, lng: 9.911930};
    var map = new google.maps.Map(document.getElementById('about-map'), {
      zoom: 13,
      center: italplant
    });
    var icon= {
        url:"<?php echo get_template_directory_uri().'/assets/images/icn-map-marker.png' ?>",
        size: new google.maps.Size(60, 60),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(0, 30),
        scaledSize: new google.maps.Size(30, 30)
    }
        var label = 'Italplant S.r.l.';
        var marker = new google.maps.Marker({
          position: italplant,
          icon: icon,
          map: map,
          title: label
        });

    google.maps.event.addDomListener(window, 'resize', function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
  }
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIgZSAUy5VhIPSXHm1ze6yTDcpFRHbw_I&callback=initMap">
</script>

<?php get_footer(); ?>
