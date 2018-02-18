<?php
    require('config/config.php');
    require('config/db.php');

    //Create Query
    $query = 'SELECT * FROM posts ORDER BY created_at DESC';

    //Get Result
    $result = mysqli_query($conn, $query);

    //Fetch Data or Result
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //Free Result
    mysqli_free_result($result);

    //Close connection
    mysqli_close($conn);
 ?>

 <?php include('inc/header.php'); ?>
 
   
        <nav class= "navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type= "button" class= "navbar-toggle collapsed" data-toggle= "collapse" data-target= "#navbar" aria-expanded= "false" aria-controls= "navbar">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?php echo ROOT_URL; ?>" class= "navbar-brand">myPHP Blog</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class= "nav navbar-nav">
                        <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
                        <li><a href="<?php echo ROOT_URL; ?>addpost.php">Add Post</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
    
     <div class="container">
         <h2>BLOG POST</h2>
         <?php foreach($posts as $post): ?>
            <div class="well">
                <h3><?php echo $post['title']; ?></h3>
                <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
                <p><?php echo $post['body']; ?></p>
                <a href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>" class="btn btn-info">Read More</a>
            </div>
        <?php endforeach; ?>
     </div>
 <?php include('inc/footer.php'); ?>