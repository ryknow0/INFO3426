<?php
require('database.php');
//Prepared statement that gets all users from the db as a PDO
//returns all users as a two dimensional array
//executes PDO ($db)
//closes connection
function get_users() {
   global $db;
   $query = 'SELECT Firstname, Lastname, Email FROM user';
   $statement = $db->prepare($query);
   $statement->execute();
   $users = $statement->fetchAll();
   $statement->closeCursor();
   return $users;
}

//returns user infomation
function login($email, $password){
   global $db;
   //
   $query = 'SELECT UserId, Firstname, Lastname, Email FROM user WHERE Email = :email AND Password = md5(:password)';
   //db query gets passed to the prepare function
   $statement = $db->prepare($query);
  //Binds the values of email and password that gets passed in as part of the querey
   $statement->bindParam(':email', $email);
   $statement->bindParam(':password', $password);   
   //execute passes the statement (query) and sends it across the connection to the db sever       
   $statement->execute();
   // fetch is cursor function
   //the return (PDO) of the query ($statement) gets set to the variable $user
   $user = $statement->fetch(PDO::FETCH_BOTH);//access the return array allows you to use names or numbers to access array items
   $statement->closeCursor();
   //$user is an aray of 4 elements
   var_dump($user);
   return $user;   
}
