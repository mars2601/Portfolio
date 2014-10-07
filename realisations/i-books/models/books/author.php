<?php 

class Author extends Model
{
	private $table = 'authors';

	function __construct()
	{
		parent::__construct($this->table);
	}
	function books($id)
	{
		$sql = 'SELECT *, authors.id as author_id
                FROM books 
                LEFT JOIN author_books ON books.id = book_id
                LEFT JOIN authors ON author_id = authors.id
                WHERE authors.id = :author_id';
				
		$pds = $this->cx->prepare(sprintf($sql, $this->table)); 
		$pds->execute([':author_id' => $id]);
		return $pds->fetchAll();
	}

	function update($datas)
	{
		$sql = 'UPDATE %s SET name = :name, first_name = :first_name, front_cover = :front_cover, bio = :bio WHERE id = :author_id';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);

		$inputs = [
			':author_id' => $datas['author_id'],
			':name' => $datas['name'],
			':first_name' => $datas['first_name'],
			':front_cover' => $datas['front_cover'],
			':bio' => $datas['bio']
		];

		$pds->execute($inputs);
	}

	function delete($book_id)
	{
		$sql='DELETE FROM %s WHERE id = :author_id';
		$sql = sprintf($sql, $this->table);

		$pds = $this->cx->prepare($sql);
		$pds->execute([':author_id' => $author_id]);
	}

	function add($datas){
		$sql='INSERT INTO %s SET  name = :name, first_name = :first_name, front_cover = :front_cover, bio = :bio';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);

		$inputs = [
			':name' => $datas['name'],
			':first_name' => $datas['first_name'],
			':front_cover' => $datas['front_cover'],
			':bio' => $datas['bio']
		];

		$pds->execute($inputs);
		$author_id = $this->cx->lastInsertId();

		header('Location: index.php?m=author&a=detail&o=books&author_id='.$author_id);

	}

	
	
}