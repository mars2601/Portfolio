<?php

	define('CONTROLLERS_DIR','controllers/');
	define('MODELS_DIR','models/');
	define('CONFIG_DIR','config/');
	define('ROUTE_DELIMITER','/');
	define('VIEWS_DIR','views/');
	define('HELPERS_DIR','helpers/');



	//chemin img
	define('COVER_GENRE','./img/cover/genre/');
	define('COVER_AUTHOR','./img/cover/author/');
	define('COVER_EDITOR','./img/cover/editor/');
	define('COVER_BOOK','./img/cover/book/');

	// tableau des mois en francais
	$mois = ["",
		"Janvier",
		"Février",
		"Mars",
		"Avril",
		"Mai",
		"Juin",
		"Juillet",
		"Août",
		"Septembre",
		"Octobre",
		"Novembre",
		"Décembre"
	];

	//tableau des sous chemins du site -> o
	$ojectDir = [
		'default' => '',
		'photos' => 'photos/',
		'books' => 'books/',
		'admin' => 'admin/'
	];

	//tableau des messages d'erreurs
	$errors = [
			
			//0 - 9 -> email && email2
			"Veuillez entrez votre adresse e-mail",
			"Votre adresse e-mail n\'est pas valide",
			"Les deux adresses e-mail doivent correspondre",
			"Veuillez comfirmer votre adresse e-mail",
			"La confirmation de votre adresse e-mail n\'est pas valide",
			"", //5
			"",
			"",
			"",
			"",
			//10-19 -> nom
			"Veuillez indiquer votre nom",
			"Votre nom doit comporter au minimum 3 lettres",
			"Votre nom doit comporter moins de 30 lettres",
			"N\'utilisez pas de charactères spéciaux",
			"",
			"",
			"",
			"",
			"",
			"",
			//20-29 ->prenom
			"Veuillez indiquer votre prénom",
			"Votre prénom doit comporter au minimum 3 lettres",
			"Votre prénom doit comporter moins de 30 lettres",
			"N\'utilisez pas de charactères spéciaux",
			"",
			"",
			"",
			"",
			"",
			"",
			//30-39 -> password
			"Veuillez choisir un mot de passe",
			"Le mot de passe doit contenir au moins 6 charactères",
			"Le mot de passe ne doit pas dépasser 16 charactères",
			"Le mot de passe doit contenir uniquement des lettres ou des chiffres"
		];


	$ObjectRoutes ='';


	 // Le cookie n'existe pas encore, on choisit la date d'expiration
			   $timestamp_expiration=time()+30*24*3600 ;
			   // On crée notre cookie avec la date d'expiration choisie
			   setcookie('errorPlace','0',$timestamp_expiration);
			   setcookie('error',1,$timestamp_expiration);
			   // Puis on sauvegarde cette date dans un cookie (et on veille à lui attribuer la même date d'expiration que notre cookie principal pour ne pas qu'il expire trop tôt).
			   setcookie('expiration_variable',$timestamp_expiration,time()+30*24*3600) ;





