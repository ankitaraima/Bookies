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
<?php
$un=$_SESSION['un'];
$sql="SELECT * FROM userdetails WHERE Username='$un'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $un=$row['Name'];
    $ue=$row['Email'];
    $uu=$row['Username'];
    $up=$row['Phone_no'];
    $us=$row['State'];
    
  }
}
else{
  echo "<div class='alert alert-danger  mt-3 px-5' role='alert' ><b>
  Sorry some error occurs<b> 
</div>";
}
?>

<form action="UserDetails.php" method="post">
    <div class="row"><div class="col-md-4 ml-5;" >
<h1 style="color:rgba(241.19,86.83,0,1); font-family: Alice;  font-size: 48px;"><?php echo "$un 's Information"?></h1>
<p>Here user can change his/her details.After changing user need to click the save button to make the changes permanent..<br><B><I>YOU CANNOT CHANGE YOUR EMAIL ID</I></B></p>
</div>

<div class="col-md-8">
<div class="form-group mb-3 mt-3 ">
    <label for="un" style="color:rgba(241.19,86.83,0,1);" >Name</label>
    <input name="un" type="text" class="form-control" value="<?php echo $un?> "aria-describedby="emailHelp" placeholder="Enter Your name" style="max-width:500px" required>

  </div> 
  <div class="form-group mb-3">
    <label for="ue"style="color:rgba(241.19,86.83,0,1);">Email address</label>
    <input type="email"  class="form-control" name="ue"readonly value="<?php echo $ue?>" aria-describedby="emailHelp" placeholder="Enter email"style="max-width:500px" required>
    <small id="emailHelp" class="form-text text-muted" >We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group mb-3">
    <label for="uu"style="color:rgba(241.19,86.83,0,1);">Username</label>
    <input style="max-width:500px" type="text" class="form-control" name="uu" value="<?php echo $uu?> " aria-describedby="emailHelp" placeholder="Enter Username" required>

  </div>
   
  <div class="form-group mb-3">
    <label for="up" style="color:rgba(241.19,86.83,0,1);">Phone No</label>
    <input type="text" class="form-control"  name="up" value="<?php echo $up?> " placeholder="Phone no" style="max-width:500px" required>
  </div>


<div class="form-group mb-3">
    <label for="us" style="color:rgba(241.19,86.83,0,1);">State</label>
    <input type="text" class="form-control" name="us" value="<?php echo $us?> " placeholder="State" style="max-width:500px" required>
</div>



<button  type='submit' class='btn btn-danger btn-rounded ' name='btn2' id='btn2' style='background-color:rgba(241.19,86.83,0,1); border:none; position: absolute;' >Save</button>

<!-- <button type="submit" class="btn btn-danger btn-rounded mb-5 mr-5 " name="btn" id="btn" >Save</button> -->

</form>



<?php




if(isset($_POST['btn2'])){
  $un=$_POST['un'];
  $ue=$_POST['ue'];
  $uu=$_POST['uu'];
  $up=$_POST['up'];

  $us=$_POST['us'];

$_SESSION['un']=$uu;
  $sql="UPDATE userdetails
  SET Name = '$un' , Username='$uu', State='$us',Phone_no = '$up'
  WHERE Email= '$ue'";

  mysqli_query($conn, $sql);

  $sql="SELECT * FROM issuebook WHERE email='$ue'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0)
  {
    $sql="UPDATE issuebook
    SET Username='$uu'
    WHERE email= '$ue'";

  mysqli_query($conn, $sql);

  }
 
}

?>
    </body></html>