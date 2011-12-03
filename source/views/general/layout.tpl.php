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
  				<h1>HEADER</h1>
  				Mo&ntilde;ita azul
  			</div>
  			<div class="span-24 content">
  				<?= $content; ?>
  			</div>
  			<div class="span-24 footer">
  				<h3>FOOTER</h3>
  			</div>
		</div>
    </body>
</html>
