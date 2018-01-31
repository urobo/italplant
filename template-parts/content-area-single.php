<?php
/**
 * Template part for displaying page content in page.php & single.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- Post header -->
	<header class="entry-header">
        <aside class="entry-meta">
            <?php _e('Posted', 'italplant'); ?> <?php the_date(); ?>
			<?php _e('by', 'italplant'); ?> <?php the_author(); ?>
        </aside>
	</header>

	<!-- Post content -->
	<div class="entry-content">
		<?php the_content(); ?>
		<p class="tags">
		    <?php the_tags(); ?>
        </p>
	</div>

	<!-- Post Footer -->
	<footer class="entry-footer">
		<?php edit_post_link(); ?>
	</footer>
</article>
