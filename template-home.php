<?php
/*
 Template Name: Landing Page
*/
?>

<?php get_header(); ?>

<?php // Hero Background ?>
<?php get_template_part( 'template-parts/home/flexible','hero' ); ?>


<?php // Areas Loop ?>
<?php get_template_part( 'template-parts/home/flexible','areas' ); ?>


<?php // Quote & Contact
$line_break = get_field('home_line_break_active_component');
if ( $line_break ):
    get_template_part( 'template-parts/global','pre-footer' );
endif;

?>

<?php // Products loop ?>
<?php get_template_part( 'template-parts/home/flexible','products' ); ?>



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
    	<h3>You should better be filling some project first</h3>
    <?php endif; ?>

</div>

<?php
//
// Blog loop
//
?>

<?php get_footer(); ?>
