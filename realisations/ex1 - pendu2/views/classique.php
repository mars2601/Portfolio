<div id="affichage" class="case">
	<img src="./img_pendu/pendu<?php echo $posImgPendu; ?>.png" alt="image des chances restantes">
</div><!--
	--><div id="content"><!--
	--><div class="chances-restantes case">
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
	
	<form action="index.php?content=classique.php" method="post">
		
		<fieldset class="select case">
			<label for="lettres">Choisissez une lettre</label>
			<select name="lettres" id="lettres">
				<?php foreach ($lettres as $lettre => $statut): ?>
					<?php if($statut): ?>
						<option value="<?php echo urlencode($lettre); ?>"><?php echo $lettre; ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
			<input type="hidden" name="mot" value="<?php echo urlencode(serialize($mot));?>">
			<input type="hidden" name="lettresEssai" value="<?php echo urlencode(serialize($lettresEssai)); ?>">
			<input type="hidden" name="essai" value="<?php echo $essai; ?>">
			<input type="hidden" name="posImgPendu" value="<?php echo $posImgPendu; ?>">
			<input type="hidden" name="chaineDeRemplacement" value="<?php echo $chaineDeRemplacement; ?>">
			<input type="hidden">
			<?php if(!isset($_POST['lettres'])): ?>
				<p class="message-entree"><?php echo $message_entree; ?></p>
			<?php endif; ?>
		</fieldset>
			<input type="submit" value="essayer" class="case">
		
		
	</form>
</div>
