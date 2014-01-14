<?php
/*
Template Name: event-details
*/	
?>
<?php get_header(); ?>
<?php get_template_part(THEME_INCLUDES.'top'); ?>
<?php wp_reset_query(); ?>
	<div class="main-white-block">
		<div class="main-block full-width">	
			<!-- BEGIN .panel-block -->
			<div class="panel-block">
				<h2><?php the_title(); ?></h2>
				<div class="tha-content">	 
					<?php
					if(get_option(THEME_NAME."_image_size") == "custom") {
						$imageSizeSingle = get_post_meta ($post->ID, THEME_NAME."_image_size", true );
					} else {
						$imageSizeSingle = get_option(THEME_NAME."_image_size");
					}
					if(get_option(THEME_NAME."_show_single_thumb") == "on"  && $singleImage=="show" || !$singleImage) {
						if($imageSizeSingle == "large") {
							$image = get_post_thumb($post->ID,608,280);
							$class = "big";
						} else {
							$image = get_post_thumb($post->ID,250,150);
							$class = "small";
						}
					}
					if(!$image['src'] || $image['show']==false) {
						$image = false;
					}
					?>
					<?php if($image!=false) { ?>
						<div class="article-<?php echo $class;?>-image">
							<img src="<?php echo $image['src'];?>" class="setborder" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
						</div>
					<?php } ?> 
					<?php the_content(); ?>
					<?php
					$eventId = (get_query_var('qml')); //wp uses this as $_GET
					$events = select_event_details($eventId); //Custom function for db interaction to retrieve single even based on id
					$errors = array_filter($events);
					if (empty($errors)) {
						echo "<h2>Go home user, you're drunk. There aint no event here!";	
					} else {
						foreach ($events as $event){
							echo "<table>";
							echo "<tr>";
								echo "<td><b>Category</td>";
								echo "<td>".$event->category."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td><b>Name</td>";
								echo "<td>".$event->name."</td>";
							echo "</tr>";
							echo "<tr>";	
								echo "<td><b>Location</td>";
								echo "<td>".$event->location.", ".$event->state."</td>";
							echo "</tr>";
							echo "<tr>";	
								echo "<td><b>Distance (km)</td>";
								echo "<td>".$event->distance."</td>";
							echo "</tr>";
							echo "<tr>";	
								echo "<td><b>Date</td>";
								echo "<td>".$event->date."</td>";
							echo "</tr>";
							echo "<tr>";	
								echo "<td><b>Details</td>";
								echo "<td>".$event->description."</td>";
							echo "</tr>";
							echo "<tr>";	
								echo "<td><b>Website</td>";
								echo "<td><a href=".$event->website.">Click Here</a></td>";
							echo "</tr>";
							echo "</table>";
						}
					}
					$city = $event->location.",".$event->state.",Australia"; 
					$geoloc = lookup($city);
					$lng = $geoloc['longitude'];
					$lat = $geoloc['latitude'];
					?>
					<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBoIdRuUsuosDkvFARXEAnDxZkQriXCS5Q&sensor=false"></script>
					<script>
						function initialize()
						{
							var mapProp = {
								center:new google.maps.LatLng(<?php echo $lat ?>,<?php echo $lng ?>),
							  	zoom:12,
							  	mapTypeId:google.maps.MapTypeId.ROADMAP
							};
							var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
						}
						google.maps.event.addDomListener(window, 'load', initialize);
					</script>
					<div id="googleMap" style="width:100%;height:380px;"></div>
					<br/>
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- AAE-Long-Banner -->
					<ins class="adsbygoogle" style="display:inline-block;width:927px;height:90px" data-ad-client="ca-pub-5199319293899084" data-ad-slot="8272854787"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
				<!-- END .panel-block -->
			</div>
		</div>	
	</div>
<?php get_footer(); ?>