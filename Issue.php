<?php
session_start();
include_once('database.php');

?>



<?php
$un=$_SESSION['un'];
$un=strtolower($un);
$id=$_GET['bookid'];
$sql="SELECT * FROM books WHERE Book_id='$id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
    $q=$row['Quantity'];
    if($q>0){
        $sql="SELECT * FROM issuebook WHERE Bookid='$id' AND Username='$un'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            echo "<script>alert('You have already issued this book.Thank you');
            window.location = 'UserPage.php';</script>";
        }
        else{
            $q=$q-1;
            $sql="UPDATE books
            SET Quantity='$q'
            WHERE Book_id='$id'";
        $result=mysqli_query($conn,$sql);

            $sql="SELECT * FROM userdetails WHERE Username='$un'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
        $e=$row['Email'];
            }
        
        $sql="SELECT * FROM books WHERE Book_id='$id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $n=$row['Name'];
            }
        $today = new DateTime();
        $dt = $today->format('Y-m-d');
        $sql="INSERT INTO issuebook(Username,email,Bookid,Bookname,Issued_date) VALUES('$un','$e','$id','$n','$dt')";
        mysqli_query($conn,$sql);
        echo "<script>alert('Book is successfully issued.Thank you');
            window.location = 'UserPage.php';</script>";
        
        }    
        }
    }}
    else{
        echo "<script>alert('Book is out of stock. Sorry!!');
            window.location = 'UserPage.php';</script>";
    }
}



}


































?>
    </body></html>