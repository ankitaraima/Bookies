<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:index.php" );
}



include_once('database.php');
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
$name=$_SESSION['username'];
$sql="SELECT * FROM admin WHERE Username='$name'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $an=$row['Name'];
    $ae=$row['Email'];
    $au=$row['Username'];
    $ap=$row['Password'];
    $aa=$row['Address'];
    $as=$row['State'];
    $aph=$row['Phone_no'];
  }
}
else{
  echo "<div class='alert alert-danger  mt-3 px-5' role='alert' ><b>
  Sorry some error occurs<b> 
</div>";
}
?>

<form action="AdminProfile.php" method="post">
    <div class="row"><div class="col-md-4 ml-5;" >
<h1 style="color:rgba(241.19,86.83,0,1); font-family: Alice;  font-size: 48px;">Admin Information</h1>
<p>Here admin can change his details.After changing admin need to click the save button to make the changes permanent..<br><B><I>YOU CANNOT CHANGE YOUR PHONE NUMBER</I></B></p>
</div>

<div class="col-md-8">
<div class="form-group mb-3 mt-3 ">
    <label for="an" style="color:rgba(241.19,86.83,0,1);" >Name</label>
    <input name="an" type="text" class="form-control" value="<?php echo $an?> "aria-describedby="emailHelp" placeholder="Enter Your name" style="max-width:500px" required>

  </div> 
  <div class="form-group mb-3">
    <label for="ae"style="color:rgba(241.19,86.83,0,1);">Email address</label>
    <input type="email"  class="form-control" name="ae" value="<?php echo $ae?>" aria-describedby="emailHelp" placeholder="Enter email"style="max-width:500px" required>
    <small id="emailHelp" class="form-text text-muted" >We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group mb-3">
    <label for="au"style="color:rgba(241.19,86.83,0,1);">Username</label>
    <input style="max-width:500px" type="text" class="form-control" name="au" value="<?php echo $au?> " aria-describedby="emailHelp" placeholder="Enter Username" required>

  </div>
   
  <div class="form-group mb-3">
    <label for="ap" style="color:rgba(241.19,86.83,0,1);">Password</label>
    <input type="password" class="form-control" name="ap" value="<?php echo $ap?> " placeholder="Password" style="max-width:500px" required>
  </div>
  <div class="form-group mb-3">
    <label for="aph" style="color:rgba(241.19,86.83,0,1);">Phone No</label>
    <input type="text" class="form-control" readonly name="aph" value="<?php echo $aph?> " placeholder="Phone no" style="max-width:500px" required>
  </div>
  <div class="form-group mb-3">
    <label for="aa" style="color:rgba(241.19,86.83,0,1);">Address</label>
    <input type="text" class="form-control" name="aa" value="<?php echo $aa?> " placeholder="Address" style="max-width:500px" required>
  </div>


<div class="form-group mb-3">
    <label for="as" style="color:rgba(241.19,86.83,0,1);">State</label>
    <input type="text" class="form-control" name="as" value="<?php echo $as?> " placeholder="State" style="max-width:500px" required>
</div>



<button  type='submit' class='btn btn-danger btn-rounded ' name='btn1' id='btn1' style='background-color:rgba(241.19,86.83,0,1); border:none; position: absolute;' >Save</button>

<!-- <button type="submit" class="btn btn-danger btn-rounded mb-5 mr-5 " name="btn" id="btn" >Save</button> -->

</form>



<?php




if(isset($_POST['btn1'])){
  $an=$_POST['an'];
  $ae=$_POST['ae'];
  $au=$_POST['au'];
  $ap=$_POST['ap'];
  $aa=$_POST['aa'];
  $as=$_POST['as'];
  $aph=$_POST['aph'];

  $sql="UPDATE admin
  SET Name = '$an' , Username='$au', Password='$ap' , Address='$aa',State='$as',Email= '$ae'
  WHERE Phone_no = '$aph'";

  mysqli_query($conn, $sql);
 
}

?>
    </body></html>