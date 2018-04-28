<!-- Event controller-->
<?php
session_start();
require('../model/event_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL) {
      $action = 'list_events';
  }
}
//check submitted action against list of actions
//triggers upon slecting the "ok" or submit button
if ($action == 'list_events') {
  $events = read_events();//queres the database for events and adds them to an array
  $message = '';
  include('event_list.php');//runs the event_list file that parses over the $events array
}//actions definded on the event_list.php page
else if($action == 'add_event'){
  include('event_add.php');
}
else if($action == 'add_event_data'){//inserts data into the db
  //grab variables ssent to this action (event_add.php) values from form
  $event_name = filter_input(INPUT_POST, 'event_name');
  $event_type = filter_input(INPUT_POST, 'event_type');
  $event_location = filter_input(INPUT_POST, 'event_location');
  $start_time = filter_input(INPUT_POST, 'start_time');
  $end_time = filter_input(INPUT_POST, 'end_time');
  $hours_duration = filter_input(INPUT_POST, 'hours_duration');
  //adds int all the user entered data in the ctreate event function to add the new event to the db
  $records_added = create_event($event_name, $event_type, $event_location, $start_time, $end_time, $hours_duration);
  $message ='';
  var_dump($event_name);
  //displays error messages depending on success of event add
  if($records_added > 0){
    $message = 'Event Added';
  }
  else{
    $message = "Error Adding Event";
    //var_dump($stmt);
  }
  //cretae variable array to hold all the new events
  $events = read_events();//method that will read the events from the db and assigns them as an array $events
  include('event_list.php');
}
else if($action == 'edit_event'){
  include('event_edit.php');//adds the event_edit.php file to the page
}
else if($action == 'edit_event_data'){

}
else if($action == 'delete_event'){
  
}
else if($action == 'delete_event_confirm'){
  include("event_delete_confirm.php");
}
