<?php 

	/**
	* 
	*/
	class EditorController extends BaseController
	{
		
		function __construct()
		{
			# code...
		}

		function index(){
			global $a, $m;
			$editor = new Editor;
			$data = $editor->all();
			$alpha = $editor->alpha();
			$view = 'editorindex.php';

			return [
				'view' => $view, 	
				'data' => $data,
				'alpha' => $alpha 	
			];
		}

		function detail(){
			global $a, $m, $cx, $requests;

			$editor = new Editor;
			if(isset($_GET['editor_id'])){
				$id = intval($_GET['editor_id']); 
				$data = $editor->find($id);
				$data['books'] = $editor->books($id);
				$view = 'editordetail.php';

			}else{
				die('Il manque l\'éditeur recherché');
			}

			return [
				'view' => $view, 
				'data' => $data
			];

		}
	}
