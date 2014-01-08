<?php
/*
Template Name: Full Width Page
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
					</div>
					<!-- END .panel-block -->
				</div>
			<?php else: ?>
				<p><?php printf ( __('Sorry, no posts matched your criteria.' , THEME_NAME )); ?></p>
			<?php endif; ?>
		</div>	
<?php get_footer(); ?>