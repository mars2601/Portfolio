<!--
				--><div id="content">
					<div class="parts detail">
						<form id="editBook" action="index.php" method="POST" enctype="multipart/form-data"><!--permet d envoyer du binaire et donc des fichiers--> 
							<legend>Ajouter un auteur</legend>
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
										<label for="first_name">Prénom</label>
										<input type="text" id="first_name" name="first_name" value="">
									</div>
									<div class="editTitle">
										<label for="name">Nom de famille</label>
										<input type="text" id="name" name="name" value="">
									</div>
									<div class="editSummary">
										<label for="bio">Biographie</label>
										<textarea name="bio" rows="20"></textarea>
										
									</div>
								</div>
								
							</fieldset>
							<fieldset>
								<input type="hidden" name="m" value="author">
								<input type="hidden" name="a" value="add">
								<input type="hidden" name="o" value="books">
								<input type="submit" value="enregistrer">
							</fieldset>
						</form>
					</div>
				</div>