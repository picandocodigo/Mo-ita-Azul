<div id="container" > </div>

	<?php	
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
			endforeach;
		
	?>
<script>	
	loadChart('Balances por año', 
				[<?php echo implode(",", $series) ?>],
				[<?php echo implode(",", $xvalues[0]) ?>],
				'Pesos uruguayos ($UY)'
			);
</script>
<div id="failure-averages"></div>
<script type="text/javascript">
	loadGraph('<?php echo $averages; ?>');
</script>
<?php if (count($failureYears)): ?> 
<div>
	<?php for($i=0; $i<count($failureYears); $i++) : ?>
	<div class="span-3" id="fail-year-<?php echo $failureYears[$i]->year; ?>">
		<a href="<?php echo PROTOCOL_METHOD.URL_BASE."home/loadFailureGraph/{$failureYears[$i]->year}"; ?>" class="p-load-graph"><?php echo $failureYears[$i]->year; ?></a>
	</div>
	<?php endfor; ?>
	<div id="failure-bar"></div>
</div>
<?php endif; ?>

