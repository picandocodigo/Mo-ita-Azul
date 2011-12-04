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
