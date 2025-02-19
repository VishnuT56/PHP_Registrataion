<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('location:login.php');

  }

?>

<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Welcome page </title>
  </head>
  <body>

    
    <h1 class="text-center text-warning mt-5">Welcome                                               
      <?php echo $_SESSION['username'];?>                
    </h1>


    <div class="container">
      <a href="logout.php" class="btn btn-primary mt-5">Logout</a>
    </div>
    
  </body>
</html>