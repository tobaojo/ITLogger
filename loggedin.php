<?php 
require('config/db.php');
require('config/config.php');
include('inc/header.php');
$username = $_SESSION['username'];
$user_id = $_SESSION['userID'];

?>

<h4>Hello <? echo $username;?></h4>
<h5>Hello <?echo $user_id;?></h5>
