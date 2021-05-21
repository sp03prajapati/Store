<?php

 $showAlert = false;
 $showError = false;
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
    include 'partials/_dbconnect.php';

     $fname = $_POST["fname"];
     $lname = $_POST["lname"];
     $email = $_POST["email"];
     $mobile = $_POST["mobile"];
     $password = $_POST["password"];
     $vpassword = $_POST["vpassword"];

     $exists=false;
     if(($password == $vpassword) && $exists == false)
     {
      $hash= password_hash($password,PASSWORD_DEFAULT);
      
   
    $sql = "INSERT INTO `arjun` (`fname`, `lname`, `email`, `mobile`, `password`, `vpassword`, `date`) 
    VALUES ('$fname', '$lname', '$email', '$mobile', '$hash', '$hash', CURRENT_TIMESTAMP())"; 

    //$sql = "INSERT INTO `arjun` (`fname`, `lname`, `mobile`, `password`, `vpassword`, `date`) 
    //VALUES ('$fname', '$lname', '$mobile', '$hash', '$hash', CURRENT_TIMESTAMP())";

        $result =mysqli_query($conn,$sql);
      if($result)
      {
        $showAlert = true;
      }
}
      else
      {
        $showError = "password do not match";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Signup</title>
  </head>
  <body>
  <?php include 'partials/_nav.php' ?>

  <?php
    if($showAlert)
    {
  
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfull!</strong> Your account are create you can login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
          </div>'; 
}
if($showError)
    {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>ERROR!</strong> '.$showError.'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
        </div>';
}

?>


  
  <div class="container">

            <h1 class="text-center mt-5"><mark><u>Create New Account Page</u></mark></h1>
            <form action="signup.php" method="POST">
  <div class="mb-3">
    <label for="fname" class="form-label">FirtName</label>
    <input type="text"  maxlength="8"class="form-control" id="fname" name="fname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="lname" class="form-label">LastName</label>
    <input type="text"  maxlength="8"class="form-control" id="lname" name="lname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="mobile" class="form-label">Mobile-no</label>
    <input type="number"  class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp">
    
  </div>

  
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password"  maxlength="8" class="form-control" id="password" name="password">
  </div>

  <div class="mb-3">
    <label for="vpassword" class="form-label">verify-Password</label>
    <input type="vpassword"  maxlength="8" class="form-control" id="vpassword" name="vpassword">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>