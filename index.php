<?php get_header(); ?>
	<div class="content">
		<div class="presentation">
			<div class="name_desc content_box">
				<h1>Marcel Pirnay</h1>
				<p class="domain">Web<span>&</span>Graphic<span>&</span>Developpement</p>
			</div>
			<div class="skills content_box">
				<h2><span class="line lt"></span>Mes compétences<span class="line rt"></span></h2>
					<div class="boxes">
						<div class="icon">
							<div title="Code: 0xe80f" class="the-icons span3"><i class="icon-desktop"></i></div>
						</div>
							<h3>Web design</h3>
							<p><span>___</span></br>Des designs unique selon vos besoins et vos attentes. Construisons ensembles votre site internet, et offrez vous une place de choix sur la toile. et offrez vous une place de choix sur la toile.</p>
							<div class="link_skills"><a href="<?php echo (site_url().'/tag/?tag_id=3'); ?>" class="link">En voir plus</a></div>
					</div>
					<div class="boxes">
						<div class="icon">
							 <div title="Code: 0xe80e" class="the-icons span3"><i class="icon-rocket"></i></div>
						</div>
							<h3>Intégration</h3>
							<p><span>___</span></br>Des sites web ergonomiques, accessibles et efficaces pour assurer une performance. Tout cela avec les outils appropriés : (X)HTML, HTML5, SASS/LESS, CSS, JavaScript, Jquery, Wordpress,...</p>
							<div class="link_skills"><a href="<?php echo (site_url().'/tag/?tag_id=6'); ?>" class="link">En voir plus</a></div>
					</div>
					<div class="boxes">
						<div class="icon">
							<div title="Code: 0xe80a" class="the-icons span3"><i class="icon-wrench"></i></div>
						</div>
							<h3>Developpement</h3>
							<p><span>___</span></br>Une Applications, un jeux ou un site spécifique pour mettre en oeuvre un nouveau concept. Désormais tout est possible sur internet et les outils PHP, Laravel, GuntJS, NodeJS, Javascript, SVG, ...</p>
							<div class="link_skills"><a href="<?php echo (site_url().'/tag/?tag_id=8'); ?>" class="link">En voir plus</a></div>
					</div>
					<div class="boxes">
						<div class="icon">
							<div title="Code: 0xe800" class="the-icons span3"><i class="icon-flash"></i></div>
						</div>
							<h3>Graphisme</h3>
							<p><span>___</span></br>N'hésitez pas a me confier votre identité visuelle et vos supports grahique. La première impression que vous donnerez au grand public est imporantante.</p>
							<div class="link_skills"><a href="<?php echo (site_url().'/tag/?tag_id=5'); ?>" class="link">En voir plus</a></div>
					</div>
			</div>
		</div>
		
		<div class="works content_box">
			<h2><span class="line lt"></span>Quelques réalisations <span class="line rt"></span></h2>
			<div class="works_list">
					<?php
						$args = array(
								post_type => "realisations",
								showposts => 4
							);
						$the_query = new WP_Query( $args );
               			if( $the_query->have_posts() ){
							while( $the_query->have_posts() ){
								$the_query->the_post();

								add_image_size( 'apercu', 1662, 1250, false );
								//IMG recup
								$image1_id = get_field('image1');
								$image1_size = 'apercu';
								$image1_array = wp_get_attachment_image_src($image1_id, $image1_size);
								$image1_url = $image1_array[0];

								$page = get_page_by_title( 'voir-realisation' );
								$page_voir_realisation_id = $page->ID;
								$page1 = get_page_by_title( 'realisations' );
								$page_realisation_id = $page1->ID;
								
					?>
					<div class="boxes">
						<section class="works_infos">
							<a class="link" href="<?php echo get_page_uri( $page_voir_realisation_id ) ?>?post_id=<?php the_ID(); ?>">
								<h3><span>//&nbsp;&nbsp;</span><?php the_title(); ?></h3> 
							</a>
							<p><?php the_field('sous-titre'); ?></p>
						</section>
							<img src="<?php echo $image1_url; ?>" alt="<?php the_title(); ?>">
					</div>
					<?php 
							}
						}
				wp_reset_postdata();
				?>
			</div>
				<div class="content_link">
						<div class="border_link">
							<a href="<?php echo get_page_uri( $page_realisation_id ); ?>" class="link works_links">Tous les travaux</a>
						</div>
					</div>
			</div>
			<?php get_footer(); ?>
