<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/* -------------------------------------------------------------------------*
 * 							HOMEPAGE MAIN ARTICLE							*
 * -------------------------------------------------------------------------*/
 
	function homepage_latest_news_block($blockType, $blockId,$blockInputType) {
		global $post;
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$query = array('post_type' => 'post', 'posts_per_page' => $count);
		$my_query = new WP_Query($query);
		$counter = 1;
		$totalCount = $my_query->post_count;
		

?>
							<!-- BEGIN .panel-block -->
							<div class="panel-block">
								<h2><?php _e("Latest News",THEME_NAME);?></h2>
								<div>
								<?php if(get_page_link(get_option('page_for_posts'))) { ?>
									<div class="panel-right-top"><a href="<?php echo get_permalink(get_option('page_for_posts'));?>"><?php _e("view all articles",THEME_NAME);?></a></div>
								<?php } ?>
								<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<?php $rating = get_post_meta($my_query->post->ID, THEME_NAME."_ratings", true ); ?>
									<?php if ($counter==1) { ?>
									<?php $image = get_post_thumb($my_query->post->ID,250,150);  ?>
										<div class="big-article">
											<div class="big-article-image">
												<a href="<?php the_permalink();?>" class="dohover withicon"><img src="<?php echo $image['src'];?>" class="setborder" alt="" title="" /></a>
											</div>
											<div class="big-article-content">
												<h3>
													<a href="<?php the_permalink();?>"><?php the_title();?></a>
													<?php if ( comments_open() ) : ?>
														<a href="<?php the_permalink();?>#comments" class="comment-count">(<?php comments_number('0','1','%'); ?>)</a>
													<?php endif; ?>
												</h3>
												<?php if($rating) { ?>
													<?php
														$ratings = ot_avarage_rating($my_query->post->ID);
													?>
													<div class="star-rating">
														<div class="star-inner" style="width: <?php echo $ratings[0];?>%;"></div>
														<strong><?php echo $ratings[1];?> <?php _e("out of 5", THEME_NAME);?></strong>
													</div>
												<?php } ?>
												<p><?php echo WordLimiter(get_the_content(), 30);?></p>
												<span class="read-more-link"><a href="<?php the_permalink();?>"><?php _e("Read More",THEME_NAME);?><span class="text-icon">&#10150;</span></a></span>
											</div>
											<div class="clear-float"></div>
										</div>
									<?php } else { ?>
										<div class="small-article">
											<h3>
												<a href="<?php the_permalink();?>"><?php the_title();?></a>
												<?php if ( comments_open() ) : ?>
													<a href="<?php the_permalink();?>#comments" class="comment-count">(<?php comments_number('0','1','%'); ?>)</a>
												<?php endif; ?>
											</h3>
											<?php if($rating) { ?>
												<?php
													$ratings = ot_avarage_rating($my_query->post->ID);
												?>
												<div class="star-rating">
													<div class="star-inner" style="width: <?php echo $ratings[0];?>%;"></div>
													<strong><?php echo $ratings[1];?> <?php _e("out of 5", THEME_NAME);?></strong>
												</div>
											<?php } ?>
											<p><?php echo WordLimiter(get_the_content(), 30);?></p>
											<span class="article-date"><?php the_time("H:i d.F Y");?></span>
										</div>
									<?php } ?>	
									<?php if($counter!=$totalCount) { ?>
										<div class="panel-breaking-line"></div>
									<?php } ?>
								<?php $counter++; ?>
								<?php endwhile; else: ?>
									<p><?php printf ( __('No posts were found', THEME_NAME)); ?></p>
								<?php endif; ?>								
								<?php if(get_page_link(get_option('page_for_posts'))) { ?>
									<a href="<?php echo get_permalink(get_option('page_for_posts'));?>" class="panel-big-button"><?php _e("View More Articles",THEME_NAME);?></a>
								<?php } ?>	
								</div>
							<!-- END .panel-block -->
							</div>

<?php
	}
?>


<?php

/* -------------------------------------------------------------------------*
 * 								LATEST GALLERIES							*
 * -------------------------------------------------------------------------*/
 
	function homepage_latest_galleries($blockType, $blockId,$blockInputType) {
		global $post;
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);
		
		$args = array('post_type' => 'gallery', 'showposts' => $count);
		$my_query = new WP_Query($args);
		
		$counter = 1;
		$totalCount = $my_query->post_count;
		

