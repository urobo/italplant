<?php
/**
 * Template part for the projects loop and content on the template-home.php
 */
?>

<?php
// Retrive variables
$projects_global_title = get_field('projects_settings','option')['projects_global_title'];



// Initialise query
$projects_query = new WP_Query( array(
    'post_type' => 'projects',
    'posts_per_page' => 4
) );
?>
<div class="h-projects">

        <div class="l-col-12 h-prj-title">
            <?php echo $projects_global_title; ?>
        </div>

        <?php
        // Loop

            if ( $projects_query->have_posts() ) : ?>
                <div class="h-prj-flex">
            	        <?php while ( $projects_query->have_posts() ) : $projects_query->the_post();
                            $featured = get_field('archive_featured');
                            if ($featured) :

                                    $logo = get_field('project_logo') ?>

                                    <div class="h-prj-logo">
                                        <a href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a></li>
                                    </div>

                            <?php endif; ?>

                        <?php endwhile; ?>
                    </div>
                </div>
            	<?php wp_reset_postdata(); ?>

            <?php else : ?>
                <h3>You should better be filling some products first</h3>
            <?php endif; ?>


</div>
