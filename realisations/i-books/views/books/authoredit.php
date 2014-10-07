<!--
				--><div id="content">
					<div class="parts detail">
						<form id="editBook" action="index.php" method="POST" enctype="multipart/form-data"><!--permet d envoyer du binaire et donc des fichiers--> 
							<legend>Editer / Modifier un auteur</legend>
							<fieldset>
								<div class="editImg">
									<?php if($data['data']['first_name'] !== 'NULL'): ?>
									<div class="cover">
										<img src="<?php echo COVER_AUTHOR.$data['data']['first_name'].'.jpg'; ?>" alt="<?php $data['data']['first_name'] ?>">
									</div>
									<?php endif; ?>
									<label for="front_cover">Modifier la couverture</label>
									<input type="file" name="front_cover" value="">
								</div><!--
								--><div class="infos">
									<div class="editTitle">
										<label for="first_name">Prenom</label>
										<input type="text" id="first_name" name="first_name" value="<?php echo $data['data']['first_name']; ?>">
									</div>
									<div class="editTitle">
										<label for="name">Nom de famille</label>
										<input type="text" id="name" name="name" value="<?php echo $data['data']['name']; ?>">
									</div>
									<div class="editSummary">
										<label for="bio">Biographie</label>
										<textarea name="bio" rows="20"><?php echo $data['data']['bio']; ?></textarea>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<input type="hidden" name="m" value="author">
								<input type="hidden" name="a" value="update">
								<input type="hidden" name="o" value="books">
								<input type="hidden" name="author_id" value="<?php echo $data['data']['id'];?>">
								<input type="submit" value="enregistrer">
							</fieldset>
							<p><?php echo $data['data']['id'];?></p>
						</form>
					</div>
				</div>