<?php
require('config/db.php');
require('config/config.php');

if(isset($_POST['delete'])){
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE from posts WHERE PostID={$delete_id}";  

    if(mysqli_query($conn, $query)){
        header('location: '.ROOT_URL.'');
    } else {
        echo 'error'.mysqli_error($conn);
    }
}


$id = mysqli_real_escape_string($conn, $_GET['id']);

// SELECT posts.postID, Posts.title,Posts.body,Posts.created_at,users.userID, users.username FROM Posts INNER join Users on Posts.userID = Users.userID order by created_at DESC

$query = "SELECT posts.postID, Posts.title,Posts.body,Posts.created_at,users.userID, users.username FROM Posts INNER join Users on Posts.userID = Users.userID WHERE PostID=".$id;

$res = mysqli_query($conn, $query);

$post = mysqli_fetch_assoc($res);
//var_dump($posts);

mysqli_free_result($res);

mysqli_close($conn);
?>

<?php include('inc/header.php')?>
<div class="container">
<a class="btn btn-secondary" href="<?php echo ROOT_URL;?>">Back</a>
    <div class="card border-primary mt-3" style="max-width: 200rem;">
    <div class="card-header p-2">Ticket ID: <?echo $post['postID']?></div>
    <h4 class="card-title p-2"><?php echo $post['title'];?></h4>
    <hr>
    <p class="card-text p-2"><?php echo $post['body']; ?></p>
    <hr>
    <small class="p-2">Created on: <?php echo $post['created_at']; ?> by: <?php echo $post['username']; ?></small>
    </div>
    <hr>
    <a href="<?php echo ROOT_URL;?>editPost.php?id=<?php echo $post['id'];?>" class="btn btn-primary" >Edit</a>
    <hr>
    <form class="pull-right" method="POST" action="<?echo $_SERVER['PHP_SELF']?>">
    <input type="hidden" name="delete_id" value="<?echo $post['id']?>">
    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
    </form>
<?php include('inc/footer.php')?>