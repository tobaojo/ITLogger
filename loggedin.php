<?php 
require('config/db.php');
require('config/config.php');
include('inc/header.php');
$username = $_SESSION['username'];

?>

<h1><h4>Hello <? echo $username;?></h4></h1>