<!--If you are logged in then the program will progress past the first if statement
if you have not logged in then it will redirect you to the login page -->

<?php
   if ( !isset($_SESSION['Email']) ) {
       header("location:loginform.php");
   }
   $first_name = $_SESSION['Firstname'];
   $last_name = $_SESSION['Lastname'];
?>
<!DOCTYPE html>
<html>
<!-- the head section /INFO3426/Assignment_7-->
<head>
  <title>The Utah County Event Tracker</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/INFO3426/Assignment_7/styles.css">
</head>

<!-- the body section -->
<body>
Welcome <?=$first_name?> <?=$last_name?>
<header><h1>The Utah County Event Tracker</h1> </header>
       