?>
							<!-- BEGIN .panel-block -->
							<div class="panel-block">
								<h2><?php echo $title;?></h2>
								<div>
									<?php if (is_pagetemplate_active("template-gallery.php")) { ?>
										<div class="panel-right-top"><a href="<?php echo get_page_link(get_gallery_page());?>"><?php _e("view all galleries",THEME_NAME);?></a></div>
									<?php } ?>
									<div class="gallery-block">
										
										<a href="#" class="gallery-fade-left text-icon">&#59237;</a>
										<a href="#" class="gallery-fade-right text-icon">&#59238;</a>
										
										<ol class="gallery-slider" style="left:114px;" rel="364">
											<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
												<?php $imageBig = get_post_thumb($my_query->post->ID,350,250); ?>
											<li><a href="<?php the_permalink();?>" class="dohover withicon"><img src="<?php echo $imageBig['src'];?>" class="setborder" alt="<?php the_title();?>" title="<?php the_title();?>" /></a></li>
											<?php endwhile; ?>
											<?php endif; ?>	
										</ol>
										
										<ol class="gallery-slider-navigation">
											<?php for($i=1;$i<=$totalCount;$i++) { ?>
												<li<?php if($i==1) echo ' class="active"';?>><a href="#" data-target="<?php echo $i;?>"></a></li>
											<?php } ?>
										</ol>
										
									</div>
									
									<div class="panel-breaking-line responsive-hide"></div>
									
									<div class="gallery-desc-block">
									
										<ol class="gallery-desc-list">
											<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
												<li<?php if($counter==1) echo ' class="active"';?>><h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3><span><?php echo OT_attachment_count($post->ID);?> <?php _e("photos in this gallery", THEME_NAME);?></span><a href="<?php echo the_permalink();?>" class="button"><span class="text-icon">&#128247;</span><?php _e("View This Gallery", THEME_NAME);?></a></li>
											<?php $counter++; ?>
											<?php endwhile; ?>
											<?php endif; ?>	
										</ol>
										
									</div>
									
								</div>
							<!-- END .panel-block -->
							</div>
<?php
	}
?>


<?php

/* -------------------------------------------------------------------------*
 * 						HOMEPAGE CATEGORY ARTICLE							*
 * -------------------------------------------------------------------------*/
 
	function homepage_latest_video_block($blockType, $blockId,$blockInputType) {
		global $post;
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);
		$catID = get_option(THEME_NAME."_".$blockType."_id_".$blockId);
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $count,
			'cat' => $catID
		);

		$catName = get_category($catID);
		$catUrl = get_category_link($catID);
		$my_query = new WP_Query($args);
		$counter = 0;
		$postCount = $my_query->post_count;

	
	
?>
							<!-- BEGIN .panel-block -->
							<div class="panel-block">
								<h2><?php echo $title;?></h2>
								<div>
									<div class="panel-right-top"><a href="<?php echo get_category_link($catID);?>"><?php _e("view all videos", THEME_NAME);?></a></div>
									<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>	
										<?php if($counter==0 || $counter%3==0) { ?>
											<div class="video-block">
										<?php } ?>
											<?php $image = get_post_thumb($post->ID,180,101); ?>	
											<div class="singe-video">
												<a href="<?php the_permalink(); ?>" class="dohover withvideoicon"><img src="<?php echo $image['src'];?>" class="setborder" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											</div>
										<?php if(($counter+1)%3==0 || ($counter+1)==$postCount) { ?>
											<div class="clear-float"></div>
											</div>
											<?php if(($counter+1)!=$postCount) { ?>
												<div class="panel-breaking-line"></div>
											<?php } ?>
										<?php } ?>
									<?php $counter++; ?>
									<?php endwhile; else: ?>
										<p><?php printf ( __('No posts were found', THEME_NAME)); ?></p>
									<?php endif; ?>	
								</div>
							<!-- END .panel-block -->
							</div>
<?php
	}
?>

<?php

/* -------------------------------------------------------------------------*
 * 						HOMEPAGE CATEGORY ARTICLE 	2						*
 * -------------------------------------------------------------------------*/
 
	function homepage_cat_news_block($blockType, $blockId,$blockInputType) {
		global $post;
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);
		$catID = get_option(THEME_NAME."_".$blockType."_id_".$blockId);
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $count,
			'cat' => $catID
		);

		$catName = get_category($catID);
		$catUrl = get_category_link($catID);
		$my_query = new WP_Query($args);
		$counter = 1;
		$postCount = $my_query->post_count;

	
	
?>
							<!-- BEGIN .panel-block -->
							<div class="panel-block">
								<h2><?php echo $title;?></h2>
								<div>
									<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<?php 
										$rating = get_post_meta($my_query->post->ID, THEME_NAME."_ratings", true );
										$image = get_post_thumb($my_query->post->ID,250,150); 
									?>	
									<div class="big-article">
										<div class="big-article-image">
											<a href="<?php the_permalink();?>" class="dohover withicon"><img src="<?php echo $image['src'];?>" class="setborder" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
										</div>
										<div class="big-article-content">
											<h3>
												<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
												<?php if ( comments_open() ) : ?>
													<a href="<?php the_permalink();?>#comments" class="comment-count">(<?php comments_number('0','1','%'); ?>)</a>
												<?php endif; ?>
											</h3>
											<?php if($rating) { ?>
												<?php
													$ratings = ot_avarage_rating($my_query->post->ID);
												?>
												<div class="star-rating">
													<div class="star-inner" style="width: <?php echo $ratings[0];?>%;"></div>
													<strong><?php echo $ratings[1];?> <?php _e("out of 5", THEME_NAME);?></strong>
												</div>
											<?php } ?>
											<p><?php echo WordLimiter(get_the_content(), 25);?></p>
											<span class="read-more-link"><a href="<?php the_permalink();?>"><?php _e("Read More", THEME_NAME);?><span class="text-icon">&#10150;</span></a></span>
										</div>
										<div class="clear-float"></div>
									</div>
									<?php if($counter!=$postCount) { ?>
										<div class="panel-breaking-line"></div>
									<?php } ?>
									<?php $counter++; ?>
									<?php endwhile; else: ?>
										<p><?php printf ( __('No posts were found', THEME_NAME)); ?></p>
									<?php endif; ?>	
								</div>
							<!-- END .panel-block -->
							</div>

