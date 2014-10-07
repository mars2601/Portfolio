<?php

/**
* 
*/
class HomeController extends BaseController
{
	
	function __construct()
	{
		# code...
	}
	function index()
	{	
		global $a, $m;
		
		$data = '';
		$view = 'homeindex.php';
		return [
				'view' => $view, 	
				'data' => $data 	
		];
	}
}