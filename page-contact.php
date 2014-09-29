<?php get_header(); ?>
	<div class="content">
			<div class="presentation">
				<div class=" content_box">
					<?php
						ini_set('display_errors',1);
						// S'il y des données de postées
						if ($_SERVER['REQUEST_METHOD']=='POST') {
						 
						  // (1) Code PHP pour traiter l'envoi de l'email
						 
						  // Récupération des variables et sécurisation des données
						  $nom     = htmlentities($_POST['nom']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
						  $email   = htmlentities($_POST['email']);
						  $message = htmlentities($_POST['message']);
						 
						 if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email))
							{
								$passage_ligne = "\r\n";
							}
							else
							{
								$passage_ligne = "\n";
							}

							$header = "From: \"MarcelP\"<pirnay.m@gmail.com>".$passage_ligne;
							$header .= "Reply-to: \"MarcelP\" <pirnay.m@gmail.com>".$passage_ligne;
							$header .= "MIME-Version: 1.0".$passage_ligne;
							$header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
						 
						  $destinataire = 'pirnay.m@gmail.com'; // Adresse email du webmaster (à personnaliser)
						  $sujet = 'Contact via Portfolio'; // Titre de l'email
						  $contenu = '<html><head><title>Contact</title></head><body>';
						  $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
						  $contenu .= '<p><strong>Nom</strong>: '.$nom.'</p>';
						  $contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
						  $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
						  $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)

						  // Envoyer l'email
						  mail($destinataire, $sujet, $contenu, $header); // Fonction principale qui envoi l'email
						  if(!empty($message) && !empty($email) && !empty($nom)){
						  	if(mail($destinataire, $sujet, $contenu, $header)){
						  	echo '<h2>Message envoyé</h2>';	
						  	}
						  }
						   // Afficher un message pour indiquer que le message a été envoyé
						  // (2) Fin du code pour traiter l'envoi de l'email

						}else{
							;
						}
						?>
					<div class="moi">
						<div class="content_box">
							<h2><span class="line lt"></span>Me contacter<span class="line rt"></span></h2>
							<div class="boxes mappy">
								    <form method="post" action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
								      <fieldset>
								      	<label for="nom">Votre nom et prénom: </label><input type="text" name="nom" size="30" /></br>
								      	<label for="email">Votre email: </label><input type="text" name="email" size="30" /></br>
								      	<p>N'hésitez pas à me contacter pour d'éventuelles questions, réactions, devis,... N'ayez pas peur !</p>
								      </fieldset>
								      <fieldset>
								      	<label for="">Message :</label>
								     	<textarea name="message" style="width:100%;	" rows="10"></textarea>
								      	<p><input type="submit" name="submit" class="link" value="Envoyer" /></p>
								      </fieldset>
								      
								      
								    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
<?php get_footer(); ?>

