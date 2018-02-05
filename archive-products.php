<?php get_header(); ?>
<div class="a-products-hero">
    <?php

    $products_bg = get_field('products_background','option');
    $hero_content = get_field('products_settings','option');


    if ($products_bg != ''){
    	$products_bg_small = (array) get_size($products_bg, 1242, 2208, true );
    	$products_bg_medium = (array) get_size($products_bg, 1600 );
    	$products_bg_large = (array) get_size($products_bg, 2400);
    }
    ?>
    <style media="screen">
    			.a-products-hero-pattern{
    					background-image: url('<?php echo $products_bg_small['url'] ?>');
    			}
    			@media (min-width: 767px) {
    					.a-products-hero-pattern{
    							background-image: url('<?php echo $products_bg_medium['url'] ?>');
    					}
    			}
    			@media (min-width: 1023px) {
    					.a-products-hero-pattern{
    							background-image: url('<?php echo $products_bg_large['url'] ?>');
    					}
    			}
    </style>

    <div class="a-products-hero-content l-container">
        <div class="a-products-hero-pattern"></div>
        <div class="l-col-6">
            <h1><?php echo $hero_content['title'] ?></h1>
            <div class="yellow-divider-left"></div>
            <h3><?php echo $hero_content['subtitle'] ?></h3>
        </div>
    </div>

</div>

<?php get_template_part( 'template-parts/global','products-nav' ); ?>

<div class="a-products-content">
    <main role="main" id="posts">

            <?php
            $i = 0;

            while (have_posts()) : the_post();

                if ( has_post_thumbnail() ) :
                    $image = get_post_thumbnail_id($post->ID);
                    $thumb = (array) get_size($image, 1200 );
                else :
                    $thumb['url'] = get_template_directory_uri().'/assets/images/placeholder.png';
                endif;

                ?>
                <?php if ($i % 2): ?>
                    <div class="a-products-single-g g-wrapper-even">

                            <div class="g-p-content">
                                <h3><?php the_title(); ?></h3>
                                <div><?php echo excerpt(55); ?></div>
                                <a href="<?php the_permalink(); ?>" class="g-btn-underline">Mostra Dettagli »</a>
                            </div>

                            <div class="g-p-picture">
                                <div class="a-products-thumb">
                                    <img src="<?php echo $thumb['url'] ?>" alt="<?php echo $thumb['alt'] ?>" class="img-right">
                                </div>
                            </div>

                    </div>

                <?php else: ?>
                    <div class="a-products-single-g g-wrapper-odd">

                            <div class="g-p-content">
                                <h3><?php the_title(); ?></h3>
                                <div><?php echo excerpt(55); ?></div>
                                <a href="<?php the_permalink(); ?>" class="g-btn-underline">Mostra Dettagli »</a>
                            </div>

                            <div class="g-p-picture">
                                <div class="a-products-thumb">
                                    <img src="<?php echo $thumb['url'] ?>" alt="<?php echo $thumb['alt'] ?>" class="img-right">
                                </div>
                            </div>

                    </div>

                <?php endif;

                $i++;

            endwhile; ?>

    </main>

</div>
<?php get_template_part( 'template-parts/global','pre-footer' ); ?>

<?php get_footer(); ?>
