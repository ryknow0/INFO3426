<?php
   session_start();
   if ( isset($_SESSION['username']) ) {
       header('Location: index.php');
   }
   $errors='';
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>The Book Loan System Login Page</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/INFO3426/Assignment_6/styles.css">
</head>

<!-- the body section -->
<body>
<br/><br/>
<form action="/user/index.php" method="post">
   Email: <input type="text" name="email" placeholder="Email" size="10">
   Password: <input type="password" name="password" placeholder="Password" size="10">
   <input type="hidden" name="action" value="login"/>
   <input type="submit" value="Submit" />
   <div class="errors"><?=$errors?></div>
</form>

<?php include 'view/footer.php'; ?>