<?php
	}
?>
<?php

/* -------------------------------------------------------------------------*
 * 						HOMEPAGE CATEGORY ARTICLE 	3						*
 * -------------------------------------------------------------------------*/
 
	function homepage_cat_news_block_3($blockType, $blockId,$blockInputType) {
		global $post;
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);
		$catID = get_option(THEME_NAME."_".$blockType."_id_".$blockId);
		$count = 6;

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $count,
			'cat' => $catID
		);

		$catName = get_category($catID);
		$catUrl = get_category_link($catID);
		$my_query = new WP_Query($args);
		$counter = 1;
		$postCount = $my_query->post_count;

	
	
?>
							<!-- BEGIN .panel-block -->
							<div class="panel-block">
								<h2><?php echo $title;?></h2>
								<div>
									<div class="panel-right-top"><a href="<?php echo get_category_link($catID);?>"><?php _e("view all posts from this category", THEME_NAME);?></a></div>
									
									<div class="double-panel">
										<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
											<?php $rating = get_post_meta($my_query->post->ID, THEME_NAME."_ratings", true ); ?>
											<?php if($counter==1) { ?>
												<?php $image = get_post_thumb($post->ID,250,150); ?>
												<div class="left">
													<div class="big-article-image">
														<a href="<?php the_permalink();?>" class="dohover withicon"><img src="<?php echo $image['src'];?>" class="setborder" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
													</div>
													<div class="big-article-content">
														<h3>
															<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
															<?php if ( comments_open() ) : ?>
																<a href="<?php the_permalink();?>#comments" class="comment-count">(<?php comments_number('0','1','%'); ?>)</a>
															<?php endif; ?>
														</h3>
														<?php if($rating) { ?>
															<?php
																$ratings = ot_avarage_rating($my_query->post->ID);
															?>
															<div class="star-rating">
																<div class="star-inner" style="width: <?php echo $ratings[0];?>%;"></div>
																<strong><?php echo $ratings[1];?> <?php _e("out of 5", THEME_NAME);?></strong>
															</div>
														<?php } ?>
														<p><?php echo WordLimiter(get_the_content(),25);?></p>
														<span class="read-more-link"><a href="<?php the_permalink();?>"><?php _e("Read More",THEME_NAME);?><span class="text-icon">&#10150;</span></a></span>
													</div>
												</div>
											<?php } ?>
											<?php if($counter>=2) { ?>
												<?php if($counter==2) { ?>
													<div class="right">
												<?php } ?>	
													<?php $image = get_post_thumb($post->ID,55,40); ?>
													<div class="panel-small-article">
														<div class="article-small-photo">
															<a href="<?php the_permalink();?>" class="dohover"><img src="<?php echo $image['src'];?>" class="setborder" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
														</div>
														<div class="article-small-content">
															<h3>
																<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
																<?php if ( comments_open() ) : ?>
																	<a href="<?php the_permalink();?>#comments" class="comment-count">(<?php comments_number('0','1','%'); ?>)</a>
																<?php endif; ?>
															</h3>
															<?php if($rating) { ?>
																<?php
																	$ratings = ot_avarage_rating($my_query->post->ID);
																?>
																<div class="star-rating margin-no">
																	<div class="star-inner" style="width: <?php echo $ratings[0];?>%;"></div>
																	<strong><?php echo $ratings[1];?> <?php _e("out of 5", THEME_NAME);?></strong>
																</div>
															<?php } ?>
														</div>
														<div class="clear-float"></div>
													</div>
													
													<?php if($counter!=$postCount) { ?>
														<div class="small-breaking-line"></div>
													<?php } ?>	
												<?php if($counter>=2 && $counter==$postCount) { ?>
													</div>
												<?php } ?>	
											<?php } ?>	
										<?php $counter++; ?>
										<?php endwhile; else: ?>
											<p><?php printf ( __('No posts were found', THEME_NAME)); ?></p>
										<?php endif; ?>	
										<div class="clear-float"></div>
										
									</div>
									
								</div>
							<!-- END .panel-block -->
							</div>

<?php
	}
?>



<?php

/* -------------------------------------------------------------------------*
 * 									HTML CODE								*
 * -------------------------------------------------------------------------*/

	function homepage_html($blockType, $blockId,$blockInputType) {
		$text = stripslashes(get_option(THEME_NAME."_".$blockType."_".$blockId));
	?>
	<div class="panel-block"><?php echo $text;?></div>
	<?php
	}
?>

