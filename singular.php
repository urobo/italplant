<?php get_header(); ?>

<div class="l-container">

    <main role="main" class="l-col-8">
        <?php
        while (have_posts()) : the_post();
            get_template_part( 'template-parts/content', 'single' );
            comments_template();
        endwhile;
        ?>
    </main>

    <aside role="complementary" class="widgets l-col-4 l-pad-2" >
        <?php get_sidebar(); ?>
    </aside>

</div>

<?php get_footer(); ?>
