<?php
require('config/db.php');
require('config/config.php');
include('inc/header.php');

if(isset($_POST['submit'])){
    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    // $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $userID = $_SESSION['userID'];
    var_dump($userID);

    $query = "INSERT INTO posts(userID, title, body) VALUES('$userID','$title', '$body' )";  

    if(mysqli_query($conn, $query)){
        header('location: '.ROOT_URL.'');
    } else {
        echo 'error'.mysqli_error($conn);
    }
}



?>


<div class="container m-2">
<h1>Log Ticket</h1>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="">
  <fieldset class="m-1">
    <legend>Please fill out the form below: </legend>
    </div>
    <!-- <div class="form-group m-4">
      <label for="author">Name</label>
      <input name="author" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Name">
    </div> -->
    <div class="form-group m-4">
      <label for="title">Title</label>
      <input name="title" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Subject">
    </div>
    <div class="form-group m-4">
      <label for="body"> Message:</label>
      <textarea name="body" class="form-control" id="exampleTextarea" rows="3" placeholder="what is the issue?"></textarea>
    </div>
    <hr>
    <button name="submit" type="submit" class="btn btn-primary m-4">Submit</button>
  </fieldset>
</form>
  </div>
<?php include('inc/footer.php')?>