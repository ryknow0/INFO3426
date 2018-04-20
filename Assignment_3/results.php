<?php
#$_SESSION is seperate form get or post but things can be added to session for use and just call teh session_start()
#session_start() gets us access to session variables or values ie username and login status
session_start();
$logged_in = FALSE;
if( !isset($_SESSION['username']) && isset($_SESSION['logged_in']) ){#checks the session values for username and logged_in
    header('Location: index.php?errors=You must be logged in to play the game');#redirect to index.php
}

if( !isset($_SESSION['memero_answer_one']) && isset($_SESSION['memero_answer_two']) ){#checks the session values for username and logged_in
    header('Location: index.php?errors=Please start at the beginning.');#redirect to index.php
}

$user_answer_one = filter_input(INPUT_POST, 'user_answer_one');
$user_answer_two = filter_input(INPUT_POST, 'user_answer_two');
$memero_answer_one = $_SESSION['memero_answer_one'];
$memero_answer_two = $_SESSION['memero_answer_two'];
$outcome_message = '';

if($user_answer_one =+ $memero_answer_one && $user_answer_two == $memero_answer_two){
    $outcome_message = 'You are a genius';
}
else{
    $outcome_messge = 'Keep trying';
}
unset($_SESSION['memero_answer_one']);#clear session data
unset($_SESSION['memero_answer_two']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php include 'header.php'?>
    <div id="data_entry">
        <h1><?=$outcome_message?></h1><!-- display results -->
    </div>
</body>
</html>