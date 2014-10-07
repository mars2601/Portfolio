<?php

//modele va chercher dans la base de donnée

/**
* 
*/

class Book extends Model
{
	private $table = 'books';

	function __construct()
	{
		parent::__construct($this->table);	
	}
	function authors($id)
	{
		$sql = 'SELECT *,authors.front_cover as front_cover, authors.id as author_id
				FROM authors 
				LEFT JOIN author_books ON authors.id = author_id
				LEFT JOIN books ON book_id = books.id
				WHERE books.id = :book_id';
				
		$pds = $this->cx->prepare(sprintf($sql, $this->table)); 
		$pds->execute([':book_id' => $id]);
		return $pds->fetchAll();
	}
	function editors($id)
	{
		$sql = 'SELECT * FROM editors 
				LEFT JOIN books ON editors.id = editor_id
				WHERE books.id = :book_id';
				
		$pds = $this->cx->prepare(sprintf($sql, $this->table)); 
		$pds->execute([':book_id' => $id]);
		return $pds->fetchAll();
	}
	function genres($id)
	{
		$sql = 'SELECT *, genres.id as genre_id
				FROM genres 
				LEFT JOIN genre_books ON genres.id = genre_id
				LEFT JOIN books ON book_id = books.id
				WHERE books.id = :book_id';
				
		$pds = $this->cx->prepare(sprintf($sql, $this->table)); 
		$pds->execute([':book_id' => $id]);
		return $pds->fetchAll();
	}

	function update($datas)
	{
		$sql = 'UPDATE %s SET title = :title, summary = :summary, front_cover = :front_cover WHERE id = :book_id';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);

		$inputs = [
			':book_id' => $datas['book_id'],
			':title' => $datas['title'],
			':summary' => $datas['summary'],
			':front_cover' => $datas['front_cover']
		];

		$pds->execute($inputs);
	}
	function attachAuthors($id, $author_id)
	{
			$sql='INSERT INTO author_books (author_id, book_id) VALUES (%d,%d)';

			$pds = $this->cx->prepare($sql);
			$pds->execute([':author_id' => $author_id, 'book_id' => $id]);
			$this->cx->exec(sprintf($sql, $author_id, $id));

			
	}

	function resetAuthors($book_id)
	{
		$sql = 'DELETE FROM author_books WHERE book_id=:book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute(['book_id' => $book_id]);
		return $pds->fetch();
	}

	function attachUsers($book_id, $user_id)
	{
			$sql='INSERT INTO user_books (user_id, book_id) VALUES (%d,%d)';

			$pds = $this->cx->prepare($sql);
			$pds->execute(['user_id' => $user_id, 'book_id' => $book_id]);
			$this->cx->exec(sprintf($sql, $user_id, $book_id));
	}

	function delete($book_id)
	{
		$sql='DELETE FROM %s WHERE id = :book_id';
		$sql = sprintf($sql, $this->table);

		$pds = $this->cx->prepare($sql);
		$pds->execute([':book_id' => $book_id]);
	}

	function add($datas){
		$sql='INSERT INTO %s SET  title = :title, summary = :summary, front_cover = :front_cover';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);

		$inputs = [
			':title' => $datas['title'],
			':summary' => $datas['summary'],
			':front_cover' => $datas['front_cover']
		];
		if(isset($_POST['authors'])){
			$authors = $_POST['authors'];
		}
		$pds->execute($inputs);
		$book_id = $this->cx->lastInsertId();

		$user_id = $_SESSION['user_id'];
		$this->attachUsers($book_id, $user_id);

		if(isset($_POST['authors'])){
			foreach ($authors as $author_id) {
					$this->attachAuthors(intval($book_id), $author_id);
				}	
		}
		

		header('Location: index.php?m=book&a=detail&o=books&book_id='.$book_id);

	}

	function existUserBook($user_id, $id){
		$sql = 'SELECT COUNT(books.id) as count
				FROM books 
				LEFT JOIN user_books ON books.id = user_books.book_id
				LEFT JOIN users ON users.id = user_books.user_id
				WHERE users.id = :user_id AND books.id = :id';
				
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$pds->execute([':user_id' => $user_id, ':id' => $id]);
		$res = $pds->fetch();
		return $res['count'];
	}
}

//fonnction génériques a placer dans model.php

/*public function attach($key1, $key2, $value1, $value2, $table)
{
	$sql = 'INSERT INTO %s(%s, %s) VALUES (:value1, :value2)';
	$sql = sprintf($sql, $table, $key1, $key2);
	$pds = $this->cx->prepare($sql);
	$pds->execute([':value1' => $value1, ':value2' => $value2]);
}

*/













