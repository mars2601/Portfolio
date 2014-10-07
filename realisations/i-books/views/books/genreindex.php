<!--
				--><div id="content">
					<div class="parts">
						<h3>Recherchez vos livres par genre</h3>
						<p>Vous avez un genre littéraire préferé ? <span>Cela tombe bien</span>, nous avons trié les livres par genre afin de répondre au mieux à votre recherche</p>
					</div>
					<div class="parts popular">
						<h3>Quelques genres au hasard</h3>
						<ul id="genre popular" class="list books">
							<?php foreach ($data['data'] as $five):?><!--
							--><li>
								<a href="?m=genre&a=detail&o=books&genre_id=<?php echo $five['id']; ?>">
									<img src="<?php echo COVER_GENRE.$five['name'].'.jpg'; ?>" alt="Image du genre <?php echo $five['name'] ?>">
									<h4><?php echo $five['name']; ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>
					<div class="parts">
						<h3>Tout les genres</h3>
						<ul id="genre alpha" class="list books">
							<?php foreach ($data['alpha'] as $alpha):?><!--
							--><li>
								<a href="?m=genre&a=detail&o=books&genre_id=<?php echo $alpha['id'] ?>">
									<img src="<?php echo COVER_GENRE.$alpha['name'].'.jpg'; ?>" alt="Image du genre <?php echo $alpha['name'] ?>">
									<h4><?php echo $alpha['name'] ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>
				</div>