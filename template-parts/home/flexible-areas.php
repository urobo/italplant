<?php
/**
 * Template part for the areas loop and content on the template-home.php
 */
?>
<div class="l-container">

    <?php
    $i = 1;
    $areas_query = new WP_Query( array(
        'post_type' => 'areas',
        'posts_per_page' => -1
    ) );

    $areas_title = get_field('areas_title');
    $areas_archive_btn = get_field('areas_archive_button');
    $areas_loop = get_field('areas_loop');
    ?>
    <?php

    if($areas_title){
        echo '<h2>'.$areas_title.'</h2>';
    }

    if($areas_loop):
        if ( $areas_query->have_posts() ) : ?>
        	<?php while ( $areas_query->have_posts() ) : $areas_query->the_post(); ?>

                <div class="l-col-3">
                    <?php the_post_thumbnail('medium'); ?>
                	<h3><?php the_title(); ?></h3>
                </div>
        	<?php
            if($i % 4 == 0) : ?>
                </div>
                <div class="l-container">
            <?php
            endif;
            $i++;

            endwhile; ?>

        	<?php wp_reset_postdata(); ?>

        <?php else : ?>
        	<h3>You should better be filling this contents first</h3>
        <?php endif;
    endif;

    if ($areas_archive_btn){
        echo '<a href="'.get_post_type_archive_link('areas').'">'.$areas_archive_btn.'</a>';
    }

    ?>

</div>
