<?php
require('database.php');//includes the db connection code and creates teh PDO object

//gets all of the event calendar entries for a user
function get_calendar_entries($user_id) {
   global $db;
   $query =   'SELECT e.EventId, EventName, StartTime, EventType, 
                      EventLocation, HoursDuration, AttendProbability
               FROM event e JOIN calendar c on e.EventId = c.EventId
               WHERE c.UserId = :userid';//:userid is a placeholder for the variable
   $statement = $db->prepare($query);//takes $db connection data and prepares the query statement
   $statement->bindParam(':userid', $user_id);//sets $user_id to the placeholder
   $statement->execute();//execute the querey
   $calendars = $statement->fetchAll();//grabs the data from the query and assigns to $calendar
   $statement->closeCursor();//closes connection
   return $calendars;
}
//get event info for a given event id
function get_event_info($event_id) {
   global $db;
   $query =   'SELECT EventId, EventName, EventType, EventLocation, StartTime, HoursDuration
               FROM event_tracker.event
               WHERE EventId = :eventid';
   $statement = $db->prepare($query);
   $statement->bindParam(':eventid', $event_id);
   $statement->execute();
   $event = $statement->fetch();
   $statement->closeCursor();
   return $event;   
}

//gets event detail from events of a user
function get_event_plan($event_id, $user_id) {
   global $db;
   $query =   'SELECT e.EventId, EventName, StartTime, EventType, EventLocation, HoursDuration, AttendProbability
               FROM event e JOIN calendar c on e.EventId = c.EventId
               WHERE e.EventId = :eventid AND c.UserId = :userid';
   $statement = $db->prepare($query);
   $statement->bindParam(':eventid', $event_id);
   $statement->bindParam(':userid', $user_id);
   $statement->execute();
   $event = $statement->fetch();
   $statement->closeCursor();
   return $event;   
}
//adds eventid, userid and probablity to user calendar
function add_to_calendar($event_id, $user_id, $probability){
   global $db;//variable declared in the database.php file included above
    //creates a query(INSERT/UPDATE operation)
   $stmt1 = $db->prepare('SELECT CalendarId FROM calendar WHERE EventId = :eventid and UserId = :userid');
   $stmt1->bindParam(':eventid', $event_id);
   $stmt1->bindParam(':userid', $user_id);
   $stmt1->execute();
   $book =  $stmt1->fetch(PDO::FETCH_BOTH);
   $already_in_calendar = $stmt1->rowCount() > 0;
   $stmt1->closeCursor();

   if(!$already_in_calendar){//checks to see if event is NOT in calendar already
       $stmt = $db->prepare('INSERT INTO calendar (UserId, EventId, AttendProbability)
       VALUES (:userid, :eventid, :probability )');

       $stmt->bindParam(':userid', $user_id);
       $stmt->bindParam(':eventid', $event_id);
       $stmt->bindParam(':probability', $probability);
       $stmt->execute();
       return $stmt->rowCount();
   } else{
       return 0;
   }
}
