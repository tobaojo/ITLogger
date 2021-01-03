<?php
require('config/db.php');
require('config/config.php');

if(isset($_POST['submit'])){
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email_address']);


    $query = "INSERT INTO Users(name, username, email_address, password) VALUES('$name', '$username','$email', '$password' )";  

    if(mysqli_query($conn, $query)){
        header('location: '.ROOT_URL.'login.php');
    } else {
        echo 'error'.mysqli_error($conn);
    }
}



?>

<?php include('inc/header.php')?>
<div class="container m-2">
<h1>Sign Up</h1>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="">
  <fieldset class="m-1">
    <legend>Please fill out the form below: </legend>
    </div>
    <div class="form-group m-4">
      <label for="name">Name</label>
      <input name="name" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Name">
    </div>
    <div class="form-group m-4">
      <label for="username">Username</label>
      <input name="username" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Create a username">
    </div>
    <div class="form-group m-4">
      <label for="email_address">Email Address</label>
      <input name="email_adress" type="email" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Enter your Email address">
    </div>
    <div class="form-group m-4">
      <label for="password"> password</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="Create a password"></input>
    </div>
    <div class="form-group m-4">
      <label for="cpassword"> Confirm your password</label>
      <input name="cpassword" type="password" class="form-control" id="password" placeholder="Confirm your password"></input>
    </div>
    <hr>
    <button name="submit" type="submit" class="btn btn-primary m-4">Submit</button>
  </fieldset>
</form>
  </div>
<?php include('inc/footer.php')?>