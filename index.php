<?php get_header(); ?>
<div class="a-news-hero">
    <?php



    $news_bg = get_field('news_global_background','option');
    $hero_content = get_field('news_settings','option');


    if ($news_bg != ''){
    	$news_bg_small = (array) get_size($news_bg, 1242, 2208, true );
    	$news_bg_medium = (array) get_size($news_bg, 1600 );
    	$news_bg_large = (array) get_size($news_bg, 2400);
    }
    ?>
    <style media="screen">
    			.a-news-hero{
    					background-image: url('<?php echo $news_bg_small['url'] ?>');
    			}
    			@media (min-width: 767px) {
    					.a-news-hero{
    							background-image: url('<?php echo $news_bg_medium['url'] ?>');
    					}
    			}
    			@media (min-width: 1023px) {
    					.a-news-hero{
    							background-image: url('<?php echo $news_bg_large['url'] ?>');
    					}
    			}
    </style>

    <div class="a-news-hero-content l-container">
        <div class="l-col-8">
            <h1><?php echo $hero_content['title'] ?></h1>
            <div class="yellow-divider-left mobile-left"></div>
        </div>
        <div class="a-news-cat-tag l-col-10">
            <?php wp_list_categories(array('title_li' => '')); ?>
        </div>
    </div>

</div>


<div class="a-news-content">
    <div class="l-container">
        <main role="main" class="l-col-8" id="posts">
            <div class="a-news-articles-wrap">
                <?php
                while (have_posts()) : the_post();
                    if ( has_post_thumbnail() ) :
                        $image = get_post_thumbnail_id($post->ID);
                        $thumb = (array) get_size($image, 600 );
                    else :
                        $thumb['url'] = get_template_directory_uri().'/assets/images/placeholder.png';
                    endif;
                    ?>

                    <div class="a-news-thumb-wrap">
                        <a href="<?php echo the_permalink(); ?>">
                            <div class="a-news-thumb" style="background-image: url('<?php echo $thumb['url'] ?>');"></div>
                        </a>

                        <div class="a-news-thumb-content">
                            <h4 class="a-news-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <div class="a-news-excerpt">
                                <?php echo excerpt(35); ?>
                            </div>
                            <a href="<?php echo the_permalink(); ?>" class="a-news-read-all">Leggi Tutto »</a>
                        </div>

                    </div>

                <?php

                endwhile; ?>
            </div>
        </main>
        <!-- Sidebar -->
        <aside role="complementary" class="widgets l-col-3 l-col-push-1 g-news-sidebar" >
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
