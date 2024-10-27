<?php
session_start();
include_once('database.php');

if(isset($_SESSION['un'])){
 unset( $_SESSION['un']);
}
if(isset($_SESSION['username'])){
  header("Location:AdminPage.php");
}

?>


<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Library Management System</title>

    </head>
    <body style="background-color:hsl(0,0%,95%)">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="main">
  <a class="navbar-brand" href="index.php" id="nav">Bookies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link " style="cursor: no-drop;" href="#">Profile</a>
      <a class="nav-item nav-link " style="cursor: no-drop;" href="#">Books</a>
      <a class="nav-item nav-link " style="cursor: no-drop;" href="#">Issue Book</a>
      <a class="nav-item nav-link " style="cursor: no-drop;" href="#">Admin Details</a>
      <a class="nav-item nav-link disabled" style="cursor: no-drop;" href="#" >Log out</a>
    </div>
  </div>
</nav>

<form action="adminSignIn.php" method="post">
<div class="row"><div class="col-md-4">
<h1 style="color:rgba(241.19,86.83,0,1); font-family: Alice; font-size: 48px;">Admin Details</h1>
<p>Here admin need to enter all your detals to sign in..</p>
</div>

<div class="col-md-8">
<div class="form-group mb-3 mt-3 ">
    <label for="an" style="color:rgba(241.19,86.83,0,1);" >Name</label>
    <input name="an" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your name" style="max-width:500px" required>

  </div> 
  <div class="form-group mb-3">
    <label for="ae"style="color:rgba(241.19,86.83,0,1);">Email address</label>
    <input type="email" class="form-control" name="ae" aria-describedby="emailHelp" placeholder="Enter email"style="max-width:500px" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group mb-3">
    <label for="au"style="color:rgba(241.19,86.83,0,1);">Username</label>
    <input style="max-width:500px" type="text" class="form-control" name="au" aria-describedby="emailHelp" placeholder="Enter Username" required>

  </div>
   
  <div class="form-group mb-3">
    <label for="ap" style="color:rgba(241.19,86.83,0,1);">Password</label>
    <input type="text" class="form-control" name="ap" placeholder="Password" style="max-width:500px" required>
  </div>
</div>
</div>


<button type="submit" class="btn btn-danger btn-rounded " name="btn" id="btn" >Sign in</button>

</form>

<?php
if (isset($_POST['btn'])) {
    $an = $_POST['an'];
    $ae = $_POST['ae'];
    $au = $_POST['au'];
    $ap = $_POST['ap'];
  $_SESSION['username'] = $au;
  $name = strtolower($an);
    $sql = "SELECT * FROM admin WHERE Username='$au' AND Password='$ap' AND Name='$name' AND Email='$ae'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        header("Location:AdminPage.php");
    } else{
        echo "<div class='alert alert-danger  mt-3 px-5' role='alert' ><b>
        You are not a admin<b> 
      </div>";
    }
}
?>  </body>
</html>