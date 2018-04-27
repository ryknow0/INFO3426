<!-- login page starts session and grabs/sets the user name-->
<?php
   session_start();
   if ( isset($_SESSION['username']) ) {
       header('Location: http://localhost/INFO3426/Assignment_7/index.php');
   }
   $errors='';
   $errors = filter_input(INPUT_GET,'errors');
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>The Utah County Event Tracker</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/INFO3426/Assignment_7/styles.css">
</head>

<!-- the body section -->
<body>
<br/><br/>
<form action="http://localhost/INFO3426/Assignment_7/user/index.php" method="post">
   Email: <input type="text" name="email" placeholder="Email" size="10">
   Password: <input type="password" name="password" placeholder="Password" size="10">
   <!-- hidden makes the action send via post instead of get -->
   <input type="hidden" name="action" value="login"/>
   <input type="submit" value="Submit" />
   <div class="errors"><?=$errors?></div>
</form>

<?php include 'view/footer.php'; ?>