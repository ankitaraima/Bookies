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
      <a class="nav-item nav-link "href="AdminPage.php">Admin Details</a>
      <a class="nav-item nav-link " href="LogOut.php" >Log out</a>
    </div>
  </div>
</nav>
<h1 style="color:rgba(241.19,86.83,0,1); font-family: Alice;  font-size: 48px;">All Admins' Informations</h1>
<table class="table table-striped table-dark ml-3 mr-3">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Phone No</th>
      <th scope="col">Address</th>
      <th scope="col">State</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>   
<?php
$sql = "SELECT * FROM admin";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
   $name = $row['Name'];
   $email = $row['Email'];
   $user = $row['Username'];
   $phn = $row['Phone_no'];
   $ad = $row['Address'];
   $state = $row['State'];
  echo "<tr>
  <td>$name</td>
  <td>$email</td>
  <td>$user</td>
  <td>$phn</td>
  <td>$ad</td>
  <td>$state</td>
  <td><button class='btn btn-danger' ><a href='deleteAdmin.php?deleteAdminid=".$user."' class='text-light' style='text-decoration: none;'>Delete</button></td> 
</tr>
";
}

?>
</tbody>
</table>
<form action="addAdmin.php">
<button   class="btn btn-danger btn-rounded" name="btn" id="btn" style="background-color:rgba(241.19,86.83,0,1); border:none;  " >Add Admin</button>
</form>


    </body>
</html>