<?php
#$_SESSION is seperate form get or post but things can be added to session for use and just call teh session_start()
#session_start() gets us access to session variables or values ie username and login status
session_start();
$logged_in = FALSE;
if( !isset($_SESSION['username']) && isset($_SESSION['logged_in']) ){#checks the session values for username and logged_in
    header('Location: index.php?errors=You must be logged in to play the game');#redirect to index.php
}
#set variables for page gotten from post
#gra
$number_one = filter_input(INPUT_POST, 'one', FILTER_VALIDATE_INT);
$number_two = filter_input(INPUT_POST, 'two', FILTER_VALIDATE_INT);
$number_three = filter_input(INPUT_POST, 'three', FILTER_VALIDATE_INT);
$number_four = filter_input(INPUT_POST, 'four', FILTER_VALIDATE_INT);
$number_five = filter_input(INPUT_POST, 'five', FILTER_VALIDATE_INT);
$number_sum_total = $number_one + $number_two + $number_three + $number_four + $number_five;
$number_product_total = $number_one + $number_two * $number_three * $number_four * $number_five;

#questions that are in a question array accessed using 0-4
$question = array();
$question[] = 'What was the third number?';
$question[] = 'If you added up your numbers, what would be the total?';
$question[] = 'If you multiplied all your numbers, what would be the total?';
$question[] = 'What was the second number?';
$question[] = 'What was the fourth number?';

#Answers for questions in the question array
$question_answers = array();
$question_answers['What was the third number?'] = $number_three;
$question_answers['If you added up your numbers, what would be the total?'] = $number_sum_total;
$question_answers['If you multiplied all your numbers, what would be the total?'] = $number_product_total;
$question_answers['What was the second number?'] = $number_two;
$question_answers['What was the fourth number?'] = $number_four;

#using random int function
#can be 0-4
#while loop is insuring that no two random numbers are generated so that the player
#doses not get the same question twice
$random_one = random_int(0,4);
$random_two = random_int(0,4);
while($random_one == $random_two){
   $random_two = random_int(0,4);
}
#questions to be displayed
$question_one = $question[$random_one];
$question_two = $question[$random_two];
#answers to be displayed references the session information
$_SESSION['memero_answer_one'] = $question_answers[$question_one];#question is used as a key to the answer
$_SESSION['memero_answer_two'] = $question_answers[$question_two];#setting memero_answer_two as a session variable to be used later
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
    <form action="results.php" method="post"><!--calls results.php -->
    <?=$question_one?> <input type="text" name="user_answer_one" size="7"/><br/><!--displays the questions and takes inpu as user-answer_one -->
    <?=$question_two?> <input type="text" name="user_answer_two" size="7"/><br/>
    <input type="submit" value="Submit">
</body>
</html>