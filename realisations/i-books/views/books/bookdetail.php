<!--
				--><div id="content">
					<div class="parts detail">
						<img src="<?php echo COVER_BOOK.$data['data']['title'].'.jpg'; ?>" alt="Couverture du livre <?php echo $data['data']['title'] ?>"><!--
						--><div class="infos">
							<h3><?php echo $data['data']['title'] ?></h3>
							<p><?php echo $data['data']['summary'] ?></p>
								<!-- edit/delet/add the books -->
								<?php if($data['data']['exist'] == '1'): ?>
										<a class="admin" href="?m=book&a=edit&book_id=<?php echo $data['data']['id']; ?>&o=books">Modifier</a><!--
										--><a class="admin delete"  href="javascript:if(confirm('Vous etes sur le point de supprimer le livre suivant : <?php echo $data['data']['title']; ?>')) document.location.href='?m=book&a=delete&book_id=<?php echo $data['data']['id']; ?>&o=books'">Supprimer</a>
								<?php elseif($data['data']['exist'] == '0'): ?>
										<a class="" href="?m=book&a=edit&book_id=<?php echo $data['data']['id']; ?>&o=books">Ajouter a ma bibli perso</a>
								<?php endif; ?>
						</div>
						<p><?php echo $data['data']['exist']  ?></p>
					</div>
					<div class="parts book-infos">
						<h3>Auteurs</h3>
						<ul id="books" class="list">
							<?php foreach ($data['data']['authors'] as $authors):?><!--
							--><li>
								<a href="?m=author&a=detail&o=books&author_id=<?php echo $authors['author_id'] ?>">
									<img src="<?php echo COVER_AUTHOR.$authors['front_cover']; ?>" alt="Image de l'auteur <?php echo $authors['name'] ?>">
									<h4><?php echo $authors['name'] ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div><!--
					--><div class="parts book-infos">
						<h3>Editeur</h3>
						<ul id="books" class="list">
							<?php foreach ($data['data']['editors'] as $editors):?><!--
							--><li>
								<a href="?m=editor&a=detail&o=books&editor_id=<?php echo $editors['id'] ?>">
									<img src="<?php echo COVER_EDITOR.$editors['logo'].'.jpg'; ?>" alt="Image de l'éditeur <?php echo $editors['name'] ?>">
									<h4><?php echo $editors['name'] ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div><!--
					--><div class="parts book-infos">
						<h3>Genres</h3>
						<ul id="books" >
							<?php foreach ($data['data']['genres'] as $genres):?><!--
							--><li>
								<a href="?m=genre&a=detail&o=books&genre_id=<?php echo $genres['id'] ?>">
									<h4>&#123;&nbsp;<?php echo $genres['name'] ?></h4>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>
				</div>