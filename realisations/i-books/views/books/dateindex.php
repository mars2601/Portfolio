<!--
				--><div id="content">
					<div class="parts">
						<h3>Recherchez un livre par date de publication</h3>
						<p>Faites une recherche sur un livre en fonction de sa date de publication.</p>
					</div>
					<div class="parts">
						<h3>Tout les livres classés par date</h3>
						<ul id="genre alpha" class="list books">
						<?php foreach ($data['data'] as $date):?><!--
							--><li>
								<a href="?m=book&a=detail&o=books&book_id=<?php echo $date['id'] ?>">
									<!--gestion de l'image introuvable-->
									<?php if(file_exists(COVER_BOOK.$date['title'].'.jpg')){
											$imgLink = COVER_BOOK.$date['title'].'.jpg';
										}else{
											$imgLink = './img/cover/error'.'.jpg';
										}
									?>
									<img src="<?php echo $imgLink ?>" alt="Couverture du livre <?php echo $date['title'] ?>">
									<h4 class="books"><?php echo $date['title']; ?></h4>
									<?php $moisFr = $mois[$date['dateMois']]; ?> 
									<h5><?php echo $date['dateJour']; ?>&nbsp;<?php echo $moisFr; ?>&nbsp;<?php echo $date['dateAn']; ?></h5>
								</a>
							</li><!--
							--><?php endforeach; ?>
						</ul>
					</div>
				</div>
