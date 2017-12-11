<?php
/**
 * Template part for the areas loop and content on the template-home.php
 */
?>
<div class="h-areas">

    <?php
    $i = 1;
    $areas_query = new WP_Query( array(
        'post_type' => 'areas',
        'posts_per_page' => 8
    ) );

    $areas_title = get_field('areas_title');
    $areas_archive_btn = get_field('areas_archive_button');
    $areas_loop = get_field('areas_loop');


    if($areas_title): ?>
        <div class="l-container h-areas-title">
            <h2><?php echo $areas_title ?></h2>
            <div class="yellow-divider-left"></div>
        </div>
    <?php endif; ?>

    <div class="l-container h-area-flex-wrap">

        <?php
        if($areas_loop):
            if ( $areas_query->have_posts() ) :
                while ( $areas_query->have_posts() ) : $areas_query->the_post();
                    if ( has_post_thumbnail() ) :
                        $image = get_post_thumbnail_id($post->ID);
                        $thumb = (array) get_size($image, 600 );
                    else :
                        $thumb['url'] = get_template_directory_uri().'/assets/images/placeholder.png';
                    endif;
                    ?>




                    <a href="#" class="h-area-single">
                        <div class="h-area-thumb" style="background-image: url('<?php echo $thumb['url'] ?>');"></div>
                	    <h4 class="h-area-title"><?php the_title(); ?></h4>
                        <div class="h-area-excerpt">
                            <?php echo excerpt(15); ?>
                        </div>
                    </a>

            	<?php


                endwhile; ?>

            	<?php wp_reset_postdata(); ?>

            <?php else : ?>
            	<h3>You should better be filling this contents first</h3>
            <?php endif;
        endif; ?>

        </div>

        <?php if ($areas_archive_btn): ?>

            <div class="l-container">
                <a href="<?php echo get_post_type_archive_link('areas') ?>" class="h-archive-btn"><?php echo $areas_archive_btn ?></a>
            </div>

        <?php endif; ?>

</div>
