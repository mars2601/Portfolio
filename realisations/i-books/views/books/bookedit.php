<!--
				--><div id="content">
					<div class="parts detail">
						<form id="editBook" action="index.php" method="POST" enctype="multipart/form-data"><!--permet d envoyer du binaire et donc des fichiers--> 
							<legend>Editer / Modifier un book</legend>
							<fieldset>
								<div class="editImg">
									<?php if($data['data']['front_cover'] !== 'NULL'): ?>
									<div class="cover">
										<img src="<?php echo COVER_BOOK.$data['data']['title'].'.jpg'; ?>" alt="">
									</div>
									<?php endif; ?>
									<label for="front_cover">Modifier la couverture</label>
									<input type="file" name="front_cover" value="">
								</div><!--
								--><div class="infos">
									<div class="editTitle">
										<label for="title">Titre</label>
										<input type="text" id="title" name="title" value="<?php echo $data['data']['title']; ?>">
									</div>
									<div class="editSummary">
										<label for="summary">resume</label>
										<textarea name="summary" rows="20"><?php echo $data['data']['summary']; ?></textarea>
										
									</div>
									<div class="addAuthors">
										<h2 class="label">auteurs</h2>
										<select multiple size="15" name="authors[]">
											<?php $ids = []; 
											foreach ($data['data']['authors'] as $bookAuthor):
												$ids[] = $bookAuthor['author_id'];
											endforeach; ?>
											<?php foreach ($data['data']['allAuthors'] as $allAuthors): ?>
												<option <?php echo in_array($allAuthors['id'], $ids) ? 'selected' : ''; ?>
												value="<?php echo $allAuthors['id'] ?>"><?php echo $allAuthors['first_name'] ?> <?php echo $allAuthors['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								
								
								
							
							</fieldset>
							<fieldset>
								<input type="hidden" name="m" value="book">
								<input type="hidden" name="a" value="update">
								<input type="hidden" name="o" value="books">
								<input type="hidden" name="book_id" value="<?php echo $data['data']['id'];?>">
								<input type="submit" value="enregistrer">
							</fieldset>
						</form>
					</div>
				</div>