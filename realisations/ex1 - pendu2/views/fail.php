<div id="affichage">
	<img src="./img_pendu/pendu8.png" alt="image des chances restantes">
</div><!--
--><div class="retour">
	<div class="phrase">
		<h2 class="result">Dommage, vous avez <span>perdu</span> la partie.</h2>
	</div>
	<div class="solus">
		<p>Le mot a trouver était <span><?php echo $mot; ?></span></p>
	</div>
	<?php if($_GET['content'] == 'classique.php'): ?>
		<h3 class="retour"><a href="index.php?content=classique.php">Retenter une partie</a></h3>
	<?php endif; ?>
	<?php if($_GET['content'] == 'multijoueur.php'): ?>
		<h3 class="retour"><a href="index.php?content=multijoueur.php">Retentez une partie</a></h3>
	<?php endif; ?>

		<h3 class="retour"><a href="index.php">Retour au menu principal</a></h3>
</div>