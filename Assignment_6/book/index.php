<?php
session_start();
require('../model/book_db.php');
//Action controller
//look using a post method nd grab the "action" vaiable
//If we click on books without any action it will just list all the books
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
   if ($action == NULL) {
       $action = 'list_all_books';
   }
}

//saves result in the variable books
if ($action == 'list_all_books') {
   $books = get_all_books();
   include('book_list_all.php');
} else if ($action == 'list_available_books') {
   $books = get_available_books();
   include('book_list_available.php');
}
