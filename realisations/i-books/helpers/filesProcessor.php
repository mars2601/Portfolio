<?php

/**
* 
*/
class FilesProcessor
{
	
	function __construct()
	{
		# code...
	}

	public function saveBook($file, $title)
	{
		$nameParts = explode('.', $file['name']);
		$ext = end($nameParts);
		$newName = $title.'.'.$ext;
		move_uploaded_file($file['tmp_name'], COVER_BOOK.$newName);
		return $newName;
	}

	public function saveAuthor($file, $name)
	{
		$nameParts = explode('.', $file['name']);
		$ext = end($nameParts);
		$newName = $name.'.'.$ext;
		move_uploaded_file($file['tmp_name'], COVER_AUTHOR.$newName);
		return $newName;
	}


}