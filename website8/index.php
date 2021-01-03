<?php
require('config/db.php');
require('config/config.php');

$query = 'select * from posts order by created_at desc';

$res = mysqli_query($conn, $query);

$posts = mysqli_fetch_all($res, MYSQLI_ASSOC);
//var_dump($posts);

mysqli_free_result($res);

mysqli_close($conn);
?>

<?php include('inc/header.php')?>
<div class="jumbotron">
<h1 class="display-3">IT Logger</h1>
<p class="">See logged tickets below</p>
<hr class="my-3">
</div>


    <?php foreach($posts as $post):?>
    <div class="card m-3">
    <div class="card-body">
    <h3 class="card-title"><?php echo $post['title'];?></h3>
    <hr>
    <h6 class="card-subtitle mb-2 text-muted">Created on: <?php echo $post['created_at']; ?> <br>By: <?php echo $post['author']; ?></h6>
    
    <p class="card-text"><?php echo $post['body']; ?></p>
    <a class="btn btn-secondary" href="<?php echo ROOT_URL;?>post.php?id=<?php echo $post['id'];?>">Read More</a>
    </div>
    </div>
    
<? endforeach ?>

<?php include('inc/footer.php')?>