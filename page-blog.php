<?php get_header(); ?>
	<div class="content">
		<div class="blog blog_list content_box">
			<h2><span class="line lt"></span>Le blog !<span class="line rt"></span></h2>
			<div class="blog_list">
				<?php 
					$the_query = new WP_Query( 'post_type=post' );

					if( $the_query->have_posts() ):
						while( $the_query->have_posts() ):
							$the_query->the_post();

						add_image_size( 'apercu_blog', 160, 120, false );
								//IMG recup
								$imageA_id = get_field('image_a_la_une');
								$imageA_size = 'apercu_blog';
								$imageA_array = wp_get_attachment_image_src($imageA_id, $imageA_size);
								$imageA_url = $imageA_array[0];

								$page = get_page_by_title( 'voir-blog' );
								$page_voir_blog_id = $page->ID;
					?>
					<?php echo $image; ?>

					<div class="boxes">
						<div class="date_blog">
							<div title="Code: 0xe826" class="the-icons span3"><i class="icon-calendar"></i></div>
							<time class="time">Publié le <?php the_date('l j F Y', '<span>', '</span>'); ?></time>
						</div>
						<div class="blog_list_content">
							<img src="<?php echo $imageA_url; ?>" alt="<?php the_title(); ?>">
							<section class="blog_item">
								<h3><?php the_title(); ?></h3> 
									<p class="choc"><?php echo the_field('phrasechoc'); ?></p>
									<p class="intro"><?php the_field('introduction'); ?></p>
									<a class="blog_link" href="<?php echo get_page_uri( $page_voir_blog_id ) ?>?post_id=<?php the_ID(); ?>">Lire l'article...</a>
							</section>
						</div>
					</div>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, aucun article à afficher'); ?></p>
				<?php endif;
				wp_reset_postdata();
			 ?>
			</div>
			
		</div>
	</div>
<?php get_footer(); ?>
