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
