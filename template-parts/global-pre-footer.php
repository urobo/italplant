<?php
/**
 * Template part for displaying the pre-footer component
 */
?>
<?php
// retrive the active component checkbox
if ( get_field('home_line_break_active_component') ):
	$options = get_field('home_line_break_active_component');
else:
	$options = get_field('active_component');
endif;

// display only the active elements
foreach( $options as $option ):

	if ($option == 'quote'):
		$quote_block = get_field('quote_block','option');
		$quotes = $quote_block['quote'];
		$rand_quote = $quotes[array_rand($quotes)]['quote_content'];
		?>
		<div class="l-container">
			<div class="l-col-8 l-col-push-2">
				<h4><?php echo '//' .$rand_quote ?></h4>
				<div class="">
					<b><?php echo $quote_block['title'] ?></b>
					<span><?php echo $quote_block['sub_title'] ?></span>
				</div>
			</div>
		</div>


		<?php
	elseif ($option == 'cta'):
		$contact_block = get_field('contact_request','option');?>
		<div class="l-container">
			<div class="l-col-8 l-col-push-2">
				<h4><?php echo $contact_block['title'] ?></h4>
				<div class="">
					<span><?php echo $contact_block['content'] ?></span>
					<a href="<?php echo $contact_block['link'] ?>"><?php echo $contact_block['button_label'] ?></a>
				</div>
			</div>
		</div>
	<?php endif;

endforeach;
?>
