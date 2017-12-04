<?php
/**
 * Template part for the products loop and content on the template-home.php
 */
?>

<?php
// Initialise query
$i = 1;
$products_query = new WP_Query( array(
    'post_type' => 'products',
    'posts_per_page' => -1
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
            .h-products{
                background: none;
            }
            @media (min-width: 767px) {
                .h-products{
                    background-repeat: no-repeat;
                    background-size: 36vw;
                    background-position: 60vw 120px;
                    background-image: url('<?php echo $products_bg_medium['url'] ?>');
                }
            }
            @media (min-width: 1023px) {
                .h-products{
                    background-image: url('<?php echo $products_bg_large['url'] ?>');
                }
            }
</style>
<div class="h-products">
    <div class="l-container">

        <div class="l-col-7">

        <?php
        // Title & Description
        if($products_title){
            echo '<h2>'.$products_title.'</h2>';
        }
        if($products_description){
            echo '<div class="products-description">'.$products_description.'</div>';
        }
        ?>


        <?php
        // Loop
        if($products_loop):
            if ( $products_query->have_posts() ) : ?>
                <div class="l-col-6">
                    <ul>
            	        <?php while ( $products_query->have_posts() ) : $products_query->the_post(); ?>

                    	       <li><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></li>

                               <?php if($i % 7 == 0): ?>
                    </ul>
                </div>
                <div class="l-col-6">
                    <ul>
                            <?php endif ?>

                            <?php $i++; ?>
                        <?php endwhile; ?>
                    </ul>
                </div>
            	<?php wp_reset_postdata(); ?>

            <?php else : ?>
                    <h3>You should better be filling some product first</h3>
            <?php endif;
        endif;?>
        </div>

    </div>

    <?php
    // Loop link
    if ($products_archive_btn):?>
        <div class="l-container">
            <a href="<?php echo get_post_type_archive_link('products'); ?>"><?php echo $products_archive_btn; ?></a>
        </div>
    <?php endif; ?>
</div>
