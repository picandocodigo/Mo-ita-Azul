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

