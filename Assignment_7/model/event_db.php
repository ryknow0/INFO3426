<?php
require('database.php');

function read_events() {
   global $db;
   $query = 'SELECT EventId, EventName, EventType, EventLocation, StartTime, HoursDuration
             FROM event_tracker.event';
   $stmt = $db->prepare($query);
   $stmt->execute();
   $events = $stmt->fetchAll();
   $stmt->closeCursor();
   return $events;
}

function get_event_type(){
   global $db;
   $query = 'SELECT DISTINCT EventType
             FROM event_tracker.event';
   $stmt = $db->prepare($query);
   $stmt->execute();
   $event_type = $stmt->fetchAll();
   $stmt->closeCursor();
   return $event_type;   
}

function get_event($event_id) {
   global $db;
   $query = 'SELECT EventId, EventName, EventType, EventLocation, StartTime, EndTime, HoursDuration
             FROM event_tracker.event
             WHERE EventId = :eventid';
   $stmt = $db->prepare($query);
   $stmt->bindParam(':eventid', $event_id);
   $stmt->execute();
   $event = $stmt->fetch();
   $stmt->closeCursor();
   return $event;
}

function create_event($event_name, $event_type, $event_location, $start_time, $end_time, $hours_duration){
   global $db;
   
}

function update_event($event_id, $event_name, $event_type, $event_location, $start_time, $end_time, $hours_duration){
   global $db;

}

function delete_event($event_id){
   global $db;
      
}
