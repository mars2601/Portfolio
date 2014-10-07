<!--
				--><div id="content">
					<div class="parts">
						<h3>Ma bibliothèque en ligne</h3>
						<img id="book" src="./img/books/css/object.png" alt=""><!--
						--><p id="intro">Cette bibliothèque me permet à moi, <span>Marcel Pirnay</span>, de partager les livres que j'ai lu, que je lis à l'instant ou que j'aimerais lire dans un avenir proche en y ajoutant des commentaires personels, notes, infos utiles... Et tout cela, dans <span>un 	interface simple</span> et <span>riche</span> en informations.</p>
						<?php if($_SESSION['valid']): ?>
						<div class="add"><p><a href="?m=book&a=create&o=books">Ajouter un livre</a></p></div>
						<?php endif; ?>
					</div>
					<div class="parts iconographic">
						<h3>Recherche spécifique</h3>
						<p>Recherchez une publication plus précisément grâce à la recherche spécifique divisée en 4 parties</p>
						<ul id="icon">
							<li class="tri-icon">
								<a href="?m=author&a=index&o=books"><h4>Par auteurs</h4></a>
							</li><!--
							--><li class="tri-icon">
								<a href="?m=editor&a=index&o=books"><h4>Par éditeurs</h4></a>
							</li><!--
							--><li class="tri-icon">
								<a href="?m=date&a=index&o=books"><h4>Par date</h4></a>
							</li><!--
							--><li class="tri-icon">
								<a href="?m=genre&a=index&o=books"><h4>Par genre</h4></a>
							</li>
						</ul>
					</div>
					<div class="parts">
						<h3>Recherche rapide</h3>
						<p>Vous connaissez un mot-clé que pourrait contenir le titre, le nom d’un auteur, de la maison d’édition où autres, Faites votre recherche ci-dessous</p>
						<form action="" method="get" class="general-search bigger">
							<label for="recherche-rapide">Entrez un mot-clé</label><!--
							--><input type="text" name="recherche-rapide" id="recherche-rapide"/><!--
							--><input type="submit" value="Rechercher"/>
						</form>
					</div>
				</div>