<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DMRC</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<style>
     body {
        margin: 0px;
        padding: 0px;
        background: url('partials/c6.jpeg');
        /* background-image: url('partials/c5.jpeg'); */
        background-size: 100% 100vh;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
       
        
         
         
        }
    .card{
        height: 500px;
        width: 500px;
        align-items: justify;
        padding-left: 30px;
        padding-right: 30px;
        margin-top: 70px;
        /* margin-left: 300px; */
        opacity: .8;
        /* color: black; */
    }
    .info{
      color: snow;
      margin-left: 130px;
       
    }
    #title{
      color: snow;
      /* margin-left: 250px; */
    }
    .card2{
      color: black;

    }
         
</style>  
</head>
  <body>
  <?php
   include "partials/_dbconnect.php";
        include "partials/_header.php";
        
    ?>
     
    
  
    
    <div class="row align-items-center my-2"><div class="col-md-5 order-1 order-md-0"> 
  <ul>
    <div class="info">   
<div class="text-justify mx-5">
<h1 class=" my-3 " id="title">Contact Us</h1>
<h2>
<i class="fa fa-map-marker" > &nbsp;Address</i>
</h2>
<h5>25, Ashoka Road, Near Patel Chowk Metro Station, New Delhi - 110001</h5>
</div> 
<div class="text-justify mx-5">
<h2>
<i class="fa fa-phone" >&nbsp;Call</i>

</h2>
<h5>+91-000-000-0000</h5>
</div>
<div class="text-justify mx-5">
<h2>
<i class="fa fa-envelope-open" >&nbsp;Email</i>
</h2>
<h5>dmrc@****.com</h5>
</div> 

 
 
 
</ul>
             
    </div>

    <div class="col-md-6 order-0 mb-5 mb-md-0 mt-3 order-0 order-md-1 offset-md-1">
                <div class="card ">
                  <br>
                 <div class="card2">
                  
                <h2 class="text-center">Mail us for your query</h2>
                 

    <form  action=" 
    <?php $_SERVER["REQUEST_URI"] ?>
    " method="post">
  <div class="mb-3">
    <label   class="form-label"> </label>
    <input name="name" type="text" class="form-control"   aria-describedby="emailHelp" placeholder="Username">
     
  <div class="mb-3">
    <label   class="form-label"> </label>
    <input name="email" type="email" class="form-control"   aria-describedby="emailHelp" placeholder="Email">
    
  <div class="mb-3">
    <label   class="form-label"> </label>
    <input name="message" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Message">
    
   <br>
   
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
                </div>
            </div></div>
   
            </div>
            </div>

            <?php
      
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
         
          $sql = " INSERT INTO `contacts` ( `username`, `email`, `message`) VALUES ( '$name', '$email', '$message')"; 
          $result = mysqli_query($conn, $sql);
           exit;
        
        
    }
?>
 
     
      
     

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
