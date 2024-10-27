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
        <a class="nav-link "  href="UserIssueBook.php"  >Issue Books</a>
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

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Book_id</th>
      
      <th scope="col">Name</th>
      
      <th scope="col">Issued_Date</th>
      <th scope="col">Return_Date</th>
    </tr>
  </thead>
  <tbody>
  
<?php 
    $un=$_SESSION['un'];
  $sql="SELECT * FROM issuebook WHERE Username='$un'";
  $result=mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_array($result)){
    $b = $row['Bookid'];
     $n = $row['Bookname'];
    $i=$row['Issued_date'];
    $r=$row['Return_date'];
    echo "<tr><td>$b</td>
    <td>$n</td>
    <td>$i</td>
    <td>$r</td></tr>
   ";
    
    
    }


// $sql="SELECT * FROM books WHERE ";
?>
    
   
  </tbody>
</table>
    </body></html>