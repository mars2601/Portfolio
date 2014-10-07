<?php 


//Soit on reprend le mot déja tiré (1), soit on en tite un au hasard via keyrand (2)
	if(isset($_POST['mot'])){
		if(strlen($_POST['mot']) > 4){
			$mot = urldecode($_POST['mot']);
			//lorsqu'un définis un mot dans le premier champ
		}else{
			die('Veuillez entrer un mot de plus de 4 lettres. Merci');
		}
			
	}else{
		$mot ='';
		$motCache = '';
		/// quand on arrive sur la page, aucun mot n'est définis
	}
	if(isset($_POST['motCache'])){
			$motCache = urldecode($_POST['motCache']);

			}else{
			$motCache = $mot;
			}

$lenMot = strlen($motCache);

// chaine qui permettra au fur et a mesure de voir qu'elle lettre nous avons trouvé
// et lesquelles sont encore à trouver
if(isset($_POST['chaineDeRemplacement'])){
	$chaineDeRemplacement = $_POST['chaineDeRemplacement'];
}else{
		$chaineDeRemplacement = str_repeat(REMPLACEMENT, $lenMot);
}


// nombre d'essai
if(isset($_POST['essai'])){
	$essai = $_POST['essai'];
}else{
	$essai = ESSAI_MAX;
}

// position de l'image dans le jeu. de 1(départ) à 8(perdu) ou 9(gagné)
if(isset($_POST['posImgPendu'])){
	$posImgPendu = $_POST['posImgPendu'];
}else{
	$posImgPendu = 1;
}

//essai en cours
if(isset($_POST['lettres'])){

	$lettre = urldecode($_POST['lettres']);

	if(isset($_POST['lettresEssai'])){
		$lettresEssai = unserialize(urldecode($_POST['lettresEssai']));
		array_push($lettresEssai,$lettre);  
	}

	// différence des 2 tableaux par les clés
	//lettresEssai flipé afin d'avoir les lettres en clé ( comme pour le tab lettres ) 
	$lettres = array_diff_key($lettres, array_flip($lettresEssai)); 


	if (substr_count($motCache, $lettre) > 0) {
		for ($i=0; $i < $lenMot; $i++) { 
			if (str_split($motCache)[$i] == $lettre) { 			// si l'essai en cours est == a un carac

				// Je change ce caractere dans la chaine de remplacement
				$chaineDeRemplacement[$i] = $lettre;
			}
		}
	}else{
		$essai--;
		$posImgPendu++;		// image suivante
	}
	
}else{
	// l'utilisateur n'a encore rien proposé
	$message_entree = 'Veuillez entrer une lettre.';
}

if(isset($_POST['motCache'])){

	if($essai < 1){
		$content = 'fail.php';
	}

	$winTest = strpos($chaineDeRemplacement, REMPLACEMENT);

	if($winTest === false){
		$content = 'success.php';
	}	
}







$content == 'multijoueur.php';

