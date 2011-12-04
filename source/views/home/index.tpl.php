<?php ?>
<div id="container"> </div>
<script>
	
	loadChart('Test',[
		<?php 
			foreach ($balances as $balance) : ?>
		{
            name: '<?php echo "{$balance->name} {$balance->year}" ; ?>',
            data: [<?php echo "{$balance->credit} , {$balance->expenses}"; ?>]
        },
         <?php endforeach; ?>
         ]);
         	
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
	<?php endfor; ?>
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

