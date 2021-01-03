<?php 
session_start();
$name = $_SESSION['name'];

?>

<h1><h4>Hello <? echo $name?></h4></h1>