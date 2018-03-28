<?php
/*
 Template Name: Static Page
*/
?>

<?php get_header(); ?>

<div id="top" class="static-hero">
    <?php

    if (has_post_thumbnail( $post->ID ) ):
        $static_single_bg = get_post_thumbnail_id($post->ID);
        $static_bg_small = (array) get_size($static_single_bg, 1242 );
        $static_bg_medium = (array) get_size($static_single_bg, 1600 );
        $static_bg_large = (array) get_size($static_single_bg, 2400);
        $thumb = true;
    endif;

    ?>
    <style media="screen">

        <?php if ($thumb): ?>

    		.static-hero{
    				background-image: url('<?php echo $static_bg_small['url'] ?>');
                    width: 100%;
                    overflow: hidden;
                    background-position: center;
                    background-size: cover;
                    min-height: 40vh;
    		}
    		@media (min-width: 767px) {
    				.static-hero{
    						background-image: url('<?php echo $static_bg_medium['url'] ?>');
    				}
    		}
    		@media (min-width: 1023px) {
    				.static-hero{
    						background-image: url('<?php echo $static_bg_large['url'] ?>');
                            min-height: 75vh;
    				}
    		}

        <?php else: ?>

            .static-hero{
                width: 100%;
                overflow: hidden;
                min-height: 20vh;
            }

        <?php endif; ?>

    </style>
</div>
<div class="static-bg">
    <div class="l-container">

        <div class="l-col-9 static-content">
            <?php
            while (have_posts()) : the_post();
                get_template_part( 'template-parts/content', 'single' );
                comments_template();
            endwhile;
            ?>
        </div>

    </div>
</div>

<?php get_footer(); ?>
