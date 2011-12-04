<div>
	<div class="d-load-graph span-2 d-selected">
		<a onclick="loadTotalAgain(this);" class="span-2">Total</a> 
	</div>

	<div class="d-load-graph span-2">
		<a onclick="loadDetailedAgain(this);" class="span-2">Detallado</a> 
	</div>
	<div style="clear:both;"> </div>
	<div id="container" > </div>

</div>
<script>	
	loadHorizontalGraph('<?php echo $balanceTotal; ?>');
	function loadTotalAgain(obj) {
		activeTab(obj);
		loadHorizontalGraph('<?php echo $balanceTotal; ?>');
	}
	function loadDetailedAgain(obj) {
		activeTab(obj);
		loadHorizontalGraph('<?php echo $balanceDetail; ?>');
	}
</script>
<div class="p-tab-container">
	<div class="span-24 d-tab-menu last">
		<div class="span-4 d-selected"><a onclick="switchTab(1, this);" class="span-4">Datos de repetición</a></div>
		<div class="span-4"><a onclick="switchTab(2, this);" class="span-4">Datos de matrícula</a></div>
		<div class="span-4 last"><a onclick="switchTab(3, this);" class="span-4">Datos de abandono</a></div>
	</div>
	<div style="clear:both;"> </div>
	<div class="p-tab p-tab-1 span-24">
		<?php if (count($failureYears)): ?> 
		<div class="d-graph-container">
			<div class="d-load-graph span-2 d-selected">
				<a onclick="loadAgain(this);" class="span-2">Total</a> 
			</div>
			<?php for($i=0; $i<count($failureYears); $i++) : ?>
			<div class="d-load-graph p-load-graph  span-2" id="fail-year-<?php echo $failureYears[$i]->year; ?>">
				<a href="<?php echo PROTOCOL_METHOD.URL_BASE."home/loadFailureGraph/{$failureYears[$i]->year}"; ?>" class="span-2"><?php echo $failureYears[$i]->year; ?></a>
			</div>
			<?php endfor; ?>
			<div style="clear:both;"> </div>
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
	</div>
	<div class="p-tab p-tab-2 span-24">
		<?php if (count($failureYears)): ?> 
		<div class="d-graph-container">
			<div class="d-load-graph span-2 d-selected">
				<a onclick="loadRegistryAgain(this);" class="span-2">Total</a> 
			</div>
			<?php for($i=0; $i<count($failureYears); $i++) : ?>
			<div class="d-load-graph p-load-graph  span-2" id="fail-year-<?php echo $failureYears[$i]->year; ?>">
				<a href="<?php echo PROTOCOL_METHOD.URL_BASE."home/loadRegistrationGraph/{$failureYears[$i]->year}"; ?>" class="span-2"><?php echo $failureYears[$i]->year; ?></a>
			</div>
			<?php endfor; ?><div style="clear:both;"> </div>
			<div id="registration-bar"></div>
		</div>
		<script type="text/javascript">
			loadGraph('<?php echo $totalRegistration; ?>');
			function loadRegistryAgain(obj) {
				activeTab(obj); 
				loadGraph('<?php echo $totalRegistration; ?>'); 
			}
		</script>
		<?php endif; ?>
	</div>
	<div class="p-tab p-tab-3 span-24">
		<?php if (count($failureYears)): ?> 
		<div class="d-graph-container">
			<div class="d-load-graph span-2 d-selected">
				<a onclick="loadAbandonAgain(this);" class="span-2">Total</a> 
			</div>
			<?php for($i=0; $i<count($failureYears); $i++) : ?>
			<div class="d-load-graph p-load-graph  span-2" id="fail-year-<?php echo $failureYears[$i]->year; ?>">
				<a href="<?php echo PROTOCOL_METHOD.URL_BASE."home/loadAbandonGraph/{$failureYears[$i]->year}"; ?>" class="span-2"><?php echo $failureYears[$i]->year; ?></a>
			</div>
			<?php endfor; ?><div style="clear:both;"> </div>
			<div id="abandon-bar"></div>
		</div>
		<script type="text/javascript">
			loadGraph('<?php echo $abandon; ?>');
			function loadAbandonAgain(obj) {
				activeTab(obj); 
				loadGraph('<?php echo $abandon; ?>'); 
			}
		</script>
		<?php endif; ?>
	</div>
</div>
