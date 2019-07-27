<?php get_header(); ?>

<div id="top" class="s-products-hero">
    <?php
    $white_sketch = get_field('white_sketch');

    if ($white_sketch):

    	$products_bg_medium = (array) get_size($white_sketch, 1600 );
    	$products_bg_large = (array) get_size($white_sketch, 2400);

    ?>
    <style media="screen">
		.s-products-hero-bg{
				background-image: url('<?php echo $products_bg_medium['url'] ?>');
			}

		@media (min-width: 1023px) {
			.s-products-hero-bg{
				background-image: url('<?php echo $products_bg_large['url'] ?>');
			}
		}
    </style>

    <div class="s-products-hero-bg"></div>

    <?php endif; ?>

</div>


<main role="main" class="products-container">
    <?php
    while (have_posts()) : the_post();
        get_template_part( 'template-parts/content', 'products-single' );
        comments_template();
    endwhile;
    ?>
</main>


<div class="l-container">
    <?php // Projects loop ?>
    <?php //get_template_part( 'template-parts/global','projects' ); ?>
</div>

<?php get_template_part( 'template-parts/global','pre-footer' ); ?>

<?php get_footer(); ?>
