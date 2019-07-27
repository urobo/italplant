<?php
/**
 * Template part for displaying page content in page.php & single.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="l-container">
		<!-- Post header -->
		<header class="entry-header l-col-7 s-products-article-head">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="yellow-divider-left mobile-left"></div>

		</header>
	</div>


	<?php //get_template_part( 'template-parts/global','products-nav' ); ?>

	<div class="l-container">


		<?php // Building the sidebar

		// Get the 3D Model of the Product
		if (has_post_thumbnail( $post->ID ) ):
			$model = get_post_thumbnail_id($post->ID);
			$model_image = (array) get_size($model, 800 );
		endif;

		//Get the list of Products
	    $query = new WP_Query( array(
		    'post_type' => 'products',
		    'posts_per_page' => 6
		) );
		$products = array();

	   while ( $query->have_posts() ) : $query->the_post();
			$product['title'] = get_the_title();
			$product['link'] = get_the_permalink();
			array_push($products,$product);

	    endwhile;
 		wp_reset_query();

		?>

		<div class="sticky-subnav l-col-4 l-col-push-1">
			<img src="<?php echo $model_image['url']; ?>" alt="<?php the_title(); ?>" class="s-prod-model">

	    	<?php if( have_rows('types') ): ?>

		        <h3>Tipologie:</h3>
		        <ul>
		            <?php
		            $i = 0;
		            while ( have_rows('types') ) : the_row(); ?>
		                <li>
		                    <a href="#type-<?php echo $i ?>">
		                        <?php the_sub_field('title'); ?>
		                    </a>
		                </li>
		                <?php
		                $i++;
		            endwhile;
		            ?>
		            <li class="back-to-top"><a href="#top">Torna Su</a></li>
		        </ul>

			<?php endif; ?>


			<div class="p-list">
			<?php if( $products ): ?>

		        <h3>Prodotti:</h3>
		        <ul>
		            <?php
		            foreach($products as $product): ?>
		                <li>
		                    <a href="<?php echo $product['link']; ?>">
		                        <?php echo $product['title']; ?>
		                    </a>
		                </li>
		                <?php
		            endforeach;
		            ?>
		            <li class="back-to-top"><a href="#top">Torna Su</a></li>
					<li class="p-view-all"><a href="<?php echo get_post_type_archive_link('products'); ?>">Visualizza tutti</a></li>
		        </ul>

			<?php endif; ?>
			</div>

		</div>




		<div class="entry-content l-col-7 s-products-article-content">
			<?php the_content(); ?>
			<p class="tags">
			    <?php the_tags(); ?>
	        </p>
		</div>


		<?php //Print the sub-types ?>
		<div class="l-col-7 s-products-types">

		        <?php if( have_rows('types') ):

		            $i = 0;

		            while ( have_rows('types') ) : the_row(); ?>
		                <div id="type-<?php echo $i ?>" class="s-products-types-wrapper">

		                    <h2><?php the_sub_field('title'); ?></h2>

		                    <div class="s-products-content">
		                        <?php the_sub_field('content'); ?>
		                    </div>

		                </div>


		            <?php
		            $i++;
		            endwhile;

		        endif; ?>

		</div>



	</div>


	<div class="l-container">
		<!-- Post Footer -->
		<footer class="entry-footer l-col-7">
			<?php edit_post_link(); ?>
		</footer>
	</div>

</article>
