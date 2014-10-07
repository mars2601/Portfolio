<?php 

class Date extends Model
{
	private $table = 'books';

	function __construct()
	{
		parent::__construct($this->table);
	}
	function triParDate()
	{
		$sql = 'SELECT *, MONTH(books.datepub) as dateMois, DAY(books.datepub) as dateJour, YEAR(books.datepub) as dateAn, title FROM books ORDER BY datepub ASC';
		return $this->cx->query(sprintf($sql, $this->table));
	}	
}