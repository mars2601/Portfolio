<?php if(!isset($_POST['mot'])): ?>
<h4>Joueur 1&nbsp;: <span>&nbsp;à vous de jouer !</span></h4>
<form action="index.php?content=multijoueur.php" method="post">
	<fieldset class="joueur1 case">
		<label for="mot">Choisissez un mot :</label>
		<input type="password" name="mot">
		<p class="attention">Attention, ne montrez pas ce mot au joueur 2 !</p>
	</fieldset>
	<input type="submit" value="Confirmer le mot">
</form>
<?php endif; ?>
<?php if(isset($_POST['mot'])): ?>
<h4>Joueur 2&nbsp;: <span>&nbsp;à vous de jouer. Trouver le mot caché pas le joueur 1</span></h4>
<div id="affichage">
	<img src="./img_pendu/pendu<?php echo $posImgPendu; ?>.png" alt="image des chances restantes">
</div><!--
	--><div id="content">
	<div class="chances-restantes case">
		<p >Nombre d'essai <?php if($essai < 7):?>restant<?php endif;?>: <span><?php echo $essai; ?></span></p>
	</div><!--
 --><div class="mots">
			<div class="remplacement case">
				<h3 class="mot"><?php echo $chaineDeRemplacement ?></h3>	
			</div>
			<?php if(!empty($lettresEssai)): ?>
				<div class="essai case">
					<p class="lettres-essai">Lettres deja essayees: <?php foreach($lettresEssai as $key => $value){echo '<span>'. $value . '</span>';} ?>
				</div>
			<?php endif; ?></p>
	</div>
	<form action="index.php?content=multijoueur.php" method="post">
		<fieldset class="select case">
			<label for="lettres">Choisissez une lettre</label>
			<select name="lettres" id="lettres">
				<?php foreach ($lettres as $lettre => $statut): ?>
					<?php if($statut): ?>
						<option value="<?php echo urlencode($lettre); ?>"><?php echo $lettre; ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
			<input type="hidden" name="motCache" value="<?php echo(urlencode($motCache));?>">
			<input type="hidden" name="mot" value="<?php echo(urlencode($mot));?>">
			<input type="hidden" name="lettresEssai" value="<?php echo urlencode(serialize($lettresEssai)); ?>">
			<input type="hidden" name="essai" value="<?php echo $essai ?>">
			<input type="hidden" name="chaineDeRemplacement" value="<?php echo $chaineDeRemplacement ?>">
			<input type="hidden">
		</fieldset>
		<input type="submit" value="essayer" class="case">
	</form>
	<?php endif; ?>		
</div>
