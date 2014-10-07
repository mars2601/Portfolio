<?php 

	/**
	* 
	*/
	class GenreController extends BaseController
	{
		
		function __construct()
		{
			# code...
		}

		function index(){


			global $a, $m;
			$genre = new Genre;
			$data = $genre->lastfive();
			$alpha = $genre->alpha(); 
			$view = 'genreindex.php';

			return [
				'view' => $view, 	
				'data' => $data,
				'alpha' => $alpha
			];
		}

		function detail(){
			global $a, $m, $cx, $requests;

			$genre = new Genre;
			if(isset($_GET['genre_id'])){
				$id = intval($_GET['genre_id']); 
				$data = $genre->find($id);
				$data['books'] = $genre->books($id);
				$view = 'genredetail.php';

			}else{
				die('Il manque le genre recherché');
			}

			return [
				'view' => $view, 
				'data' => $data
			];

		}
	}
