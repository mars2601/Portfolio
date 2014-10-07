<!--
				--><div id="content">
					<div class="parts">
						<h3>Recherchez un livre parmis la bibliothèque complète</h3>
						<p>Vous avez ci dessous la liste complète des livres présent dans la bibliothèque.</p>
					</div>
					<div class="parts popular">
						<h3>Quelques livres au hasard</h3>
						<ul id="genre popular" class="list books">
							<?php foreach ($data['data'] as $five):?><!--
							--><li>
								<a href="?m=book&a=detail&o=books&book_id=<?php echo $five['id']; ?>">
									<!--gestion de l'image introuvable-->
									<?php if(file_exists(COVER_BOOK.$five['title'].'.jpg')){
											$imgLink = COVER_BOOK.$five['title'].'.jpg';
										}else{
											$imgLink = './img/cover/error'.'.jpg';
										}
									?>
									<img src="<?php echo $imgLink ?>" alt="Couverture du livre <?php echo $five['title'] ?>">
									<h4><?php echo $five['title']; ?></h4>
								</a>
								
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>
					<div class="parts">
						<h3>Tout les livres</h3>
						<ul id="genre alpha" class="list books">
							<?php foreach ($data['alpha'] as $alpha):?><!--
							--><li>
								<a href="?m=book&a=detail&o=books&book_id=<?php echo $alpha['id'] ?>">
									<img src="<?php echo COVER_BOOK.$alpha['title'].'.jpg'; ?>" alt="Couverture du livre <?php echo $alpha['title'] ?>">
									<h4 class="books"><?php echo $alpha['title']; ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>

					<!-- si je suis connecté dans mon espace perso -->
					<?php if($_SESSION['valid']): ?>
						<div class="add index"><p><a href="?m=book&a=create&o=books">Ajouter un livre</a></p></div>
					<?php endif; ?>

				</div>