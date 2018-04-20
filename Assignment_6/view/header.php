<!-- <!DOCTYPE html>
<html> -->
<!-- the head section -->
<!-- <head>
    <title>RDC My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/INFO3426/assign4/main.css">
</head> -->

<!-- the body section -->
<!-- <body>
<header><h1>My Guitar Shop</h1></header> -->

<?php
   if ( !isset($_SESSION['Email']) ) {
       header("location:loginform.php");
   }
   $first_name = $_SESSION['Firstname'];
   $last_name = $_SESSION['Lastname'];
?>
<!DOCTYPE html>
<html>
<!-- the head section /INFO3426/Assignment_6-->
<head>
  <title>The Book Loan System</title>
  <link rel="stylesheet" type="text/css" href="localhost/INFO3426/Assignment_6/styles.css">
</head>

<!-- the body section -->
<body>
Welcome <?=$first_name?> <?=$last_name?>
<header><h1>The Book Loan System</h1> </header>
       