<?php
/**
 * Template part for the blog loop and content on the template-home.php
 */
?>
<div class="h-news">

        <?php // Custom Query Blog
        $news_query = new WP_Query( array(
            'post_type' => 'post',
            'posts_per_page' => 4
        ) );

        // Retrieve varibles from Home
        $news_title = get_field('news_title');
        $news_archive_btn = get_field('news_archive_button');
        $news_loop = get_field('news_loop');
        ?>
        <?php

        if($news_title): ?>
            <div class="l-container h-news-title">
                <h2><?php echo $news_title ?></h2>
                <div class="yellow-divider-left"></div>
            </div>
        <?php endif; ?>

        <div class="l-container h-news-flex-wrap">

            <?php
            if($news_loop):
                if ( $news_query->have_posts() ) :
                    while ( $news_query->have_posts() ) : $news_query->the_post();
                        if ( has_post_thumbnail() ) :
                            $image = get_post_thumbnail_id($post->ID);
                            $thumb = (array) get_size($image, 600 );
                        else :
                            $thumb['url'] = get_template_directory_uri().'/assets/images/placeholder.png';
                        endif;
                    ?>
                        <a href="#" class="h-news-single">
                            <div class="h-news-thumb" style="background-image: url('<?php echo $thumb['url'] ?>');"></div>
                            <h4 class="h-news-title"><?php the_title(); ?></h4>
                            <div class="h-news-excerpt">
                                <?php echo excerpt(15); ?>
                            </div>
                        </a>


                    <?php endwhile; ?>

                	<?php wp_reset_postdata(); ?>

                <?php else : ?>
                	<h3>You should better be filling this contents first</h3>
                <?php endif;
            endif; ?>

        </div>

        <?php // Archive Button
        if ($news_archive_btn): ?>
            <div class="l-container">
                <a href="<?php echo get_post_type_archive_link('post') ?>" class="h-archive-btn"><?php echo $news_archive_btn ?></a>
            </div>
        <?php endif; ?>

</div>
