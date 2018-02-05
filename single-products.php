<?php get_header(); ?>

<div id="top" class="s-products-hero">
    <?php

    if (has_post_thumbnail( $post->ID ) ): $products_single_bg = get_post_thumbnail_id($post->ID); endif;
	$products_bg_small = (array) get_size($products_single_bg, 1242, 2208, true );
	$products_bg_medium = (array) get_size($products_single_bg, 1600 );
	$products_bg_large = (array) get_size($products_single_bg, 2400);

    ?>
    <style media="screen">
    			.s-products-hero-bg{
    					background-image: url('<?php echo $products_bg_small['url'] ?>');
    			}
    			@media (min-width: 767px) {
    					.s-products-hero-bg{
    							background-image: url('<?php echo $products_bg_medium['url'] ?>');
    					}
    			}
    			@media (min-width: 1023px) {
    					.s-products-hero-bg{
    							background-image: url('<?php echo $products_bg_large['url'] ?>');
    					}
    			}
    </style>

    <div class="s-products-hero-bg"></div>

</div>


<main role="main" class="">
    <?php
    while (have_posts()) : the_post();
        get_template_part( 'template-parts/content', 'products-single' );
        comments_template();
    endwhile;
    ?>
</main>
<?php get_template_part( 'template-parts/global','pre-footer' ); ?>


<?php //Print the sub-types ?>
<div class="l-container s-products-types">

    <div class="l-col-7 l-col-push-1">
        <?php if( have_rows('types') ):

            $i = 0;

            while ( have_rows('types') ) : the_row(); ?>
                <div id="type-<?php echo $i ?>" class="s-products-types-wrapper">

                    <h2><?php the_sub_field('title'); ?></h2>

                    <div class="s-products-content">
                        <?php the_sub_field('content'); ?>
                    </div>

                </div>


            <?php
            $i++;
            endwhile;

        endif; ?>
    </div>

    <?php if( have_rows('types') ): ?>
    <div class="sticky-subnav l-col-4">
        <h3>Tipologie:</h3>
        <ul>
            <?php
            $i = 0;
            while ( have_rows('types') ) : the_row(); ?>
                <li>
                    <a href="#type-<?php echo $i ?>">
                        <?php the_sub_field('title'); ?>
                    </a>
                </li>
                <?php
                $i++;
            endwhile;
            ?>
            <li class="back-to-top"><a href="#top">Torna Su</a></li>
        </ul>
    </div>

    <?php endif; ?>

</div>

<div class="l-container">
    <?php // Projects loop ?>
    <?php get_template_part( 'template-parts/global','projects' ); ?>
</div>


<?php get_footer(); ?>
