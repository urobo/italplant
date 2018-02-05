<?php get_header(); ?>


<div class="s-projects-hero">

    <?php

    $projects_single_bg = get_field('projects_global_background','option');
	$projects_single_bg_small = (array) get_size($projects_single_bg, 1242, 2208, true );
	$projects_single_bg_medium = (array) get_size($projects_single_bg, 1600 );
	$projects_single_bg_large = (array) get_size($projects_single_bg, 2400);
    $page_title = get_the_title();
    ?>
    <style media="screen">
    			.s-projects-hero-pattern{
    					background-image: url('<?php echo $projects_single_bg_small['url'] ?>');
    			}
    			@media (min-width: 767px) {
    					.s-projects-hero-pattern{
    							background-image: url('<?php echo $projects_single_bg_medium['url'] ?>');
    					}
    			}
    			@media (min-width: 1023px) {
    					.s-projects-hero-pattern{
    							background-image: url('<?php echo $projects_single_bg_large['url'] ?>');
    					}
    			}
    </style>


    <div class="s-projects-hero-pattern"></div>

</div>
<div class="s-project-bg">
    <div class="l-container s-projects-content">
        <main role="main" class="l-col-10 l-col-push-1">
            <?php
            while (have_posts()) : the_post();
                get_template_part( 'template-parts/content', 'project-single' );
                comments_template();
            endwhile;
            ?>
        </main>
    </div>
</div>


<?php get_footer(); ?>
