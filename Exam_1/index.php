<?php 
session_start();

$user_guess = "";
$actual_number = "";
$result = "";
$_SESSION['user_guess']=8;
#var_dump($_SESSION);
$user_guess = filter_input(INPUT_GET, 'user_guess');
$actual_number = filter_input(INPUT_GET, 'actual_number');
#var_dump($_SESSION);
#var_dump($actual_number);
#check that user_guess is in session 
if(isset($_SESSION['user_guess'])){
    #$user_guess = "Your guess was" . $_SESSION['user_guess'] . '<br/>';
    $user_guess = "Your guess was " . $_SESSION['user_guess'] . "<br/>";
    }
    #check that actual_number is insession
    if(isset($_SESSION['actual_number'])){
    #$actual_number="The actual number was" . $_SESSION['actual_number'] .'<br/>' ;
    $actual_number = "The actual number was " . $_SESSION['actual_number'] . "<br/>";
    }
    #check if user gues is the same as actual number
    if($_SESSION['user_guess'] == $_SESSION['actual_number']){
        $result='<div id="result">Way to go you guessed it!<br/></div>';
    }else{
        $result = '<div id="result">Good try, do you want to try again?<br/></div>';
    }
    #var_dump($actual_number);
    #var_dump($user_guess);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Guess a Numer between 1 and 10</h1>
    <div id="page_content">
    
    <form action="guess.php" method="get">
    <?=$user_guess?>
    <?=$actual_number?>
    <?=$result?>
    <input type="text" name="user_guess" size="10"/>
    <input type="submit" value="Submit">
    </div>
    <?php 
    
    ?>
</body>
</html>