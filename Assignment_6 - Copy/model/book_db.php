<?php
require('database.php');

function get_all_books() {
   global $db;
   $query = 'SELECT BookId, Title, Authors FROM book';
   $statement = $db->prepare($query);
   $statement->execute();
   $books = $statement->fetchAll();
   $statement->closeCursor();
   //var_dump($books);
   return $books;
}

function get_available_books() {
   global $db;
   $query = 'SELECT BookId, Title, Authors
   FROM book b
   WHERE BookId NOT IN(select BookId from checkout where ActualReturnDate is NULL)';
   $statement = $db->prepare($query);
   $statement->execute();
   $books = $statement->fetchAll();
   $statement->closeCursor();
   return $books;
}
