
<?php
$succes=0;
$user=0;
$invalid=0;


if($_SERVER ['REQUEST_METHOD']=="POST"){          //connect method in post  
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    // $sql="insert into `registration`(username,password) 
    // values('$username','$password')";

    // $result=mysqli_query($conn,$sql);                                                      //execution

    // if($result){
    //     echo "Data inserted successfully";
    // }else{
    //     die(mysqli_error($conn));
    // }

    $sql = "Select *from  `registration` where username='$username'";

    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo "User already exist";
            $user=1;
        }else{
          if($password===$cpassword){

            $sql="insert into `registration`(username,password) 
            values('$username','$password')";
            $result=mysqli_query($conn,$sql);   
            if($result){
            // echo "Signup Successfull";
            $succes=1;
            header ('location:login.php');
            }
            }else{
              $invalid=1;
        } 
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

    <title>Signup page</title>
  </head>
  <body>

  <?php
  if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Sorry! </strong>User already exist
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>';
  }

  ?>

  <?php
  if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Sorry! </strong>Invalid Credentials
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>';
  }

  ?>

<?php
  if($succes){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> Success </strong>You are Successfully signed up.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>';
  }

  ?>



    <h1 class="text-center">Signup page</h1>
   <div class="container mt-5">

   <form action="sign.php" method="post">                   

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" placeholder="Confirm  password" name="cpassword">
  </div>
  <button type="submit" class="btn btn-primary w-100">Sign up</button>
</form>

   </div>

  </body>
</html>