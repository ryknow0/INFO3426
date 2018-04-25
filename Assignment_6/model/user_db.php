<?php
require('database.php');

function get_users() {
   global $db;
   $query = 'SELECT Firstname, Lastname, Email FROM user';
   $statement = $db->prepare($query);
   $statement->execute();
   $users = $statement->fetchAll();
   $statement->closeCursor();
   return $users;
}

function login($email, $password){
   global $db;
   //
   $query = 'SELECT UserId, Firstname, Lastname, Email FROM user WHERE Email = :email AND Password = md5(:password)';
   //db query gets passed to the prepare function
   $statement = $db->prepare($query);
  
   $statement->bindParam(':email', $email);
   $statement->bindParam(':password', $password);   
   //execute passes the statement (query) and sends it across the connection to the db sever       
   $statement->execute();
   // fetch is cursor runction
   $user = $statement->fetch(PDO::FETCH_BOTH);
   $statement->closeCursor();
   //$user is an aray of 4 elements
   var_dump($user);
   return $user;   
}
