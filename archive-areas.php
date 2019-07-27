<?php get_header(); ?>
<div class="a-areas-hero">
    <?php
    $areas_bg = get_field('areas_background','option');
    $hero_content = get_field('areas_settings','option');


    if ($areas_bg != ''){
    	$areas_bg_small = (array) get_size($areas_bg, 1242, 2208, true );
    	$areas_bg_medium = (array) get_size($areas_bg, 1600 );
    	$areas_bg_large = (array) get_size($areas_bg, 2400);
    }
    ?>
    <style media="screen">
    			.a-areas-hero{
    					background-image: url('<?php echo $areas_bg_small['url'] ?>');
    			}
    			@media (min-width: 767px) {
    					.a-areas-hero{
    							background-image: url('<?php echo $areas_bg_medium['url'] ?>');
    					}
    			}
    			@media (min-width: 1023px) {
    					.a-areas-hero{
    							background-image: url('<?php echo $areas_bg_large['url'] ?>');
    					}
    			}
    </style>

    <div class="a-areas-hero-content l-container">
        <div class="l-col-6">
            <h1><?php echo $hero_content['title'] ?></h1>
            <div class="yellow-divider-left mobile-left"></div>
            <h3><?php echo $hero_content['subtitle'] ?></h3>
        </div>
    </div>

</div>


<div class="a-areas-content">
    <main role="main" id="posts">

        <div class="h-area-flex-wrap l-container">

            <?php
            while (have_posts()) : the_post();
                if ( has_post_thumbnail() ) :
                    $image = get_post_thumbnail_id($post->ID);
                    $thumb = (array) get_size($image, 600 );
                else :
                    $thumb['url'] = get_template_directory_uri().'/assets/images/placeholder.png';
                endif;
                ?>

                <a href="<?php echo the_permalink(); ?>" class="h-area-single open-overlay" data-selector="<?php echo '.slide'.$i ?>">
                    <div class="h-area-thumb" style="background-image: url('<?php echo $thumb['url'] ?>');"></div>
            	    <h4 class="h-area-title"><?php the_title(); ?></h4>
                    <div class="h-area-excerpt">
                        <?php echo excerpt(15); ?>
                    </div>
                </a>

        	<?php

            endwhile; ?>

            </div>
    </main>

</div>
<?php get_template_part( 'template-parts/global','pre-footer' ); ?>

<?php get_footer(); ?>
