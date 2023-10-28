<?php
 session_start();
 
 echo ' 

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">&nbsp
  <img src="partials/img1.png" alt="DMRC" width="30" height="30" >
    <a class="navbar-brand" href="#">&nbspMetroVerse</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Top Categories
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/dmrc/threadlist.php?catid=4">Travel Tips and Hacks</a>
            <a class="dropdown-item" href="#">Safety and Security</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Lost and Found</a>
            <a class="dropdown-item" href="#">Technical Support</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>';

      if (isset($_SESSION['loggedin']) &&   $_SESSION['loggedin']==true ) {
   echo '<p class = "text-light my-0 mx-2">
   User email : '.$_SESSION['useremail'].'</p>
   <form class="form-inline my-2 my-lg-0">
   <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
   <button class="btn  btn-danger" type="submit">Search</button>
   
 <a  href= "partials/_logout.php" class = "btn btn-danger mx-2" > Logout</a>
   </form>';
      }

     else{ 
      echo '
       
      <div class="mx-3">
        <button class="btn btn-danger" data-toggle="modal" data-target="#loginModal">Login</button>
        &nbsp
        <button class="btn btn-danger" data-toggle="modal" data-target="#signupModal">SignUp</button>';
      }

echo '</div></div></nav>';

   
    include "_loginModal.php";
    include "_signupModal.php";
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true" ){
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>Woah</strong> You can login now
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    }
  ?>

  
  

    
  

 
 
   
 



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>

</html>
