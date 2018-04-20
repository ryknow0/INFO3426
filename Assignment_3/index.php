<?php
#$_SESSION is seperate form get or post but things can be added to session for use and just call teh session_start()
session_start();
$logged_in = FALSE;
if( !isset($_SESSION['username']) && isset($_SESSION['logged_in']) ){#checks the session values for username and logged_in
    $logged_n = TRUE;#if username and login is set then the user is considered logged_in
}
$errors = filter_input(INPUT_GET, 'errors'); #grabb error out of get and set it to $errors
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcom to Memero</title>
</head>
<body>
    <?php include 'header.php' ?><!--includes the header written in header.php on this page -->
    <h3> Master your memory, math and mind with memero</h3>
    <?php if ($logged_in) {?><!-- can start the php in line then -->
    <a href="enter_nums.php">Click to begin</a>
    <a href="logout.php">Logout</a>
    <?php  } else { ?><!--if we are logged (if the statement is true) then display these links -->
        <div id="data_entry">
            <form action="login.php" method="post"><!-- when form is submitted then it will send the data via POST to login.php-->
            Username: <input type="text" name="username" placeholder="username" size="10">
            Password: <input type="password" name="password" placeholder="password" size="10">
            <input type="checkbox" name="stay_logged_in">Stay logged in?
            <input type="submit" value="Submit">
            <div class="errors"><?=$errors?></div>
            </form>
        </div>
    <?php } ?>
</body>
</html>