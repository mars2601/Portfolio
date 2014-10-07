<?php 

class Genre extends Model
{
	private $table = 'genres';

	function __construct()
	{
		parent::__construct($this->table);
	}
	function books($id)
	{
		$sql = 'SELECT *, genres.id as genre_id
                FROM books 
                LEFT JOIN genre_books ON books.id = book_id
                LEFT JOIN genres ON genre_books.genre_id = genres.id
                WHERE genres.id = :genre_id';
				
		$pds = $this->cx->prepare(sprintf($sql, $this->table)); 
		$pds->execute([':genre_id' => $id]);
		return $pds->fetchAll();
	}
}