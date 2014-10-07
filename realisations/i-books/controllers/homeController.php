<?php

/**
* 
*/
class HomeController extends BaseController
{
	
	function __construct()
	{
		# code...
	}
	function index()
	{	
		global $a, $m;

		

			$profil = new Profil;
			if(isset($_SESSION['user_id'])){
				$user_id = $_SESSION['user_id']; 
				$data = $profil->booksUser($user_id);
			}else{
				$data = '';
			}

		$view = 'Menuindex.php';
		return [
				'view' => $view, 	
				'data' => $data 	
		];
	}

}