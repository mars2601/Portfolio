<?php
// "plugins" a coder pour le site. 

	ini_set('display_errors', '1');

	add_action('init', 'create_post_types');
	add_action('init', 'create_nav_menu');
	add_action('init', 'create_taxonomy');


	function create_post_types() {
		register_post_type( 'realisations',
			array(
				'labels' => array(
					'name'               => 'Réalisations',
				    'singular_name'      => 'Réalisation',
				    'add_new'            => 'Ajouter',
				    'add_new_item'       => 'Ajouter une nouvelle réalisation',
				    'edit_item'          => 'Modifier une réalisation',
				    'new_item'           => 'Nouvelle réalisation',
				    'all_items'          => 'Toutes les réalisations',
				    'view_item'          => 'Voir la réalisation',
				    'search_items'       => 'Chercher les réalisations',
				    'not_found'          => 'Pas de réalisations trouvés',
				    'not_found_in_trash' => 'Pas de réalisations dans la corbeille',
				    'menu_name'          => 'Réalisations'
				),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
			)
		);
	}

	function create_nav_menu() {
		register_nav_menu('top', 'Menu principal');
	}

	function create_taxonomy(){
		register_taxonomy( 'tags', 'realisations', 
			array( 'hierarchical' => false, 'label' => 'Tags', 'query_var' => true, 'rewrite' => true )
		);
	}


	