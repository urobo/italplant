<?php
/**
 * Template part for displaying page content in page.php & single.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- Post header -->
	<header class="entry-header">
		<h1><?php the_title(); ?></h1>
		<div class="yellow-divider-left"></div>
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
