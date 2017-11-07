<?php
/*
 Template Name: Landing Page
*/
?>

<?php get_header(); ?>

<?php
//
// Hero Background
//
 ?>
<?php while (have_posts()) : the_post();
    if (has_post_thumbnail( $post->ID ) ): $image = get_post_thumbnail_id($post->ID); endif;
    $bg_small = (array) get_size($image, 1242, 2208, true );
    $bg_medium = (array) get_size($image, 1600 );
    $bg_large = (array) get_size($image, 2400);
    ?>

<!-- <div class="overlay-test"></div> -->
<div class="h-hero">

    <style media="screen">
                .h-hero{
                        background-image: url('<?php echo $bg_small['url'] ?>');
                }
                @media (min-width: 767px) {
                        .h-hero{
                                background-image: url('<?php echo $bg_medium['url'] ?>');
                        }
                }
                @media (min-width: 1023px) {
                        .h-hero{
                                background-image: url('<?php echo $bg_large['url'] ?>');
                        }
                }
    </style>

    <div class="l-container h-hero-content">
        <main role="main" class="l-col-8" id="posts">
            <h1><?php the_field('hero_title') ?></h1>
            <div class="yellow-divider-left"></div>
            <?php if( have_rows('hero_sub_title')  ):
                    while ( have_rows('hero_sub_title') ) : the_row(); ?>
                    <h3><?php the_sub_field('line') ?></h3>
                <?php endwhile;
            endif; ?>

        </main>
    </div>

</div>

<?php endwhile; ?>

<?php
//
// Areas Loop
//
 ?>

<div class="l-container">

    <?php
    $i = 1;
    $areas_query = new WP_Query( array(
        'post_type' => 'areas',
        'posts_per_page' => -1
    ) ); ?>

    <?php if ( $areas_query->have_posts() ) : ?>
    	<?php while ( $areas_query->have_posts() ) : $areas_query->the_post(); ?>
            <div class="l-col-3">
                <?php the_post_thumbnail('medium'); ?>
            	<h3><?php the_title(); ?></h3>
            </div>
    	<?php
        if($i % 4 == 0) : ?>
            </div>
            <div class="l-container">
        <?php
        endif;
        $i++;
        endwhile; ?>

    	<?php wp_reset_postdata(); ?>

    <?php else : ?>
    	<h3>You should better be filling this contents first</h3>
    <?php endif; ?>


</div>

<?php
//
// Quote (static & random)
//
?>

<?php
//
// Blurry call to action
//
?>

<?php
//
// Products loop
//
?>

<div class="l-container">

    <?php
    $i = 1;
    $areas_query = new WP_Query( array(
        'post_type' => 'products',
        'posts_per_page' => -1
    ) ); ?>

    <?php if ( $areas_query->have_posts() ) : ?>
    	<?php while ( $areas_query->have_posts() ) : $areas_query->the_post(); ?>
            	<h4><?php the_title(); ?></h4>
    	<?php
        endwhile; ?>

    	<?php wp_reset_postdata(); ?>

    <?php else : ?>
    	<h3>You should better be filling this contents first</h3>
    <?php endif; ?>

</div>

<?php
//
// Projects loop
//
?>

<div class="l-container">

    <?php
    $i = 1;
    $areas_query = new WP_Query( array(
        'post_type' => 'projects',
        'posts_per_page' => -1
    ) ); ?>

    <?php if ( $areas_query->have_posts() ) : ?>
    	<?php while ( $areas_query->have_posts() ) : $areas_query->the_post(); ?>
            	<h4><?php the_title(); ?></h4>
    	<?php
        endwhile; ?>

    	<?php wp_reset_postdata(); ?>

    <?php else : ?>
    	<h3>You should better be filling this contents first</h3>
    <?php endif; ?>

</div>

<?php
//
// Blog loop
//
?>

<?php get_footer(); ?>
