<?php
session_start();
include_once('database.php');

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
        <a class="nav-link " href="UserPage.php">Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="UserDetails.php">User Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="UserIssueBook.php"   >Issue Books</a>
      </li>
      <li>
      <a class="nav-link" href="UserContactUs.php" >Contact Us</a>
      
      </li>
      <li class="nav-item">
        <a class="nav-link " href="LogOut.php">Log out</a>
      </li>
    </ul>
    </div>
</nav>
<div id="serach">
  <form action="UserPage.php" method="POST">

    <input type="text" placeholder="Search" style="color:rgba(241.19,86.83,0,1);border:0.5px solid black;height:2vw; border-radius: 5px; margin-right:6px;margin-top:2vw; padding:1vw" name="t">
    <input type="submit" style="background-color:rgba(241.19,86.83,0,1);color:white;border:none; height:2vw; border-radius: 5px; margin-right:6px; margin-top:2vw; " value="Search" name="s">
</form>
</div>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Book_id</th>
      <th scope="col">Category</th>
      <th scope="col">Name</th>
      <th scope="col">Author</th>
      <th scope="col">Status</th>
      <th scope="col">Issue Book</th>
    </tr>
  </thead>
  <tbody>
  
<?php 
if(isset($_POST['s'])){
$t=$_POST['t'];
if(empty($t)){
  $sql="SELECT * FROM books";
  $result=mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_array($result)){
    $b = $row['Book_id'];
     $c = $row['Category'];
     $n = $row['Name'];
     $a = $row['Author'];
     $q=$row['Quantity'];
     if($q>0){
      $s="AVAILABLE";
     }
     else{
      $s="NOT AVAILABLE";
     }
    echo "<tr><td>$b</td>
    <td>$c</td>
    <td>$n</td>
    <td>$a</td>
    <td><b>$s</b></td>
   
    <td><button class='btn btn-danger' ><a href='PreviewBook.php?bookid=".$b."' class='text-light' style='text-decoration: none;'>Preview</button><button class='btn btn-primary'><a href='Issue.php?bookid=".$b."' class='text-light' style='text-decoration: none;'>Issue</button></td>
</tr>
    ";
    
    
    }
}
else{
  $sql="SELECT * FROM books WHERE Book_id='$t' OR Category='$t' OR Name='$t' OR Author='$t' OR Quantity='$t'";
$result=mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($result)){
  $b = $row['Book_id'];
  // $_SESSION['id']=$b;
   $c = $row['Category'];
   $n = $row['Name'];
   $a = $row['Author'];
   $q=$row['Quantity'];
   if($q>0){
    $s="AVAILABLE";
   }
   else{
    $s="NOT AVAILABLE";
   }

  echo "<tr><td>$b</td>
  <td>$c</td>
  <td>$n</td>
  <td>$a</td>
  <td><b>$s</b></td>
 
  <td><button class='btn btn-danger' ><a href='PreviewBook.php?bookid=".$b."' class='text-light' style='text-decoration: none;'>Preview</button><button class='btn btn-primary'><a href='Issue.php?bookid=".$b."' class='text-light' style='text-decoration: none;'>Issue</button></td>
</tr>
  ";
  
  
  }
}}
else{
  $sql="SELECT * FROM books";
  $result=mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_array($result)){
    $b = $row['Book_id'];
     $c = $row['Category'];
     $n = $row['Name'];
     $a = $row['Author'];
     $q=$row['Quantity'];
     if($q>0){
      $s="AVAILABLE";
     }
     else{
      $s="NOT AVAILABLE";
     }
    echo "<tr><td>$b</td>
    <td>$c</td>
    <td>$n</td>
    <td>$a</td>
    <td><b>$s</b></td>
   
    <td><button class='btn btn-danger' ><a href='PreviewBook.php?bookid=".$b."' class='text-light' style='text-decoration: none;'>Preview</button>
    <button class='btn btn-primary'><a href='Issue.php?bookid=".$b."' class='text-light' style='text-decoration: none;'>Issue</button></td>
    </tr>
    ";
    
    
    }
}

// $sql="SELECT * FROM books WHERE ";
?>
    
   
  </tbody>
</table>
    </body></html>