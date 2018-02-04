<?php get_header(); ?>
<div class="a-projects-hero">
    <?php

    //$hero_content = get_field('projects_settings','option');

    //WE NEED A MAP!

    ?>

</div>


<div class="a-projects-content">
    <main role="main" id="posts">

        <div class="l-container a-projects-flex-wrap">

            <?php
            while (have_posts()) : the_post();

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
                    <?php echo excerpt(10); ?>
                    <div class="a-projects-btn-underline">Mostra Dettagli »</div>

                </a>



            <?php endwhile; ?>
        </div>
    </main>

</div>

<?php get_template_part( 'template-parts/global','pre-footer' ); ?>

<?php get_footer(); ?>
