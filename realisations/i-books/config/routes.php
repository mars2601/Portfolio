<?php

// permet de définir les routes autorisées afin qu'on ne puisse pas faire une URL et essayer de charger un fichier
// qui n'existe pas

$routes = [
	'default' => 'home/index',
	'homeindex' => 'home/index',

	//vuesbook

	'bookindex' => 'book/index',
	'bookdetail' => 'book/detail',

	'authorindex' => 'author/index',
	'authordetail' => 'author/detail',

	'editorindex' => 'editor/index',
	'editordetail' => 'editor/detail',

	'genreindex' => 'genre/index',
	'genredetail' => 'genre/detail',

	'dateindex' => 'date/index',
	'datedetail' => 'date/detail',

	//admin

	'userlogin' => 'user/login',
	'userlogout' => 'user/logout',
	'userconnect' => 'user/connect',
	'useradd' => 'user/add',
	'usernew' => 'user/new',

	'profildetail' => 'profil/detail',

	'bookedit' => 'book/edit',
	'bookcreate' => 'book/create',
	'bookadd' => 'book/add',
	'bookdelete' => 'book/delete',
	'bookupdate' => 'book/update',

	'authoredit' => 'author/edit',
	'authorupdate' => 'author/update',
	'authorcreate' => 'author/create',
	'authoradd' => 'author/add',
	'authordelete' => 'author/delete'





];