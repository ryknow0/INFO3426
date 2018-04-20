<?php
#$_SESSION is seperate form get or post but things can be added to session for use and just call teh session_start()
#session_start() gets us access to session variables or values ie username and login status
session_start();
$logged_in = FALSE;
if( !isset($_SESSION['username']) && isset($_SESSION['logged_in']) ){#checks the session values for username and logged_in
    header('Location: index.php?errors=You must be logged in to play the game');#redirect to index.php
}
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
    <?php include 'header.php'; ?>
    <h3>Please enter 5 numbers!</h3>
    <div id="data_entry">
    <form action="questions.php" method="post">
        Number 1: <input type="text" name="one" placeholder="first number" size="10"/><br/>
        Number 2: <input type="text" name="two" placeholder="second number" size="10"/><br/>
        Number 3: <input type="text" name="three" placeholder="third number" size="10"/><br/>
        Number 4: <input type="text" name="four" placeholder="fourth number" size="10"/><br/>
        Number 5: <input type="text" name="five" placeholder="fifth number" size="10"/><br/>
        <input type="submit" value="Submit">
    </form>
    </div>    
</body>
</html>