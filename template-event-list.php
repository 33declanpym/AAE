<?php
/*
Template Name: event-list
*/	
?>
<?php get_header(); ?>
<?php get_template_part(THEME_INCLUDES.'top'); ?>


<?php wp_reset_query(); ?>
	<div class="main-white-block">
		<div class="main-block full-width">
			<?php if (have_posts()) :  ?>	
				<!-- BEGIN .panel-block -->
				<div class="panel-block">
					<?php if(get_the_title()) { ?><h2><?php the_title();?></h2><?php } ?>
					<div class="tha-content">
						<?php the_content();?>	
						<?php 
						$category = get_the_title(); 
						$events = select_category_events($category);
						$errors = array_filter($events);
						if (empty($errors)) {
							echo "<h2>Sorry there are no events for this category at this time";	
						} else {
							echo "<table>";
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
						}	
						?>
					</div>
					<!-- END .panel-block -->
				</div>
			<?php else: ?>
				<p><?php printf ( __('Sorry, no posts matched your criteria.' , THEME_NAME )); ?></p>
			<?php endif; ?>
		</div>	
<?php get_footer(); ?>