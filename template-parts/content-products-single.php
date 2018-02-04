<?php
/**
 * Template part for displaying page content in page.php & single.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="l-container">
		<!-- Post header -->
		<header class="entry-header l-col-7 l-col-push-1 s-products-article-head">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<!-- <div class="yellow-divider-left"></div> -->

		</header>
	</div>


	<?php get_template_part( 'template-parts/global','products-nav' ); ?>

	<div class="l-container">
		<!-- Post content -->
		<div class="entry-content l-col-7 l-col-push-1 s-products-article-content">
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
		<footer class="entry-footer l-col-7 l-col-push-1">
			<?php edit_post_link(); ?>
		</footer>
	</div>

</article>
