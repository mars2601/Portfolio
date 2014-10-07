<!--
				--><div id="content">
					<div class="parts">
						<h3>Recherchez un livre par éditeurs</h3>
						<p>Vous avez un éditeur, qui vous interesse particulièrement ?<span>Cela tombe bien</span>, J'ai trié les livres par éditeurs afin de répondre au mieux à votre recherche</p>
					</div>
					<div class="parts popular">
						<h3>Quelques éditeurs au hasard</h3>
						<ul id="genre popular" class="list">
							<?php foreach ($data['data'] as $five):?><!--
							--><li>
								<a href="?m=editor&a=detail&o=books&editor_id=<?php echo $five['id']; ?>">
									<img src="<?php echo COVER_EDITOR.$five['logo'].'.jpg'; ?>" alt="Image de l'éditeur <?php echo $five['name'] ?>">
									<h4><?php echo $five['name']; ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>
					<div class="parts">
						<h3>Tout les éditeurs</h3>
						<ul id="genre alpha" class="list">
							<?php foreach ($data['alpha'] as $alpha):?><!--
							--><li>
								<a href="?m=editor&a=detail&o=books&editor_id=<?php echo $alpha['id'] ?>">
									<img src="<?php echo COVER_EDITOR.$alpha['logo'].'.jpg'; ?>" alt="Image de l'éditeur <?php echo $five['name'] ?>">
									<h4><?php echo $alpha['name']; ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>
				</div>