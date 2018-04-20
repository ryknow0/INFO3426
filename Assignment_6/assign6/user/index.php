<?php
session_start();
require('/INFO3426/Assignment_6/model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
   if ($action == NULL) {
       $action = 'list_users';
   }
}

if ($action == 'list_users') {
   $users = get_users();
   include('user_list.php');
}
elseif($action == 'login'){  
   $email = filter_input(INPUT_POST,'email');
   $password = filter_input(INPUT_POST,'password');
   $user = login($email, $password);
   var_dump($user);
   if($user == NULL){
       header("Location: /INFO3426/Assignment_6/loginform.php?errors=Missing login credentials.");
   } else{
       $_SESSION['Email'] = $user['Email'];
       $_SESSION['Firstname'] = $user['Firstname'];
       $_SESSION['Lastname'] = $user['Lastname'];
       $_SESSION['UserId'] = $user['UserId'];
       header('Location: /INFO3426/Assignment_6/index.php');
   }
}
