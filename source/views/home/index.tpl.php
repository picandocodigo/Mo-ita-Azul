<div>
	<div class="d-load-graph span-2 d-selected">
		<a onclick="loadBalancesAgain(this);" class="span-2">Total</a> 
	</div>
<div id="container" > </div>

	<?php /*	
		$values = $balances[0];
		$series = array();
		$xvalues = array();
			$xvalues[] = $balances[1];
			foreach ($values as $balance) :
				$series[] = "{
					name: '" . $balance->getName(). "', 
					data: [" . implode( ",", $balance->getMaledata() ) . "],
					stack: 'male'},
					{
					name: '" . $balance->getName() . "', 
					data: [" . implode( ",", $balance->getFemaleData() ) . "],
					stack: 'female'
					}";
			endforeach;*/
		
	?>
</div>
<script>	
	<?php /*loadChart('Balances por año', 
				[<?php echo implode(",", $series) ?>],
				[<?php echo implode(",", $xvalues[0]) ?>],
				'Pesos uruguayos ($UY)'
			);*/ ?>
	loadHorizontalGraph('<?php echo $balanceDetail; ?>');
</script>
<?php if (count($failureYears)): ?> 
<div>
	<div class="d-load-graph span-2 d-selected">
		<a onclick="loadAgain(this);" class="span-2">Total</a> 
	</div>
	<?php for($i=0; $i<count($failureYears); $i++) : ?>
	<div class="d-load-graph p-load-graph  span-2" id="fail-year-<?php echo $failureYears[$i]->year; ?>">
		<a href="<?php echo PROTOCOL_METHOD.URL_BASE."home/loadFailureGraph/{$failureYears[$i]->year}"; ?>" class="span-2"><?php echo $failureYears[$i]->year; ?></a>
	</div>
	<?php endfor; ?><div style="clear:both;"> </div>
	<div id="failure-bar"></div>
</div>
<script type="text/javascript">
	loadGraph('<?php echo $averages; ?>');
	function loadAgain(obj) {
		activeTab(obj); 
		loadGraph('<?php echo $averages; ?>'); 
	}
</script>
<?php endif; ?>

