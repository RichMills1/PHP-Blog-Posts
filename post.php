<?php
    require('config/config.php');
    require('config/db.php');

    if(isset($_POST['delete'])){
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

        $query = "DELETE FROM posts 
                            WHERE id = {$delete_id}" ;

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
         <a href="<?php echo ROOT_URL; ?>" class= "btn btn-default">Back</a>
         <h2><?php echo $post['title']; ?></h2>
            <!-- <div class="well"> -->
                <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
                <p><?php echo $post['body']; ?></p>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "POST" class= "pull-right" >
                    <input type="hidden" name= "delete_id" value= "<?php echo $post['id']; ?>">
                    <input type="submit" name= "delete" value= "Delete" class="btn btn-danger">
                </form>
                <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class= "btn btn-info">Edit</a>
            <!-- </div> -->
     </div>
     <?php include('inc/footer.php'); ?>