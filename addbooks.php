<?php
session_start();
include_once('database.php');
if(!isset($_SESSION['username'])){
    header("Location:index.php" );
}
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdminHome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Library Management System</title>

    </head>
    <body style="background-color:hsl(0,0%,95%); margin:0 20px">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="main">
  <a class="navbar-brand" href="index.php" id="nav">Bookies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link "  href="AdminProfile.php">Profile</a>
      <a class="nav-item nav-link "  href="books.php">Books</a>
      <a class="nav-item nav-link "href="#">Issue Book</a>
      <a class="nav-item nav-link "href="AdminPage.php">Admin Details</a>
      <a class="nav-item nav-link " href="LogOut.php" >Log out</a>
    </div>
  </div>
</nav>
<form action="addbooks.php" method="post">
    <div class="row"><div class="col-md-4">
<h1 style="color:rgba(241.19,86.83,0,1); font-family: Alice; font-size: 48px;">Book Details</h1>
<p>Here admin need to enter all the details about the books..</p>
</div>

<div class="col-md-8">
<div class="form-group mb-3 mt-3 ">
    <label for="b" style="color:rgba(241.19,86.83,0,1);" >Book_id</label>
    <input name="b" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Bookid" style="max-width:500px" required>

  </div>
<div class="form-group mb-3 mt-3 ">
    <label for="c" style="color:rgba(241.19,86.83,0,1);" >Category</label>
    <input name="c" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Category" style="max-width:500px" required>

  </div> 
  <div class="form-group mb-3">
    <label for="n"style="color:rgba(241.19,86.83,0,1);">Book Name</label>
    <input type="text" class="form-control" name="n" aria-describedby="emailHelp" placeholder="Book Name"style="max-width:500px" required>
    
  </div>
  <div class="form-group mb-3">
    <label for="a"style="color:rgba(241.19,86.83,0,1);">Author Name</label>
    <input style="max-width:500px" type="text" class="form-control" name="a" aria-describedby="emailHelp" placeholder="Author" required>

  </div>
   
  <div class="form-group mb-3">
    <label for="q" style="color:rgba(241.19,86.83,0,1);">Quantity</label>
    <input type="number" class="form-control" name="q" placeholder="Quantity" style="max-width:500px" required>
  </div>
  <div class="form-group mb-3">
    <label for="q" style="color:rgba(241.19,86.83,0,1);">Content</label>
    <textarea rows="6" cols="50" class="form-control" name="con" placeholder="Content at a glance" style="max-width:500px" required></textarea>
  </div>
</div>
</div>


<button  type="submit" class="btn btn-danger btn-rounded mb-5 " name="btn" id="btn" style="background-color:rgba(241.19,86.83,0,1); border:none; position: absolute; width: 34vw;
    margin: 3vw 0 0 32vw ;" >Add</button>
</form>
<?php
if (isset($_POST['btn'])) {
  $b = $_POST['b'];
  $con = $_POST['con'];
    $c = $_POST['c'];
    $n = $_POST['n'];
    $a = $_POST['a'];
    $q = $_POST['q'];
    $sql="SELECT * FROM books WHERE Book_id='$b'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
    echo "<br><br><br><div class='alert alert-danger  mt-3 px-5' role='alert' ><b>
        Book id already exists.<b> 
      </div>";
  }

else{
  $sql = "INSERT INTO books (Book_id,Category,Name,Author,Quantity,Content)
  VALUES('$b','$c','$n','$a','$q','$con')";
      mysqli_query($conn, $sql);
      header("Location:books.php");
}
    
}
?>
</body></html>