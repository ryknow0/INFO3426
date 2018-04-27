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
  <link rel="stylesheet" type="text/css" href="../styles.css">
</head>

<!-- the body section -->
<body>
Welcome <?=$first_name?> <?=$last_name?>
<header><h1>The Book Loan System</h1> </header>
