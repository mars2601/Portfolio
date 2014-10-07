<!--
				--><div id="content">
					<div class="parts detail">
						<img src="<?php echo COVER_AUTHOR.$data['data']['front_cover']; ?>" alt="Image de l'écrivain <?php echo $data['data']['name'] ?><?php echo $data['data']['first_name'] ?>"><!--
						--><div class="infos">
							<h3><span>Auteur</span> <?php echo $data['data']['name'] ?> <?php echo $data['data']['first_name'] ?></h3>
							<p><?php echo $data['data']['biography'] ?></p>
						</div>
						
					</div>
					<div class="parts">
						<h3>Livres de cet auteur</h3>
						<ul id="genre alpha" class="list books">
							<?php foreach ($data['data']['books'] as $books):?><!--
							--><li>
								<a href="?m=book&a=detail&o=books&book_id=<?php echo $books['book_id'] ?>">
									<img src="<?php echo COVER_BOOK.$books['title'].'.jpg'; ?>" alt="Couverture du livre <?php echo $books['title'] ?>">
									<h4><?php echo $books['title'] ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>
				</div>