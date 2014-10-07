<!--
				--><div id="content">
					<div class="parts detail">
						<img src="<?php echo COVER_EDITOR.$data['data']['logo'].'.jpg'; ?>" alt="Image de l'éditeur <?php echo $data['data']['name'] ?>"><!--
						--><div class="infos">
							<h3><span>Editeur</span> <?php echo $data['data']['name'] ?></h3>
						</div>
					</div>
					<div class="parts">
						<h3>Livres de cet éditeur</h3>
						<ul id="genre books" class="list books">
							<?php foreach ($data['data']['books'] as $books):?><!--
							--><li>
								<a href="?m=book&a=detail&o=books&book_id=<?php echo $books['id'] ?>">
									<img src="<?php echo COVER_BOOK.$books['front_cover'].'.jpg'; ?>" alt="Couverture du livre <?php echo $books['title'] ?>">
									<h4><?php echo $books['title'] ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>
				</div>