<?php
	

	define('DSN','mysql:host=localhost;dbname=library');  
	define('USERNAME','root');
	define('PASSWORD','root');

	$option = [
		PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
		PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
	]; 
	



