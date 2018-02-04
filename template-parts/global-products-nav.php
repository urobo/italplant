<?php
/**
 * Template part for displaying the pre-footer component
 */

?>
<div class="g-products-subnav-wrap">

		<input id="toggle" type="checkbox" class="collapse">
		<label for="toggle" class="collapse">Mostra Tutti</label>


	<div class="g-products-subnav">
	    <div class="l-container">

	        <?php
			// init array
			$subnav = array();

			$products_query = new WP_Query( array(
	            'post_type' => 'products',
	            'posts_per_page' => -1
	        ) );

				// retreive all the products posts
	            while ( $products_query->have_posts() ) : $products_query->the_post();
	                array_push( $subnav,array(get_the_title(), get_the_permalink()));
	            endwhile;
				wp_reset_postdata();


					foreach ($subnav as $navelement):
						if (is_archive("products")):?>

						<a href="<?php echo $navelement[1] ?>" class="g-products-subnav-link"><?php echo $navelement[0] ?></a>

					<?php elseif (get_the_permalink() != $navelement[1]): ?>

	                     <a href="<?php echo $navelement[1] ?>" class="g-products-subnav-link"><?php echo $navelement[0] ?></a>
				 	<?php else: ?>

						 <span class="g-products-subnav-active"><?php echo $navelement[0] ?></span>

					<?php endif; ?>



	            <?php endforeach;
	            ?>



	    </div>
	</div>
</div>
