<!--
				--><div id="content">
					<div class="parts">
						<h3><span>Hi</span> <?php echo $_SESSION['first_name'] ?> <?php echo $_SESSION['name'] ?></h3>
						<h4 class="profil"><?php echo $_SESSION['email'] ?></h4>
						<p id="intro" class="profil">Bienvenue sur votre espace Web</p>
						<img id="profil" src="./img/css/profil.jpg" alt="photos de profil">
					</div>
					<div class="parts">
						<h3>Mes books</h3>
						<ul id="genre popular" class="list books">
							<?php foreach ($data['data'] as $books):?><!--
							--><li>
								<!-- si je suis connecté dans mon espace perso -->
								<?php if($_SESSION['valid']): ?>
										<a class="admin" href="?m=book&a=edit&book_id=<?php echo $books['id']; ?>&o=books">Modifier</a><!--
										--><a class="admin delete"  href="javascript:if(confirm('Vous etes sur le point de supprimer le livre suivant : <?php echo $books['title']; ?>')) document.location.href='?m=book&a=delete&book_id=<?php echo $books['book_id']; ?>&o=books'">Supprimer</a>
								<?php endif; ?>
								<a href="?m=book&a=detail&o=books&book_id=<?php echo $books['book_id']; ?>">
									<!--gestion de l'image introuvable-->
									<?php if(file_exists(COVER_BOOK.$books['title'].'.jpg')){
											$imgLink = COVER_BOOK.$books['title'].'.jpg';
										}else{
											$imgLink = './img/cover/error'.'.jpg';
										}
									?>
									<img src="<?php echo $imgLink ?>" alt="Couverture du livre <?php echo $books['title'] ?>">
									<h4><?php echo $books['title']; ?></h4>
								</a>
								
							</li><!--
							--><?php endforeach; ?>
						</ul>
						<div class="add index"><p><a href="?m=book&a=index&o=books">Voir tout les books de la bibliothèque</a></p></div>
					</div>
				</div>