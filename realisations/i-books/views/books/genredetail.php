<!--
				--><div id="content">
					<div class="parts detail">
						<img src="<?php echo COVER_GENRE.$data['data']['name'].'.jpg'; ?>" alt="Image du genre <?php echo $data['data']['name'] ?>"><!--
						--><div class="infos">
							<h3><span>Genre</span> <?php echo $data['data']['name'] ?></h3>
							<p><?php echo $data['data']['definition'] ?></p>
						</div>
						
					</div>
					<div class="parts">
						<h3>Livres de ce genre</h3>
						<ul id="genre-books" class="list books">
							<?php foreach ($data['data']['books'] as $books):?><!--
							--><li>
								<a href="?m=book&a=detail&o=books&book_id=<?php echo $books['book_id'] ?>">
									<img src="<?php echo COVER_BOOK.$books['front_cover'].'.jpg'; ?>" alt="Image de l'éditeur <?php echo $books['title'] ?>">
									<h4><?php echo $books['title'] ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
						
					</div>
				</div>