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
      <a class="nav-item nav-link " href="IssueBook.php">Issue Book</a>
      <a class="nav-item nav-link " href="AdminPage.php">Admin Details</a>
      <a class="nav-item nav-link " href="LogOut.php" >Log out</a>
    </div>
  </div>
</nav>

<h1 style="color:rgba(241.19,86.83,0,1); font-family: Alice;  font-size: 48px;">Currently Issued Books</h1>
<table class="table table-striped table-dark ml-3 mr-3">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Book_Id</th>
      <th scope="col">Issued_date</th>
      <th scope="col">Return_date</th>
      <th scope="col">Amount_paid</th> 
    </tr>
  </thead>
  <tbody>    
<?php
$sql = "SELECT * FROM issuebook";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)){
   $u = $row['Username'];
   $e = $row['email'];
   $b = $row['Bookid'];
    // $r = $row['Return_date'];
  
   $i = $row['Issued_date'];

  if (isset($row['Return_date'])){
    $r= $row['Return_date'];
  }
  else{
    $r = "NULL";
  }
  

  
   
   $a= $row['Amount_paid'];
   

  echo "<tr>
  <td> $u</td>
  <td>$e</td>
  <td>$b</td>
  <td>$i</td>
  <td>$r</td>
  <td>$a</td>
 

</tr>


";
}

?>
 </tbody>
</table>

<form action='IssueBook.php' method='POST'><div class='form-group mb-3 mt-3 '>
    <label for='an' style='color:rgba(241.19,86.83,0,1); margin-top: 10vh;' >Username</label>
    <input name='an' type='text' class='form-control mb-1'  aria-describedby='emailHelp'placeholder='Enter Your name' style='max-width:500px' required>
     <label for='ab' style='color:rgba(241.19,86.83,0,1); ' >Book id</label>
    <input name='ab' type='text' class='form-control mb-3'  aria-describedby='emailHelp'placeholder='Enter book id' style='max-width:500px' required>
    <label for='aa' style='color:rgba(241.19,86.83,0,1); ' >Amount</label>
    <input name='aa' type='number' class='form-control mb-3'  aria-describedby='emailHelp'placeholder='Enter book id' style='max-width:500px' required>
    <button  type='submit' class='btn btn-danger btn-rounded mb-5 ' name='btn1' id='btn1' style='background-color:rgba(241.19,86.83,0,1); border:none; position: absolute;' >Return</button>
  </div></form> 
<?php
if (isset($_POST['btn1'])) {
    $name = $_POST['an'];
    $name=strtolower($name);
    $id = $_POST['ab'];
    $am=$_POST['aa'];
  $today = new DateTime();
$dt = $today->format('Y-m-d');

  $sql = "SELECT * FROM issuebook WHERE  Return_date IS NULL AND Username='$name' AND Bookid='$id'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
    
    $sql = "UPDATE issuebook
    SET Return_date='$dt',Amount_paid='$am'
    WHERE Username='$name'AND Bookid='$id'";
    mysqli_query($conn, $sql);
    

      $sql="SELECT * FROM books WHERE Book_id='$id'";
      $result=mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
          $q=$row['Quantity'];
          break;
        }
          $q=$q+1;
          $sql="UPDATE books 
          SET Quantity='$q'
          WHERE Book_id='$id'";
    mysqli_query($conn, $sql); 

    



    echo "<br><br><br><div class='alert alert-success mt-3 px-5' role='alert' ><b>
        Return date is updated successfully.<b> 
      </div>";


  }}
 

  else{
    echo "<br><br><br><div class='alert alert-danger  mt-3 px-5' role='alert' ><b>
        Username doesn't exist or you have already returned the book.Thank you.<b> 
      </div>";
  }
}

?>

    </body></html>