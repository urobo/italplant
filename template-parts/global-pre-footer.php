<?php
/**
 * Template part for displaying the pre-footer component
 */
?>
<div class="g-pre-footer">
<?php
$block_bg = get_field('block_background','option');

if ($block_bg != ''){
	$block_bg_small = (array) get_size($block_bg, 1242, 2208, true );
	$block_bg_medium = (array) get_size($block_bg, 1600 );
	$block_bg_large = (array) get_size($block_bg, 2400);
}
?>
<style media="screen">
			.g-pre-footer, .blurred-background{
					background-image: url('<?php echo $block_bg_small['url'] ?>');
			}
			@media (min-width: 767px) {
					.g-pre-footer, .blurred-background{
							background-image: url('<?php echo $block_bg_medium['url'] ?>');
					}
			}
			@media (min-width: 1023px) {
					.g-pre-footer, .blurred-background{
							background-image: url('<?php echo $block_bg_large['url'] ?>');
					}
			}
</style>

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
			<div class="l-col-8 l-col-push-2 g-quote">
				<h4><?php echo $rand_quote ?></h4>
				<div class="g-quote-meta">
					<b><?php echo $quote_block['title'] ?></b>
					<span><?php echo $quote_block['sub_title'] ?></span>
				</div>
			</div>
		</div>


		<?php
	elseif ($option == 'cta'):
		$contact_block = get_field('contact_request','option');?>
		<div class="g-cta-blur">
			<div class="blurred-background">
				<div class="l-container g-cta-content">
						<div class="l-col-7">
						<h3><?php echo $contact_block['title'] ?></h3>
							<span><?php echo $contact_block['content'] ?></span>
						</div>
						<div class="l-col-2 l-col-push-3">
							<a href="<?php echo $contact_block['link'] ?>"><?php echo $contact_block['button_label'] ?></a>
						</div>
				</div>
			</div>

		</div>
	<?php endif;

endforeach;
?>
</div>
