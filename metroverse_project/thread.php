<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DMRC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<style>
    .page{
        margin-right: 150px;
        margin-left: 150px;
    }
</style>  
</head>
  <body>
     <?php
         include "partials/_header.php";
         include "partials/_dbconnect.php";
    ?>
    <div class="page">

     <!-- jumbotron   php code-->
  <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        //query the users table to found out the name of original post
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by =  $row2['user_email'];
    }
    
    ?>
<!-- php code to add a comment  -->
<?php
 $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        // inserting comment into comments table
        $comment = $_POST['comment'];
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment); 
         $sno = $_POST['sno'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp());"; 
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Woah</strong> Your comment has been added! 
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
    }
?>

      <!-- selecting one particular thread/ques  -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-5"> <?php echo $title;?></h1>
            <p class="lead"> <?php echo $desc;?></p>
            <p ><b>Posted by <?php echo $posted_by;?> </b></p>
            <hr class="my-4">
            <p class="lead">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            
        </div>
    </div>

    
     

 
        <!-- form to add a comment  -->
        <?php
        if (isset($_SESSION['loggedin']) &&   $_SESSION['loggedin']==true ) {
            echo '<div class="container">
            <h2>Post a comment!</h2>
<form action="'.$_SERVER["REQUEST_URI"].'"  method="post">
   
  <div class="form-group">
<label for="exampleFormControlTextarea1">Type your comment here</label>
 <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
 <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
 </div>
   
  <button type="submit" class="btn btn-primary">Post comment</button>
</form>
    </div>';
        }

        else{
            echo  '
             
            <h2>Post a comment!</h2>
            <div class="lead"> <p> You are not logged in. Please login  to be able to post comments.</p></div>
             
            ';
        }
?>

     
    <h2 class="py-2">  Discussions</h2>
<!-- fetching each comment php code from comment table -->
<?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    $noResult = true;
     
    
     
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time = $row['comment_time'];
        $thread_user_id = $row['comment_by'];  
         
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        


        echo '<div class="media my-3">
            <img src="partials/user.png" width="54px" class="mr-3" alt="...">
    <div class="media-body">
<p class="font-weight-bold my-0"> Commented by '.$row2['user_email'].' at '.$comment_time.'</p>
    '.$content.'
    </div></div>';

        }
        
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Comment Found</p>
                        <p class="lead"> Be the first person to ask a question</p>
                    </div>
                 </div> ';
        }
    ?>

     
     



</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
