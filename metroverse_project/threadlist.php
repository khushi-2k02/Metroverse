<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DMRC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    .page {
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
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE category_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    
    ?>

    <!-- php code to add a thread   -->
    <?php
 $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        // inserting thread into  threads table
        $thread_title = $_POST['title'];
        $thread_desc = $_POST['desc'];

        $thread_title = str_replace("<", "&lt;", $thread_title);
        $thread_title = str_replace(">", "&gt;", $thread_title); 

        $thread_desc = str_replace("<", "&lt;", $thread_desc);
        $thread_desc = str_replace(">", "&gt;", $thread_desc); 

        $sno = $_POST['sno']; 
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$thread_title', '$thread_desc', '$id', '$sno', current_timestamp());"; 
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Woah</strong> Your thread has been added!Please wait for community to respond  
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
    }
?>

        <!-- selecting one particular category  -->
        <div class="container my-4">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to <?php echo $catname;?> Forum</h1>
                <p class="lead"> <?php echo $catdesc;?></p>
                <hr class="my-4">
                <p class="lead">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do
                    not
                    post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross
                    post
                    questions. Remain respectful of other members at all times.</p>
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>

        

        <?php
        if (isset($_SESSION['loggedin']) &&   $_SESSION['loggedin']==true ) {
    echo ' <div class="container">
    <h2>Start a discussion</h2>
     
<form action="'.$_SERVER["REQUEST_URI"].'" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Thread Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible</div>
        </div>
        <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> ';}

    else{
        echo  '
        <h2>Start a discussion</h2>
        <div class="lead"> <p> You are not logged in. Please login  to be able to start a discussion.</p></div>
        ';
    }
    ?>






    <h2 class="py-2">Browse Questions</h2>

    <!-- each question php code from thread table for different category -->
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id"; 
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $desc = $row['thread_desc']; 
        $thread_time = $row['timestamp']; 
        $thread_user_id = $row['thread_user_id']; 
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        


        echo '<div class="media my-3">
            <img src="partials/user.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">'.
             '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id. '">'. $title . ' </a></h5>
                '. $desc . ' </div>'.'<div class="font-weight-bold my-0"> Asked by:
                '. $row2['user_email'] . '
                at '. $thread_time. '</div>'.
        '</div>';

        }
         
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Threads Found</p>
                        <p class="lead"> Be the first person to ask a question</p>
                    </div>
                 </div> ';
        }
    ?>









    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>

</html>
