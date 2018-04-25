<?php
session_start();
require('../model/checkout_db.php');
mb_internal_encoding('UTF-8');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
   if ($action == NULL) {
       $action = 'list_available_books';
   }
}

if ($action == 'list_available_books') {
   header('location:http://localhost/INFO3426/Assignment_6/index.php?action=list_available_books');
}
else if ($action == 'checkout') {
   $book_id = filter_input(INPUT_GET,'BookId');
   $user_id=$_SESSION['UserId'];//grab session dat from user to limit use to the correct user
  
   if (check_out_book($user_id, $book_id) == 1) {
       $message = 'Booked Successfully Checked out';
   } else{
       $message = 'Booked is Already Checked out';
   }
   $book = get_book_info($book_id);
   $checked_out_books =  get_checked_out_books($user_id);
   include('book_checkout.php');
}
else if($action == 'checked_out_by_user') {
   $user_id = filter_input(INPUT_GET,'UserId');
   $user = get_user_info($user_id);
   $checked_out_books =  get_checked_out_books($user_id);
   include('books_checked_out_by_user.php');
}
