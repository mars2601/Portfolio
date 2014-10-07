<?php get_header(); ?>
	<!-- jQuery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<!-- Fresco -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fresco.js"></script>
	<div class="content">
		<div class="project content_box" itemscope itemtype="http://schema.org/Person">
			<div>
				<?php 
					$post_id = $_GET['post_id'];
					$args = array(
							'post_type' => 'realisations',	
							'p' => $post_id
						);
					$page1 = get_page_by_title( 'realisations' );
					$page_realisation_id = $page1->ID;

					$the_query = new WP_Query( $args );

						if( $the_query->have_posts() ){
							while( $the_query->have_posts() ){
								$the_query->the_post();

								add_image_size( 'apercu', 16, 1250, false );
								//IMG recup
								
								$image2_id = get_field('image2');
								$image2_size = 'apercu';
								$image2_array = wp_get_attachment_image_src($image2_id, $image2_size);
								$image2_url = $image2_array[0];

								$image3_id = get_field('image3');
								$image3_size = 'apercu';
								$image3_array = wp_get_attachment_image_src($image3_id, $image3_size);
								$image3_url = $image3_array[0];

								$dateformatstring = "F, Y";
								$unixtimestamp = strtotime(get_field('date'));

												?>
											<h2><span class="line lt"></span><?php the_title(); ?><span class="line rt"></span></h2>
											<div class="boxes left">
												<div class="image demonstrations">
													<a href='<?php echo $image2_url; ?>' 
													     class='fresco' 
													     data-fresco-group='example' 
													     data-fresco-caption="<?php the_title(); ?>">
															<img src="<?php echo $image2_url; ?>" alt="<?php the_title(); ?>">
													</a>
												</div>
											</div>
											<div class="right">
												<div class="boxes desc">
														<h3 itemprop="about"><?php the_field('sous-titre'); ?></h3>
														<div title="Code: 0xe826" class="the-icons span3"><i class="icon-calendar"></i></div>
														<p class="date" itemprop="dateCreated"><?php echo date_i18n($dateformatstring, $unixtimestamp); ?></p>
														<span class="distand"></span>
														<p itemprop="description"><?php the_content(); ?></p>
														<div class="tag_work_list">
															<div class="tag_work boxes">
																<ul>
																	<?php 
																	$tags = get_the_terms(get_the_ID(), 'tags');
																	$page_tags = '59';
																				foreach($tags as $t) {
																				?>
																					<li>
																						<a itemprop="keywords" alt"<?php echo $t->name; ?>" title="voir les réalisations de <?php echo $t->name; ?>" href="<?php echo get_page_uri( $page_tags ) ?>?tag_id=<?php echo $t->term_id; ?>">
																							<div title="Code:" class="the-icons span3"><i class="icon-<?php echo $t->description ?>"></i></div>
																						<?php echo $t->name; ?></a>
																					</li>
																				<?php
																		}
																	?>
																</ul>
															</div> 
														</div>
												</div>
											</div>
											<div class="boxes left">
												<div class="boxes desc">
														<span class="distand"></span>
														<p itemprop="description"><?php the_field('paragraphe'); ?></p>
														<div class="share">
															<!--<a href="//fr.pinterest.com/pin/create/button/?url=<?php echo the_permalink(); ?>"&media="<?php echo $image2_url; ?>&description=<?php the_title(); ?><?php echo ','.the_field('sous-titre').' Pour plus de créations, visitez '.site_url(); ?>" data-pin-do="buttonPin" data-pin-config="none">-->
																		<!--<img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_28.png" />-->
															<a class="twitter-share-button"
																  href="https://twitter.com/share">
																Tweet
															</a>
														</div>
															<?php if(!empty(get_field('link'))): ?>
																<div class="border_link">
																	<a alt="<?php the_title(); ?>" title="voir le site <?php the_title(); ?>" href="<?php bloginfo('template_url'); ?>/realisations/<?php echo get_field('link'); ?>" target="_blank" class="link works_links">Voir le site</a>
																</div>
															<?php endif; ?>
												</div>
											</div>
											<div class="right">
												<?php if(!empty($image3_url)): ?>
												<div class="image demonstrations">
													<a href='<?php echo $image3_url; ?>' 
														class='fresco' 
													     data-fresco-group='example' 
													     data-fresco-caption="<?php the_title(); ?>">
														<img src="<?php echo $image3_url; ?>" alt="<?php the_title(); ?>">
													</a>
												</div>
												<?php endif; ?>
											</div>
					
				
					
					<?php
					}
				}
				wp_reset_postdata();
				?>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
	</script>
	<!--<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>-->
<?php get_footer(); ?>
