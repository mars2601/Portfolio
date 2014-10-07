<?php 

ini_set('display_errors','1');

include ('./config.php');
include ('./model.php');







	





if(isset($_GET['content'])){
	$content = $_GET['content'];
}else{
	$content = 'game.php';
}

if ($content == 'classique.php') {
	include('./model/modClassique.php');
}
elseif($content == 'multijoueur.php') {
	include('./model/modMultijoueur.php');
}else{
	$content == 'game.php';
}





include ('./views/layout.php');









