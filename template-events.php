<?php
/*
Template Name: Events Page
*/	
?>
<?php get_header(); ?>
<?php get_template_part(THEME_INCLUDES.'top'); ?>
<?php
	wp_reset_query();
	$paged = get_query_string_paged();
	$posts_per_page = get_option(THEME_NAME.'_events_items');

	if($posts_per_page == "") {
		$posts_per_page = get_option('posts_per_page');
	}
	$catSlug = $wp_query->queried_object->slug;
	if(!$catSlug) {
		$title = get_the_title();
		$my_query = new WP_Query(array('post_type' => 'events', 'posts_per_page' => $posts_per_page, 'paged'=>$paged)); 
	} else {
		$title = $wp_query->queried_object->name;
		$my_query = new WP_Query(array('post_type' => 'events', 'posts_per_page' => $posts_per_page, 'paged'=>$paged, 'tax_query' => array(
			array(
				'taxonomy' => 'events-cat',
				'field' => 'slug',
				'terms' => $catSlug
			)
		))); 
	}
	

	$postCount = $my_query->post_count;
	$counter = 1;

?>
					
					<div class="main-white-block">
						
						<div class="main-block<?php OT_content_class($post->ID);?>">
							
							<!-- BEGIN .panel-block -->
							<div class="panel-block">
								<h2><?php echo $title; ?></h2>
								<div>
									<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
									<?php 
										$src = get_post_thumb($post->ID,608,210);
										$date = get_post_meta ($post->ID, THEME_NAME."_datepicker", true );
										$date = strtotime($date);
									?>
										<div class="event-block">
											<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
											
											<a href="<?php the_permalink();?>" class="event-photo dohover withicon">
											<?php if($date) { ?>
												<span class="event-calendar">
													<font class="event-date"><?php echo date("d",$date);?></font>
													<font class="event-month"><?php echo date("F",$date);?> <?php echo date("Y",$date);?></font>
													<font class="event-year"><?php echo date("H:i",$date);?></font>
												</span>
											<?php } ?>
												<span class="event-more"><?php _e("More Information",THEME_NAME);?><span class="icon-text">&#10150;</span></span>
												<img src="<?php echo $src['src'];?>" class="setborder" alt="<?php the_title();?>" title="<?php the_title();?>" />
											</a>
										</div>
										<?php if($postCount!=$counter) { ?>
											<div class="panel-breaking-line"></div>
										<?php } ?>
									<?php $counter++; ?>
									<?php endwhile; ?>
									<?php else : ?>
										<h2><?php _e( 'No events found' , THEME_NAME );?></h2>
									<?php endif; ?>
								</div>
							<!-- END .panel-block -->
							</div>

							
							<?php customized_nav_btns($paged, $my_query->max_num_pages); ?>
							
						</div>
<?php 	
	get_template_part(THEME_INCLUDES."sidebar"); 
	get_footer();
?>