<?php
require('database.php');

function get_waitlists() {
   global $db;
   $query = 'SELECT u.FirstName, u.LastName, b.Title,  wl.ListPosition
   FROM waiting_list wl
   JOIN book b on wl.BookId = b.BookId
   JOIN user u on wl.UserId = u.UserId
   WHERE WaitTerminatedDate is NULL';
   $statement = $db->prepare($query);
   $statement->execute();
   $books = $statement->fetchAll();
   $statement->closeCursor();
   return $books;
}
