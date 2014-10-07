<!--
				--><div id="content">
					<div class="parts">
						<!--<div class="intro">
							<img src="./img/css/welcome.png" alt="">
							<p><span>Hi ME</span> est un site permettant de vous créer un espace web personel sur lequel vous pourrez partager des livres, en rédiger un commentaire personel, voir ceux de vos amis et connaissances etc...</p>
						</div><!--
						--><div class="logUser">
							<form class="connect" action="index.php" method="POST">
								<legend>Déja inscris ? Connectez vous ici.</legend>
								<fieldset>
									<label for="email">E-mail</label><!--
									--><input type="text" id="email" name="email"><!--
									--><label for="password">Password</label><!--
									--><input type="password" id="password" name="password">
									<input type="hidden" name="a" value="login">
									<input type="hidden" name="m" value="user">
									<input type="hidden" name="o" value="admin">
									<input type="hidden" name="id" value="<?php echo $user_id ?>">

									<input type="submit" value="Vérifier">
								</fieldset>
							</form><!--
								<?php if (isset($_COOKIE['allErrors'])): ?>
									<?php $errorEnd = unserialize($_COOKIE['allErrors']); ?>
								<?php endif ?>
							--><form class="connect" name="add" action="index.php" method="POST">
								<legend>Pas encore inscris ? C'est ici.</legend>
								<fieldset>
									<label for="prenom">
										Prénom
										<?php if (isset($errorEnd)): ?><?php for($i=10;$i<20;$i++): ?><?php if(in_array($i, $errorEnd)):?><?php  ?><span>*</span>
										<p class="error-message"><?php echo $errors[$i]; ?></p>
										<?php endif;?><?php endfor;?><?php endif;?>
									</label><!--
									--><input type="text" id="prenom" name="prenom"><!--
									--><label for="nom">
										Nom de famille
										<?php if (isset($errorEnd)): ?><?php for($i=20;$i<30;$i++): ?><?php if(in_array($i, $errorEnd)):?><?php  ?><span>*</span>
										<p class="error-message"><?php echo $errors[$i]; ?></p>
										<?php endif;?><?php endfor;?><?php endif;?>
									</label><!--
									--><input type="text" id="nom" name="nom"><!--
									--><label for="email">
										Adresse e-mail
										<?php if (isset($errorEnd)): ?><?php for($i=0;$i<3;$i++): ?><?php if(in_array($i, $errorEnd)):?><?php  ?><span>*</span>
										<p class="error-message"><?php echo $errors[$i]; ?></p>
										<?php endif;?><?php endfor;?><?php endif;?>
									</label><!--
									--><input type="text" id="email" name="email"><!--
									--><label for="email2">
										Confirmez l'adresse e-mail
										<?php if (isset($errorEnd)): ?><?php for($i=2;$i<10;$i++): ?><?php if(in_array($i, $errorEnd)):?><?php  ?><span>*</span>
										<p class="error-message"><?php echo $errors[$i]; ?></p>
										<?php endif;?><?php endfor;?><?php endif;?>
									</label><!--
									--><input type="text" id="email2" name="email2"><!--
									--><label for="password">
										Mot de passe
										<?php if (isset($errorEnd)): ?><?php for($i=30;$i<40;$i++): ?><?php if(in_array($i, $errorEnd)):?><?php  ?><span>*</span>
										<p class="error-message"><?php echo $errors[$i]; ?></p>
										<?php endif;?><?php endfor;?><?php endif;?>
									</label><!--
									--><input type="password" id="password" name="password">

									<input type="hidden" name="a" value="add">
									<input type="hidden" name="m" value="user">
									<input type="hidden" name="o" value="admin">
									<input type="hidden" name="errorPlace" value="2">


									<input type="submit" name="adduser" value="S'inscrire">

								</fieldset>
							</form>	
						</div>
						

					</div>
				</div>