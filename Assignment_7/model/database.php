<!-- Makes connection to the db and is used on all db files
Also creates a new PDO object using the login information for db-->
<?php
   mb_internal_encoding('UTF-8');
   mb_http_output('UTF-8');
   mb_http_input('UTF-8');
   mb_regex_encoding('UTF-8');
   $dsn = 'mysql:host=localhost;dbname=book_loan';
   $username = 'phpuser';
   $password = 'pa55word';
  
   try {
       //db = global variable it is declared here and used other plces on the site
       //PDO takes $dsn, $username, and $password as parameters to make a connection with the database
       //PDO passes prepared $statements
       //Xamp makes a connection onthe db port and makes the connection to the specified schema
       $db = new PDO($dsn, $username, $password);
   } catch (PDOException $e) {
       $error_message = $e->getMessage();
       echo 'Error Message ' . $error_message;
       exit();
   }
?>
