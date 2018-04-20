<?php
require('database.php');
function get_books_checked_out() {
   global $db;
   $query = 'SELECT u.FirstName, u.LastName, b.Title,  co.CheckoutDate
   FROM checkout co JOIN book b on co.BookId = b.BookId JOIN user u on co.UserId = u.UserId
   WHERE ActualReturnDate is NULL';
   $statement = $db->prepare($query);
   $statement->execute();
   $books = $statement->fetchAll();
   $statement->closeCursor();
   return $books;
}
function check_out_book($user_id, $book_id) {
   global $db;
   $stmt1 = $db->prepare('SELECT BookId from  checkout WHERE BookId = :bookid');
   $stmt1->bindParam(':bookid', $book_id);
   $stmt1->execute();
   $book =  $stmt1->fetch(PDO::FETCH_BOTH);
   $already_checked_out = $stmt1->rowCount() > 0;
   $stmt1->closeCursor();

   if(!$already_checked_out){
       $stmt = $db->prepare("INSERT INTO checkout (UserId, BookId, CheckoutDate, DueDate)
       VALUES (:userid, :bookid, now(), now()+ INTERVAL 45 DAY )");
       $stmt->bindParam(':userid', $user_id);
       $stmt->bindParam(':bookid', $book_id);
       $stmt->execute();
       return $stmt->rowCount();
   } else{
       return 0;
   }
}
function get_book_info($book_id) {
   global $db;
   $stmt = $db->prepare('SELECT b.BookId, b.Title, b.Authors, c.CheckoutDate, c.DueDate from Book b JOIN checkout c on b.BookId=c.BookId WHERE b.BookId = :bookid');
   $stmt->bindParam(':bookid', $book_id);
   $stmt->execute();
   $book =  $stmt->fetch(PDO::FETCH_BOTH);
   $stmt->closeCursor();
   return $book;
}
function get_checked_out_books($user_id){
   global $db;
   $query = 'SELECT b.BookId, b.Title, b.Authors, c.CheckoutDate, c.DueDate
   from Book b JOIN checkout c on b.BookId=c.BookId JOIN user u on c.UserId = u.UserId
   WHERE u.UserId = :userid';
   $stmt = $db->prepare($query);
   $stmt->bindParam(':userid', $user_id);
   $stmt->execute();
   $checked_out_books =  $stmt->fetchAll(PDO::FETCH_BOTH);
   $stmt->closeCursor();
   return $checked_out_books;   
}
function get_user_info($user_id){
   global $db;
   $query = 'SELECT UserId, Firstname, Lastname, Email FROM user WHERE UserId = :userid';
   $statement = $db->prepare($query);
   $statement->bindParam(':userid', $user_id);         
   $statement->execute();
   $user = $statement->fetch(PDO::FETCH_BOTH);
   $statement->closeCursor();
   return $user;
}
