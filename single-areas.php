<?php get_header(); ?>
<div class="s-areas-hero">

    <?php

    if (has_post_thumbnail( $post->ID ) ): $areas_single_bg = get_post_thumbnail_id($post->ID); endif;
	$areas_single_bg_small = (array) get_size($areas_single_bg, 1242, 2208, true );
	$areas_single_bg_medium = (array) get_size($areas_single_bg, 1600 );
	$areas_single_bg_large = (array) get_size($areas_single_bg, 2400);
    $page_title = get_the_title();
    ?>
    <style media="screen">
    			.s-areas-hero{
    					background-image: url('<?php echo $areas_single_bg_small['url'] ?>');
    			}
    			@media (min-width: 767px) {
    					.s-areas-hero{
    							background-image: url('<?php echo $areas_single_bg_medium['url'] ?>');
    					}
    			}
    			@media (min-width: 1023px) {
    					.s-areas-hero{
    							background-image: url('<?php echo $areas_single_bg_large['url'] ?>');
    					}
    			}
    </style>

</div>
<div class="s-area-bg">
    <div class="l-container s-areas-content">
        <main role="main" class="l-col-7 ">
            <?php
            while (have_posts()) : the_post();
                get_template_part( 'template-parts/content', 'area-single' );
                comments_template();
            endwhile;
            ?>
        </main>

        <aside role="complementary" class="l-col-5 l-pad-4" >
            <?php $areas_settings = get_field('areas_settings','option'); ?>
            <h3><?php echo $areas_settings['sidebar_title'] ?></h3>
            <div class="yellow-divider-left mobile-left"></div>
            <?php $areas_query = new WP_Query( array(
                'post_type' => 'areas',
                'posts_per_page' => -1
            ) );

            if ( $areas_query->have_posts() ) : ?>

                <ul>

                <?php while ( $areas_query->have_posts() ) : $areas_query->the_post(); ?>

                    <?php
                    // append the active sub-nav class
                    $class = '';
                    if (get_the_title() == $page_title): $class = 'class="active-area"'; endif;
                    ?>

                    <li <?php echo $class ?> ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                <?php endwhile; ?>

                </ul>

                <?php wp_reset_postdata();

            endif;?>
        </aside>

    </div>
</div>


<?php get_footer(); ?>
