<?php get_header(); ?>
	<div class="content">
			<div class="works works_list content_box">
			<h2><span class="line lt"></span>Mes réalisations <span class="line rt"></span></h2>
			<div class="tag_work_list">
				<h3>Trier par tags</h3>
				<div class="tag_work boxes">
					<ul>
						<?php 
							$tags = get_terms('tags');
							$page_tags = '59';
							if($tags){
								foreach ($tags as $t) {
									?>
										<li>
											<a alt"<?php echo $t->name; ?>" title="voir les réalisations de <?php echo $t->name; ?>" href="<?php echo get_page_uri( $page_tags ); ?>?tag_id=<?php echo $t->term_id; ?>">
												<div title="Code:" class="the-icons span3"><i class="icon-<?php echo $t->description ?>"></i></div>
											<?php echo $t->name; ?></a>
										</li>
									<?php
								}
							}
						?>
					</ul>
				</div>
			</div>
			<div class="works_list">
				<?php 
						$the_query = new WP_Query( 'post_type=realisations' );

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
				?>
					<div class="boxes">
						<section class="works_infos">
							<a alt="<?php the_title(); ?>" title="voir la réalisation <?php the_title(); ?>" class="link" href="<?php echo get_page_uri( $page_voir_realisation_id ) ?>?post_id=<?php the_ID(); ?>">
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
			
		</div>
	</div>
<?php get_footer(); ?>
