<?php

	
	ini_set('display_errors','1');
	include('config/config.php');
	include(CONFIG_DIR.'routes.php');
	include(CONFIG_DIR.'database.php');
	/*include(MODELS_DIR.'sql.php');*/

	//routage au niveau de l'object (photos,books)
	if(isset($_REQUEST['o'])){
		$ObjectRoutes = $ojectDir[$_REQUEST['o']];
	}else{
		$ObjectRoutes = $ojectDir['default'];
	}

	//demarrage de session
	session_start();

	$_SESSION['valid'] = isset($_SESSION['valid']) ? $_SESSION['valid'] : false;

	

	define('OBJECT_DIR', $ObjectRoutes);

	
	set_include_path(get_include_path().
		':'.dirname(__FILE__).ROUTE_DELIMITER.CONTROLLERS_DIR.OBJECT_DIR. //.dirname(__FILE__) donne le chemin qui viens jusqu'a notre dossier
		':'.dirname(__FILE__).ROUTE_DELIMITER.MODELS_DIR.OBJECT_DIR.
		':'.dirname(__FILE__).ROUTE_DELIMITER.HELPERS_DIR

		);	

	spl_autoload_register( function($class){
		$classConcat = $class;
		include $classConcat . '.php';

	});

	

	if(isset($_REQUEST['a']) && isset($_REQUEST['m'])){

		$route = $_REQUEST['m'].'/'.$_REQUEST['a'];
		if(in_array($route, $routes)){	//vérifier si la chaine ($route) est présente dans l'array de chaines de config/routes.php
			extract($_REQUEST);
		}else{
			
			$route = $routes['default'];
			$routeParts = explode(ROUTE_DELIMITER, $route);
			$a = $routeParts[1];
			$m = $routeParts[0];
		}

	}else{

		$route = $routes['default'];
			$routeParts = explode(ROUTE_DELIMITER, $route);
			$a = $routeParts[1];
			$m = $routeParts[0];
	}

	include(CONTROLLERS_DIR.OBJECT_DIR.$m.'Controller.php');
	$controllerName = ucfirst($m).'Controller';
	$controller = new $controllerName;

	$data = call_user_func([$controller, $a]);	



	//je définis la vue a utiliser pour afficher mon contenu
	include(VIEWS_DIR.'menulayout.php');
