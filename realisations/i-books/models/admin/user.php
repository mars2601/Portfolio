<?php

/**
* 
*/
class User extends Model
{
	private $table = 'users';

	function __construct()
	{
		parent::__construct($this->table);
	}
	function exists($email, $password){
		//retourne un booléen
		$sql='SELECT COUNT(id) as count, id as user_id FROM %s WHERE email = :email AND password = :password';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$pds->execute([':email' => $email, ':password' => sha1($password)]);
		$res = $pds->fetch();
		return $res['count'];

		$sql1 = 'SELECT id as user_id FROM %s WHERE email = :email AND password = :password';
		$sql1 = sprintf($sql1, $this->table);
		$pds1 = $this->cx->prepare($sql1);
		$pds1->execute([':email' => $email, ':password' => sha1($password)]);
		return $pds1->fetch();
	}

	function add($datas){
		$sql ='INSERT INTO %s SET first_name = :prenom, name = :nom, password = :password, email = :email';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);

		$inputs = [
			':prenom' => $datas['prenom'],
			':nom' => $datas['nom'],
			':password' => sha1($datas['password']),
			':email' => $datas['email']
		];

		$pds->execute($inputs);
	}

	function user($email, $password){
		$sql = 'SELECT *, users.id as user_id FROM %s WHERE email = :email AND password = :password';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$pds->execute([':email' => $email, ':password' => sha1($password)]);
		return $pds->fetch();
	}

	function usernew(){
		$sql = 'SELECT *, id as user_id FROM %s WHERE users.id = :user_id';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$user_id = $this->cx->lastInsertId();
		$pds->execute([':user_id' => $user_id]);
		return $pds->fetch();
	}

	function findUserBook($user_id){
		$sql = 'SELECT *,books.id as book_id
				FROM books 
				LEFT JOIN user_books ON books.id = user_books.book_id
				LEFT JOIN users ON users.id = user_books.user_id
				WHERE users.id = :user_id';
				
		$pds = $this->cx->prepare(sprintf($sql, $this->table)); 
		$pds->execute([':user_id' => $user_id]);
		return $pds->fetchAll();
	}

	
}
