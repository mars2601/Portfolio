<?php get_header(); ?>
	<div class="content">
		<div class="content_box">
			<div class="top_wrapper contact">
				<div class="boxes id">
					<div class="inner_boxes">
						<?php 
							$the_query = new WP_Query( 'pagename=contact' );

							if( $the_query->have_posts() ):
								while( $the_query->have_posts() ):$the_query->the_post();
									echo '<h1>' . get_the_title() .'</h1>';
									echo '<p>' . get_the_content() .'</p>';
								endwhile;
							endif;
							wp_reset_postdata();
						?>
					</div>
				</div>
				<div class="boxes form">
					<div class="inner_boxes">
						<h3>formulaire</h3>
					</div>
				</div>
				<div class="boxes map">
					<div class="inner_boxes">
						<h3>map</h3>
					</div>
				</div>
				<div class="boxes adress">
					<div class="inner_boxes">
						<h3>adresse</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>

