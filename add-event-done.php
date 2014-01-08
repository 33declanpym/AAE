<?php
// Initialize variables and set to empty strings
$eventSport=$eventDay=$eventMonth=$eventYear=$eventName=$eventLocation=$eventState=$eventDescription=$eventURL=$eventSpam="";
$eventSportErr=$eventDayErr=$eventMonthErr=$eventYearErr=$eventNameErr=$eventLocationErr=$eventStateErr=$eventDescriptionErr=$eventURLErr=$eventSpamErr="";

if ($_SERVER['REQUEST_METHOD']== "POST") {
   //eventSport
   if (empty($_POST["eventSport"])) {
      $eventSportErr = "Event category is required";
      $valid = false;
   }
   else {
      $eventSport = test_input($_POST["eventSport"]);
   }
   //eventDay
   if (empty($_POST["eventDay"])) {
      $eventDayErr = "Day is required";
      $valid = false;
   }
   else {
   	  $eventDay = test_input($_POST["eventDay"]);
   }
   //eventMonth
   if (empty($_POST["eventMonth"])) {
      $eventMonthErr = "Month is required";
      $valid = false;
   }
   else {
   	  $eventMonth = test_input($_POST["eventMonth"]);
   }
   //eventYear
   if (empty($_POST["eventYear"])) {
      $eventYearErr = "Year is required";
      $valid = false;
   }
   else {
   	  $eventYear = test_input($_POST["eventYear"]);
   }
   //eventName
   if (empty($_POST["eventName"])) {
      $eventNameErr = "Event name is required";
      $valid = false;
   }
   else {
   	  $eventName = test_input($_POST["eventName"]);
   }
   //eventLocation
   if (empty($_POST["eventLocation"])) {
      $eventLocationErr = "Location is required";
      $valid = false;
   }
   else {
   	  $eventLocation = test_input($_POST["eventLocation"]);
   }
   //eventState
   if (empty($_POST["eventState"])) {
      $eventStateErr = "State is required";
      $valid = false;
   }
   else {
   	  $eventState = test_input($_POST["eventState"]);
   }
   //eventDistance
   if (empty($_POST["eventDistance"])) {
      $eventDistanceErr = "Distance is required";
      $valid = false;
   }
   else {
   	  $eventDistance = test_input($_POST["eventDistance"]);
   }
   //eventDescription
   if (empty($_POST["eventDescription"])) {
      $eventDescriptionErr = "Description is required";
      $valid = false;
   }
   else {
   	  $eventDescription = test_input($_POST["eventDescription"]);
   }
   //eventURL
   if (empty($_POST["eventURL"])) {
      $eventURLErr = "URL is required";
      $valid = false;
   }
   else {
   	  $eventURL = test_input($_POST["eventURL"]);
   }
   //eventSpam
   if (empty($_POST["eventSpam"])) {
      $eventSpamErr = "Answer is required";
      $valid = false;
   }
   else {
   	  $eventSpam = test_input($_POST["eventSpam"]);
   }
   
  //if valid then redirect
  if($valid){
   header('Location: http:mywebsite.com/otherAction.php');
   exit();
  }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function is_integer($v) {
  $i = intval($v);
  if ("$i" == "$v") {
    return TRUE;
  } else {
    return FALSE;
  }
}

?>