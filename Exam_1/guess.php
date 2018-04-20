<?php 
session_start();
#if(!isset($_SESSION['user_guess'])){

#}else {
#    header('Location: index.php');
#}
#get user submited data

$actual_number = random_int(1,10);
$user_guess = filter_input(INPUT_GET, 'user_guess', FILTER_VALIDATE_INT);
#var_dump($user_guess);
#$_SESSION['user_guess']= $user_guess;
$_SESSION['actual_number'] = $actual_number;
#var_dump($actual_number);
header('Location: index.php');

?>
