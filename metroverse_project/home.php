<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DMRC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<style>
    .page{
        margin-right: 100px;
        margin-left: 100px;
        min-height: 1000px;
    }
</style>  
</head>
  <body>
     <?php
         include "partials/_header.php";
         include "partials/_dbconnect.php";
    ?>
    
     
 

<div class="page">

<div class=" text-justify">
  <br>
<h2 class="text-center">Welcome to the world of MetroVerse!</h2>
<p class="lead">
 Welcome to MetroVerse, your ultimate platform for connecting with fellow travelers and sharing your experiences with the Delhi Metro Rail Corporation (DMRC). Whether you're a daily commuter, a visitor to the city, or an avid explorer, this forum is your space to discuss all things related to metro travel and urban life.

MetroVerse is a thriving community where you can voice your thoughts, exchange travel tips, and engage in meaningful conversations about your metro journeys. Share your insights on the best routes, hidden gems near metro stations, safety measures, and more. Connect with like-minded individuals who understand the joys and challenges of navigating the bustling city through the DMRC network.
 
</p>
</div>
<br> 
<h2 class="text-center">Browse Categories Here...</h2> 


<div class="container">
     <div class="row">
 

          <!-- Fetch all the categories and use a loop to iterate through categories -->
          <?php 
         $sql = "SELECT * FROM `category`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
          // echo $row['category_id'];
          // echo $row['category_name'];
          $id = $row['category_id'];
          $cat = $row['category_name'];
          $desc = $row['category_description'];
          echo '<div class="col-md-4 my-2">
                  <div class="card" style="width: 18rem; height:25rem;">
                      <img src="partials/'.$id. '.jpg" class="card-img-top" alt="category img" style="width: 18rem; height:10rem;">
                      <div class="card-body">
                          <h5 class="card-title"><a href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                          <p class="card-text">' . substr($desc, 0, 90). '... </p>
                          <a href="threadlist.php?catid=' . $id . '" class="btn btn-danger">View Threads</a>
                      </div>
                  </div>
                </div>';
         } 
         ?>    
        </div>
    </div>
    </div>

    <?php
         include "partials/_footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
