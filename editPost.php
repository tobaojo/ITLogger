<?php
require('config/db.php');
require('config/config.php');

if(isset($_POST['submit'])){
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $query = "UPDATE posts SET 
    title = '$title',
    author='$author',
    body = '$body'
    WHERE id ={$update_id}
    ";  

    if(mysqli_query($conn, $query)){
        header('location: '.ROOT_URL.'');
    } else {
        echo 'error'.mysql_error($conn);
    }
}
$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "SELECT * FROM posts WHERE id=".$id;

$res = mysqli_query($conn, $query);

$post = mysqli_fetch_assoc($res);
//var_dump($posts);

mysqli_free_result($res);

mysqli_close($conn);


?>

<?php include('inc/header.php')?>
<div class="container m-2">
<h1>Edit Ticket</h1>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="p-4">
  <fieldset class="m-1">
    <legend>Please edit your ticket: </legend>
    </div>
    <div class="form-group m-4">
      <label for="author">Name</label>
      <input name="author" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" value="<? echo $post['author']?>">
    </div>
    <div class="form-group m-4">
      <label for="title">Title</label>
      <input name="title" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" value="<? echo $post['title']?>">
    </div>
    <div class="form-group m-4">
      <label for="body"> Message:</label>
      <textarea name="body" class="form-control" id="exampleTextarea" rows="3"><?echo $post['body']?>
      </textarea>
    </div>
    <input type="hidden" name="update_id" value="<? echo $post['id']?>">
    <button name="submit" type="submit" class="btn btn-primary m-4">Submit</button>
  </fieldset>
</form>
  </div>
<?php include('inc/footer.php')?>