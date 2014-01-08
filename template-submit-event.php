<?php
/*
Template Name: Add Event Page
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
						<iframe width="600" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $map;?>&amp;iwloc=A&amp;output=embed"></iframe>
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
										
												<h2>Add an Event</h2>
	<div class="addevent">
	<div class="form-header">Please note: All fields are required</div>
	<form action="./add-event-done.php" method="POST" id="addEventForm" name="addEventForm" onsubmit="return checkData();">
		<div class="form-item"><label for="eventSport">Sport:</label>
			<div class="input-wrap">
				<select name="eventSport" id="add_eventSport"><option value="">Select ...</option><option value="Adventure Racing">Adventure Racing</option>
<option value="Aquathlon">Aquathlon</option>
<option value="Cycling">Cycling</option>
<option value="Duathlon">Duathlon</option>
<option value="Mountain Bike - XC">Mountain Bike - XC</option>
<option value="Multisport - General">Multisport - General</option>
<option value="Open Water Swim">Open Water Swim</option>
<option value="Orienteering">Orienteering</option>
<option value="Running">Running</option>
<option value="Triathlon">Triathlon</option>
</select>				<br />
                <a href="" class="displaySecondary">Display this event in multiple categories</a>
                <ul class="multipleCategories">
                	<li><input type="checkbox" name="checked[]" value="Adventure Racing" /><label for="secondaryAdventure Racing">Adventure Racing</label></li><li><input type="checkbox" name="checked[]" value="Aquathlon" /><label for="secondaryAquathlon">Aquathlon</label></li><li><input type="checkbox" name="checked[]" value="Cycling" /><label for="secondaryCycling">Cycling</label></li><li><input type="checkbox" name="checked[]" value="Duathlon" /><label for="secondaryDuathlon">Duathlon</label></li><li><input type="checkbox" name="checked[]" value="Mountain Bike - XC" /><label for="secondaryMountain Bike - XC">Mountain Bike - XC</label></li><li><input type="checkbox" name="checked[]" value="Multisport - General" /><label for="secondaryMultisport - General">Multisport - General</label></li><li><input type="checkbox" name="checked[]" value="Open Water Swim" /><label for="secondaryOpen Water Swim">Open Water Swim</label></li><li><input type="checkbox" name="checked[]" value="Orienteering" /><label for="secondaryOrienteering">Orienteering</label></li><li><input type="checkbox" name="checked[]" value="Running" /><label for="secondaryRunning">Running</label></li><li><input type="checkbox" name="checked[]" value="Triathlon" /><label for="secondaryTriathlon">Triathlon</label></li>                </ul>    	
			</div>
			<b>Select a sport.</b><br />If selecting additional categories, ensure most appropriate sport is selected from top drop down menu.
		</div>
		<div class="form-item"><label for="eventDay">Date:</label>
			
			<div class="input-wrap"><select name="eventDay" id="add_eventDay"><option value="">dd</option><option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select><select name="eventMonth" id="add_eventMonth"><option value="">Month ...</option><option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select><select name="eventYear" id="add_eventYear"><option value="">Year</option><option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
</select>			</div>
			<b>Select the event date</b>
		</div>
		<div class="form-item"><label for="eventName">Event Name:</label>
			<div class="input-wrap"><input name="eventName" type="text" id="add_eventName" size="25" maxlength="75" /></div>
			<b>Enter the event name</b>
		</div>
		<div class="form-item"><label for="eventLocation">Location:</label>
			<div class="input-wrap"><input name="eventLocation" type="text" id="add_eventLocation" size="25" maxlength="75" /></div>
			<b>Enter the event location</b><br /><span class="item-description">If multiple locations, enter the start location.</span>
		</div>
		<div class="form-item"><label for="eventState">State:</label>
			<div class="input-wrap">
			<select name="eventState" id="add_eventState"><option value="">Select ...</option><option value="VIC">VIC</option>
<option value="NSW">NSW</option>
<option value="QLD">QLD</option>
<option value="ACT">ACT</option>
<option value="TAS">TAS</option>
<option value="SA">SA</option>
<option value="WA">WA</option>
<option value="NT">NT</option>
<option value="INT">INT</option>
</select>			</div>
		<b>Select the state</b><br />If outside Australia, select 'INT'.
		</div>
		<div class="form-item"><label for="eventDistance">Distance:</label>
			<div class="input-wrap"><input name="eventDistance" type="text" id="add_eventDistance" size="25" maxlength="75" /></div>
			<b>Enter the race distance</b><br />Use abbreviations if necessary.
		</div>
		<div class="form-item-large"><label for="eventDescription">Description:</label>
			<div class="input-wrap"><textarea name="eventDescription" rows="6" id="add_eventDescription" cols="40" maxlength="300"></textarea></div>
			<b>Enter a brief description of the event.</b>
		</div>
		<div class="form-item"><label for="eventURL">URL:</label>
			<div class="input-wrap"><input name="eventURL" type="text" id="add_eventURL" value="http://" size="25" maxlength="200" /></div>
			<b>Enter the event website address</b><br />For example, http://www.yourevent.com
		</div>
		<div class="form-item"><label for="eventSpam">Is snow hot or cold?</label>
			<div class="input-wrap"><input name="eventSpam" type="text" size="25" maxlength="75" /></div>
			<b>Anti-Spam</b>
		</div>
		<input name="btn_submit" type="submit" id="submit" value="Add Event" class="input-submit" />
	</form>
	</div>

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