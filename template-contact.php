<?php
/*
Template Name: Contact Page
*/	
?>
<?php get_header(); ?>
<?php get_template_part(THEME_INCLUDES.'top'); ?>

<?php 
	$mail_to = get_option(THEME_NAME."_contact_mail");	
	$singleImage = get_post_meta( $post->ID, THEME_NAME."_single_image", true );
?>

<?php wp_reset_query(); ?>
<?php if($mail_to) { ?>
<?php $map = get_post_meta ($post->ID, THEME_NAME."_map", true );?>
				<?php if($map) { ?>
					<div class="contact-map">
						<iframe width="1000" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $map;?>&amp;iwloc=A&amp;output=embed"></iframe>
					</div>
				<?php } ?>
					<div class="main-white-block">
						<div class="main-block full-width">
						<?php if (have_posts()) :  ?>	
							<!-- BEGIN .panel-block -->
							<div class="panel-block">
								<h2><?php the_title();?></h2>
								<div class="tha-content">
								
									<div class="double-paragraph">
										<div class="left">
											<?php
												$image = get_post_thumb($post->ID,445,220);
												if(get_option(THEME_NAME."_show_single_thumb") == "on"  && $singleImage=="show" || !$singleImage && $image['show']==true) {
											?>
												<img src="<?php echo $image['src'];?>" class="setborder" alt="<?php the_title();?>" title="<?php the_title();?>" />
												<br/>
												<br/>
											<?php } ?>
											<?php the_content();?>
										</div>
										<div class="right">
									
											<div class="success-msg contact-success-block" style="display:none;">
												<span class="text-icon">&#8505;</span>
												<h3><?php _e( 'We recieved Your message!' , THEME_NAME );?></h3>
												<p><?php _e( 'And we will respond as soon as possible' , THEME_NAME );?></p>
											</div>
											<div class="clear-float contact-success-block" style="display:none;"></div>
										
											<form id="writecomment" name="writecomment" class="contact-form" action="">
												<input type="hidden"  name="form_type" value="contact" />
												<p class="comment-form-author">
													<label for="u_name"><?php _e("Nickname:", THEME_NAME);?><span class="required">*</span></label><input type="text" name="u_name" id="contact-name-input" placeholder="<?php _e("Name..", THEME_NAME);?>" title="<?php _e("Nickname", THEME_NAME);?>" />
													<font class="comment-error" id="contact-name-error" style="display:none;"><span class="icon-text">&#9888;</span>&#9888; </span><span class="error-text"></span></font>
												</p>
												<p class="comment-form-email">
													<label for="email"><?php _e("E-mail address:", THEME_NAME);?><span class="required">*</span></label><input type="text" name="email" id="contact-mail-input" placeholder="<?php _e("E-mail address..", THEME_NAME);?>" title="<?php _e("E-mail", THEME_NAME);?>" />
													<font class="comment-error" id="contact-mail-error" style="display:none;"><span class="icon-text">&#9888;</span>&#9888; </span><span class="error-text"></span></font>
												</p>
												<p class="comment-form-text">
													<label for="comment"><?php _e("Message:", THEME_NAME);?></label><textarea name="message" placeholder="<?php _e("Your message..", THEME_NAME);?>" id="contact-message-input"></textarea>
													<font class="comment-error" id="contact-message-error" style="display:none;"><span class="icon-text">&#9888;</span>&#9888; </span><span class="error-text"></span></font>
												</p>
												<p class="form-submit">
													<input onClick="Validate(); return false;" name="submit" type="submit" id="contact-submit" value="<?php printf ( __( 'Send Message' , THEME_NAME ));?>" class="button-blue" />
												</p>
											</form>

											<div class="clear-float"></div>
											
										</div>
										<div class="clear-float"></div>
									</div>
								
								</div>
							<!-- END .panel-block -->
							</div>
							<?php else: ?>
								<p><?php printf ( __('Sorry, no posts matched your criteria.' , THEME_NAME )); ?></p>
							<?php endif; ?>
							<?php } else { echo "<span style=\"color:#000; font-size:14pt;\">You need to set up Your contact mail!</span>"; } ?>
						</div>
						
<?php get_footer(); ?>