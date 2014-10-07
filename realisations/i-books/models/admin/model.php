<?php 

	/**
	* 
	*/

	class Model 
	{
		//public -> tout le monde, private -> que la classe, protected --> que la classe et ses enfants
		protected $cx = null;
		private $table = '';
		
		function __construct($table)
		{
			global $options;
			$this->table = $table;

			//Je me connecte au SGBD
			try{
				$this->cx = new PDO(DSN, USERNAME, PASSWORD, $options);
				$this->cx->query('SET CHARACTER SET UTF8');
				$this->cx->query('SET NAMES UTF8');
			}catch(PDOException $e){
				die($e -> getMessage());
			}
		}


		function all()
		{
			$sql = 'SELECT * FROM %s';
			return $this->cx->query(sprintf($sql, $this->table));
		}

		function lastfive()
		{
			$sql = 'SELECT * FROM %s ORDER BY id DESC LIMIT 5';
			return $this->cx->query(sprintf($sql, $this->table));
		}

		function alpha()
		{
			$sql = 'SELECT * FROM %s ORDER BY name ASC';
			return $this->cx->query(sprintf($sql, $this->table));
		}

		function alphaBook()
		{
			$sql = 'SELECT * FROM %s ORDER BY title ASC';
			return $this->cx->query(sprintf($sql, $this->table));
		}

		function unalpha()
		{
			$sql = 'SELECT * FROM %s ORDER BY name DESC';
			return $this->cx->query(sprintf($sql, $this->table));
		}

		function find($id)	
		{
			
			$sql = 'SELECT * FROM %s WHERE id = :id';
			$pds = $this->cx->prepare(sprintf($sql, $this->table)); 
			$pds->execute([':id' => $id]);
			return $pds->fetch(); 
		}
		
		
	}