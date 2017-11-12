<?php
/*
 Template Name: Landing Page
*/
?>

<?php get_header(); ?>

<?php // Hero Background ?>
<?php get_template_part( 'template-parts/home/flexible','hero' ); ?>


<?php // Areas Loop ?>

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
