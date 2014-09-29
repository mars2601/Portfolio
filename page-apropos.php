<?php get_header(); ?>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
        
        <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var myLatlng = new google.maps.LatLng(50.750973, 5.965323); // Plombières
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 9,

                    center: myLatlng

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural","stylers":[{"visibility":"on"},{"color":"blue@"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"blue"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using out element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                var marker = new google.maps.Marker({
				    position: myLatlng,
				    map: mapElement,
				    title:"Hello World!"
				});



				marker.setMap(map);
            }
        </script>
	<div class="content">
			<div class="presentation">
				<div class="contact content_box">
					<h2><span class="line lt"></span>Hello !<span class="line rt"></span></h2>
					<?php 
						$the_query = new WP_Query( 'pagename=apropos' );

						add_image_size( 'apercu', 1662, 1250, false );
						//IMG recup
						$portrait_id = get_field('portrait');
						$portrait_size = 'apercu';
						$portrait_array = wp_get_attachment_image_src($portrait_id, $portrait_size);
						$portrait_url = $portrait_array[0];


						if( $the_query->have_posts() ):
							while( $the_query->have_posts() ):$the_query->the_post();
					?>
					<div class="moi">
						<div class="boxes id">
							<img src="<?php echo $portrait_url; ?>" alt="portrait">
						</div>
						<div class="boxes form">
							<h3><?php echo get_field('h3'); ?></h3>
							<p><?php echo the_content(); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php
			endwhile;
		endif;
		wp_reset_postdata();
		?>
		
	</div>
<?php get_footer(); ?>

