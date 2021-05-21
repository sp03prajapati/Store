<?php

 $login = false;
 $showError = false;
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
    include 'partials/_dbconnect.php';

     $email = $_POST["email"];
     $password = $_POST["password"];
  
      $sql = "SELECT * FROM `arjun` WHERE email = '$email' AND password = '$password'";
     
      $result =mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      if($num == 1)
      {
        $login = true;
      }
    else
      {
        $showError = "invalid credentials";
      }
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Login</title>
   <style>
         
   </style> 
  </head>
  <body>
   

    <?php include 'partials/_nav.php' ?>

    <?php
        if($login)
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Successfully!</strong> You are loggedin.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             </div>';

             
    ?>
    <h1 class="text-center mt-5"><mark><u>Login Page</u></mark></h1>

    <div class="container">
    
    <form action="login.php" method="POST">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email"  name="email" aria-describedby="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
  <div  type="submit" class="btn btn-success"><a href="signup.php" class="text-white"><b>Create a New Account!!</b></a></div> 
 </form>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>