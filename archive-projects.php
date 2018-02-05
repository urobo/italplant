<?php get_header(); ?>

<div id="projects-map" class="a-projects-hero"></div>

<div class="a-projects-content">
    <main role="main" id="posts">

        <div class="l-container a-projects-flex-wrap">

            <?php
            $map_data= array();
            while (have_posts()) : the_post();
                $featured = get_field('archive_featured');

                array_push($map_data, get_field('map_marker'));

                if ($featured) :
                    if ( has_post_thumbnail() ) :
                        $image = get_post_thumbnail_id($post->ID);
                        $thumb = (array) get_size($image, 600 );
                    else :
                        $thumb['url'] = get_template_directory_uri().'/assets/images/placeholder.png';
                    endif;
                    ?>

                    <a href="<?php the_permalink(); ?>" class="a-projects-single">

                        <div class="a-projects-thumb">
                            <span class="v-align-middle"></span>
                            <img src="<?php echo $thumb['url'] ?>" alt="<?php the_title(); ?>" class="img-right">
                        </div>
                        <div><?php echo excerpt(10); ?></div>
                        <div class="a-projects-btn-underline">Mostra Dettagli »</div>

                    </a>

                    <?php
                endif;
            endwhile; ?>

        </div>
    </main>

</div>

<script>
  function initMap() {
    var italplant = {lat: 45.53350, lng: 9.911930};
    var map = new google.maps.Map(document.getElementById('projects-map'), {
      zoom: 4,
      center: italplant
    });
    var icon= {
        url:"<?php echo get_template_directory_uri().'/assets/images/icn-map-marker.png' ?>",
        size: new google.maps.Size(60, 60),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(0, 30),
        scaledSize: new google.maps.Size(30, 30)
    }
    <?php foreach($map_data as $marker): ?>
        var position = {lat: <?php echo $marker['latitude']  ?>,lng: <?php echo $marker['longitude'] ?>};
        var label = '<?php echo $marker['marker_label'] ?>';
        var marker = new google.maps.Marker({
          position: position,
          icon: icon,
          map: map,
          title: label
        });
    <?php endforeach; ?>
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
