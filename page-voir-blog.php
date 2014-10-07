<?php get_header(); ?>
	<!-- jQuery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<!-- Fresco -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fresco.js"></script>
	<div class="content">
		<div class="blog content_box" itemscope itemtype="http://schema.org/Article">
				<?php 
					$blog_id = $_GET['blog_id'];
					$args = array(
							'post_type' => 'post',
							'p' => $blog_id
						);
					$the_query = new WP_Query( $args );

						if( $the_query->have_posts() ){
							while( $the_query->have_posts() ){
								$the_query->the_post();

								add_image_size( 'apercu', 1633, 1250, false );
								//IMG recup
								
								$image2_id = get_field('image_a_la_une');
								$image2_size = 'apercu';
								$image2_array = wp_get_attachment_image_src($image2_id, $image2_size);
								$image2_url = $image2_array[0];

								$image3_id = get_field('image_additionelle');
									$image3_size = 'apercu';
								$image3_array = wp_get_attachment_image_src($image3_id, $image3_size);
								$image3_url = $image3_array[0];

								$dateformatstring = "F, Y";
								$unixtimestamp = strtotime(get_field('date'));

												?>
									<h2><span class="line lt"></span>Le Blog !<span class="line rt"></span></h2>
									<div class="image demonstrations">
										<a alt="<?php the_title(); ?>" title="agrandir l\'image" href='<?php echo $image2_url; ?>' 
										     class='fresco' 
										     data-fresco-group='example' 
										     data-fresco-caption="<?php the_title(); ?>">
					                        <img itemprop="image" src="<?php echo $image2_url; ?>" alt="<?php the_title(); ?>" height="100" />
					                    </a>
									</div>
					                    
									<section>
										<div class="boxes desc">
										<h3 itemprop="name"><?php the_title(); ?></h3>
										<div title="Code: 0xe826" class="the-icons span3"><i class="icon-calendar"></i></div>
										<time class="time" itemprop="dateCreated" datetime="<?php get_field('date') ?>">Publié le <?php the_date('l j F Y', '<span>', '</span>'); ?></time>
									<span class="distand"></span>
										<p class="choc"><?php the_field('phrasechoc') ?></p>
										<p class="intro" itemprop="articleSection"><?php the_field('introduction') ?></p>
										<p class="contenu" itemprop="articleBody"><?php the_content() ?></p>
										<p class="auteur"><?php the_field('auteur') ?></p>
										<p class="editeur"><?php the_field('editeur') ?></p>
										<p class="sources" ><?php the_field('sources') ?></p>
										<p class="lien">Lien officiel:&nbsp;&nbsp;<a itemprop="url" alt="lien officiel" "voir le lien officiel" href="<?php the_field('lien') ?>"><?php the_field('lien') ?></a></p>
									</section>
					<?php
					}
				}
				wp_reset_postdata();
				?>
		</div>
	</div>
	
    <!--<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.heplbox.js"></script>
        <script>
            jQuery( function() {
                jQuery( '#unique a.thumbnail' ).heplbox();
                jQuery( '#many a.thumbnail' ).heplbox();
            } );
        </script>-->
	<script type="text/javascript">
	window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
	</script>
	<!--<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>-->
<?php get_footer(); ?>
