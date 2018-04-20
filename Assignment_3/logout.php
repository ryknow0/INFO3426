<?php
session_start();
setcookie('username','first',strtotime('-1 year'));
setcookie('password','player',strtotime('-1 year'));
session_destroy();
header('location:index.php');
?>
