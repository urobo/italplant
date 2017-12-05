<?php
/**
 * Template part for the blog loop and content on the template-home.php
 */
?>
<div class="h-news">
    <div class="l-container">

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

        if($news_title){
            echo '<h2>'.$news_title.'</h2>';
        }

        if($news_loop):
            if ( $news_query->have_posts() ) : ?>

            	<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
                    <div class="l-col-3">
                        <?php the_post_thumbnail('medium'); ?>
                    	<h3><?php the_title(); ?></h3>
                        <span><?php the_excerpt();  ?></span>
                    </div>
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
                <a href="<?php echo get_post_type_archive_link('news') ?>"><?php echo $news_archive_btn ?></a>
            </div>
        <?php endif; ?>

</div>
