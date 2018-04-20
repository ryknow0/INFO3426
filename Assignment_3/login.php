<?php 
session_start();
$logged_in = FALSE;
if( !isset($_SESSION['username']) && isset($_SESSION['logged_in']) ){
    header('Location: enter_nums.php');
}
#Get values taht are passed from post not session
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$stay_logged_in = filter_input(INPUT_POST, 'stay_logged_in');
#validation
if($username == NULL || $password == NULL){
    #acts as a return statement and sends the error message in the header
    header('Location: index.php?errors=Missing login credentials.');
} elseif($username != 'first' || $password != 'player'){
    header('Location: index.php?errors=incorrect login credentials.');
} else{
    $_SESSION['username'] = 'first';
    $_SESSION['logged_in'] = TRUE;
    if($stay_logged_in != NULL){#set cookies if check box is checked on login page
        setcookie('username', 'first', strtotime('+1 year'), '/');#makes cookies available to all pages on the server
        setcookie('password', 'player', strtotime('+1 year'), '/');
    }
    header('Location: enter_nums.php');#send user to next page enter_nums.php
}
?>