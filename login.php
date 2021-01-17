<?php
  
require('config/db.php');
require('config/config.php');
include('inc/header.php');

if(isset($_POST['submit'])){
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";  
    $result = mysqli_query($conn, $query);
    $result_check = mysqli_num_rows($result);

    if($result_check > 0 ){
      
      header('location:'.ROOT_URL.'loggedin.php');
        while($row = mysqli_fetch_assoc($result)){
        $_SESSION['username'] = htmlentities($username);
        $_SESSION['userID'] = $row['userID'];
        }
    } else {
        echo 'error'.mysqli_error($conn);
    }
}

//     if($result_check < 0 ){
//         header('location: '.ROOT_URL.'login.php');
//         mysqli_fetch_assoc($result);
//         echo $result;
//     } else {
//         echo 'error'.mysqli_error($conn);
//     }
// }



?>


<div class="container m-2">
<h1>Login</h1>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="">
  <fieldset class="m-1">
    <legend>Sign into your ITLogger account: </legend>
    </div>
    <div class="form-group m-4">
      <label for="username">Username</label>
      <input name="username" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Enter your username">
    </div>
    <div class="form-group m-4">
      <label for="password"> password</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password"></input>
    </div>
    <hr>
    <button name="submit" type="submit" class="btn btn-primary m-4">Submit</button>
  </fieldset>
</form>
<h5 class="m-2">Don't have an account? Sign up  <a href="<? echo ROOT_URL;?>signup.php">here.</a></h5>
  </div>
<?php include('inc/footer.php')?>