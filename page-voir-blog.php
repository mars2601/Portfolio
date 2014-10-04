<?php get_header(); ?>
	<div class="content">
		<div class="blog content_box">
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
									<div id="unique" class="image clearfix">
										<a href="<?php echo $image2_url; ?>" class="thumbnail">
					                        <img src="<?php echo $image2_url; ?>" alt="<?php the_title(); ?>" height="100" />
					                    </a>
									</div>
					                    
									<section>
										<div class="boxes desc">
										<h3><?php the_title(); ?></h3>
										<div title="Code: 0xe826" class="the-icons span3"><i class="icon-calendar"></i></div>
										<time class="time">Publié le <?php the_date('l j F Y', '<span>', '</span>'); ?></time>
									<span class="distand"></span>
										<p class="choc"><?php the_field('phrasechoc') ?></p>
										<p class="intro"><?php the_field('introduction') ?></p>
										<p class="contenu"><?php the_content() ?></p>
										<p class="auteur"><?php the_field('auteur') ?></p>
										<p class="editeur"><?php the_field('editeur') ?></p>
										<p class="sources"><?php the_field('sources') ?></p>
										<p class="lien">Lien officiel:&nbsp;&nbsp;<a href="<?php the_field('lien') ?>"><?php the_field('lien') ?></a></p>
									</section>
					<?php
					}
				}
				wp_reset_postdata();
				?>
		</div>
	</div>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.heplbox.js"></script>
        <script>
            jQuery( function() {
                jQuery( '#unique a.thumbnail' ).heplbox();
                jQuery( '#many a.thumbnail' ).heplbox();
            } );
        </script>
	<script type="text/javascript">
	window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
	</script>
	<!--<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>-->
<?php get_footer(); ?>
