<?php get_header(); ?>

<div id="top" class="s-news-hero">
    <?php

    if (has_post_thumbnail( $post->ID ) ): $news_single_bg = get_post_thumbnail_id($post->ID); endif;
	$news_bg_small = (array) get_size($news_single_bg, 1242, 2208, true );
	$news_bg_medium = (array) get_size($news_single_bg, 1600 );
	$news_bg_large = (array) get_size($news_single_bg, 2400);

    ?>
    <style media="screen">
    			.s-news-hero-bg{
    					background-image: url('<?php echo $news_bg_small['url'] ?>');
    			}
    			@media (min-width: 767px) {
    					.s-news-hero-bg{
    							background-image: url('<?php echo $news_bg_medium['url'] ?>');
    					}
    			}
    			@media (min-width: 1023px) {
    					.s-news-hero-bg{
    							background-image: url('<?php echo $news_bg_large['url'] ?>');
    					}
    			}
    </style>

    <div class="s-news-hero-bg"></div>
    <div class="s-news-hero-overlay"></div>

</div>

<div class="s-news-bg">

    <div class="l-container s-news-content">

        <main role="main" class="l-col-7">
            <?php
            while (have_posts()) : the_post();
                get_template_part( 'template-parts/content', 'news-single' );
            endwhile;
            ?>
        </main>

        <aside role="complementary" class="widgets l-col-5 g-news-sidebar" >
            <?php get_sidebar(); ?>
        </aside>

    </div>
</div>

    <?php // Projects loop ?>
    <?php get_template_part( 'template-parts/home/flexible','news' ); ?>



<?php get_footer(); ?>
