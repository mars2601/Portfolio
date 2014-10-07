<div id="affichage" class="success">
	<img src="./img_pendu/pendu9.png" alt="image des chances restantes">
</div><!--
--><div class="retour">
	<div class="phrase">
		<h2 class="result">Félicitations, vous avez <span>gagné</span> la partie.</h2>
	</div>
	<?php if($_GET['content'] == 'classique.php'): ?>
		<h3 class="retour"><a href="index.php?content=classique.php">Rejouer une partie</a></h3>
	<?php endif; ?>
	<?php if($_GET['content'] == 'multijoueur.php'): ?>
		<h3 class="retour"><a href="index.php?content=multijoueur.php">Rejouer une partie</a></h3>
	<?php endif; ?>

		<h3 class="retour"><a href="index.php">Retour au menu principal</a></h3>
</div>

