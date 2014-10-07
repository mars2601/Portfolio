<?php

/**
* 
*/
class Profil extends Model
{
	private $table = 'users';

	function __construct()
	{
		parent::__construct($this->table);
	}

	function booksUser($user_id){
		$sql = 'SELECT *,books.id as book_id, books.id as book_id
				FROM books 
				LEFT JOIN user_books ON books.id = user_books.book_id
				LEFT JOIN users ON users.id = user_books.user_id
				WHERE users.id = :user_id';
				
		$pds = $this->cx->prepare(sprintf($sql, $this->table)); 
		$pds->execute([':user_id' => $user_id]);
		return $pds->fetchAll();
	}

}
