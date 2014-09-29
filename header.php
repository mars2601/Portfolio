<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?></title>
    <meta name="description" content="Portfolio de Marcel Pirnay contenant ses projets et réalisations dans le domaine du développement, du web design et">

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />

	<script src="//use.typekit.net/byh7ayf.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<!--<script type="text/javascript" src="./js/canvas.js"></script>-->
	<script type="text/javascript" src="./js/modernizr.js"></script>

</head>
<body>
	<!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<div class="header">
		<?php
			$defaults = array(
				'theme_location'  => 'top',
				'menu'            => 'ul',
				'container'       => 'div',
				'container_class' => 'navbar',
				'container_id'    => '',
				'menu_class'      => 'nav',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			);

			wp_nav_menu( $defaults );
			wp_reset_postdata();

		?>	
	</div>