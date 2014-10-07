<!--
				--><div id="content">
					<div class="parts detail">
						<form id="editBook" action="index.php" method="POST" enctype="multipart/form-data"><!--permet d envoyer du binaire et donc des fichiers--> 
							<legend>Ajouter un book</legend>
							<fieldset>
								<div class="editImg">
									<div class="cover">
										<img src="./img/cover/error.jpg" alt="cover du livre à créer">
									</div>
									<label for="front_cover">Modifier la couverture</label>
									<input type="file" name="front_cover" value="">
								</div><!--
								--><div class="infos">
									<div class="editTitle">
										<label for="title">Titre</label>
										<input type="text" id="title" name="title" value="">
									</div>
									<div class="editSummary">
										<label for="summary">resumé</label>
										<textarea name="summary" rows="20"></textarea>
										
									</div>
									<div class="addAuthors">
										<h2 class="label">auteurs</h2>
										<select multiple size="15" name="authors[]">
											<?php foreach ($data['data']['allAuthors'] as $allAuthors): ?>
												<option <?php echo $allAuthors['id'] ?>
												value="<?php echo $allAuthors['id'] ?>"><?php echo $allAuthors['first_name'] ?> <?php echo $allAuthors['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								
							</fieldset>
							<fieldset>
								<input type="hidden" name="m" value="book">
								<input type="hidden" name="a" value="add">
								<input type="hidden" name="o" value="books">
								<input type="submit" value="enregistrer">
							</fieldset>
						</form>
					</div>
				</div>