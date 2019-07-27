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
        <div class="l-col-6">
            <h1><?php echo $hero_content['title'] ?></h1>
            <div class="yellow-divider-left mobile-left"></div>
            <h3><?php echo $hero_content['subtitle'] ?></h3>
        </div>
    </div>
    <div class="a-products-hero-pattern"></div>
</div>


<div class="a-products-content">
    <main role="main" id="posts">

        <div class="l-container a-prod-flex-wrap">
            <?php

            if(have_posts()):
                    while (have_posts()) : the_post();

                        if ( has_post_thumbnail() ) :
                            $image = get_post_thumbnail_id($post->ID);
                            $thumb = (array) get_size($image, 600 );
                        else :
                            $thumb['url'] = get_template_directory_uri().'/assets/images/placeholder.png';
                        endif;
                        ?>

                        <a href="<?php the_permalink(); ?>" class="a-prod-single h-prod-single">
                            <div class="a-prod-thumb" style="background-image: url('<?php echo $thumb['url'] ?>');"></div>
                    	    <h4 class="h-prod-title"><?php the_title(); ?></h4>
                        </a>

                	<?php

                    endwhile; ?>


                <?php else : ?>
                	<h3>You should better be filling this contents first</h3>
                <?php endif; ?>

        </div>

    </main>

</div>
<?php get_template_part( 'template-parts/global','pre-footer' ); ?>

<?php get_footer(); ?>
