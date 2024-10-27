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




<form action="UserSignUp.php" method="post">
    <div class="row"><div class="col-md-4 ml-5;" >
<h1 style="color:rgba(241.19,86.83,0,1); font-family: Alice;  font-size: 48px;">Sign Up</h1>
</div>

<div class="col-md-8">
<div class="form-group mb-3 mt-3 ">
    <label for="un" style="color:rgba(241.19,86.83,0,1);" >Name</label>
    <input name="un" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Enter Your name" style="max-width:500px" required>

  </div> 
  <div class="form-group mb-3">
    <label for="ue"style="color:rgba(241.19,86.83,0,1);">Email address</label>
    <input type="email"  class="form-control" name="ue" aria-describedby="emailHelp" placeholder="Enter email"style="max-width:500px" required>
    <small id="emailHelp" class="form-text text-muted" >We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group mb-3">
    <label for="uu"style="color:rgba(241.19,86.83,0,1);">Username</label>
    <input style="max-width:500px" type="text" class="form-control" name="uu"  aria-describedby="emailHelp" placeholder="Enter Username" required>

  </div>
   
  <div class="form-group mb-3">
    <label for="up" style="color:rgba(241.19,86.83,0,1);">Password</label>
    <input type="password" class="form-control" name="up" placeholder="Password" style="max-width:500px" required>
  </div>
  <div class="form-group mb-3">
    <label for="uph" style="color:rgba(241.19,86.83,0,1);">Phone No</label>
    <input type="text" class="form-control"  name="uph"  placeholder="Phone no" style="max-width:500px" required>
  </div>



<div class="form-group mb-3">
    <label for="us" style="color:rgba(241.19,86.83,0,1);">State</label>
    <input type="text" class="form-control" name="us" placeholder="State" style="max-width:500px" required>
</div>



<button  type='submit' class='btn btn-danger btn-rounded ' name='btn1' id='btn1' style='background-color:rgba(241.19,86.83,0,1); border:none; position: absolute;' >Create Account</button>

<!-- <button type="submit" class="btn btn-danger btn-rounded mb-5 mr-5 " name="btn" id="btn" >Save</button> -->

</form>
<?php
if(isset($_POST['btn1'])){
    $un=$_POST['un'];
    $ue=$_POST['ue'];
    $uu=$_POST['uu'];
    $up=$_POST['up'];
    $us=$_POST['us'];
   $uph=$_POST['uph'];
    $sql="SELECT * FROM userdetails WHERE Username='$uu'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        echo "<div class='alert alert-danger  mt-3 px-5' role='alert' ><b>
        The Username already exists. Please sign in<b> 
      </div>";
    }
    else{
        $sql="INSERT INTO userdetails (Username,Name,Email,Phone_no,State,Password) VALUES('$uu','$un','$ue','$uph','$us','$up')";
        mysqli_query($conn,$sql);
        header("Location:UserSignIn.php");
    }


}
?>
<br><br>
<p >Already have an account? <a href="UserSignIn.php" style="color:rgba(241.19,86.83,0,1);">Click Here</a>
</body></html>
