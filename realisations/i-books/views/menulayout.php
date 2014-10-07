<!DOCTYPE html PUBLIC 	"-//W3C//DTD XHTML 1.0 Strict//EN"
						"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-BE">
	<head>
	<style type="text/css">

	</style>
		<!-- pour protocole http -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
		<meta http-equiv="Content-Language" content="fr-BE" />

		<!-- "notice Dublin Core" de la ressource (plus d'info : http://openweb.eu.org/articles/dublin_core/) -->
		<meta name="DC.Language" content="fr" />
		<meta name="DC.Creator" content="Marcel Pirnay" />
		<meta name="DC.Format" content="text/html" />

		<link rel="icon" type="image/png" href="./img/css/favicon.png" />
		
		<!-- icone pour les favoris -->
		<link rel="shortcut icon" type="image/png" href="../img/favicon.png" />

		<!-- liens vers les feuilles de styles adéquates en fonction du media -->
		<link rel="stylesheet" type="text/css" href="./css/style.css" media="screen" />

				
		<!-- inclure le javascript -->
		<script type="text/javascript" src="./js/js.js" ></script>
		
		<!-- inclure Jquery GoogleApi -->
		
		<title>Hi <?php if($_SESSION['valid']): ?><?php echo $_SESSION['first_name'] ?> <?php echo $_SESSION['name'] ?><?php else: ?>ME<?php endif; ?></title>
	</head>

	<body>
		<div class="grid head">
			<div id="header">
				<a href="index.php"><h1><span><?php if(isset($_SESSION['first_name']) && isset($_SESSION['name'])): ?><?php echo $_SESSION['first_name'] ?> <?php echo $_SESSION['name'] ?><?php endif; ?></span> Books<?php if(!$_SESSION['valid']): ?><p>Votre bibliothèque en ligne</p><?php endif; ?></h1></a>
				<div class="log"><!--
							--><?php if($_SESSION['valid']): ?>
								<a href="?a=logout&m=user&o=admin">Vous déconnecter</a>
							<?php endif; ?>
				</div>
				<!--<form action="" method="get" class="general-search">
					<label for="recherche-globale"></label>
					<input type="text" name="recherche-globale" id="recherche-globale"/><!--
					<input type="submit" value="Rechercher"/>

				</form>-->
			</div>
		</div>
		<div class="grid">			
			<div id="body">
				<div id="menu">
						<?php if(!$_SESSION['valid']): ?>
							<div class="bann"></div>
						<?php else: ?>
							<a href="?m=home&a=index"><h2>Profil</h2></a>
						<?php endif; ?>

						<?php if(!$_SESSION['valid']): ?>
						<?php else: ?>
								<ul class="navigation">
								<li class="toggleSubMenu">
									<ul class="subMenu">
										<li class="menu-item">
											<a href="?m=home&a=index&o=books">Acceuil</a>
										</li>
										<li class="menu-item">
											<a href="?m=book&a=index&o=books">Books</a>
										</li>
										<li class="menu-item">
											<a href="?m=author&a=index&o=books">Auteurs</a>
										</li>
										<li class="menu-item">
											<a href="?m=editor&a=index&o=books">Editeurs</a>
										</li>
										<li class="menu-item">
											<a href="?m=genre&a=index&o=books">Genres</a>
										</li>
										<li class="menu-item">
											<a href="?m=date&a=index&o=books">Dates</a>
										</li>
									</ul>
								</li>
						<?php endif; ?>
						
				</div><!--
				--><?php if($_SESSION['valid']): ?><!--
					--><?php include($ObjectRoutes.'layout.php'); ?>
				<?php else: ?><!--
					--><?php include('admin/'.'layout.php'); ?>
				<?php endif; ?>


			</div>
		</div>
		<footer>
			<div class="footer">
				<p>Ma bibliothèque en ligne. &copy; Marcel Pirnay. Février 2014</p>
			</div>
		</footer>	
		
	</body>
	</html>