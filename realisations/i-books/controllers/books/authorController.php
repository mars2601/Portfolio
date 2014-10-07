<?php 

	/**
	* 
	*/
	class AuthorController extends BaseController
	{
		
		function __construct()
		{
			# code...
		}

		function index(){


			global $a, $m;
			$author = new Author;
			$data = $author->lastfive();
			$alpha = $author->alpha();
			$view = 'authorindex.php';

			return [
				'view' => $view, 	
				'data' => $data,
				'alpha' => $alpha
			];
		}

		function detail(){
			global $a, $m, $cx, $requests;

			$author = new Author;
			if(isset($_GET['author_id'])){
				$id = intval($_GET['author_id']); 
				$data = $author->find($id);
				$data['books'] = $author->books($id);
				$view = 'authordetail.php';

			}else{
				die('Il manque l\'auteur recherché');
			}

			return [
				'view' => $view, 
				'data' => $data
			];

		}

		function edit(){
			if(!$_SESSION['valid']) {
				//si on est pas connecté
				header('Location: index.php');
			}else{
				// si nous sommes bien connecté.
				if(isset($_GET['author_id'])) {
					//et que boo_id est bien définis
					$id = intval($_GET['author_id']);

					$author = new Author;

					$data = $author->find($id);

					/*$author_id = $_POST['author_id'];
					$name = $_POST['name'];
					$first_name = $_POST['first_name'];
					$datebirth = $_POST['datebirth'];*/
					
				
					$view = 'authoredit.php';
				}else{
					die('il manque un author');
				}

				return[
					'view' => $view,
					'data' => $data
				];
			}
		}

		function update(){
			if(!$_SESSION['valid']){
				//si on est pas coonecté
				header('Location: index.php');
			}
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				//si le mode du form est POST
				$author = new Author;
				$datas = [];

				$author_id = $_POST['author_id'];
				$name = $_POST['name'];
				$first_name = $_POST['first_name'];
				$bio = $_POST['bio'];
				$front_cover = '';

				if($_FILES['front_cover']['error'] !== 'UPLOAD_ERR_NO_FILE'){
					$fp = new FilesProcessor;
					$front_cover = $fp->saveAuthor($_FILES['front_cover'], $name);

				}else{
					$theBook = $author->find($author_id);
					$front_cover = $theBook['front_cover'];
				}
				
				$datas = compact("author_id", "name", "first_name", "bio", "front_cover");

				$author->update($datas);
				header('Location: index.php?m=author&a=detail&o=books&author_id='.$author_id);
			}
		}

		function delete(){
			if($_SESSION['valid']){
				//si on est pas coonecté
				header('Location: index.php');
			}
			$book = new Book;
			$book_id = $_GET['book_id'];
			$book->delete($book_id);

			header('Location: index.php?m=book&a=index&o=books');	
		}

		function create(){

			$author = new Author;


			$view = 'authorcreate.php';
			return[
					'view' => $view
				];
		}

		function add(){
			
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				//si le mode du form est POST
				$author = new Author;
				$datas = [];

				$name = $_POST['name'];
				$first_name = $_POST['first_name'];
				$bio = $_POST['bio'];
				$front_cover = '';


				$fp = new FilesProcessor;
				$front_cover = $fp->saveAuthor($_FILES['front_cover'], $name);

				
				$datas = compact("author_id", "name", "first_name", "bio", "front_cover");

				$author->add($datas);

				header('Location: index.php?m=book&a=detail&o=books&book_id='.$book_id);
			}
		}
	}
