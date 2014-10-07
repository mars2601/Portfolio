<?php 

	/**
	* 
	*/
	class DateController extends BaseController
	{
		
		function __construct()
		{
			# code...
		}

		function index(){


			global $a, $m;
			$date = new Date;
			$data = $date->triParDate();
			$view = 'dateindex.php';

			return [
				'view' => $view, 	
				'data' => $data,
			];
		}
	}
