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


<?php
// Quote & Contact
$line_break = get_field('home_line_break_active_component');
if ( $line_break ):
    get_template_part( 'template-parts/global','pre-footer' );
endif;
?>

<?php // Products loop ?>
<?php get_template_part( 'template-parts/home/flexible','products' ); ?>


<?php // Projects loop ?>
<?php get_template_part( 'template-parts/home/flexible','projects' ); ?>


<?php // news (Blog) loop ?>
<?php get_template_part( 'template-parts/home/flexible','news' ); ?>


<?php get_footer(); ?>
