<?php
	wp_reset_query();
	$aboutAuthor = get_option(THEME_NAME."_about_author");
	$aboutAuthorSingle = get_post_meta( $post->ID, THEME_NAME."_about_author", true ); 
	$singleImage = get_post_meta( $post->ID, THEME_NAME."_single_image", true );
	$similarPosts = get_option(THEME_NAME."_similar_posts");
	$similarPostsSingle = get_post_meta( $post->ID, THEME_NAME."_similar_posts", true ); 
	
	$user_ID = get_the_author_meta('id');
	$posttags = get_the_tags();
	
	
	$singleBanner = get_option(THEME_NAME."_single_banner");
	$singleBannerCode = get_option(THEME_NAME."_single_banner_code");
	
	$shareAll = get_option(THEME_NAME."_share_all");
	$shareSingle = get_post_meta( $post->ID, THEME_NAME."_share_single", true ); 
?>
					<div class="main-white-block">					
						<div class="main-block<?php OT_content_class($post->ID);?>">
							<?php if (have_posts()) : ?>	
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
										<!-- START NEW CONTENT -->
						<?php 
							$category = get_the_title(); 
							$order = 'date';
							$events = select_category_events($category, $order);
							$errors = array_filter($events);
							if (empty($errors)) {
								echo "";	
							} else {
								ECHO $order;
								echo "<table>";
								echo "<tr>";
									//echo "<td><b>ID</td>";
									echo "<td><b>Category</td>";
									echo "<td><b>Name</td>";
									echo "<td><b>Location</td>";
									echo "<td><b>Date</td>";
									echo "<td><b>Details</td>";
								echo "</tr>";	
								foreach ($events as $event){
									echo "<tr>";
										$newDate = date("d-m-Y", strtotime($event->date));										
										//echo "<td>".$event->id."</td>";
										echo "<td>".$event->category."</td>";
										echo "<td>".$event->name."</td>";
										echo "<td>".$event->location.", ".$event->state."</td>";
										echo "<td>".$newDate."</td>";
										echo "<td>";
										$eventURL = "../event-details/?qml=".$event->id;?>
										<form action="<?php echo $eventURL ?>" method="POST" id="addEventForm" name="addEventForm">
											<input name="btn_submit" type="submit" id="submit" value="View Details" class="input-submit" />
										</form>	</td>	
									</tr><?php
								}	
								echo "</table>";
							}	
						?>
						
						<!-- END NEW CONTENT -->
								<?php if($shareAll == "show" || ($shareAll=="custom" && $shareSingle=="show")) { ?>
									<div class="panel-breaking-line"></div>
									
									<div class="article-socials">
										<b><?php _e("Share this article with friends", THEME_NAME);?></b>
										<div class="social-likes">
											<div class="soc-button soc-button-facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" data-url="<?php the_permalink();?>" class="soc-click ot-share"><span class="text-icon">&#62220;</span><?php _e("FACEBOOK",THEME_NAME);?></a><span class="likes-count"><span class="count">0</span><span class="bullet">&nbsp;</span></span></div>
											<div class="soc-button soc-button-twitter"><a href="#" class="soc-click ot-tweet" data-hashtags="" data-url="<?php the_permalink();?>" data-via="<?php echo get_option(THEME_NAME.'_twitter_name');?>" data-text="<?php the_title();?>"><span class="text-icon">&#62217;</span><?php _e("TWITTER",THEME_NAME);?></a><span class="likes-count"><span class="count">0</span><span class="bullet">&nbsp;</span></span></div>
											<div class="soc-button soc-button-pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if($image['show'] == true) echo $image['src']; ?>&description=<?php the_title(); ?>" data-url="<?php the_permalink();?>" class="ot-pin soc-click"><span class="text-icon">&#62226;</span><?php _e("PINTEREST",THEME_NAME);?></a><span class="likes-count"><span class="count">0</span><span class="bullet">&nbsp;</span></span></div>
											<div class="soc-button soc-button-google"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="ot-pluss soc-click"><span class="text-icon">&#62223;</span><?php _e("GOOGLE+",THEME_NAME);?></a><span class="likes-count"><span class="count"><?php echo OT_plusones(get_permalink());?></span><span class="bullet">&nbsp;</span></span></div>
										</div>
									</div>
								<?php } ?>
										
									</div>
								<!-- END .panel-block -->
								</div>

						
							<?php wp_reset_query(); ?>
							<?php if ( comments_open() ) : ?>
							<!-- BEGIN .panel-block -->
							<div class="panel-block">
								<h2 id="comments"><?php comments_number(__('No Comments', THEME_NAME), __('1 Comments', THEME_NAME), __('% Comments', THEME_NAME)); ?></h2>
								<?php comments_template(); // Get comments.php template ?>
							</div>	
							<?php endif; ?>
							<?php else: ?>
								<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
							<?php endif; ?>
					</div>
					