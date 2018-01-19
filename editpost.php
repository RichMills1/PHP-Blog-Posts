<?php
    require('config/config.php');
    require('config/db.php');

    if(isset($_POST['submit'])){
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);

        $query = "UPDATE posts SET
                        title= '$title',
                        author= '$author',
                        body= '$body'
                            WHERE id = {$update_id} ";
        if(mysqli_query($conn, $query)){
            header('Location: '. ROOT_URL. ' ');
        } else{
            echo 'Error: ' . mysqli_error($conn);
        }
    }

     //Get Id
     $id = mysqli_real_escape_string($conn, $_GET['id']);

     //Create Query
     $query = 'SELECT * FROM posts WHERE id = ' . $id;
 
     //Get Result
     $result = mysqli_query($conn, $query);
 
     //Fetch Data
     $post = mysqli_fetch_assoc($result);
 
     //Free Result
     mysqli_free_result($result);
 
     //Close connection
     mysqli_close($conn);
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
         <h2>Edit Post</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "POST">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name= "title" value= "<?php echo $post['title']; ?>">
            </div>
            <div class="form-group">
                <label for="">Author</label>
                <input type="text" class="form-control" name= "author" value= "<?php echo $post['author']; ?>">
            </div>
            <div class="form-group">
                <label for="">Body</label>
                <textarea type="text" class="form-control" name= "body"><?php echo $post['body']; ?></textarea>
            </div>
            <input type="hidden" name= "update_id" value= "<?php echo $post['id']; ?>">
            <input type="submit" class=" btn btn-primary" name= "submit" value= "Submit">
        </form>   
     </div>
 <?php include('inc/footer.php'); ?>