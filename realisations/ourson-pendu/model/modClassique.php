<?php 

//Soit on reprend le mot déja tiré (1), soit on en tire un au hasard via keyrand (2)
if(isset($_POST['mot'])){
	$mot = unserialize(urldecode($_POST['mot']));
}else{
	$mot = trim($listeMots[$keyrand],"\n");
	// une fois passé par la, nous nous trouverons ensuite dans le cas du dessus
}

//taille du mot selon le mot tiré au sort
$lenMot = strlen($mot);

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
	// l'utilisateur à proposé une lettre

	$lettre = urldecode($_POST['lettres']);

	if(isset($_POST['lettresEssai'])){
		$lettresEssai = unserialize(urldecode($_POST['lettresEssai']));
		array_push($lettresEssai,$lettre);  
	}

	// différence des 2 tableaux par les clés
	//lettresEssai flipé afin d'avoir les lettres en clé ( comme pour le tab lettres ) 
	$lettres = array_diff_key($lettres, array_flip($lettresEssai)); 

	if (substr_count($mot, $lettre) > 0) {
		// au moins une des lettres se trouve dans le mot a deviner
		for ($i=0; $i < $lenMot; $i++) {

			if (str_split($mot)[$i] == $lettre) { 	// si l'essai en cours est == a un carac

				// Je change ce caractere dans la chaine de remplacement
				$chaineDeRemplacement[$i] = $lettre;
			}
		}
	}else{
		// lettre proposée ne se trouve pas dans le mot a deviner
		$essai--;	// -1 essai
		$posImgPendu++;		// image suivante
	}
	
}else{
	// l'utilisateur n'a encore rien proposé
	$message_entree = 'Veuillez entrer une lettre.';
}

if(isset($_POST['mot'])){
	if($essai < 1){
		$content = 'fail.php'; //perdu
	}

	$winTest = strpos($chaineDeRemplacement, REMPLACEMENT);
	// si toute la chaine de rempacement est remplacée par des lettres
	// et ne contient donc plus de caractere de remplacement -> gagné

	if($winTest === false){
		$content = 'success.php'; //gagné
	}	
}

$content == 'classique.php';








