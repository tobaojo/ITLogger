<?php 
session_start();
$name = $_SESSION['name'];
$user_id = $_SESSION['userID'];

// session_unset();

// // destroy the session
// session_destroy();

?>

<h1><h4>Hello <? echo $name?></h4></h1>
<h1><h4>Hello <? echo $user_id?></h4></h1>