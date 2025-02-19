
<?php
$login=0;
$invalid=0;


if($_SERVER ['REQUEST_METHOD']=="POST"){          //connect method in post  
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql = "Select * from `registration` where username='$username' and password= '$password'";

    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $login=1;

          session_start();                                      //return to login page
          $_SESSION['username']=$username;
          header('location:home.php');


        }else{
            $invalid=1;
        }
           
       
    }

}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Login page</title>
  </head>
  <body>
  <?php

  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> Success </strong>You are Successfully Logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>';
  }

  ?>
  <?php
if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Error </strong>Invalid credentials.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>';
  }

  ?>
 


    <h1 class="text-center">Login </h1>
   <div class="container mt-5">

   <form action="login.php" method="post">                   

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-100">Login</button>
</form>

   </div>

  </body>
</html>