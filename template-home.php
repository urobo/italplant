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


<?php // Products loop ?>
<?php get_template_part( 'template-parts/home/flexible','products' ); ?>


<?php // Quote & Contact ?>
<?php
$line_break = get_field('home_line_break_active_component');
if ( $line_break ):
    get_template_part( 'template-parts/global','pre-footer' );
endif;
?>


<?php // Projects loop ?>
<?php $show_projects = get_field('display_projects');
if ($show_projects): ?>
<div class="l-container">
    <?php get_template_part( 'template-parts/global','projects' ); ?>
</div>
<?php endif; ?>


<?php // news (Blog) loop ?>
<?php get_template_part( 'template-parts/home/flexible','news' ); ?>


<?php get_footer(); ?>
