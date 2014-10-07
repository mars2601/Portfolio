<?php 

	/**
	* 
	*/
	class BookController extends BaseController
	{
		
		function __construct()
		{
			# code...
		}

		function index(){
			global $a, $m;
			$book = new Book;
			$data = $book->lastfive();
			$alpha = $book->alphaBook();
			$view = 'bookindex.php';



			return [
				'view' => $view, 	
				'data' => $data,
				'alpha' => $alpha,
			];
		}

		function detail(){
			global $a, $m, $cx, $requests;
			$myBook = 0;

			$book = new Book;
			if(isset($_GET['book_id'])){
				$id = intval($_GET['book_id']);
				$user_id = $_SESSION['user_id'];
				$data = $book->find($id);
				$data['authors'] = $book->authors($id);
				$data['editors'] = $book->editors($id);
				$data['genres'] = $book->genres($id);

				if($book->existUserBook($user_id, $id) === '1'){
					//c'est mon livre
					$data['exist'] = 1;
				}elseif($book->existUserBook($user_id, $id) === '0'){
					//c'est pas mon livre
					$data['exist'] = 0;
					
				}


				$view = 'bookdetail.php';


			}else{
				die('il manque un livre');
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
				if(isset($_GET['book_id'])) {
					//et que boo_id est bien définis
					$id = intval($_GET['book_id']);

					$book = new Book;
					$author = new Author;

					$data = $book->find($id);
					$data['authors'] = $book->authors($id);
					$data['allAuthors'] = $author->all();

					$view = 'bookedit.php';

				}else{
					die('il manque un book');
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
				$book = new Book;
				$datas = [];

				$book_id = $_POST['book_id'];
				$title = $_POST['title'];
				$summary = $_POST['summary'];
				$authors = $_POST['authors'];
				$front_cover = '';

				if($_FILES['front_cover']['error'] !== 'UPLOAD_ERR_NO_FILE'){
					$fp = new FilesProcessor;
					$front_cover = $fp->saveBook($_FILES['front_cover'], $title);

				}else{
					$theBook = $book->find($book_id);
					$front_cover = $theBook['front_cover'];
				}


				
				$datas = compact("book_id", "title", "summary", "front_cover","autho");

				foreach ($authors as $author_id) {

				$book->update($datas);
				$book->resetAuthors($book_id);

				foreach ($authors as $author_id) {
					$book->attachAuthors(intval($book_id), $author_id);
				}

				header('Location: index.php?m=book&a=detail&o=books&book_id='.$book_id);
				}
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


			$data['allAuthors'] = $author->all();
			$view = 'bookcreate.php';
			return[
					'view' => $view,
					'data' => $data
				];
		}

		function add(){
			
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				//si le mode du form est POST
				$book = new Book;
				$datas = [];

				$title = $_POST['title'];
				$summary = $_POST['summary'];
				$front_cover = '';

				$fp = new FilesProcessor;
				$front_cover = $fp->saveBook($_FILES['front_cover'], $title);
				
				$datas = compact("book_id", "title", "summary", "front_cover", "authors");

				$book->add($datas);
				
			}
		}
	
	}

//fonction générérique a envoyer a book.php
	

	//$book->attach($key1, $key2, $value1, $value2, $table);
