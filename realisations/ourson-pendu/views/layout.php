<!doctype html>
<html lang="<?php echo LANG; ?>">
<head>
	<meta charset="<?php echo CHARSET; ?>">
	<meta name="description" conten="<?php echo DESC; ?>">
	<title><?php echo TITLE; ?></title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat+Alternates|Averia+Sans+Libre|Quattrocento+Sans' rel='stylesheet' type='text/css'></head>
<body>
	
	<div id="grid">
		<div id="header" class="case">
			<h1><?php echo TITLE; ?></h1>
			<img src="./img_pendu/header.png" alt="">
			<?php if($content == 'classique.php'): ?>
				<h2>Partie <?php echo MODEC; ?></h2>
			<?php endif; ?>
			<?php if($content == 'multijoueur.php'): ?>
				<h2>Partie <?php echo MODEM; ?></h2>
			<?php endif; ?>

		</div>
		<?php include($content); ?>

		
	</div>
	<footer>
			<p><?php echo FOOTER_INFOS; ?></p>
			<p><?php echo FOOTER_DATE; ?></p>

	</footer> <!-- html5 -->
	
</body>
</html>