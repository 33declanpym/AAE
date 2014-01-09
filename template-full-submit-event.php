<?php
/*
Template Name: Full Submit Event
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
					<div class="tha-content" style="height: 670px;">
						<?php
// Initialize variables and set to empty strings
$eventSport=$eventDay=$eventMonth=$eventYear=$eventName=$eventLocation=$eventState=$eventDescription=$eventURL=$eventSpam="";
$eventSportErr=$eventDayErr=$eventMonthErr=$eventYearErr=$eventNameErr=$eventLocationErr=$eventStateErr=$eventDescriptionErr=$eventURLErr=$eventSpamErr="";
$eventAddSuccess="";
$valid = true;

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if ($_SERVER['REQUEST_METHOD']== "POST") {
   //eventSport
   if (empty($_POST["eventSport"])) {
      $eventSportErr = " Event category is required.";
      $valid = false;
   }
   else {
      $eventSport = test_input($_POST["eventSport"]);
   }
   //eventDay
   if (empty($_POST["eventDay"])) {
      $eventDayErr = " Day is required.";
      $valid = false;
   }
   else {
   	  $eventDay = test_input($_POST["eventDay"]);
   }
   //eventMonth
   if (empty($_POST["eventMonth"])) {
      $eventMonthErr = " Month is required.";
      $valid = false;
   }
   else {
   	  $eventMonth = test_input($_POST["eventMonth"]);
   }
   //eventYear
   if (empty($_POST["eventYear"])) {
      $eventYearErr = " Year is required.";
      $valid = false;
   }
   else {
   	  $eventYear = test_input($_POST["eventYear"]);
   }
   //eventName
   if (empty($_POST["eventName"])) {
      $eventNameErr = " Event name is required.";
      $valid = false;
   }
   else {
   	  $eventName = test_input($_POST["eventName"]);
   }
   //eventLocation
   if (empty($_POST["eventLocation"])) {
      $eventLocationErr = " Location is required.";
      $valid = false;
   }
   else {
   	  $eventLocation = test_input($_POST["eventLocation"]);
   }
   //eventState
   if (empty($_POST["eventState"])) {
      $eventStateErr = " State is required.";
      $valid = false;
   }
   else {
   	  $eventState = test_input($_POST["eventState"]);
   }
   //eventDistance
   if (empty($_POST["eventDistance"])) {
      $eventDistanceErr = " Distance is required.";
      $valid = false;
   }
   else {
   	  $eventDistance = test_input($_POST["eventDistance"]);
   }
   //eventDescription
   if (empty($_POST["eventDescription"])) {
      $eventDescriptionErr = " Description is required.";
      $valid = false;
   }
   else {
   	  $eventDescription = test_input($_POST["eventDescription"]);
   }
   //eventURL
   if (empty($_POST["eventURL"])) {
      $eventURLErr = " URL is required.";
      $valid = false;
   }
   else {
   	  $eventURL = test_input($_POST["eventURL"]);
   }
   //eventSpam
   if (empty($_POST["eventSpam"])) {
      $eventSpamErr = " Answer is required.";
      $valid = false;
   }
   else {
   	  $eventSpam = test_input($_POST["eventSpam"]);
   }
   
  //if valid then redirect
  if($valid){
   //header('Location: http://www.activeausevents.com.au/cycling/');
   $eventAddSuccess = "You have successfully added this event; Would you like to add another?";	  
   //exit();
  }
}
//END FORM VALIDATION
?>
	<div class="addevent">
		
	<form action="" method="POST" id="addEventForm" name="addEventForm">
		<span class="errorMsg"><?php echo $eventAddSuccess; ?></span>
		<div class="form-item"><label for="eventSport">Sport:</label>
			<div class="input-wrap">
				<select name="eventSport" id="add_eventSport"><option value="<?php $eventSport ?>"><?php echo empty($eventSport) ? 'Select...' : $eventSport; ?></option>
					<option value="Adventure Racing">Adventure Racing</option>
					<option value="Aquathlon">Aquathlon</option>
					<option value="Cycling">Cycling</option>
					<option value="Duathlon">Duathlon</option>
					<option value="Mountain Bike - XC">Mountain Bike - XC</option>
					<option value="Multisport - General">Multisport - General</option>
					<option value="Open Water Swim">Open Water Swim</option>
					<option value="Orienteering">Orienteering</option>
					<option value="Running">Running</option>
					<option value="Triathlon">Triathlon</option>
				</select>				
				<br />
			</div>
			<b>Select a sport.</b><span class="errorMsg" >* <?php echo $eventSportErr; ?></span><br />
		</div>
		<div class="form-item"><label for="eventDay">Date:</label>
			
			<div class="input-wrap">
				<select name="eventDay" id="add_eventDay">
					<option value="<?php $eventDay ?>"><?php echo empty($eventDay) ? 'dd' : $eventDay; ?></option>
					<option value="1">1</option>
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
				</select><select name="eventMonth" id="add_eventMonth">
					<option value="<?php $eventMonth ?>"><?php echo empty($eventMonth) ? 'Month' : $eventMonth; ?></option>
					<option value="1">January</option>
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
					</select><select name="eventYear" id="add_eventYear"><option value="<?php $eventYear ?>"><?php echo empty($eventYear) ? 'Year' : $eventYear; ?></option>
					<option value="2014">2014</option>
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
				</select>			
			</div>
			<b>Select the event date</b><span class="errorMsg">* <?php echo $eventDayErr; echo $eventMonthErr; echo $eventYearErr; ?></span>
		</div>
		<div class="form-item"><label for="eventName">Event Name:</label>
			<div class="input-wrap"><input name="eventName" type="text" id="add_eventName" size="25" maxlength="75" value="<?php $eventName ?>"/></div>
			<b>Enter the event name</b><span class="errorMsg">* <?php echo $eventNameErr; ?></span>
		</div>
		<div class="form-item"><label for="eventLocation">Location:</label>
			<div class="input-wrap"><input name="eventLocation" type="text" id="add_eventLocation" size="25" maxlength="75" value="<?php $eventLocation ?>"/></div>
			<b>Enter the event location</b><span class="errorMsg">* <?php echo $eventLocationErr; ?></span><br /><span class="item-description">If multiple locations, enter the start location.</span>
		</div>
		<div class="form-item"><label for="eventState">State:</label>
			<div class="input-wrap">
			<select name="eventState" id="add_eventState">
				<option value="<?php $eventState ?>"><?php echo empty($eventState) ? 'Select' : $eventState; ?></option>
				<option value="VIC">VIC</option>
				<option value="NSW">NSW</option>
				<option value="QLD">QLD</option>
				<option value="ACT">ACT</option>
				<option value="TAS">TAS</option>
				<option value="SA">SA</option>
				<option value="WA">WA</option>
				<option value="NT">NT</option>
				<option value="INT">INT</option>
			</select>			
		</div>
		<b>Select the state</b><span class="errorMsg">* <?php echo $eventStateErr; ?></span><br />If outside Australia, select 'INT'.
		</div>
		<div class="form-item"><label for="eventDistance">Distance:</label>
			<div class="input-wrap"><input name="eventDistance" type="text" id="add_eventDistance" size="25" maxlength="75" value="<?php $eventDistance ?>"/></div>
			<b>Enter the race distance</b><span class="errorMsg">* <?php echo $eventDistanceErr; ?></span><br />Use abbreviations if necessary.
		</div>
		<div class="form-item-large"><label for="eventDescription">Description:</label>
			<div class="input-wrap"><textarea name="eventDescription" rows="6" id="add_eventDescription" cols="40" maxlength="300" value="<?php $eventDescription ?>"></textarea></div>
			<b>Enter a brief description of the event.</b><span class="errorMsg">* <?php echo $eventDescriptionErr; ?></span>
		</div>
		<div class="form-item"><label for="eventURL">URL:</label>
			<div class="input-wrap"><input name="eventURL" type="text" id="add_eventURL" value="<?php echo empty($eventURL) ? 'Http://' : $eventURL; ?>" size="25" maxlength="200" /></div>
			<b>Enter the event website address</b><span class="errorMsg">* <?php echo $eventURLErr; ?></span><br />For example, http://www.yourevent.com
		</div>
		<div class="form-item"><label for="eventSpam">What colour is the sky</label>
			<div class="input-wrap"><input name="eventSpam" type="text" size="25" maxlength="75" /></div>
			<b>Anti-Spam</b><span class="errorMsg">* <?php echo $eventSpamErr; ?></span>
		</div>
		<input name="btn_submit" type="submit" id="submit" value="Submit" class="input-submit" />
	</form>
	</div>
					</div>
					<!-- END .panel-block -->
				</div>
			<?php else: ?>
				<p><?php printf ( __('Sorry, no posts matched your criteria.' , THEME_NAME )); ?></p>
			<?php endif; ?>
		</div>
<?php get_footer(); ?>
