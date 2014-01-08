<?php
/*
Template Name: event-details
*/	
?>

<?php get_header(); ?>
<?php get_template_part(THEME_INCLUDES.'top'); ?>


<?php wp_reset_query(); ?>
<?php 
add_filter('query_vars', 'add_my_var' );
function add_my_var($qvars) {
   $qvars[] = 'qml';
   return $qvars;
}

?>
<?php  
$postId = get_query_var('qml');
?>
	<div class="main-white-block">
		<div class="main-block full-width">	
				<!-- BEGIN .panel-block -->
				<div class="panel-block">
					<div class="tha-content">	
						<?php  
						var_dump($postId);
						/*$events = select_event_details($postId);
						$errors = array_filter($events);
						if (empty($errors)) {
							echo "<h2>Sorry there are no events for this category at this time";	
						} else {
							
							/*echo "<table>";
							echo "<tr>";
								echo "<td><b>ID</td>";
								echo "<td><b>Category</td>";
								echo "<td><b>Name</td>";
								echo "<td><b>Location</td>";
								echo "<td><b>Details</td>";
							echo "</tr>";	
							foreach ($events as $event){
								echo "<tr>";
									echo "<td>".$event->id."</td>";
									echo "<td>".$event->category."</td>";
									echo "<td>".$event->name."</td>";
									echo "<td>".$event->location.", ".$event->state."</td>";
									echo "<td><a href=".$website."View Details</a></td>";
								echo "</tr>";
							}	
							echo "</table>";
							var_dump($events);
						}	*/
						?>
					</div>
					<!-- END .panel-block -->
				</div>
		</div>	
	</div>
<?php get_footer(); ?>