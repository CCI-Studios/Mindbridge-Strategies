<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php if( $feed != false ): ?>
	<div class="module-rssfeed">
		<?
		$actualItems = count( $feed->items );
		$setItems    = $params->get('rssitems', 5);

		if ($setItems > $actualItems) {
			$totalItems = $actualItems;
		} else {
			$totalItems = $setItems;
		} 

		$words = $params->def('word_count', 0);
		for ($j = 0; $j < $totalItems; $j ++): 
			$currItem = & $feed->items[$j];	?>
			<div class="item">
			
				<?php if (!is_null($currItem->get_link())): ?>
					<h4>
						<a href="<?php echo $currItem->get_link(); ?>" target="_blank">
							<?php echo $currItem->get_title(); ?>
						</a>
					</h4>
				<?php endif;
	
				if ($params->get('rssitemdesc', 1)): 
					$text = $currItem->get_description();
					$text = str_replace('&apos;', "'", $text);
	
					if ($words) {
						$texts = explode(' ', $text);
						$count = count($texts);
						if ($count > $words) {
							$text = '';
							for ($i = 0; $i < $words; $i ++) {
								$text .= ' '.$texts[$i];
							}
							$text .= '...';
						}
					} ?>
					<p><?php echo $text; ?></p>
				<?php endif; ?>
			</div>
		<?php endfor; ?>
	</div>
<?php endif; ?>