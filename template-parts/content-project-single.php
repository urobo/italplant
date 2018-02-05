<?php
/**
 * Template part for displaying page content in page.php & single.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('project-single-wrapper'); ?>>
	<?php
	if (has_post_thumbnail( $post->ID ) ): $projects_thumbnail = get_post_thumbnail_id($post->ID); endif;
	$projects_logo = (array) get_size($projects_thumbnail, 600 );
	$map_data = get_field('map_marker')['marker_label'];
	?>

	<div class="">
		<!-- Post header -->
		<header class="entry-header s-projects-article-head l-col-10 l-col-push-1">
			<img src="<?php echo $projects_logo['url'] ?>" alt="<?php echo $map_data ?>" class="s-projects-logo">
			<div class="yellow-divider"></div>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		</header>
	</div>

	<div class="">
		<!-- Post content -->
		<div class="entry-content l-container s-projects-article-content">
			<?php the_content(); ?>
			<p class="tags">
			    <?php the_tags(); ?>
	        </p>
	        <div class="pagination">
			    <?php wp_link_pages(); ?>
			</div>
		</div>
	</div>

	<div class="l-container">
		<!-- Post Footer -->
		<footer class="entry-footer">
			<?php edit_post_link(); ?>
		</footer>
	</div>
	<?php // Projects loop ?>
	<?php get_template_part( 'template-parts/global','projects' ); ?>
</article>
