<?php
/**
 * Template part for the products loop and content on the template-home.php
 */
?>

<?php
// Initialise query

$products_query = new WP_Query( array(
    'post_type' => 'products',
    'posts_per_page' => 4
) );

// Retrive variables
$products_title = get_field('products_title');
$side_drawing = get_field('products_side_drawing');
$products_description = get_field('products_description');
$products_archive_btn = get_field('products_archive_button');
$products_loop = get_field('products_loop');

$products_bg_small = (array) get_size($side_drawing, 1242, 2208, true );
$products_bg_medium = (array) get_size($side_drawing, 1600 );
$products_bg_large = (array) get_size($side_drawing, 2400);
?>
<style media="screen">
            .h-products-bg{
                background: none;
            }
            @media (min-width: 769px) {
                .h-products-bg{
                    background-repeat: no-repeat;
                    background-size: 60vw;
                    background-position: right 60px;
                    background-image: url('<?php echo $products_bg_medium['url'] ?>');
                }
            }
            @media (min-width: 1023px) {
                .h-products-bg{
                    background-image: url('<?php echo $products_bg_large['url'] ?>');
                }
            }
</style>
<div class="h-products">
    <div class="l-container">

        <div class="l-col-7">

        <?php // Title & Description
        if($products_title):
            echo '<h2 class="h-prod-title">'.$products_title.'</h2>';
        endif; ?>

        <div class="yellow-divider-left"></div>

        <?php if($products_description):
            echo '<div class="l-col-8 h-prod-description">'.$products_description.'</div>';
        endif; ?>

        </div>

    </div>

    <div class="l-container h-prod-flex-wrap">
        <?php

        if($products_loop):
            if ( $products_query->have_posts() ) :
                while ( $products_query->have_posts() ) : $products_query->the_post();

                    if ( has_post_thumbnail() ) :
                        $image = get_post_thumbnail_id($post->ID);
                        $thumb = (array) get_size($image, 600 );
                    else :
                        $thumb['url'] = get_template_directory_uri().'/assets/images/placeholder.png';
                    endif;
                    ?>

                    <a href="<?php the_permalink(); ?>" class="h-prod-single">
                        <div class="h-prod-thumb" style="background-image: url('<?php echo $thumb['url'] ?>');"></div>
                	    <h4 class="h-prod-title"><?php the_title(); ?></h4>
                    </a>

            	<?php

                endwhile; ?>

            	<?php wp_reset_postdata(); ?>

            <?php else : ?>
            	<h3>You should better be filling this contents first</h3>
            <?php endif;
        endif; ?>

    </div>

    <div class="h-products-bg">

    </div>

    <?php
    // Loop link
    if ($products_archive_btn):?>
        <div class="l-container view-all">
            <a href="<?php echo get_post_type_archive_link('products'); ?>" class="g-btn-underline"><?php echo $products_archive_btn; ?></a>
        </div>
    <?php endif; ?>
</div>
