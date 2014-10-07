<?php 

/**
* 
*/
class userController extends BaseController
{
	
	function __construct()
	{
		# code...
	}

	function login()
	{
		if($_SESSION['valid']){
			header('Location: index.php');
		}

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			if(isset($_POST['email']) && isset($_POST['password'])) {
				extract($_POST);
				$user = new User;
			if($user->exists($email, $password)) {
				$_SESSION['valid'] = true;
				$data = $user->exists($email, $password);
				
				$data2 = $user->user($email, $password);
				$_SESSION['user_id'] = $data2['user_id'];
				$_SESSION['name'] = ucfirst($data2['name']);
				$_SESSION['first_name'] = ucfirst($data2['first_name']);
				$_SESSION['email'] = $data2['email'];
				$ObjectRoutes = 'admin';


				header('Location: index.php');
			}else{
				$_SESSION['valid'] = false;
				die('vos identifians sont incorrets');
			}
		
		}else{
			die('On essaye de tricher?');
		}
		}else{
			return [
				'data' => null,
				'view' => 'userlogin.php'
			];
		}
		return [
				'data' => $data,
				'data2' => $data2
			];
	}

	public function logout(){
		$_SESSION['valid'] = false;
		printf($_SESSION['valid']);
		session_destroy();

		header('Location: index.php');	
	}

	function add(){
		$user = new User;
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			
			  $this->validate();

		}
	}

	function detail(){
		global $a, $m, $cx, $requests;

			$user = new User;
			if(isset($_SESSION['user_id'])){
				$user_id = $_SESSION['user_id']; 
				$data = $user->findUserBook($user_id);
				$view = 'userdetail.php';
			}

			return [
				'view' => $view, 
				'data' => $data
			];
	}

}


