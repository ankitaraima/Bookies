<?php
session_start();
include_once('database.php');

if(isset($_SESSION['username'])){
 unset( $_SESSION['username']);
}
if(isset($_SESSION['un'])){
  header("Location:UserPage.php");
}


?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Library Management System</title>

    </head>
    <body style="background-color:hsl(0,0%,95%); margin:0 20px">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php" style="color:rgba(241.19,86.83,0,1) ;padding-left: 2vw; ">Bookies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link " href="#" style="cursor:no-drop;">Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#" style="cursor:no-drop;">User Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " style="cursor:no-drop;" href="#"  >Issue Books</a>
      </li>
      <li>
      <a class="nav-link" href="#" style="cursor:no-drop;" >Contact Us</a>
      
      </li>
      <li class="nav-item">
        <a class="nav-link " style="cursor: no-drop;" href="#">Log out</a>
      </li>
    </ul>
   
  </div>
</nav>

<form method="POST" action="UserSignIn.php">
<div class="row">
    <div class="col-md-4 ml-5;">
    <h1 style="color:rgba(241.19,86.83,0,1); font-family: Alice;  font-size: 48px;">Sign In</h1>
    </div>
    <div class="col-md-4 ml-5;" style="color:rgba(241.19,86.83,0,1) ;"> 
    <div class="form-group mt-5" >
    <label for="un" style="font-weight:bold;font-size: 20px; margin-bottom: 0.5vw; ">Username:</label>
    <input type="text" class="form-control" style="border-radius: 20px;" name="un" id="un" aria-describedby="emailHelp" placeholder="Username">
    
  </div>
 
  <div class="form-group mt-3">
    <label for="up" style="font-weight:bold; font-size: 20px;  margin-bottom: 0.5vw;">Password:</label>
    <input type="password" style="border-radius: 20px;" class="form-control" id="up" name="up" placeholder="Password">
  </div>

  <button type="submit" name="btn" class="btn btn-primary" style="background-color:rgba(241.19,86.83,0,1) ; border: none; display: block; border-radius: 20px; margin-top: 1vw;">Submit</button>
</form>
 
<?php
if(isset($_POST['btn'])){
  $un=$_POST['un'];
  $up=$_POST['up'];
  $sql="SELECT * FROM userdetails WHERE Username='$un' AND Password='$up'";
  $sql1="SELECT * FROM userdetails WHERE Username='$un'";
  $result=mysqli_query($conn,$sql);
  $result1=mysqli_query($conn,$sql1);
  if(mysqli_num_rows($result)>0){
    $_SESSION['un']=$un;
    header("Location:UserPage.php");
  }
  elseif(mysqli_num_rows($result1)>0){
    echo "<div class='alert alert-danger  mt-3 px-5' role='alert' ><b>
    Password is incorrect<b> 
  </div>";
  }
  else{
    echo "<div class='alert alert-danger  mt-3 px-5' role='alert' ><b>
    The User doesn't exist. Please create an account first<b> 
  </div>";
  }

}
?>
<br>
<p style="color:black;">Don't have an account? <a href="UserSignUp.php" style="color:rgba(241.19,86.83,0,1);">Click Here</a></div></div>
</body></html>