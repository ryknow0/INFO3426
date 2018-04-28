<?php
session_start();
require('../model/calendar_db.php');

//Check and try to get the action value of the post, then from the get
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) { // if no action is pased in teh POST then grab the action from the Get
    //if an action is passes set it to the variable $action
   $action = filter_input(INPUT_GET, 'action');
   if ($action == NULL) {//If action value from GET is null then show the list_calendar view
       $action = 'list_calendar';
   }
}
//Reads all calendar entries
if ($action == 'list_calendar') {//default action if no action is passed
   $user_id=$_SESSION['UserId'];//grabs user id from session

   //sets the results of the get_calendar_entries function (calendar_db.php) 
   //and sets them to associative array $calendars
   $calendars = get_calendar_entries($user_id); //grabs calendar entrie for the user id
   include('calendar_list.php');//inclued the calendar_list.php code/forward
}
else if($action == 'add_first'){//adds event to calendar
    //All of these functions are in the calendar db which associate to db queries
   $event_id = filter_input(INPUT_GET, 'event_id');
   $user_id=$_SESSION['UserId'];
   //$records_added = add_event($event_id, $user_id);//if there is a record added it will return a 1
   $event = get_event_info($event_id);
   $calendars = get_calendar_entries($user_id);
   include('calendar_probability.php');
}
else if($action == 'add_second'){ //if probability is entered then save the data in the db
   $event_id = filter_input(INPUT_POST, 'event_id');
   $probability = filter_input(INPUT_POST, 'probability');
   $user_id=$_SESSION['UserId'];
    //var_dump($probability);
   $added_rows = add_to_calendar($event_id, $user_id, $probability);
   if($added_rows > 0){
       $message = 'New Event Added to Calendar';
   } else{
       $message = 'Event Already Part of Calendar';
   }
   $event = get_event_plan($event_id, $user_id);
   $calendars = get_calendar_entries($user_id);
   include('calendar_addition.php');
}
