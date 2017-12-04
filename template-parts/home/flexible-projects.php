<?php
/**
 * Template part for the projects loop and content on the template-home.php
 */
?>

<?php
// Retrive variables
$projects_title = get_field('projects_title');
$projects_loop = get_field('projects_loop');

// Initialise query
$projects_query = new WP_Query( array(
    'post_type' => 'projects',
    'posts_per_page' => 4
) );
?>
<div class="h-projects">
    <div class="l-container">

        <div class="l-col-12">
            <?php echo $projects_title; ?>
        </div>

        <?php
        // Loop
        if($projects_loop):
            if ( $projects_query->have_posts() ) : ?>

            	        <?php while ( $projects_query->have_posts() ) : $projects_query->the_post(); ?>
                            <?php $logo = get_field('project_logo') ?>
                            <div class="l-col-3">
                                <a href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a></li>
                            </div>
                        <?php endwhile; ?>
                    </ul>
                </div>
            	<?php wp_reset_postdata(); ?>

            <?php else : ?>
                <h3>You should better be filling some products first</h3>
            <?php endif;
        endif;?>

    </div>
</div>
