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
  $events = read_events();
  $message = '';
  include('event_list.php');
}//actions definded on the event_list.php page
else if($action == 'add_event'){
  include('event_add.php');
}
else if($action == 'add_event_data'){//inserts data into the db

}
else if($action == 'edit_event'){

}
else if($action == 'edit_event_data'){

}
else if($action == 'delete_event'){

}
else if($action == 'delete_event_confirm'){

}
