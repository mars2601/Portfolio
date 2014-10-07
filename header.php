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
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<script src="//use.typekit.net/byh7ayf.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<!--<script type="text/javascript" src="./js/canvas.js"></script>-->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/min/modernizr.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/min/fixedHeader.min.js"></script>
</head>
<body <?php if(is_home()){echo ('onmouseover="positionSouris(event);" onmousemove="positionSouris(event);"');} ?> >
	<!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<div class="header" id="header">
		<a href="<?php echo get_option('home'); ?>">
			<div class="logo"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt=""></div>
		</a>
		<?php
			$defaults = array(
				'theme_location'  => 'top',
				'menu'            => 'ul',
				'container'       => 'nav',
				'container_class' => 'navbar',
				'container_id'    => 'navigation',
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
		<script>
			var n = document.getElementById('navigation');
			n.classList.add('is-closed');
			function navi() {
				if (window.innerWidth<1000 && document.getElementById("toggle-nav")==undefined) {			
					n.insertAdjacentHTML('afterBegin','<button id="toggle-nav"><i class="visually-hidden">Déplier/replier le menu</i></button>');
					t = document.getElementById('toggle-nav');
					t.onclick=function(){ n.classList.toggle('is-closed');}
				} 
				if (window.innerWidth>=1000 && document.getElementById("toggle-nav")) {
					document.getElementById("toggle-nav").outerHTML="";
				}
			}
			navi();
			window.addEventListener('resize', navi);
		</script>
	</div>