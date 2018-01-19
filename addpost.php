<?php
    require('config/config.php');
    require('config/db.php');

    if(isset($_POST['submit'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);

        $query = "INSERT INTO posts(title, author, body) VALUES('$title', '$author', '$body')";

        if(mysqli_query($conn, $query)){
            header('Location:'. ROOT_URL. ' ');
        } else{
            echo 'Error: ' . myqli_error($conn);
        }
    }

 ?>

 <?php include('inc/header.php'); ?>
    <div class="container">
        <nav class= "navbar navbar-default">
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
        </nav>
        
    </div>
     <div class="container">
         <h2>Add Post</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "POST">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name= "title">
            </div>
            <div class="form-group">
                <label for="">Author</label>
                <input type="text" class="form-control" name= "author">
            </div>
            <div class="form-group">
                <label for="">Body</label>
                <textarea type="text" class="form-control" name= "body"></textarea>
            </div>
            <input type="submit" class=" btn btn-primary" name= "submit" value= "Submit">
        </form>   
     </div>
 <?php include('inc/footer.php'); ?>