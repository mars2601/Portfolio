<?php 

/**
* 
*/
class BaseController
{
	
	function __construct()
	{
		# code...
	}

	function validate(){

		if(isset($_COOKIE['allErrors'])){
			setcookie('allErrors','',$_COOKIE['expiration_variable']);

		}

		

		$allErrors  = array();

		

		if(!empty($_POST['email'])){
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$email = $_POST['email'];
			}else{
				array_push($allErrors, '1');
			}
		}else{
			array_push($allErrors, '0');
		}

		if(!empty($_POST['email2'])){
			if(filter_var($_POST['email2'], FILTER_VALIDATE_EMAIL)){
				$email2 = $_POST['email2'];
			}else{
				array_push($allErrors, '4');
			}
		}else{
			array_push($allErrors, '3');
		}
		
		if(!empty($_POST['email']) && !empty($_POST['email2'])){
			if($_POST['email'] != $_POST['email2']){
				array_push($allErrors, '2');
			}	
		}
		

		
		if(!empty($_POST['nom'])){
			if(strlen($_POST['nom']) > 3){
				if(strlen($_POST['nom']) < 30){
					if(preg_match("#[a-z]#", $_POST['prenom'])){
						$nom = $_POST['nom'];
					}else{
						array_push($allErrors, '13');
					}
				}else{
					array_push($allErrors, '12');
				}
			}else{
				array_push($allErrors, '11');
			}
		}else{
			array_push($allErrors, '10');
		}

		if(!empty($_POST['prenom'])){
			if(strlen($_POST['prenom']) > 3){
				if(strlen($_POST['prenom']) < 30){
					if(preg_match("#[a-z-?]#", $_POST['prenom'])){
						$prenom = $_POST['prenom'];
					}else{
						array_push($allErrors, '23');
					}
				}else{
					array_push($allErrors, '22');
				}
			}else{
				array_push($allErrors, '21');
			}
		}else{
			array_push($allErrors, '20');
		}
			
		if(!empty($_POST['password'])){
			if(strlen($_POST['password']) > 5){
				if(strlen($_POST['password']) < 17){
					if(preg_match("#[a-z0-9-_]#", $_POST['password'])){
						$password = $_POST['password'];
					}else{
						array_push($allErrors, '33');
					}
				}else{
					array_push($allErrors, '32');
				}
			}else{
				array_push($allErrors, '31');
			}
		}else{
			array_push($allErrors, '30');
		}

		$datas = [];
		$datas = compact("nom", "prenom", "email", "password");

		//test si il y a une erreur ou pas
		if(empty($allErrors)){
			$this->noErrors($allErrors, $datas);
		}else{
			$this->errors($allErrors);
		}


	}

	function errors($allErrors){

		

		/*die(var_dump($allErrors));*/

		setcookie('allErrors',serialize($allErrors),$_COOKIE['expiration_variable']);
		$_SESSION['valid'] = false;
		header('Location: index.php');

		
	}

	function noErrors($allErrors, $datas){

		$user = new User;
		$inputs=[];


		$user->add($datas);
		$_SESSION['valid'] = true;

		$data2 = $user->usernew();
		$_SESSION['name'] = ucfirst($data2['name']);
		$_SESSION['first_name'] = ucfirst($data2['first_name']);
		$_SESSION['email'] = $data2['email'];
		$_SESSION['user_id'] = $data2['user_id'];

		header('Location: index.php');

	}
}



