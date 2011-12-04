<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
	<base href="<?= PROTOCOL_METHOD.URL_BASE; ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?= $title; ?></title>
		<?php foreach ($css as $cs) : ?>
		<link rel="stylesheet" type="text/css" href="<?= CSS_FILES."{$cs}.css"; ?>">
		<?php endforeach; ?>
		<?php foreach ($javaScript as $js) : ?>
		<script type="text/javascript" src="<?= JS_FILES."{$js}.js"; ?>"></script>
		<?php endforeach; ?>
    </head>
    <body>
    	<div class="container">
  			<div class="span-24 header">
  				<div class="span-15">
  					<img src="source/themes/img/361x110.png">
				</div>
  				<div class="align-right span-9 last">
  					<div class="span-9 last">
  						<img src="source/themes/img/dal-logo1.png">
  					</div>
  					<div class="span-9 last">
  						<img src="source/themes/img/dal-logo2.png">
  					</div>
  				</div>
  			</div>
  			<div class="span-24 content">
  				<?= $content; ?>
  			</div>
  			<div class="span-24 footer">
    </body>
</html>
