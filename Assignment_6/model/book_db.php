<?php
//requires the page to be availabile in order to use this pag
//inculdes the database connection file to enable the page to connect to the database
require('database.php');

//generte sql query to gather the bookId, Title and Authors from the book table
function get_all_books() {
    //$db needs to be declred to be used even though it is a global variable
    //refers to variable delcared outside of the function
   global $db;
   //read the results of the query into the arry of arrays
   //each item from teh array is a row from the table
   $query = 'SELECT BookId, Title, Authors FROM book';
   $statement = $db->prepare($query);
   $statement->execute();
   $books = $statement->fetchAll();
   $statement->closeCursor();
   //var_dump($books);
   return $books;
}

function get_available_books() {
    //use global key word that allows a variable to be used that was declared out side of the function
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
