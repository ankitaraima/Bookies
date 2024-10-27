<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:index.php" );
}
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdminProfile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Library Management System</title>

    </head>
    <body style="background-color:hsl(0,0%,95%);margin:0 20px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="main">
  <a class="navbar-brand" href="index.php" id="nav">Bookies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link "  href="AdminProfile.php">Profile</a>
      <a class="nav-item nav-link "  href="books.php">Books</a>
      <a class="nav-item nav-link "href="IssueBook.php">Issue Book</a>
      <a class="nav-item nav-link active" href="AdminPage.php">Admin Details</a>
      <a class="nav-item nav-link " href="LogOut.php" >Log out</a>
    </div>
  </div>

</nav> 
<?php

include_once('database.php');

if(isset($_GET['updateid'])){
    $id = $_GET['updateid'];
    $sql="SELECT * FROM books WHERE Book_id='$id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
       
        $n=$row['Name'];
        $c=$row['Category'];
        $a=$row['Author'];
        $q=$row['Quantity'];
       
      }
    }
    else{
      echo "<div class='alert alert-danger  mt-3 px-5' role='alert' ><b>
      Sorry some error occurs<b> 
    </div>";
    }

}






?>

<form action="update.php" method="post">
    <div class="row"><div class="col-md-4 ml-5;" >
<h1 style="color:rgba(241.19,86.83,0,1); font-family: Alice;  font-size: 48px;">Book Information</h1>
<p>Here admin can change book details.After changing admin need to click the save button to make the changes permanent..<br><B><I>YOU CANNOT CHANGE YOUR BOOK ID</I></B></p>
</div>

<div class="col-md-8">
<div class="form-group mb-3 mt-3 ">
    <label for="b" style="color:rgba(241.19,86.83,0,1);" >Book_id</label>
    <input name="b" readonly type="text" class="form-control" value="<?php echo $id?> "aria-describedby="emailHelp" placeholder="Enter Your name" style="max-width:500px" required>

  </div>
<div class="form-group mb-3 mt-3 ">
    <label for="n" style="color:rgba(241.19,86.83,0,1);" >Name</label>
    <input name="n" type="text" class="form-control" value="<?php echo $n?> "aria-describedby="emailHelp" placeholder="Enter Your name" style="max-width:500px" required>

  </div> 
  <div class="form-group mb-3">
    <label for="c"style="color:rgba(241.19,86.83,0,1);">Category</label>
    <input type="text"  class="form-control" name="c" value="<?php echo $c?>" aria-describedby="emailHelp" placeholder="Enter email"style="max-width:500px" required>
    <!-- <small id="emailHelp" class="form-text text-muted" >We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group mb-3">
    <label for="a"style="color:rgba(241.19,86.83,0,1);">Author</label>
    <input style="max-width:500px" type="text" class="form-control" name="a" value="<?php echo $a?> " aria-describedby="emailHelp" placeholder="Enter Username" required>

  </div>
   
  <div class="form-group mb-3">
    <label for="q" style="color:rgba(241.19,86.83,0,1);">Quantity</label>
    <input type="text" class="form-control" name="q" value="<?php echo $q?> " placeholder="Quantity" style="max-width:500px" required>
  </div>








<button type="submit" class="btn btn-danger btn-rounded mb-5 mr-4" style="display: block; position: absolute;" name="btn" id="btn" >Save</button>

</form>



<?php




if(isset($_POST['btn'])){
  $b=$_POST['b'];
  $c=$_POST['c'];
  $n=$_POST['n'];
  $a=$_POST['a'];
  $q=$_POST['q'];

  $sql="UPDATE books
  SET Name = '$n' , Category='$c', Author='$a' , Quantity='$q'
  WHERE Book_id = $b";

  mysqli_query($conn, $sql);


  echo "<script>window.location.href='books.php';</script>";
}

?>
    </body></html>