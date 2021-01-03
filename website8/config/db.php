<?php
$conn = mysqli_connect('localhost','root','1234','ITLog');

if(mysqli_connect_error()){
    echo 'Failed to connect'. mysqli_connect_error();
}

?>