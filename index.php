 <?php
// include_once('adminSignIn.php');
// include_once('UserSignUp.php');
// include_once('UserSignIn.php');

session_start();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Library Management System</title>
</head>
<body>
  <div id="hbg" style="align-content: center; "> <span style="position: absolute; font-size: 18vw; font-weight: bolder; color: white; margin: 7vh 0 0 20vh;">Bookies</span> </div>
  <div class="container mt-5" >
  <div class="row">
    <div class="col  ">
    <div class="card">
  <h5 class="card-header" style="background-color: rgba(241.19,86.83,0,1); color: white; font-size: 3vw; font-weight: bolder;">Admin</h5>
  <div class="card-body " style="border: 2px solid rgba(241.19,86.83,0,1);">
    <h5 class="card-title" style="font-size: 2rem; font-weight: bold; color:rgba(241.19,86.83,0,1) ;">Sign in</h5>
    <p class="card-text">Sign in as an admin</p>
    <a href="adminSignIn.php" class="btn btn-primary" style="background-color: rgba(241.19,86.83,0,1); border:none; display: block; ">Sign in</a>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card">
  <h5 class="card-header"style="background-color: rgba(241.19,86.83,0,1); color:white;font-size: 3vw; font-weight: bolder;">User</h5>
  <div class="card-body" style="border: 2px solid rgba(241.19,86.83,0,1);">
    <h5 class="card-title" style="font-size: 2rem; font-weight: bold; color:rgba(241.19,86.83,0,1) ;">Join</h5>
    <p class="card-text">Sign in or sign up as a user</p>
    <a href="UserSignIn.php" class="btn btn-primary mb-3" style="background-color: rgba(241.19,86.83,0,1); border:none ; display: block;" >Sign in</a>
    <a href="UserSignUp.php" class="btn btn-primary"style="background-color: rgba(241.19,86.83,0,1); border:none; display: block; ">Sign up</a>
  </div>
</div>
    </div>
  </div>
</div>





 
      
</body>
</html>