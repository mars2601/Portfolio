<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>" />

	<script src="//use.typekit.net/byh7ayf.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<!--<script type="text/javascript" src="./js/canvas.js"></script>-->
	<script type="text/javascript" src="./js/modernizr.js"></script>

</head>
<body>
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
		?>	
	</div>