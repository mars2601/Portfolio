<?php
	// nom en capitale car convention
	

	// constantes utiles pour la vue :

	define('LANG', 'fr');
	define('CHARSET', 'utf-8');
	define('TITLE', 'L\'ourson pendu');
	define('DESC', 'Jeu du pendu en PHP');


	//constantes utiles pour le jeu :

	define('ESSAI_MAX','7');				//nb essai maximum
	define('REMPLACEMENT','*');				// caractère de remplacement dans le mot
	define('WORDS_LIST','./words.txt');		// adresse du fichier ou se trouve les mots a deviner

	// différents modes

	define('MODEC', 'classique');
	define('MODEM', 'multijoueur');
	// valeurs initiales qui seront changées lors du jeu :

	$essai = 0;					// nb d'essai au départ du jeu

								// lettres de l'alphabet non acentuée ( comme les mots d'ailleurs )
	$lettres = [
		'a' => true,
		'b' => true,
		'c' => true,
		'd' => true,
		'e' => true,
		'f' => true,
		'g' => true,
		'h' => true,
		'i' => true,
		'j' => true,
		'k' => true,
		'l' => true,
		'm' => true,
		'n' => true,
		'o' => true,
		'p' => true,
		'q' => true,
		'r' => true,
		's' => true,
		't' => true,
		'u' => true,
		'v' => true,
		'w' => true,
		'x' => true,
		'y' => true,
		'z' => true,
	];

	$indiceMot = 0;					// l'indice qui pertmet de retrouver le mot a deviner	
	$lettresEssai = [];     		// les lettres déja essayées pendant le jeu
	$chaineDeRemplacement = ''; 	// chaine qui va donnez un apercu de se qu'on a déja trouvé ou nom
	
	///Attention

	//Récuperer la liste des mots a deviner qui se trouve dans un ficher .txt (words.txt) grace a file
	// le @ devant la fonction permet de supprimer l'affichage des erreur de file 
	// et permet donc de gerer soit meme les erreurs

	$listeMots = @file(WORDS_LIST);

	if($listeMots == false){
		die('<p>La liste des mots n\'est pas dispo</p>');
	}

	$keyrand = array_rand($listeMots, 1); // tire au hasard une clé présente dans le tableau listeMots


	define('FOOTER_INFOS', 'Jeu du pendu par Marcel Pirnay dans le cadre du cours d\'option web.');
	define('FOOTER_DATE', 'Février 2014');



