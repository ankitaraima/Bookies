
<?php
// include_once('books.php');
// session_start();
include_once('database.php');

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM books WHERE Book_id='$id'";
    mysqli_query($conn, $sql);
    header("Location:books.php" );

}




?>