<!--
				--><div id="content">
					<div class="parts">
						<h3>Recherchez vos livres par auteurs</h3>
						<p>Vous avez un auteur littéraire préferé, qui vous interesse particulièrement ? <span>Cela tombe bien</span>, J'ai trié les livres par auteurs afin de répondre au mieux à votre recherche</p>
					</div>
					<div class="parts popular">
						<h3>Quelques auteurs au hasard</h3>
						<ul id="genre popular" class="list">
							<?php foreach ($data['data'] as $five):?><!--
							--><li>
								<!-- si je suis connecté dans mon espace perso -->
								<?php if($_SESSION['valid']): ?>
										<a class="admin" href="?m=author&a=edit&author_id=<?php echo $five['id']; ?>&o=books">Modifier</a><!--
										--><a class="admin delete"  href="javascript:if(confirm('Vous etes sur le point de supprimer l'auteur suivant : <?php echo $five['name']; ?>')) document.location.href='?m=author&a=delete&author_id=<?php echo $five['id']; ?>&o=books'">Supprimer</a>
								<?php endif; ?>
								<a href="?m=author&a=detail&o=books&author_id=<?php echo $five['id']; ?>">
									<img src="<?php echo COVER_AUTHOR.$five['front_cover']; ?>" alt="Image de l'écrivain<?php echo $five['first_name']; ?> <?php echo $five['name'] ?>">
									<h4><?php echo $five['first_name']; ?> <?php echo $five['name']; ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>
					<div class="parts">
						<h3>Tout les auteurs</h3>
						<ul id="genre alpha" class="list">
							<?php foreach ($data['alpha'] as $alpha):?><!--
							--><li>
								<!-- si je suis connecté dans mon espace perso -->
								<?php if($_SESSION['valid']): ?>
										<a class="admin" href="?m=author&a=edit&author_id=<?php echo $five['id']; ?>&o=books">Modifier</a><!--
										--><a class="admin delete"  href="javascript:if(confirm('Vous etes sur le point de supprimer l'auteur suivant : <?php echo $five['name']; ?>')) document.location.href='?m=author&a=delete&author_id=<?php echo $five['id']; ?>&o=books'">Supprimer</a>
								<?php endif; ?>
								<a href="?m=author&a=detail&o=books&author_id=<?php echo $alpha['id'] ?>">
									<img src="<?php echo COVER_AUTHOR.$alpha['front_cover']; ?>" alt="Image de l'écrivain<?php echo $alpha['first_name']; ?> <?php echo $alpha['name'] ?>">
									<h4><?php echo $alpha['first_name']; ?> <?php echo $alpha['name']; ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>

					<!-- si je suis connecté dans mon espace perso -->
					<?php if($_SESSION['valid']): ?>
						<div class="add elements"><p><a href="?m=author&a=create&o=books">Ajouter un auteur</a></p></div>
					<?php endif; ?>
				</div>