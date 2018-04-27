<?php
session_start();
require('../model/user_db.php');

//Controller that grabs post data
//Checks if an 'action' has been passed as a POST parameter
//Default action lists users if no other action is passed (users_db)
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
   if ($action == NULL) {
       $action = 'list_users';
   }
}

//If action is get_users then inculde it
if ($action == 'list_users') {
   $users = get_users();
   include('user_list.php');
}
elseif($action == 'login'){  //pushes the action out using POST
   $email = filter_input(INPUT_POST,'email');//takes submit infor from web form from POSt value
   $password = filter_input(INPUT_POST,'password');
   //runs login function (user_db.php) and returns all information as the variable $user
   $user = login($email, $password);//login function is in the model folder/user db.
   //var_dump($user);
   if($user == NULL){ // if there are no matching results then the result is NULL
       header("Location: /INFO3426/Assignment_7/loginform.php?errors=Missing login credentials.");
   } else{//adds user information to seesion variables
       $_SESSION['Email'] = $user['Email'];
       $_SESSION['Firstname'] = $user['Firstname'];
       $_SESSION['Lastname'] = $user['Lastname'];
       $_SESSION['UserId'] = $user['UserId'];
       header('Location: /INFO3426/Assignment_7/index.php');//sends bck to the home page
   }
}
